<?php

declare(strict_types=1);

namespace App\Controller;

use App\Enum\CommonStatus;
use App\Enum\REQUIREMENT_TYPES;
use Cake\ORM\TableRegistry;
use Laminas\Diactoros\UploadedFile;


/**
 * Requests Controller
 *
 * @property \App\Model\Table\RequestsTable $Requests
 * @method \App\Model\Entity\Request[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RequestsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function index()
    {
        $userId = $this->Authentication->getIdentity()->getIdentifier();

        $this->paginate = [
            'contain' => ['Procedures'],
            'conditions' => ['user_id' => $userId, 'Requests.deleted' => false]
        ];
        $requests = $this->paginate($this->Requests);

        $this->set(compact('requests'));
    }

    /**
     * table de requests
     */
    public function request()
    {
        $userId = $this->Authentication->getIdentity()->getIdentifier();
        $this->paginate = [
            'contain' => ['Procedures', 'Users'],
        ];
        $conditions = ['Requests.status !=' => 'Draft'];

        if ($this->request->getQuery('search')) {
            $searchTerm = $this->request->getQuery('search');
            $conditions['Users.name LIKE'] = '%' . $searchTerm . '%';
        }

        if ($this->request->getQuery('status')) {
            $status = $this->request->getQuery('status');
            $conditions['Requests.status'] = $status;
        }

        $this->paginate['conditions'] = $conditions;
        $requests = $this->paginate($this->Requests);

        $this->set(compact('requests'));
    }
    public function pending()
    {

        $userId = $this->Authentication->getIdentity()->getIdentifier();
        $this->paginate = [
            'contain' => ['Procedures', 'Users'],
            'conditions' => ['Requests.status' => 'pending']
        ];
        $conditions = ['Requests.status' => 'pending'];

        if ($this->request->getQuery('search')) {
            $searchTerm = $this->request->getQuery('search');
            $conditions['Users.name LIKE'] = '%' . $searchTerm . '%';
        }

        $this->paginate['conditions'] = $conditions;
        $requests = $this->paginate($this->Requests);


        $this->set(compact('requests'));
    }
    public function requestapprobation($id)
    {
        $this->request->allowMethod(['post']);

        $request = $this->Requests->get($id, [
            'contain' => ['Procedures', 'Requestrequirements' => ['Procedurerequirements'=>['Requirements']]]
        ]);
       
        $procedureRequirements = $this->Requests->Procedures->Procedurerequirements;
        $requirementStatus = true;

        foreach ($procedureRequirements as $procedureRequirement) {
            $matchingRequirement = $request->Requestrequirements->find()
                ->where(['procedurerequirement_id' => $procedureRequirement->id ])
                ->first();

            if (!$matchingRequirement || $matchingRequirement->status !== 'pending') {
                $requirementStatus = false;
                break;
            }
        }

        if ($requirementStatus) {
            $request->status = 'pending';
            if ($this->Requests->save($request)) {
                $this->Flash->success('Tous les requis ont été remplis avec succès.');
            } else {
                $this->Flash->error('Une erreur s\'est produite lors de la mise à jour du statut.');
            }
        } else {
            $this->Flash->error('Veuillez remplir tous les requis.');
        }


        return $this->redirect(['action' => 'requirementlist', $request->id]);
    }
    public function cancelapprobation($id)
    {
        $this->request->allowMethod(['post']);

        $request = $this->Requests->get($id);
        $request->status = 'Draft';

        if ($this->Requests->save($request)) {
        } else {
            $this->Flash->error('Une erreur s\'est produite lors de la mise à jour du statut.');
        }
        return $this->redirect(['action' => 'requirementlist', $request->id]);
    }
    public function approudrequest($id)
    {
        $this->request->allowMethod(['post']);

        $request = $this->Requests->get($id, [
            'contain' => ['Requestrequirements']
        ]);

        $requirementstatus = true;
        foreach ($request->requestrequirements as $requestrequirement) {
            if ($requestrequirement->status !== 'success') {
                $requirementstatus = false;
                break;
            }
        }

        if ($requirementstatus) {
            $request->status = 'success';

            if ($this->Requests->save($request)) {
            } else {
                $this->Flash->error('Une erreur s\'est produite lors de la mise à jour du statut.');
            }
            $this->redirect(['action' => 'firstview', $request->id]);
        } else {
            $this->Flash->error('Certains Requestrequirements ont un statut "pending" ou "rejected".');
            $this->redirect(['action' => 'firstview', $request->id]);
        }
    }
    public function rejectrequest($id)
    {
        $this->request->allowMethod(['post']);

        $request = $this->Requests->get($id);
        $request->status = 'rejected';

        if ($this->Requests->save($request)) {
        } else {
            $this->Flash->error('Une erreur s\'est produite lors de la mise à jour du statut.');
        }

        return $this->redirect(['action' => 'request']);
    }
    public function approuverequirement($id_req_requirement)
    {
        $this->request->allowMethod(['post']);

        $requestrequirement = $this->Requests->Requestrequirements->get($id_req_requirement);
        $requestrequirement->status = 'success';

        if ($this->Requests->Requestrequirements->save($requestrequirement)) {
        } else {
            $this->Flash->error('Une erreur s\'est produite lors de la mise à jour du statut.');
        }

        return $this->redirect(['action' => 'firstview', $requestrequirement->request_id]);
    }
    public function rejectrequirement($id_req_requirement)
    {
        $this->request->allowMethod(['post']);

        $requestrequirement = $this->Requests->Requestrequirements->get($id_req_requirement);
        $requestrequirement->status = 'rejected';

        if ($this->Requests->Requestrequirements->save($requestrequirement)) {
        } else {
            $this->Flash->error('Une erreur s\'est produite lors de la mise à jour du statut.');
        }

        return $this->redirect(['action' => 'raison', $id_req_requirement]);
    }

    public function raison($id_req_requirement = null)
    {
        $requestrequirement = $this->Requests->Requestrequirements->get($id_req_requirement, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requestrequirement = $this->Requests->Requestrequirements->patchEntity($requestrequirement, $this->request->getData());
            if ($this->Requests->Requestrequirements->save($requestrequirement)) {
                $this->Flash->success(__('raison send success in user'));

                return $this->redirect(['action' => 'firstview', $requestrequirement->request_id]);
            }
            $this->Flash->error(__('the raison can not send try again'));
        }
        $this->set(compact('requestrequirement'));
    }
    /**
     * View method
     *
     * @param string|null $id Request id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id)
    {
        $requestrequirement = $this->Requests->Requestrequirements->find('all', [
            'contain' => ['Requestrequirementproprieties' => ['Requirementproprieties'], 'Procedurerequirements' => ['Requirements']],
            'conditions' => ['Requestrequirements.id' => $id]
        ])->first();
        if (empty($requestrequirement)) {

            $this->Flash->error("Can not load view.");
            return $this->redirect($this->referer());
        }
        $this->set(compact('requestrequirement'));
    }
    /**
     * cancel request 
     */
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $request = $this->Requests->find('all', [
            'conditions' => ['id' => $id, 'deleted' => false],
        ])->first();
        if (empty($request)) {
            $this->Flash->error("propriety not found");
            $this->redirect($this->referer());
        }
        $request->set('deleted', true);

        if ($this->Requests->save($request)) {
            $this->Flash->success(__('The requestrequirement has been deleted.'));
        } else {
            $this->Flash->error(__('The requestrequirement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id, $request_id = null)
    {
        $procedureTable = $this->getTableLocator()->get('Procedures');
        $procedure =  $procedureTable->find('all', [
            'conditions' => ['id' => $id, 'deleted' => false]
        ])->first();

        if (empty($procedure)) {
            $this->Flash->error("Procedure not found");
            return $this->redirect($this->referer());
        }

        $request = $this->Requests->newEmptyEntity();

        if ($this->request->is('post')) {
            $userId = $this->Authentication->getIdentity()->getIdentifier();
            $procedureId = $this->request->getData('procedure_id');

            $request = $this->Requests->patchEntity($request, $this->request->getData());
            $request->user_id = $userId;
            $request->procedure_id = $id;

            $existingRequest = $this->Requests->find()
                ->where(['user_id' => $userId, 'procedure_id' => $id])
                ->first();

            if ($existingRequest) {
                return $this->redirect([
                    'controller' => 'Requests',
                    'action' => 'requirementlist',
                    $existingRequest->id
                ]);
            } else {
                if ($this->Requests->save($request)) {
                    return $this->redirect([
                        'controller' => 'Requests',
                        'action' => 'requirementlist',
                        $request->id
                    ]);
                }
            }

            $this->Flash->error(__('Try again'));
        }

        $this->set(compact('request', 'users', 'procedures'));
    }
    public function firstview($request_id)
    {
        $request = $this->Requests->get($request_id, [
            'conditions' => ['Requests.deleted' => false],
            'contain' => ['Users', 'Procedures', 'Requestrequirements' => ['Requestrequirementproprieties' => ['Requirementproprieties'], 'Procedurerequirements' => ['Requirements']]],
        ]);

        if (empty($request)) {

            $this->Flash->error("Can not load request.");
            return $this->redirect($this->referer());
        }
        $requestrequirement = $request->Requestrequirements;

        $procedurerequirements = $this->Requests->Procedures->Procedurerequirements->find('all', [
            'conditions' => [
                'Procedurerequirements.procedure_id' => $request->procedure_id,
                'Procedurerequirements.deleted' => false
            ],
            'contain' => ['Requirements'],
        ])->all();


        $this->set(compact('procedurerequirements', 'request'));
    }

    public function requirementlist($request_id)
    {
        $request = $this->Requests->find('all', [
            'conditions' => ['Requests.id' => $request_id, 'Requests.deleted' => false],
            'contain' => ['Requestrequirements', 'Procedures'],
        ])->first();

        if (empty($request)) {

            $this->Flash->error("Can not load request.");
            return $this->redirect($this->referer());
        }

        $procedurerequirements = $this->Requests->Procedures->Procedurerequirements->find('all', [
            'conditions' => [
                'Procedurerequirements.procedure_id' => $request->procedure_id,
                'Procedurerequirements.deleted' => false
            ],
            'contain' => ['Requirements'],
        ])->all();

        $this->set(compact('procedurerequirements', 'request'));
    }

    /**
     * Save procedure requirement
     */

    public function fill($procedure_req_id, $request_id)
    {
        $authUser = $this->getAuthenticatedUser();

        $procedureRequirement = $this->Requests->Procedures->Procedurerequirements->get($procedure_req_id, [
            'contain' => ['Requirements' => ['Requirementproprieties', 'Requirementtypes'], 'Procedures']
        ]);

        if (empty($procedureRequirement) || $procedureRequirement->deleted) {
            // Can't find procedure requirement. Show flash error and redirect
            $this->Flash->error("Can not find procedure requirement.");
            return $this->redirect($this->referer());
        }

        $request = $this->Requests->find('all', ['conditions' => [
            'id' => $request_id, 'deleted' => false
        ]])->first();

        if (empty($request)) {
            // Can't load request. Show flash error and return
            $this->Flash->error("Can not load request.");
            return $this->redirect($this->referer());
        }

        $requestRequirement = $this->Requests->Requestrequirements->find('all', [
            'conditions' => ['request_id' => $request_id, 'procedurerequirement_id' => $procedure_req_id],
            'contain' => ['Requestrequirementproprieties']
        ])->first();

        $requirement = $procedureRequirement->requirement;
        $requirementproprieties = $requirement->requirementproprieties;

        if ($authUser && $authUser->id != $request->user_id) {
            // Can't et authenticated user. Show flash error and return
            $this->Flash->error("you have not acces in this page.");
            return $this->redirect($this->referer());
        }

        // ne pas oublier de remettre les enum  
        if ($this->request->is('post')) {
            if ($requirement->requirementtype_id == 3) {
                $requestRequirement = $requestRequirement ?? $this->Requests->Requestrequirements->newEmptyEntity();
                $requestRequirement->set('procedurerequirement_id', $procedureRequirement->get('id'));
                $requestRequirement->set('request_id', $request->get('id'));
                $requestRequirement->set('status', 'pending');

                if ($requestRequirement = $this->Requests->Requestrequirements->save($requestRequirement)) {
                    $requirementPropertiesTable = TableRegistry::getTableLocator()->get('Requestrequirementproprieties');

                    $fieldsErrors = [];

                    foreach ($requirementproprieties as $property) {
                        $propertyField = array_filter(
                            array_keys($this->request->getData()),
                            fn ($field) =>
                            $field == $property->name
                        );

                        if (empty($propertyField)) {
                            $fieldsErrors[$property->name] = 'Veuillez remplir le champs';
                        } else {
                            $requestRequirementProperty = $requirementPropertiesTable->find('all', [
                                'conditions' => [
                                    'requirementpropriety_id' => $property->id,
                                    'requestrequirement_id' => $requestRequirement->id
                                ]
                            ])->first();



                            if (empty($requestRequirementProperty)) {
                                $requestRequirementProperty =  $requirementPropertiesTable->newEmptyEntity();
                            }

                            $requestRequirementProperty->set('requirementpropriety_id', $property->id);
                            $requestRequirementProperty->set('requestrequirement_id', $requestRequirement->id);
                            $requestRequirementProperty->set('value', $this->request->getData($property->name, $property->default_value));
                            $requestRequirementProperty->set('deleted', false);

                            if (!$requirementPropertiesTable->save($requestRequirementProperty)) {
                                $this->Flash->error(' not save');
                                return $this->redirect($this->referer());
                            }
                        }
                    }

                    if (empty($fieldsErrors)) {
                        // success
                        $this->Flash->success('Requirement filled successfully !');
                        return $this->redirect([
                            'controller' => 'Requests', 'action' => 'requirementlist',
                            $request_id
                        ]);
                    } else {
                        // Failed to save
                        $this->Flash->error('Failed to achieve the operation');
                        $this->set(compact('fieldsErrors'));
                    }
                }
            } else if ($requirement->requirementtype_id == 4) {
                $requestRequirement = $this->Requests->Requestrequirements->newEmptyEntity();

                $uploadUrl = $this->uploadRequirement($this->request->getData('file'));
                $requestRequirement->set('procedurerequirement_id', $procedureRequirement->get('id'));
                $requestRequirement->set('request_id', $request->get('id'));
                $requestRequirement->set('status', 'pending');
                $requestRequirement->set('value', $uploadUrl);

                if ($this->Requests->Requestrequirements->save($requestRequirement)) {
                } else {
                }
                $this->Flash->success('image upload sucess');
                return $this->redirect([
                    'controller' => 'Requests', 'action' => 'requirementlist',
                    $request->id
                ]);
            }
        }

        $this->set(compact(
            'procedureRequirement',
            'request',
            'requirement',
            'requirementproprieties',
            'requestRequirement'
        ));
    }

    public function uploadRequirement($file): string
    {
        if ($file instanceof UploadedFile && $file->getError() === UPLOAD_ERR_OK) {
            $destinationDirectory = WWW_ROOT . 'template' . DS . 'images' . DS;
            $filename = time() . '_' . $file->getClientFilename();
            $destinationPath = $destinationDirectory . $filename;

            if ($file->moveTo($destinationPath)) {
                return $destinationPath;
            }
        }
        return $filename;
    }
}

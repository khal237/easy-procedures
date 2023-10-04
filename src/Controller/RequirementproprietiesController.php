<?php


declare(strict_types=1);

namespace App\Controller;
use App\Enum\REQUIREMENT_TYPES;
use App\Enum\CommonStatus;
use Cake\ORM\TableRegistry;


/**
 * Requirementproprieties Controller
 *
 * @property \App\Model\Table\RequirementproprietiesTable $Requirementproprieties
 * @method \App\Model\Entity\Requirementpropriety[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RequirementproprietiesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($id)
    {
        $requirement = $this->Requirementproprieties->Requirements->find('all', [
            'conditions' => ['id' => $id, 'deleted' => false]
        ])->first();

        if (empty($requirement)) {
            $this->Flash->error("requirement not found");
            $this->redirect($this->referer());
        }

        $this->paginate = [
            'conditions' => ['requirement_id' => $id, 'deleted' => false],
        ];

        $requirementproprieties = $this->paginate($this->Requirementproprieties);

        $options = [
            'text' => 'Text',
            'date' => 'Date',
            'email' => 'Email',
            'textarea' => 'Textarea',
            'number' => 'Number',

        ];
        $this->add($id);
        $this->set(compact('requirementproprieties', 'options', 'requirement'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $requirement = $this->Requirementproprieties->Requirements->find('all', [
            'conditions' => ['id' => $id, 'deleted' => false]
        ])->first();
        if (empty($requirement)) {
            $this->Flash->error("Impossible de trouver le requirement");
            $this->redirect($this->referer());
        }

        $requirementpropriety = $this->Requirementproprieties->newEmptyEntity();

        if ($this->request->is('post')) {
            $requirementpropriety = $this->Requirementproprieties->patchEntity(
                $requirementpropriety,
                $this->request->getData()
            );

            $requirementpropriety->deleted = 0;
            $requirementpropriety->set('requirement_id', $id);

            if ($this->Requirementproprieties->save($requirementpropriety)) {
                $this->Flash->success(__('The requirement propriety has been saved.'));

                return $this->redirect(['action' => 'index', $id]);
            }
            $this->Flash->error(__('The requirement propriety could not be saved. Please, try again.'));
        }

        $options = [
            'text' => 'Text',
            'date' => 'Date',
            'email' => 'Email',
            'textarea' => 'Textarea',
            'number' => 'Number',

        ];

        $this->set(compact('requirementpropriety', 'options', 'requirement'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Requirementpropriety id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id)
    {
        $requirementpropriety = $this->Requirementproprieties->find('all', [
            'conditions' => ['id' => $id, 'deleted' => false],
        ])->first();
        if (empty($requirementpropriety)) {
            $this->Flash->error("propriety not found");
            $this->redirect($this->referer());
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $requirementpropriety = $this->Requirementproprieties->patchEntity(
                $requirementpropriety,
                $this->request->getData()
            );

            if ($this->Requirementproprieties->save($requirementpropriety)) {
                $this->Flash->success(__('The requirementpropriety has been saved.'));

                return $this->redirect(['action' => 'index', $requirementpropriety->requirement_id]);
            }

            $this->Flash->error(__('The requirementpropriety could not be saved. Please, try again.'));
        }

        $options = [
            'text' => 'Text',
            'date' => 'Date',
            'email' => 'Email',
            'textarea' => 'Textarea',
            'number' => 'Number',

        ];
        $this->set('requirement_id', $id);
        $this->set(compact('requirementpropriety', 'options'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Requirementpropriety id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $requirementpropriety = $this->Requirementproprieties->find('all', [
            'conditions' => ['id' => $id, 'deleted' => false],
        ])->first();
        if (empty($requirementpropriety)) {
            $this->Flash->error("propriety not found");
            $this->redirect($this->referer());
        }

        $requirementpropriety->set('deleted', true);

        if ($this->Requirementproprieties->save($requirementpropriety)) {
            $this->Flash->success(__('The requirementpropriety has been deleted.'));
        } else {
            $this->Flash->error(__('The requirementpropriety could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index', $requirementpropriety->requirement_id]);
    }
}

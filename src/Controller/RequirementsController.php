<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Requirements Controller
 *
 * @property \App\Model\Table\RequirementsTable $Requirements
 * @method \App\Model\Entity\Requirement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RequirementsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Requirementtypes'],
            'conditions' => ['Requirements.deleted' => false],
        ];
        $requirements = $this->paginate($this->Requirements);
        $this->set(compact('requirements'));
        $this->add();
    }

    /**
     * View method
     *
     * @param string|null $id Requirement id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $requirement = $this->Requirements->get($id, [
            'contain' => ['Requirementtypes', 'Procedurerequirements', 'Requirementproprieties'],

        ]);

        $this->set(compact('requirement'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $requirement = $this->Requirements->newEmptyEntity();
        if ($this->request->is('post')) {
            $requirement = $this->Requirements->patchEntity($requirement, $this->request->getData());
            $requirement->deleted = 0;
            if ($this->Requirements->save($requirement)) {
                $this->Flash->success(__('The requirement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The requirement could not be saved. Please, try again.'));
        }
        $requirementtypes = $this->Requirements->Requirementtypes->find('list', ['limit' => 200])->all();
        $this->set(compact('requirement', 'requirementtypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Requirement id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $requirement = $this->Requirements->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requirement = $this->Requirements->patchEntity($requirement, $this->request->getData());
            if ($this->Requirements->save($requirement)) {
                $this->Flash->success(__('The requirement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The requirement could not be saved. Please, try again.'));
        }
        $requirementtypes = $this->Requirements->Requirementtypes->find('list', ['limit' => 200])->all();
        $this->set(compact('requirement', 'requirementtypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Requirement id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $requirement = $this->Requirements->find('all', [
            'conditions' => ['id' => $id, 'deleted' => false],
        ])->first();
        if (empty($requirement)) {
            $this->Flash->error("propriety not found");
            $this->redirect($this->referer());
        }

        $requirement->set('deleted', true);

        if ($this->Requirements->save($requirement)) {
            $this->Flash->success(__('The requirement has been deleted.'));
        } else {
            $this->Flash->error(__('The requirement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
}

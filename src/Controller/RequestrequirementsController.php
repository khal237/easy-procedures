<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Requestrequirements Controller
 *
 * @property \App\Model\Table\RequestrequirementsTable $Requestrequirements
 * @method \App\Model\Entity\Requestrequirement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RequestrequirementsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Procedurerequirements', 'Requests'],
        ];
        $requestrequirements = $this->paginate($this->Requestrequirements);

        $this->set(compact('requestrequirements'));
    }
    
    /**
     * View method
     *
     * @param string|null $id Requestrequirement id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $requestrequirement = $this->Requestrequirements->get($id, [
            'contain' => ['Procedurerequirements', 'Requests', 'Requestrequirementproprieties'],
        ]);

        $this->set(compact('requestrequirement'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $requestrequirement = $this->Requestrequirements->newEmptyEntity();
        if ($this->request->is('post')) {
            $requestrequirement = $this->Requestrequirements->patchEntity($requestrequirement, $this->request->getData());
            if ($this->Requestrequirements->save($requestrequirement)) {
                $this->Flash->success(__('The requestrequirement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The requestrequirement could not be saved. Please, try again.'));
        }
        $procedurerequirements = $this->Requestrequirements->Procedurerequirements->find('list', ['limit' => 200])->all();
        $requests = $this->Requestrequirements->Requests->find('list', ['limit' => 200])->all();
        $this->set(compact('requestrequirement', 'procedurerequirements', 'requests'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Requestrequirement id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $requestrequirement = $this->Requestrequirements->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requestrequirement = $this->Requestrequirements->patchEntity($requestrequirement, $this->request->getData());
            if ($this->Requestrequirements->save($requestrequirement)) {
                $this->Flash->success(__('The requestrequirement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The requestrequirement could not be saved. Please, try again.'));
        }
        $procedurerequirements = $this->Requestrequirements->Procedurerequirements->find('list', ['limit' => 200])->all();
        $requests = $this->Requestrequirements->Requests->find('list', ['limit' => 200])->all();
        $this->set(compact('requestrequirement', 'procedurerequirements', 'requests'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Requestrequirement id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $requestrequirement = $this->Requestrequirements->get($id);
        if ($this->Requestrequirements->delete($requestrequirement)) {
            $this->Flash->success(__('The requestrequirement has been deleted.'));
        } else {
            $this->Flash->error(__('The requestrequirement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}

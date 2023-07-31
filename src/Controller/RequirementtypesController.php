<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Requirementtypes Controller
 *
 * @property \App\Model\Table\RequirementtypesTable $Requirementtypes
 * @method \App\Model\Entity\Requirementtype[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RequirementtypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $requirementtypes = $this->paginate($this->Requirementtypes);
        $this->set(compact('requirementtypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Requirementtype id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $requirementtype = $this->Requirementtypes->get($id, [
            'contain' => ['Requirements'],
        ]);

        $this->set(compact('requirementtype'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $requirementtype = $this->Requirementtypes->newEmptyEntity();
        if ($this->request->is('post')) {
            $requirementtype = $this->Requirementtypes->patchEntity($requirementtype, $this->request->getData());
            if ($this->Requirementtypes->save($requirementtype)) {
                $this->Flash->success(__('The requirementtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The requirementtype could not be saved. Please, try again.'));
        }
        $this->set(compact('requirementtype'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Requirementtype id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $requirementtype = $this->Requirementtypes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requirementtype = $this->Requirementtypes->patchEntity($requirementtype, $this->request->getData());
            if ($this->Requirementtypes->save($requirementtype)) {
                $this->Flash->success(__('The requirementtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The requirementtype could not be saved. Please, try again.'));
        }
        $this->set(compact('requirementtype'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Requirementtype id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $requirementtype = $this->Requirementtypes->get($id);
        if ($this->Requirementtypes->delete($requirementtype)) {
            $this->Flash->success(__('The requirementtype has been deleted.'));
        } else {
            $this->Flash->error(__('The requirementtype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Filesystem\Filesystem;
use  Cake\Http\ServerRequest\UploadedFile;

/**
 * Procedures Controller
 *
 * @property \App\Model\Table\ProceduresTable $Procedures
 * @method \App\Model\Entity\Procedure[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProceduresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'conditions' => ['deleted' => false]
        ];
        $procedures = $this->paginate(
            $this->Procedures
        );

        $this->set(compact('procedures'));
    }

    /**
     * View method
     *
     * @param string|null $id Procedure id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $procedure = $this->Procedures->get($id, [
            'contain' => ['Procedurerequirements', 'Requests'],
        ]);

        $this->set(compact('procedure'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $procedure = $this->Procedures->newEmptyEntity();



        if ($this->request->is('post')) {
            $procedure = $this->Procedures->patchEntity($procedure, $this->request->getData());
            
            $procedure->deleted = 0;
            if ($this->Procedures->save($procedure)) {
                $this->Flash->success(__('The procedure has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The procedure could not be saved. Please, try again.'));
        }
        $this->set(compact('procedure'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Procedure id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $procedure = $this->Procedures->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $procedure = $this->Procedures->patchEntity($procedure, $this->request->getData());
            if ($this->Procedures->save($procedure)) {
                $this->Flash->success(__('The procedure has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The procedure could not be saved. Please, try again.'));
        }
        $this->set(compact('procedure'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Procedure id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $procedure = $this->Procedures->find('all', [
            'conditions' => ['id' => $id, 'deleted' => false]
        ])->first();
        if (empty($procedure)) {
            $this->Flash->error("procedure not found");
            $this->redirect($this->referer());
        }
        $procedure->set('deleted', true);
        if ($this->Procedures->save($procedure)) {
            $this->Flash->success(__('The procedure has been deleted.'));
        } else {
            $this->Flash->error(__('The procedure could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function details($id)
    {
        $procedure = $this->Procedures->find('all', [
            'conditions' => ['id' => $id, 'deleted' => false]
        ])->first();
        if (empty($procedure)) {
            $this->Flash->error("procedure not found");
            $this->redirect($this->referer());
        }

        $this->set(compact('procedure'));
    }
    public function request()  {

           $this->paginate = [
            'contain' =>['Requests'],
            'conditions' => ['deleted' => false]
        ];
        $procedures = $this->paginate(
            $this->Procedures
        );

        $this->set(compact('procedures'));
    }
}

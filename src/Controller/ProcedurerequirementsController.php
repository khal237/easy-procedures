<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Procedurerequirements Controller
 *
 * @property \App\Model\Table\ProcedurerequirementsTable $Procedurerequirements
 * @method \App\Model\Entity\Procedurerequirement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProcedurerequirementsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Procedures', 'Requirements'],
        ];
        $procedurerequirements = $this->paginate($this->Procedurerequirements);

        $this->set(compact('procedurerequirements'));
    }

    /**
     * View method
     *
     * @param string|null $id Procedurerequirement id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $procedurerequirement = $this->Procedurerequirements->get($id, [
            'contain' => ['Procedures', 'Requirements', 'Requestrequirements'],
        ]);

        $this->set(compact('procedurerequirement'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $procedurerequirement = $this->Procedurerequirements->newEmptyEntity();
        if ($this->request->is('post')) {
            $procedurerequirement = $this->Procedurerequirements->patchEntity($procedurerequirement, $this->request->getData());
            $procedurerequirement->deleted = 0;
            if ($this->Procedurerequirements->save($procedurerequirement)) {
                $this->Flash->success(__('The procedurerequirement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The procedurerequirement could not be saved. Please, try again.'));
        }
        $procedures = $this->Procedurerequirements->Procedures->find('list', ['limit' => 200])->all();
        $requirements = $this->Procedurerequirements->Requirements->find('list', ['limit' => 200])->all();
        $this->set(compact('procedurerequirement', 'procedures', 'requirements'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Procedurerequirement id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $procedurerequirement = $this->Procedurerequirements->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $procedurerequirement = $this->Procedurerequirements->patchEntity($procedurerequirement, $this->request->getData());
            if ($this->Procedurerequirements->save($procedurerequirement)) {
                $this->Flash->success(__('The procedurerequirement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The procedurerequirement could not be saved. Please, try again.'));
        }
        $procedures = $this->Procedurerequirements->Procedures->find('list', ['limit' => 200])->all();
        $requirements = $this->Procedurerequirements->Requirements->find('list', ['limit' => 200])->all();
        $this->set(compact('procedurerequirement', 'procedures', 'requirements'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Procedurerequirement id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $procedurerequirement = $this->Procedurerequirements->get($id);
        if ($this->Procedurerequirements->delete($procedurerequirement)) {
            $this->Flash->success(__('The procedurerequirement has been deleted.'));
        } else {
            $this->Flash->error(__('The procedurerequirement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

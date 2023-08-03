<?php


declare(strict_types=1);

namespace App\Controller;


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
    public function index()
    {
        $this->paginate = [
            'contain' => ['Requirements'],
        ];
        $requirementproprieties = $this->paginate($this->Requirementproprieties);

        $this->set(compact('requirementproprieties'));
        $options = [
            'text' => 'Text',
            'date' => 'Date',
            'file' => 'File',
            'email' => 'Email'
        ];
        $this->set('options', $options);
    }

    /**
     * View method
     *
     * @param string|null $id Requirementpropriety id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $requirementpropriety = $this->Requirementproprieties->get($id, [
            'contain' => ['Requirements', 'Requestrequirementproprieties'],
        ]);

        $this->set(compact('requirementpropriety'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $options = [
            'text' => 'Text',
            'date' => 'Date',
            'file' => 'File',
            'email' => 'Email'
        ];
        $this->set('options', $options);
        $requirementpropriety = $this->Requirementproprieties->newEmptyEntity();
        if ($this->request->is('post')) {
            $requirementpropriety = $this->Requirementproprieties->patchEntity($requirementpropriety, $this->request->getData());
            $requirementpropriety->deleted = 0;
            if ($this->Requirementproprieties->save($requirementpropriety)) {
                $this->Flash->success(__('The requirementpropriety has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The requirementpropriety could not be saved. Please, try again.'));
        }
        $requirements = $this->Requirementproprieties->Requirements->find('list', ['limit' => 200])->all();
        $this->set(compact('requirementpropriety', 'requirements'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Requirementpropriety id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $requirementpropriety = $this->Requirementproprieties->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requirementpropriety = $this->Requirementproprieties->patchEntity($requirementpropriety, $this->request->getData());
            if ($this->Requirementproprieties->save($requirementpropriety)) {
                $this->Flash->success(__('The requirementpropriety has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The requirementpropriety could not be saved. Please, try again.'));
        }
        $requirements = $this->Requirementproprieties->Requirements->find('list', ['limit' => 200])->all();
        $this->set(compact('requirementpropriety', 'requirements'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Requirementpropriety id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $requirementpropriety = $this->Requirementproprieties->get($id);
        if ($this->Requirementproprieties->delete($requirementpropriety)) {
            $this->Flash->success(__('The requirementpropriety has been deleted.'));
        } else {
            $this->Flash->error(__('The requirementpropriety could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

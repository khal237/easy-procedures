<?php

declare(strict_types=1);

namespace App\Controller;


/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

       
        $usertable = $this->fetchtable('Users');
        $users = $usertable->find()
            ->where(['id_role' => 2,'deleted'=>false])
            ->all();
        $this->add();
        $this->set(compact('users'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userstable = $this->fetchTable('Users');
        $user = $userstable->newEmptyEntity();

        if ($this->request->is('post')) {
            $user = $userstable->patchEntity($user, $this->request->getData());
            $existingUserCount = $userstable->countUsersWithEmail($user->email);

            if ($existingUserCount > 0) {
                $this->Flash->error('This email is already taken.');
                return;
            } else {
                $user->id_role = 2;
                $user->deleted = 0;
                if ($userstable->save($user)) {
                    $this->Flash->success('the user has been saved');

                    return $this->redirect(['action' => 'index']);
                }

                $this->Flash->error('Please try again.');
            }
        }

        $this->set(compact('user'));
    }


    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $user = $this->Users->find('all', [
            'conditions' => ['id' => $id, 'deleted' => false],
        ])->first();
        if (empty($user)) {
            $this->Flash->error("user not found");
            $this->redirect($this->referer());
        }

        $user->set('deleted', true);

        if ($this->Users->save($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    /**
     * edit
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been edited.'));

                return $this->redirect(['controller'=>'Test','action' => 'account']);
            }
            $this->Flash->error(__('The user could not be edit. Please, try again.'));
        }
        $this->set(compact('user'));
    }
}

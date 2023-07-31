<?php

declare(strict_types=1);

namespace App\Controller;

use Authentication\PasswordHasher\DefaultPasswordHasher;

/**
 * Auth Controller
 *@property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 * @method \App\Model\Entity\Auth[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AuthController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Authentication.Authentication');
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['login', 'register', 'forgetpassword']);
    }

    public function beforeRender($Event)
    {
        $this->viewBuilder()->setLayout('auth_layout');
    }

    public function register()
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
                if ($this->request->getData('password') !== $this->request->getData('confirm-password')) {

                    $this->Flash->error('The password do not same to the confirm password.');
                } else {

                    $user->id_role = 1;

                    if ($userstable->save($user)) {
                        $this->Flash->success('You have been registered.');

                        return $this->redirect(['action' => 'login']);
                    }

                    $this->Flash->error('Please try again.');
                }
            }
        }
        $this->set(compact('user'));
    }

    public function login()
    {
       

        if ($this->request->is('post')) {

            $result = $this->Authentication->getResult();
            if ($result->isValid()) {
                $target = $this->request->getQuery('redirect', '/test');
                return $this->redirect($target);
                $this->Authentication->allowauthenticated(['test']);
            } else {
                if ($this->request->is('post') && !$result->isValid()) {
                    $this->Flash->error('invalid indetifiant or password');
                }
            }
            
        }
    }
        
   
    public function logout()
    {
        $this->Authentication->logout();
        return $this->redirect(['controller' => 'Auth', 'action' => 'login']);
    }
    public function forgetpassword()
    {
    }
}

<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Auth Controller
 *
 * @method \App\Model\Entity\Auth[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AuthController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel('Users');
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

    public function login()
    {
        $this->request->AllowMethod(['post', 'get']);
        if ($this->request->is('post')) {
            $result = $this->Authentication->getResult();

            if ($result->isValid()) {
                $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'Test',
                    'Action' => 'index'
                ]);

                return $this->redirect($redirect);
            } else {
                $this->Flash->error('E-mail or password incorrect');
            }
        }
    }

    public function register()
    {
        $user = $this->Users->newEmptyEntity();

        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $existingUser = $this->Users->findByEmail($user->email)->first();

            if ($existingUser) {
                $this->Flash->error('This email is already taken.');
               
            }
            if ($user->password !== $this->request->getData('confirm-password')) {
                $this->Flash->error('The password do not same to confirmpassword');
               
            }
            if ($this->Users->save($user)) {
                $this->Flash->success(__('your have been register'));

                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error('Please try again.');
        }
        $this->set(compact('user'));
    }




    public function forgetpassword()
    {
    }
}

<?php

declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\TableRegistry;
/**
 * Test Controller
 *
 * @method \App\Model\Entity\Test[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TestController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {


        $user = $this->getAuthenticatedUser();
        if ($user) {
            $userstable = $this->fetchTable('Users');
            $userData = $userstable->get($user->id);
            $this->set('user', $userData);
        } else {
            $this->Flash->error('Vous devez être connecté pour accéder à cette page');
            return $this->redirect(['controller' => 'Auth', 'action' => 'login']);
        }
    }
    public function account()
    {
       
        $userId = $this->Authentication->getIdentity()->getIdentifier();
        $usersTable = $this->fetchTable('Users');
        $user = $usersTable->get($userId);
        $this->set('user', $user);
    }
    public function count()
    {
         $Table= $this->fetchTable('Requests');
         
        $count = $Table->find(
        )->count();

        $this->set(compact($count));
    }
    
}


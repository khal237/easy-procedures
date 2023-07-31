<?php

declare(strict_types=1);

namespace App\Controller;

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

    public function requirements()
    {
        $this->index();


    }
    public function proceduresrequirements(){
        $this->index();

       
    }
}

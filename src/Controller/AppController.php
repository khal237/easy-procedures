<?php

declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Authentication\AuthenticationServiceInterface;



/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */

    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication');
        $this->Authentication->allowUnauthenticated(['home', 'display']);


        /** $this->Auth->allow(['home', 'display', 'login']);
         * $this->Auth->allow(['view', 'index']);
         * $this->Auth->allow(['view', 'edit']);
         *$this->Auth->allow(['view', 'add']);
         *$this->Auth->allow(['view', 'view']);
         */


        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }

    public function getAuthenticatedUser()
    {
        $result = $this->Authentication->getResult();
        if ($result->isValid()) {
            return $result->getData();
        }
        return null;
    }

 

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->getAuthenticationService();

    }


    protected function getAuthenticationService(): AuthenticationServiceInterface
    {
        $authentication = $this->request->getAttribute('authentication');
        if (!$authentication instanceof AuthenticationServiceInterface) {
            throw new \RuntimeException('Invalid authentication service');
        }
        return $authentication;
    }
    public function beforeRender(\Cake\Event\EventInterface $event)
    {
        
        parent::beforeRender($event);
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
}

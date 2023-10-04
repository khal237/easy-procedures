<?php

declare(strict_types=1);

namespace App\Controller;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\Mailer\Mailer;
use Cake\Routing\Router;
use Cake\Mailer\TransportFactory;
use Cake\Mailer\Email;
use Cake\Utility\Text;

use PHPMailer\PHPMailer\PHPMailer;

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
        $this->Authentication->allowUnauthenticated(['login', 'register', 'forgetpassword', 'verify']);
    }

    public function beforeRender($Event)
    {
        $this->viewBuilder()->setLayout('auth_layout');
    }


    private function generateVerificationToken()
    {
        $length = 32;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $token = '';

        for ($i = 0; $i < $length; $i++) {
            $randomIndex = mt_rand(0, strlen($characters) - 1);
            $token .= $characters[$randomIndex];
        }

        return $token;
    }
    public function register()
    {
        $usersTable = $this->getTableLocator()->get('Users');
        $user = $usersTable->newEmptyEntity();


        if ($this->request->is('post')) {
            $user = $usersTable->patchEntity($user, $this->request->getData());
            $existingUserCount = $usersTable->countUsersWithEmail($user->email);

            if ($existingUserCount > 0) {
                $this->Flash->error('This email is already taken.');
                return;
            } else {
                if ($this->request->getData('password') !== $this->request->getData('confirm-password')) {
                    $this->Flash->error('The password does not match the confirm password.');
                } else {
                    $user->id_role = 1;
                    $user->deleted = 0;
                    $user->token = $this->generateVerificationToken();


                    if ($usersTable->save($user)) {

                        $mailer = new Mailer('default');
                        $mailer
                            ->setTo($user->email)
                            ->setSubject('Confirm your email')
                            ->deliver('Click on the following link to verify your email: ' . $this->generateVerificationLink($user->token));

                        $this->Flash->success('An email verification link has been sent to your email address.');
                        return $this->redirect(['action' => 'login']);
                    } else {
                        $this->Flash->error('Une erreur s\'est produite lors de l\'enregistrement de votre compte.');
                    }
                }
            }
        }
        $this->set(compact('user'));
    }
    private function generateVerificationLink($verificationToken)
    {

        $baseURL = 'https://Easy-procedure'; // un lien de base de mon app

        // pour le moment je construire un lien de vérification avec le token
        $verificationLink = $baseURL . '/users/verify/' . $verificationToken;

        return $verificationLink;
    }
    public function verify($verificationToken)
    {
        $usersTable = $this->getTableLocator()->get('Users');
        $user = $usersTable->findByVerificationToken($verificationToken)->first();

        if ($user) {
            $user->verified = true; //verification qui marche pas
            $user->token = null; // je supprime le token de vérification de la table users

            if ($usersTable->save($user)) {
                $this->Flash->success('Your account has been successfully verified. You can now log in.');
                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error('An error occurred while verifying your account.');
            }
        } else {
            $this->Flash->error('Invalid verification token.');
        }
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

        $userstable = $this->fetchTable('Users');
        if ($this->request->is('post')) {
            $user = $userstable->findByEmail($this->request->getData('email'))->first();
            if ($user) {
                $token = $this->generateVerificationToken();
                $user->reset_password_token = $token;
                $userstable->save($user);

                $mailer = new Mailer('default');
                $mailer
                    ->setTo($user->email)
                    ->setSubject('Réinitialisation de mot de passe')
                    ->deliver(' Bjr Cliquez sur le lien suivant pour réinitialiser votre mot de passe : ' . $this->request->getAttribute('webroot') . 'users/resetPassword/' . $token);

                $this->Flash->success('Un e-mail avec les instructions pour réinitialiser votre mot de passe a été envoyé à votre adresse e-mail.');
                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error('Adresse e-mail invalide.');
            }
        }
    }
    public function resetPassword($token)
    {
        $user = $this->Users->findByResetPasswordToken($token)->first();
        if (!$user) {
            $this->Flash->error('Lien de réinitialisation de mot de passe invalide.');
            return $this->redirect(['action' => 'login']);
        }

        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->reset_password_token = null;

            if ($this->Users->save($user)) {
                $this->Flash->success('Votre mot de passe a été réinitialisé avec succès. Vous pouvez maintenant vous connecter avec votre nouveau mot de passe.');
                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error('Une erreur est survenue lors de la réinitialisation de votre mot de passe. Veuillez réessayer.');
            }
        }

        $this->set(compact('token'));
    }
    public function confirmEmail($token)
    {
        $user = $this->Users->findByResetPasswordToken($token)->first();

        if ($user && $user->reset_password_token_expires >= date('Y-m-d H:i:s')) {
            if ($this->request->is('post')) {
                $newPassword = $this->request->getData('new_password');

                $user->password = $newPassword;
                $user->reset_password_token = null;
                $user->reset_password_token_expires = null;
                $this->Users->save($user);

                $this->Flash->success('Votre mot de passe a été réinitialisé avec succès.');
                return $this->redirect(['action' => 'login']);
            }
        } else {
            $this->Flash->error('Le lien de réinitialisation du mot de passe est invalide ou a expiré.');
            return $this->redirect(['action' => 'login']);
        }
    }
}

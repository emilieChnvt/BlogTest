<?php

namespace App\Controller;

use App\Entity\User;
use Attributes\DefaultEntity;
use Core\Controller\Controller;
use Core\Repository\Repository;
use Core\Response\Response;


#[DefaultEntity(entityName: User::class)]
class UserController extends Controller
{
    public function register():Response
    {
        $name=null;
        $password=null;

        if (!empty($_POST['name']) && !empty($_POST['password'])) {
            $name=$_POST['name'];
            $password=$_POST['password'];
        }
        if($name && $password){
            if($this->getRepository()->findByUsername($name)) {
                return $this->redirect([
                        'type' => 'user',
                        'action' => 'register'
                    ]
                );
            }
                $user = new User();
                $user->setName($name);
                $user->setPassword($password);
                $this->getRepository()->save($user);
                return $this->redirect([
                    'type' => 'user',
                    'action' => 'login'
                ]);
            }


        return $this->render("user/signUp",[

        ]);
    }

    public function login():Response
    {
        $name=null;
        $password=null;
        if (!empty($_POST['name']) && !empty($_POST['password'])) {
            $name=$_POST['name'];
            $password=$_POST['password'];
        }
        if($name && $password){
            $registeredUser = $this->getRepository()->findByUsername($name);
            if(!$registeredUser){
                return $this->redirect([
                    'type' => 'user',
                    'action' => 'login'
                ]);
            }
            $success = $registeredUser->login($password);
            if($success){
            return $this->redirect([
                'type' => 'user',
                'action' => 'login'
            ]);
            }else{
                return $this->redirect([
                    'type' => 'album',
                    'action' => 'index'

                ]);
            }
        }

        return $this->render("user/signIn",[

        ]);
    }
}
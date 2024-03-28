<?php 

namespace App\Controller;



class UsersController extends AppController{


    public function beforeFilter(\Cake\Event\EventInterface $e){
        parent::beforeFilter($e);

        $this->Authentication->addUnauthenticatedActions(['login', 'signup']);
    }

    public function index(){
        
    }

    public function login(){
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            
            $result = $this->Authentication->getResult();
            if ($result->isValid()) {
                $target = $this->Authentication->getLoginRedirect() ?? '/';
                return $this->redirect(['controller' => 'Movies','action' => 'index']);

            } 
            $this->Flash->error('Identifiant ou mot de passe invalide');
        }
        $this->set(compact('user'));
}



    public function signup(){
        $user = $this->Users->newEmptyEntity();
        if($this->request->is('post')){
    
            $user = $this->Users->patchEntity($user, $this->request->getData());
    
            if($this->Users->save($user)){

                
                $this->Flash->success('Utilisateur crée');
                return $this->redirect(['action' => 'login']);
                
                
                
                $this->Flash->error(__('sauvegarde ipossible veuillez re-essayer'));
            }
        }   
        $this->set(compact('user'));
}

public function logout(){
    $this->Authentication->logout();
    $this->Flash->success('A bientôt !');
    return $this->redirect(['controller' => 'Movies', 'action' => 'index']);
}

public function profil(){

}

}
<?php
declare(strict_types=1);

namespace App\Controller;

class MoviesController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $e){
        parent::beforeFilter($e);

        $this->Authentication->addUnauthenticatedActions(['index', 'view']);
    }

    public function index()
    {
        $movies = $this->Movies->find('all'); // Par exemple, pour récupérer toutes les données de la table Movie

        // Transmettre la variable à la vue
        $this->set('movies', $movies);   
    }

    public function add(){
        //si user est admin
        if($this->request->getAttribute('identity')->role == 'admin'){
            $movie = $this->Movies->newEmptyEntity();
                if ($this->request->is('post')) {
                    $movie = $this->Movies->patchEntity($movie, $this->request->getData());
                    
                    if ($this->Movies->save($movie)) {
                    $this->Flash->success(__('The Movie has been saved.'));

                    
                    

                    //return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The movie could not be saved. Please, try again.'));
        }

        $genres = $this->Movies->Genres->find('list');
        $this->set(compact('movie', 'genres'));
        }else {
            $this->Flash->error('U need to be admin if u want to had  a movie');
            return $this->redirect(['Controller' => 'Users','action' => 'index']);
        }

        //sinon
            //on l'engeule
            //on le renvoi
    }

    public function edit($id = null){
        $movie = $this->Movies->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $movie = $this->Movies->patchEntity($movie, $this->request->getData());
            if ($this->Movies->save($movie)) {
                $this->Flash->success(__('The movie has been modified.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The movie could not be modified. Please, try again.'));
        }
        $this->set(compact('movie'));
    }

    

    public function delete($id = null){
        
            $this->request->allowMethod(['post', 'delete']);
            $movie = $this->Movies->get($id);
            if ($this->Movies->delete($movie)) {
                $this->Flash->success(__('The movie has been deleted.'));
            } else {
                $this->Flash->error(__('The movie could not be deleted. Please, try again.'));
            }
            return $this->redirect(['action' => 'index']);
    }


    public function details($id){
    $movie = $this->Movies->get($id, ['contain' => ['Genres']]);
    $this->set('movie', $movie);
    }
}

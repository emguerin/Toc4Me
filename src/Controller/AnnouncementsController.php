<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Announcements Controller
 *
 * @property \App\Model\Table\AnnouncementsTable $Announcements
 */
class AnnouncementsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $this->set('announcements', $this->paginate($this->Announcements));
        $this->set('_serialize', ['announcements']);
    }

    /**
     * View method
     *
     * @param string|null $id Announcement id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $announcement = $this->Announcements->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('announcement', $announcement);
        $this->set('_serialize', ['announcement']);
    }

    public function beforeFilter (Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index','view']);
    }

    public function isAuthorized($user)
    {
        // Tous les utilisateurs enregistrés peuvent ajouter des articles
        if (in_array($this->request->action, ['add','index','view'])) {
            return true;
        }

        // Le propriétaire d'un article peut l'éditer et le supprimer
        if (in_array($this->request->action, ['edit', 'delete'])) {
            $announcementId = (int)$this->request->params['pass'][0];
            if ($this->Announcements->isOwnedBy($announcementId, $user['id'])) {
                return true;
            }
            else {
                $this->Flash->default(__('This announcement is not yours.'));
            }
        }

        return parent::isAuthorized($user);
    }


    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $announcement = $this->Announcements->newEntity();
        if ($this->request->is('post')) {
            $announcement = $this->Announcements->patchEntity($announcement, $this->request->data);
            // ajout de la ligne qui lie l'annonce à l'utilisateur qui l'a crée
            $announcement->announcer_id = $this->Auth->user('id');
            $announcement->toqueur_id = $this->Auth->user('id');
            if ($this->Announcements->save($announcement)) {
                $this->Flash->success(__('The announcement has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The announcement could not be saved. Please, try again.'));
            }
        }
        $users = $this->Announcements->Users->find('list', ['limit' => 200]);
        $this->set(compact('announcement', 'users'));
        $this->set('_serialize', ['announcement']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Announcement id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $announcement = $this->Announcements->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $announcement = $this->Announcements->patchEntity($announcement, $this->request->data);
            if ($this->Announcements->save($announcement)) {
                $this->Flash->success(__('The announcement has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The announcement could not be saved. Please, try again.'));
            }
        }
        $users = $this->Announcements->Users->find('list', ['limit' => 200]);
        $this->set(compact('announcement', 'users'));
        $this->set('_serialize', ['announcement']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Announcement id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $announcement = $this->Announcements->get($id);
        if ($this->Announcements->delete($announcement)) {
            $this->Flash->success(__('The announcement has been deleted.'));
        } else {
            $this->Flash->error(__('The announcement could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}

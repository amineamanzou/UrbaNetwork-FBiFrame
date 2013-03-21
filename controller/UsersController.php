<?php
class UsersController extends Controller{
    
    /**
     * Fonction gérant la connexion avec Facebook
     */
    function login(){
        $this->loadModel('User');

        $uid = $this->facebook->getUser();

        if ($uid) {
            try {
                // Fetch the viewer's basic information
                $basic = $this->facebook->api('/me');
                //$d['basic'] = $basic;
            } catch (FacebookApiException $e) {
                // If the call fails we check if we still have a user. The user will be
                // cleared if the error is because of an invalid accesstoken
                if (!$this->facebook->getUser()) {
                  header('Location: '. AppInfo::getUrl($_SERVER['REQUEST_URI']));
                  exit();
                }
            }

            $userid = $this->User->matchUser(array(
                'conditions' => 'facebook_id='.$uid
            ));
            
            // On a aucun utilisateur qui correspond
            if(empty($userid)){
                $nom = $basic['first_name'];
                $prenom = $basic['last_name'];
                $userid = $this->User->insertUser(array(
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'uid' => $uid
                ));
            }
            else {
                $nom = $userid[0]->nom;
                $prenom = $userid[0]->prenom;
            }
            
            $this->Session->write('user_id', $userid[0]->users_id);
            $this->Session->write('nom', $nom);
            $this->Session->write('prenom', $prenom);
            $this->Session->write('facebook_id', $uid);
            
            return TRUE;
        }
        else {
            $this->logout();
            return FALSE;
        }
    }
    
    /**
     * Fonction gérant la déconnexion
     */
    function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['nom']);
        unset($_SESSION['prenom']);
    }

}
?>

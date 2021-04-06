<?php
class UsersProcessController extends Controller
{
    public $User;
    
    public function __construct()
    {
        parent::__construct();
        $this->User = new User;
    }

    public function inscriptionNouvelUtilisateur()
    {
        $validator = new Validator(
            $_POST,
            ['dir' => 'games', 'page' => 'accueil']
        );

        $validator->validateEmail('username');
        $validator->validateLength('password', 8);
        $validator->validateLength('pseudo', 4);
        $validator->validateNumeric('age');

        $validator->validateUnique('username', 'users.username');
        $validator->validateUnique('pseudo', 'users.pseudo');

        $validator->validatePassword('password', 8);
        $validator->crypt('password');

        
        $data = $validator->getData();

        $this->User->create(
            $data['surname'],
            $data['name'],
            $data['pseudo'],
            $data['age'],
            $data['username'],
            $data['password'],
            $data['city'],
            $data['domaines'],
            $data['style'],
            $data['description'],
            $data['instagram'],
            $data['facebook'],
            $data['twitter'],
            $data['admin'] = 0
            
        );

        $this->Alert->setAlert('Compte créé avec succès !', ['color' => SUCCESS]);
        $this->Alert->redirect(['dir' => 'games', 'page' => 'accueil']);
    }

    public function connexion()
    {
        $validator = new Validator($_POST, ['dir' => 'games', 'page' => 'accueil']);
        $validator->validateEmail('username');
        $validator->validatePassword('password', 8);
        $validator->crypt('password');
        $data = $validator->getData();

        if (!$this->User->login($data['username'], $data['password'])) {
            $this->Alert->setAlert('Mauvaise combinaison login / mot de passe', ['color' => DANGER]);
            $this->Alert->redirect(['dir' => 'games', 'page' => 'accueil']);
        }

        $this->Auth->setUser($this->User->id);

        $this->Alert->setAlert('Welcome back ' . $this->Auth->User->pseudo . ' !', ['color' => LIGHT]);
        $this->Alert->redirect(['dir' => 'posts', 'page' => 'feed']);
    }

    public function logout()
    {
        $this->Auth->logout();

        $this->Alert->setAlert('Déconnexion OK', ['color' => SUCCESS]);
        $this->Alert->redirect(['dir' => '', 'page' => '']);
    }

    public function modification()
    {
        // Mot de passe ?
        $updatePassword = true;
        if ($_POST['password'] == '') {
            unset($_POST['password']);
            $updatePassword = false;
        }

        //description
        $updateDescription = true;
        if ($_POST['description'] == '') {
            unset($_POST['description']);
            $updatePassword = false;
        }

        $validator = new Validator($_POST, ['dir' => 'users', 'page' => 'profil']);

        $validator->validateEmail('username');
        $validator->validateLength('pseudo', 4);
        $validator->validateNumeric('age');

        if ($updatePassword) {
            $validator->validatePassword('password', 8);
            $validator->crypt('password');
        }

        $data = $validator->getData();

        // Contrôles unicité
        if ($data['username'] !== $this->Auth->User->username) {
            $validator->validateUnique('username', 'users.username');
        }

        if ($data['pseudo'] !== $this->Auth->User->pseudo) {
            $validator->validateUnique('pseudo', 'users.pseudo');
        }

        // Mise à jour
        $this->User->updateInformations($this->Auth->User->id, $data);

        $this->Alert->setAlert('Informations mises à jour !', ['color' => SUCCESS]);
        $this->Alert->redirect(['dir' => 'users', 'page' => 'profil']);
    }
    
}
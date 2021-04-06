<?php
class UsersViewController extends Controller
{
    public $User;
    
    public function __construct()
    {
        parent::__construct();
        $this->User = new User;
    }

    public function inscription()
    {
        $this->notAllowIfLogged();

        return [
            'title' => 'Inscription',
            'description' => 'Rejoins ce nouveau réseau social'
        ];
    }

    public function connexion()
    {
        $this->notAllowIfLogged();

        return [
            'title' => 'Connexion',
            'description' => 'Accède à ton compte'
        ];
    }

    public function profil()
    {
        $this->notAllowIfNotLogged();

        return [
            'title' => 'Mon profil',
            'description' => 'Modification de mes informations personnelles'
        ];
    }

    public function parametre()
    {
        $this->notAllowIfNotLogged();

        return [
            'title' => 'Parametre',
            'description' => 'Modification de mes informations personnelles'
        ];
    }

    public function annuaire()
    {
        $this->notAllowIfNotLogged();

        return [
            'listOfUsers' => $this->User->listOfUser(),
            'title' => 'annuaire',
            'description' => 'Les jeux de ' . NAME_APPLICATION
        ];
        
    }
}
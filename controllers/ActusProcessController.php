<?php
class ActusProcessController extends Controller
{
    public $actu;

    
    public function __construct()
    {
        parent::__construct();
        $this->actu = new Actu;
    }

    public function nouvelleArticle()
    {
        $validator = new Validator($_POST, 'actu.php');
        $validator->validateLength('title', 10);
        $validator->validateLength('content', 30);
        $data = $validator->getData();

        $this->actu->create(
            $this->Auth->User->id, // Accès direct ici au User.id
            $data['title'],
            $data['content']
        );

        $this->Alert->setAlert('Article créé avec succès !', ['color' => SUCCESS]);
        $this->Alert->redirect(['dir' => 'actu', 'page' => 'actu']);
    }

}
<?php
class ActuViewController extends Controller
{
    public $actu;

    
    public function __construct()
    {
        parent::__construct();
        $this->actu = new Actu;
    }

    public function actu()
    {
        return [
            'actu' => $this->actu->lastArticle(),
            'title' => 'actu',
            'description' => 'test'
        ];
    }

}
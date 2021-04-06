<?php
class Actu extends ORM
{

    public $User;

    public function __construct($id = null)
    {
        parent::__construct();
        $this->setTable('actu');

        $this->User = new User;

        if ($id != null) {
            $this->populate($id);
        }
    }

    public function create($userId, $title, $content)
    {
        $this->addInsertFields('user_id', $userId, PDO::PARAM_INT);
        $this->addInsertFields('title', $title, PDO::PARAM_STR);
        $this->addInsertFields('content', $content, PDO::PARAM_STR);
        $this->addInsertFields('created', date('Y-m-d H:i:s'), PDO::PARAM_STR);
        
        $newId = $this->insert();
        $this->populate($newId);
    }

    public function lastArticle()
    {
        $this->addOrder('created', 'DESC');
        $this->setSelectFields('id', 'title', 'content', 'created');
        
        return $this->get('all');
    }

    // public function lastPostsOfUser($userId)
    // {
    //     $this->addOrder('created', 'DESC');
    //     $this->addWhereFields('user_id', $userId, '=', PDO::PARAM_INT);
    //     $this->setSelectFields('id');
    //     $this->setLimit(10);
    //     $posts = $this->get('all');

    //     $postsComplete = [];
    //     foreach ($posts as $post) {
    //         $postsComplete[] = new Post($post->id);
    //     }

    //     return $postsComplete;
    // }

    // public function loadComments($nbComments)
    // {
    //     $comment = new Comment;
    //     $this->Comments = $comment->commentsFromPost($this->id, $nbComments);
    // }

    public function populate($id)
    {
        if (parent::populate($id)) {

            // Modèles associés
            $this->User = new User($this->user_id);

        }
    }

    public function allArticleCreate()
    {
        return $this->get(TYPE_GET_COUNT);

    }
}
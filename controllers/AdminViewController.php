<?php
class AdminViewController extends Controller
{
    public $user;
    public $post;
    public $comment;
    
    public function __construct()
    {
        parent::__construct();
        $this->user = new User;
        $this->post = new Post;
        $this->comment = new Comment;
    }

    public function dashboard()
    {
        return [
            'moreCommentPost' => $this->comment->moreCommentPost(),
            'allComment' => $this->comment->allCommentCreate(),
            'allPost' => $this->post->allPostcreate(),
            'allUser' => $this->user->allUserCreate(),
            'title' => 'dashboard',
            'description' => 'centre de controle de ' . NAME_APPLICATION
        ];
    }

}
<?php
class User extends ORM
{

    public function __construct($id = null)
    {
        parent::__construct();
        $this->setTable('users');

        if ($id != null) {
            $this->populate($id);
        }
    }

    public function create($surname, $name, $pseudo, $age, $username, $password, $city, $domaines, $style, $description, $instagram, $facebook, $twitter, $admin)
    {
        $this->addInsertFields('surname', $surname, PDO::PARAM_STR);
        $this->addInsertFields('name', $name, PDO::PARAM_STR);
        $this->addInsertFields('pseudo', $pseudo, PDO::PARAM_STR);
        $this->addInsertFields('age', $age, PDO::PARAM_INT);
        $this->addInsertFields('username', $username, PDO::PARAM_STR);
        $this->addInsertFields('password', $password, PDO::PARAM_STR);


        $this->addInsertFields('city', $city, PDO::PARAM_STR);
        $this->addInsertFields('domaines', $domaines, PDO::PARAM_STR);
        $this->addInsertFields('style', $style, PDO::PARAM_STR);
        $this->addInsertFields('description', $description, PDO::PARAM_STR);
        $this->addInsertFields('instagram', $instagram, PDO::PARAM_STR);
        $this->addInsertFields('facebook', $facebook, PDO::PARAM_STR);
        $this->addInsertFields('twitter', $twitter, PDO::PARAM_STR);
        
        
        $this->addInsertFields('created', date('Y-m-d H:i:s'), PDO::PARAM_STR);

        //---------------------------------
        $this->addInsertFields('admin', $admin, PDO::PARAM_INT);
        //---------------------------------
        
        $newId = $this->insert();
        $this->populate($newId);
    }

    public function updateInformations($id, $data)
    {
        $this->addWhereFields('id', $id, '=', PDO::PARAM_INT);

        $this->addUpdateFields('surname', $data['surname'], PDO::PARAM_STR);
        $this->addUpdateFields('name', $data['name'], PDO::PARAM_STR);
        $this->addUpdateFields('pseudo', $data['pseudo'], PDO::PARAM_STR);
        $this->addUpdateFields('age', $data['age'], PDO::PARAM_INT);
        $this->addUpdateFields('username', $data['username'], PDO::PARAM_STR);

        $this->addUpdateFields('city', $data['city'], PDO::PARAM_STR);
        $this->addUpdateFields('domaines', $data['domaines'], PDO::PARAM_STR);
        $this->addUpdateFields('style', $data['style'], PDO::PARAM_STR);

        
        $this->addUpdateFields('instagram', $data['instagram'], PDO::PARAM_STR);
        $this->addUpdateFields('facebook', $data['facebook'], PDO::PARAM_STR);
        $this->addUpdateFields('twitter', $data['twitter'], PDO::PARAM_STR);

        if (isset($data['password'])) {
            $this->addUpdateFields('password', $data['password'], PDO::PARAM_STR);
        }

        if (isset($data['description'])) {
            $this->addUpdateFields('description', $data['description'], PDO::PARAM_STR);
        }

        $this->update();
    }

    public function login($username, $cryptedPassword)
    {
        $this->addWhereFields('username', $username, '=', PDO::PARAM_STR);
        $this->addWhereFields('password', $cryptedPassword, '=', PDO::PARAM_STR);
        $this->setSelectFields('id');

        $user = $this->get('first');

        if (!empty($user)) {
            $this->populate($user['id']);
            return true;
        }
        
        return false;
    }

    public function loadLastPosts()
    {
        $post = new Post;
        $this->Posts = $post->lastPostsOfUser($this->id);
    }

    public function loadLastComments()
    {
        $comment = new Comment;
        $this->Comments = $comment->lastCommentsOfUser($this->id);
    }

    public function loadLastPostsAndComments()
    {
        $this->loadLastPosts();
        $this->loadLastComments();

        $dataByCreated = [];

        foreach ($this->Posts as $post) {
            $dataByCreated[] = [
                'created' => $post->created,
                'data' => $post
            ];
        }

        foreach ($this->Comments as $comment) {
            $dataByCreated[] = [
                'created' => $comment->created,
                'data' => $comment
            ];
        }

        usort($dataByCreated, function ($item1, $item2) {
            return $item2['created'] <=> $item1['created'];
        });

        $this->LastPostsAndComments = $dataByCreated;
    }

    public function listOfUser()
    {
        $this->setSelectFields('id', 'pseudo', 'age', 'city', 'domaines', 'style');
        $this->addOrder('pseudo');

        return $this->get('all');
    }

    public function allUserCreate()
    {
        return $this->get(TYPE_GET_COUNT);

    }

}
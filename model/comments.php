<?php

include __DIR__.'/db.php';

class comments extends db {

    public $table = 'comments';

    public function getListCommentsByPostID($post_id) {
        $sql = NULL;

        if ($post_id) {
            $sql = 'SELECT * FROM comments WHERE post_id = '.$post_id;
        }

        $comments = $this->select($sql);

        return $comments;
    }

    public function getAllComments()
    {
        $sql = NULL;

        $sql = 'SELECT * FROM comments';

        $comments = $this->select($sql);

        return $comments;
    }

    /**
     *
     * @param type $data
     * @return type
     */
    public function insertComment($data) {

        // $sql = 'INSERT INTO comments(`comment_name`, `comment_description`, `post_id`) VALUES("'.$data['comment_name'].'","'.$data['comment_name'].'","'.$data['post_id'].'")';

        $sql = 'INSERT INTO `comments`(`name`, `email`, `subject`, `message`) VALUES ("'.$data['comment_name'].'","'.$data['email'].'","'.$data['subject'].'","'.$data['message'].'")';

        // 'comment_name' => $_GET['name'],
        // 'email' => $_POST['email'],
        // 'subject' => $_POST['subject'],
        // 'message' => $_POST['message'],

        return $this->query($sql);
    }
}
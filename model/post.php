<?php
include __DIR__.'/db.php';

class post extends db {

    public function getListPosts($params) {

        $sql = NULL;

        if ($params['keyword']) {
            $sql = 'SELECT * FROM posts WHERE post_name LIKE "%'.$params['keyword'].'%"'. ' OR post_description LIKE %"'.$params['keyword'].'%"';
        } else {
            $sql = 'SELECT * FROM posts';
        }

        $posts = $this->select($sql);

        return $posts;
    }
}

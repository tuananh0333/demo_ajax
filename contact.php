<?php
include_once './model/comments.php';
$obj_comment = new comments();

$comment = array(
    'post_id' => $_GET['id'],
    'comment_name' => $_GET['name'],
    'email' => $_GET['email'],
    'subject' => $_GET['subject'],
    'message' => $_GET['message'],
);
$obj_comment->insertComment($comment);
$comments_array = $obj_comment->getAllComments();
echo json_encode($comments_array);


?>
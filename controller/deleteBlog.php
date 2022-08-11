<?php 

session_start();
require_once '../model/model.php';

$comments = getcomments();

foreach ($comments as $i => $comment):
if($comment['blogid']==$_GET['id']){
    deleteComment($comment['id']);}
endforeach;
if (deleteBlog($_GET['id'])) {
    header('Location: ../view/user.php?id='.$_SESSION['uname'].'');
}

 ?>
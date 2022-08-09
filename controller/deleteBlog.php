<?php 

session_start();
require_once '../model/model.php';

if (deleteBlog($_GET['id'])) {
    header('Location: ../view/user.php?id='.$_SESSION['uname'].'');
}

 ?>
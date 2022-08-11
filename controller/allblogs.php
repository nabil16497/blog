<?php 

require_once '../model/model.php';

function fetchAllBlogs(){
	return showAllBlogs();

}
function fetchUser($id){
	return showUser($id);

}
function fetchAllUser(){
	return showAllUser();

}


function fetchUserBlogs($id){
	return showAllBlog($id);

}

function fetchblog($slug){
	return showBlog($slug);

}
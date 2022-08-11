<?php 

require_once 'db_connect.php';


function verify_user($uname,$pass){
    
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `users` WHERE id = '$uname' AND password = '$pass'";
    $stmt='';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($rows))
    {
        return true;
    }
    else{
        return false;
    }
}

function addUser($data){
	$conn = db_conn();
    $selectQuery = "INSERT into users (first_name, last_name, contact, email, gender, dob, image, password)
VALUES (:firstname, :lastname, :contact, :email, :gender, :dob, :image, :password)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([

            ':firstname' => $data['firstname'],
            ':lastname'  => $data['lastname'],
            ':contact'  => $data['contact'],
            ':email'  => $data['email'],
            ':gender'  => $data['gender'],
            ':dob'  => $data['dob'],
            ':image'  => $data['image'],
            ':password' => $data['password']

        ]);
        $conn = null;
        return true;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    
}



function addBlogs($data){
	$conn = db_conn();
    $selectQuery = "INSERT into blogs (title, slug, description, userid, image)
VALUES (:title, :slug, :description, :userid, :image)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([

            ':title' => $data['title'],
            ':slug'  => $data['slug'],
            ':description'  => $data['description'],
            ':userid'  => $data['userid'],
            ':image' => $data['image']

        ]);
        $conn = null;
        return true;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    
}


function showAllBlogs(){
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `blogs` ';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


function showBlog($slug){
	$conn = db_conn();
	$selectQuery = "SELECT * FROM `blogs` where slug = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$slug]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}



function showAllBlog($id){
	$conn = db_conn();
	$selectQuery = "SELECT * FROM `blogs` where userid = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}


function deleteBlog($id){
	$conn = db_conn();
    $selectQuery = "DELETE FROM `blogs` WHERE `id` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
        $conn = null;

        return true;

    }catch(PDOException $e){
        echo $e->getMessage();
    }
   
}




function getcomments(){
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `comments` ';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}



function deleteComment($id){
	$conn = db_conn();
    $selectQuery = "DELETE FROM `comments` WHERE `id` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
        $conn = null;

        return true;

    }catch(PDOException $e){
        echo $e->getMessage();
    }
   
}


function editBlog($data){
    $conn = db_conn();
    $selectQuery = "UPDATE `blogs` SET `title`=?, `slug`=?, `description`=?, `userid`=? where `id` =?";

    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([

            $data['title'],
            $data['slug'],
            $data['description'],
            $data['userid'],
            $data['id']

        ]);
        $conn = null;
        return true;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
   
}



function showUser($id){
	$conn = db_conn();
	$selectQuery = "SELECT * FROM `users` where id = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}



function addComment($data){
	$conn = db_conn();
    $selectQuery = "INSERT into comments (comment, userid, blogid)
VALUES (:comment, :userid, :blogid)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([

            ':comment' => $data['comment'],
            ':userid'  => $data['userid'],
            ':blogid'  => $data['blogid']

        ]);
        $conn = null;
        return true;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    
}


function showAllComments(){
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `comments` ';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}
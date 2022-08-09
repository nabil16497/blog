<?php  
require_once '../model/model.php';





    $titleerror = $slugerror = $documenterror = $useriderror = $iderror = ""; 
	
if(isset($_POST['submit'])) {


  if (empty($_POST["title"])) {
    $titleerror = "Title can not be empty";
  } else {
  	
    $data["title"] = $_POST["title"];
  }
  
  if (empty($_POST["slug"])) {
    $slugerror = "slug can not be empty";
  } else {
    $data["slug"] = $_POST["slug"];
    }

  if (empty($_POST["description"])) {
    $documenterror = "details can not be empty";
  } else {
    $data["description"] = $_POST["description"];
  }
  if(empty($_POST['userid'])){
    $useriderror = 'UserID not found';
  }
  else{
    $data['userid'] = $_POST["userid"];
  }
  if(empty($_POST['id'])){
    $iderror = 'Blog ID not found';
  }
  else{
    $data['id'] = $_POST["id"];
  }





	if(empty($titleerror) && empty($slugerror) && empty($documenterror) && empty($useriderror) && empty($iderror))
 {

 	if (editBlog($data)) {
  		echo "<script>alert('Blog Edited Sucessfully.'); window.location.href='../view/user.php?id=".$_POST['userid']."' ;</script>";

  	
 	
 }
 


  else{

  $errorm = 'This slug already exist. Try a new one';
  echo "<script>alert('Error-".$errorm."'); window.location.href='../view/user.php?id=".$_POST['userid']." ';</script>"; 

 

 }
}
 
else{

    echo "<script>alert('Access not allowed.'); window.location.href='../view/login.php';</script>";

}
    
    }
?>



<?php  
require_once '../model/model.php';





    $commenterror = $blogiderror = $useriderror = ""; 
	
if(isset($_POST['submit'])) {


  if (empty($_POST["comment"])) {
    $titleerror = "Comment can not be empty";
  } else {
  	
    $data["comment"] = $_POST["comment"];
  }
  
  if (empty($_POST["blogid"])) {
    $slugerror = "Blog ID can not be empty";
  } else {
    $data["blogid"] = $_POST["blogid"];
    }

  if(empty($_POST['userid'])){
    $useriderror = 'UserID not found';
  }
  else{
    $data['userid'] = $_POST["userid"];
  }
  





	if(empty($commenterror) && empty($blogiderror) && empty($useriderror))
 {

 	if (addComment($data)) {
  		echo "<script>window.location.href='../view/blog.php?slug=".$_POST['slug']." ';</script>";

  	
 	
 }
 


  else{

  $errorm = 'This slug already exist. Try a new one';
  echo "<script> window.location.href='../view/blog.php?slug=".$_POST['slug']." ';</script>"; 

 

 }
}
 
else{

    echo "<script>alert('Access not allowed.'); window.location.href='../view/login.php';</script>";

}
    
    }
?>



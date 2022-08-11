<?php  
require_once '../model/model.php';





    $titleerror = $slugerror = $documenterror = $useriderror = $pperror = ""; 
	
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
  

  $file = $_FILES['file'];

	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));


	$allow = array('jpg','jpeg','png');
	if(!empty($fileName)){
	if (in_array($fileActualExt, $allow)) {
		if($fileError ===0){
			if($fileSize < 4194304){
				$fileNameNew = uniqid('',true).".".$fileActualExt;
				$fileDes = '../uploads/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDes);
				$ppm = "Image sucessfully uploaded";
				$data["image"] = $fileDes;
			}
			else{
				$pperror = "File size too large (Maximum file size- 4MB)";
			}
		}
		else{
			$pperror = "There was an error uploading your file!";
		}
	}
	else{
		$pperror = "Only images are allowed (jpeg, jpg, png)";
	}
}
	else{
		$pperror = "Please Select an image";
	}



	if(empty($titleerror) && empty($slugerror) && empty($documenterror) && empty($useriderror) && empty($pperror))
 {

 	if (addBlogs($data)) {
  		echo "<script>alert('Blog Added Sucessfully.'); window.location.href='../view/addblogs.php';</script>";

  	
 	
 }
 


  else{

  $errorm = 'This slug already exist. Try a new one';
  echo "<script>alert('Error-".$errorm."'); window.location.href='../view/addblogs.php';</script>"; 

 

 }
}
 
else{

    echo "<script>alert('Access not allowed.'); window.location.href='../view/login.php';</script>";

}
    
    }
?>



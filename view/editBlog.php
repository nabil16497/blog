<?php 

session_start();
if(isset($_SESSION['uname'])){
}

else{

  echo "<script>location.href='login.php'</script>";
}

require_once '../controller/allblogs.php';
$blogs = fetchAllBlogs();
 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>


<?php include('header.php');?>


	<span class="textcenter textmain"><h1>Edit Blog</h1></span>
	<br>
	<div class="textcenter">
	<div class="main_internaldiv textleft fontsize160">
		<form action="../controller/editBlog.php" method="POST" enctype="multipart/form-data" onsubmit="return validation()">
            <?php foreach ($blogs as $i => $blog): ?>
                <?php
                if($blog['id']==$_GET['id']){
                    echo 
                        '<div class="form">
                                <input value='.$blog['title'].' type="text" id="title" name="title" autocomplete="off" required />
                                <label for="title" class="label-name">
                                <span class="content-name">Title</span>
                                </label>
                        </div>

                        <div class="form">
                                <input value='.$blog['slug'].' type="text" id="slug" name="slug" autocomplete="off" required />
                                <label for="slug" class="label-name">
                                <span class="content-name">Slug</span>
                                </label>
                        </div>

                        
                            <br>
                            <textarea name="description" id="description" rows="12" placeholder="Write Your Blog Here" required> '.$blog['description'].' </textarea>
                            <br>
				            <br>
				            <hr>    
                
            	
			                <br>
                           
    			
                        <input type="hidden" id="userid" name="userid" value='.$blog['userid'].'>
                        <input type="hidden" id="id" name="id" value='.$blog['id'].'>'
                        ;}?>
            <?php endforeach; ?>
  			<br>
			<hr>
			<input type="submit" value="submit" name="submit" >

		</form>
	</div>

</div>


</body>
</html>
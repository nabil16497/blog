<?php 

session_start();
if(isset($_SESSION['uname'])){
}

else{

  echo "<script>location.href='login.php'</script>";
}
require_once 'controller/allblogs.php';

	$user = fetchUser($_GET['id']);
    $userblogs = fetchUserBlogs($_GET['id']);


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="index.css">
	
</head>
<body>
<?php
include('header.php');
if($_SESSION['id'] == $user['id']){
	echo"window.location.href='view/myprofile.php';</script>";
}

else{
}
?>
<span class="textcenter textmain"><h1><?php echo $user['first_name'];  ?> <?php echo $user['last_name'];  ?></h1></span>
	<div class="textcenter">
	<div class="main_internaldiv textleft fontsize160">
		<span class="textcenter textmain"><h6>General Information</h6></span><br>

	
		<table class="table shtable">
			
			<tbody>
                <tr>
				<td data-label="Image"><img width="200px" src="uploads/<?php echo $student['image'] ?>" alt="<?php echo $student['firstname'] ?>"></td></tr>
				<tr>
					<th>Date of Birth</th>
				<td data-label="Dtae of Birth"><?php echo $student['dob'] ?></td></tr>
				<tr>
					<th>Contact</th>
				<td data-label="Contact"><?php echo $student['contact'] ?></td></tr>
				<tr>
					<th>Email</th>
				<td data-label="Email"><?php echo $student['email'] ?></td></tr>
				<tr>
					<th>Nationality</th>
				<td data-label="Nationality"><?php echo $student['nationality'] ?></td></tr>
				
			</tbody>
		</table>



        <table class="table" id="table">
            <thead>
            <tr>
                <th>Blogs</th>
            </tr>
            </thead>
            <tbody id="tablebody">
                <?php foreach ($blogs as $i => $blog): ?>
                    <tr>
                        <td data-label="Title"><?php echo $blog['title'] ?></td>
                    </tr>
                <?php endforeach; ?>
     </tbody>
   </table>

   
	</div>
</div>

<script>
	
</script>
</body>
</html>
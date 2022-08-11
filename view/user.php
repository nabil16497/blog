<?php 

session_start();
if(isset($_SESSION['uname'])){
}

else{

  echo "<script>location.href='login.php'</script>";
}
require_once '../controller/allblogs.php';

	$user = fetchUser($_GET['id']);
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

<span class="textcenter textmain"><h1><?php echo $user['first_name'];  ?> <?php echo $user['last_name'];  ?></h1></span>
	<div class="textcenter">
	<div class="main_internaldiv textleft fontsize160">

	
		<table class="table shtable">
			
			<tbody>
				<tr>
					<th>
					General Information
					</th>
				</tr>
                <tr>
				<td data-label="Image"><img width="200px" src="<?php echo $user['image'] ?>" alt="<?php echo $user['image'] ?>"></td></tr>
				<tr>
					<th>Date of Birth</th>
				<td data-label="Dtae of Birth"><?php echo $user['dob'] ?></td></tr>
				<tr>
					<th>Contact</th>
				<td data-label="Contact"><?php echo $user['contact'] ?></td></tr>
				<tr>
					<th>Email</th>
				<td data-label="Email"><?php echo $user['email'] ?></td></tr>
				<tr>
					<th>Nationality</th>
				<td data-label="Nationality"><?php echo $user['nationality'] ?></td></tr>
				
			</tbody>
		</table>


		<?php
		if($_GET['id']==$_SESSION['uname']){
			echo '<a href="addblogs.php"><button class="btn">Add Blogs</button></a>';
		}
		?>
		<br>
        <table class="table" id="table">
            <thead>
            <tr>
                <th>Blogs</th>
				<th>Blog Image</th>
				<?php
					if($_GET['id']==$_SESSION['uname']){
						echo '<th>Action</th>';
					}
				?>
            </tr>
            </thead>
            <tbody id="tablebody">
                <?php foreach ($blogs as $i => $blog): ?>
					<tr>
					<?php
					if($_GET['id']==$blog['userid']){
					echo '<td data-label="Title"><a href=blog.php?slug='.$blog['slug'].' </a>'.$blog['title'].'</td>
					<td data-label="Blog Image"><img width="200px" src='.$blog['image'].' " alt="'.$blog['image'].' "></td>';
					if($_SESSION['uname']==$blog['userid'])
					echo
						'<td data-label="Action">
							<a href="editBlog.php?id='.$blog['id'].'">
							<span class="textmain">EDIT</span></a>
							<a href="../controller/deleteblog.php?id='.$blog['id'].'">
							<span class="textmain margin-left">DELETE</span></a>
						</td>';}?></tr>
                <?php endforeach; ?>
     </tbody>
   </table>


	</div>
</div>

<script>
	
</script>
</body>
</html>
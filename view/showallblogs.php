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

	<?php if(!empty($_GET['userid'])){?>
	<span class="textcenter textmain"><h1>My Blogs</h1></span>
	<?php }
	else{?>
	<span class="textcenter textmain"><h1>All Blogs</h1></span>
	<?php }?>
	<div class="textcenter">
	<div class="main_internaldiv textleft fontsize160">

	<div id="searched" class="textmain"></div>
   <table class="table" id="table">
     <thead>

	 <?php if(!empty($_GET['userid'])){?> 
    <tr>
		<th>Blogs</th>
		<th>Blog Image</th>
		<th>Action</th>
     	
	</tr>
	<?php }
	else{?>
	<tr>
		<th>User ID</th>
		<th>Blog Image</th>
		<th>Blogs</th>
	</tr>
	<?php }?>
     </thead>
     <tbody id="tablebody">
	 <?php if(!empty($_GET['userid']) && ($_SESSION['uname'] == $_GET['userid'])){ foreach ($blogs as $i => $blog): ?>
					<tr>
					<?php
					if($_GET['userid']==$blog['userid']){
					echo '<td data-label="Title"><a href=blog.php?slug='.$blog['slug'].' </a>'.$blog['title'].'</td>
					<td data-label="Blog Image"><img width="200px" src='.$blog['image'].' " alt="'.$blog['title'].' "></td>';
					
					echo
						'<td data-label="Action">
							<a href="editBlog.php?id='.$blog['id'].'">
							<span class="textmain">EDIT</span></a>
							<a href="../controller/deleteblog.php?id='.$blog['id'].'">
							<span class="textmain margin-left">DELETE</span></a>
						</td>';}?></tr>
                <?php endforeach; }



     	  	else{ foreach ($blogs as $i => $blog): ?>
			<tr>
			<td data-label="ID"><abbr title="Click here to see User"><a href="user.php?id=<?php echo $blog['userid'] ?>"><span class="textmain"><?php echo strval($blog['userid']) ?></a></abbr></span></td>
			<?php
				echo '
				<td data-label="Blog Image"><img width="200px" src='.$blog['image'].' " alt="'.$blog['title'].' "></td>
				<td data-label="Title"><a href=blog.php?slug='.$blog['slug'].' </a>'.$blog['title'].'</td>';?>
				
				
			</tr>
		<?php  endforeach; }?>
     </tbody>
   </table>

   </div>

</div>

</body>
</html>
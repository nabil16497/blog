<?php 

session_start();
if(isset($_SESSION['uname'])){
}

else{

  echo "<script>location.href='login.php'</script>";
}
require_once '../controller/allblogs.php';

	$blogs = fetchAllBlogs();
require_once '../controller/allComments.php';

	$comments = fetchAllComments();


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="index.css">
	
</head>
<body>
	<?php include('header.php');?>
	<?php $view = ''?>
	<div class="textcenter">
	<div class="main_internaldiv textleft fontsize160">

	
		<table class="table shtable">
		
        <?php foreach ($blogs as $i => $blog): ?>
            <?php
            if($blog['slug']==$_GET['slug']){
				$view=$blog;
            echo
			'<tbody>
				<tr>
					<th>
					'.$blog["title"].'
					</th>
				</tr>
				<tr>
				<td data-label="Blog Image"><img width="400px" src='.$blog['image'].' " alt="'.$blog['title'].' "></td></tr>
                <tr>
				<td data-label="Description">'.$blog['description'].' </td></tr>
     </tbody>';};?>
     <?php endforeach; ?>
   </table>




	<form action="../controller/addComment.php" method="POST" enctype="multipart/form-data" onsubmit="return validation()">

			<div class="form">
					<input type="text" id="comment" name="comment" autocomplete="off" required />
					<label for="comment" class="label-name">
					<span class="content-name">Comment</span>
					</label>
			</div>
			
            <input type="hidden" id="userid" name="userid" value=<?php echo $_SESSION['uname'] ?>>
			<input type="hidden" id="blogid" name="blogid" value=<?php echo $view['id'] ?>>
			<input type="hidden" id="slug" name="slug" value=<?php echo $view['slug'] ?>>
			<input type="submit" value="Comment" name="submit" >

		</form>







		<table class="table shtable">
			
			<tbody>
			<?php foreach ($comments as $i => $comment): ?>
            <?php
            if($comment['blogid']==$view['id']){
            echo
				'<tr>
					<th><abbr title="Click here to see User"><a href="user.php?id='.$comment['userid'].' ">'.$comment['userid'].' </a></abbr>
					</th>
					<td data-label="'.$comment['userid'].' ">'.$comment['comment'].' </td>
				</tr>';

			};?>
     		<?php endforeach; ?>	

			</tbody>
		</table>




	</div>
</div>

<script>
	
</script>
</body>
</html>
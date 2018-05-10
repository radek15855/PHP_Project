<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link href="style.css" rel="stylesheet">
    <style type="text/css">
    
        body{ font: 14px sans-serif; text-align: center; }
        textarea{ width: 600px; height: 200px;} 
    </style>
</head>
<body>
    
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION['username']); ?></b>. </h1>
        <p><a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
    </div>
    

    <div class="wrapper">
        <h2>New Post</h2>
        
        <form action="post.php" method="post">
     <input type="text" name="title" placeholder="Post Title"/>
    <br><br> <textarea  name="text" placeholder="Write your post."></textarea>
     <br><input type="submit" value="Add"/></form>
     <form action="change.php" method="POST">
     <h2>Text Visibility</h2>
   <center><br> <table width="600" border="1" cellpadding="12" cellspacing="1"  >  
         <tr>
            <th>Id_text</th>
            <th>Title</th>
            <th>Text</th>
            <th>Visibility</th>
         </tr>
         <?php
         require_once 'config.php';
         $sql = "SELECT * FROM texty";
         $run = mysqli_query($link, $sql);
         while($row=$run->fetch_assoc()){
             ?>
            <tr>
            <th><?php echo $row['id_text'] ?></th>
            <th><?php echo $row['title'] ?></th>
            <th><?php echo $row['text'] ?></th>
            <th><input type="checkbox" name="<?php echo $row['id_text'] ?>"<?php $check=$row['value']; if($check==1) echo "checked";?> value=1> </th>
         </tr> 
         <?php    
         }
         ?>      
     </table>
     </center>

     <br><input type="submit" value="Change"/>
    </form>

    <?php
  $msg = "";

  if (isset($_POST['upload'])) {
      $target = "images/".basename($_FILES['image']['name']);
      
      require_once 'config.php';

  	$image = $_FILES['image']['name']; 	

  	$sql = "INSERT INTO images (image) VALUES ('$image')";
  	// execute query
  	mysqli_query($link, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  //$result = mysqli_query($link, "SELECT * FROM images");
?>
<h2>Upload/Change Image</h2> 
<center>
</form>
  <br><form method="POST" action="welcome.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>
  	<div>
  		<button type="submit" name="upload">UPLOAD</button>
  	</div>
  </form>
</center>

    <br>
<form action="change2.php" method="POST">
<center><br> <table width="600" border="1" cellpadding="12" cellspacing="1"  >  
         <tr>
            <th>Image</th>
            <th>Checbox</th>           
         </tr>
<?php
      require_once 'config.php';
      $sql = "SELECT * FROM images";
      $result = mysqli_query($link, $sql);
      while($row = mysqli_fetch_array($result)){
        ?>
        <tr>
        <th><?php echo "<img src='images/".$row['image']."' width='200' height='200' >"; ?></th>
        <th><input type="checkbox" name="<?php echo $row['id_img'] ?>"<?php $check=$row['checkbox']; if($check==1) echo "checked";?> value=1> </th>
     </tr> 
          
    <?php
      }
      ?>
    </table>
    <br><input type="submit" value="Change"/>
</form>


</body>
</html>
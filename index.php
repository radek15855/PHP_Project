<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Complete Bootstrap 4 Website Layout</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="style.css" rel="stylesheet">
</head>

<body>

	<!-- Navigation -->
	<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
		<div class="container-fluid">
			<a class="navbar-band" href="#">
				<img src="img/logo.png"> </a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="#"> Home </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#"> About </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#"> Services </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#"> Team </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#"> Connect </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="register.php"> Login/Registration </a>
					</li>
					
				</ul>
			</div>
		</div>
	</nav>



	<!--- Image Slider 
	<div id="slides" class="carousel slide" data-ride="carousel">
		<ul class="carousel-indicators">
			<li data-target="#slides" data-slide-to="0" class="active" ></li>
			<li data-target="#slides" data-slide-to="1"></li>
			<li data-target="#slides" data-slide-to="2"></li>
		</ul>

		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="img/background.png">
				<div class="carousel-caption">
					<h1 class="display-2">Bootstrap</h1>
					<h3>Complite Website Layout</h3>
					<button type="button" class="btn btn-outline-light btn-lg">View demo</button>
					<button type="button" class="btn btn-primary btn-lg">Get started</button>
				</div>
			</div>
			<div class="carousel-item">
				<img src="img/background2.png">
			</div>
			<div class="carousel-item">
				<img src="img/background3.png">
			</div>
		</div>
	</div>
-->
	

<?php
	require_once 'config.php';
	$result = mysqli_query($link,"SELECT * FROM images WHERE checkbox=1");
?>

	<!--- Image Slider -->
	<div id="slides" class="carousel slide" data-ride="carousel">
		<ul class="carousel-indicators">
		<?php
		$i=0; 
		while($row = $result->fetch_assoc() )
					{
				?>
				<li data-target="#slides" data-slide-to='<?php echo $i; ?>' class="active"></li>
				
				<?php $i++; } ?>

			
		</ul>
		<div class="carousel-inner">
				<?php 
				$result = mysqli_query($link,"SELECT * FROM images WHERE checkbox=1");
				$j=0;
				while($row = $result->fetch_assoc() )
					{
						if($j==0){
				?>

				<div class="carousel-item active">
						<?php } else { ?>
							<div class="carousel-item">
						<?php } ?>	
						<?php echo "<img src='images/".$row['image']."' width='200' height='200' >"; ?>
				</div>
				<?php $j++; } ?>
						</div>
		</div>
						</div>

	<!--- Jumbotron -->
	<div class="container-fluid">
		<div class="row jumbotron">
			<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
				<p class="lead">A web hosting servce allaws individuals and organising to make their website accessible via the Word Wide Web.</p>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
				<a href="#">
					<button type="button" class="btn btn-outline-secondary btn-lg ">Web Hosting </button>
				</a>
			</div>

		</div>
	</div>

	<!--- Welcome Section -->
	<div class="container-fluid padding">
		<div class="row welcome text-center">
			<div class="col-12">
				<h1 class="display-4">Built with easy</h1>
			</div>
			<hr>
			<div class="col-12">
				<p class="lead">Welcome to my Bootstrap website tutorial ! Bootstrap is a free and open source font-end library with HTML and CSS based
					designs</p>
			</div>

		</div>
		<hr class="my-4">
	</div>


	<!--- Three Column Section -->
	<div class="container-fluid padding">
		<div class="row text-center padding">
			<div class="col-xs-12 col-sm-6 col-md-4 ">
				<i class="fas fa-code"></i>
				<h3>HTML</h3>
				<p>Built with the latest version of HTML, HTML5.</p>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4 ">
				<i class="fas fa-bold"></i>
				<h3>BOOTSTRAP</h3>
				<p>Built with the latest version of BOOTSTRAP, BOOTSTRAP 4.</p>
			</div>
			<div class="col-sm-12 col-md-4 ">
				<i class="fab fa-css3"></i>
				<h3>HTML</h3>
				<p>Built with the latest version of CSS, CSS3.</p>
			</div>

		</div>
	</div>



	<!--- Two Column Section -->
	<div class="container-fluid padding">
		<div class="row padding">
			<div class="col-lg-6 ">
			<?php
		 require_once 'config.php';
		 $sql = "SELECT * FROM texty where value = 1";
         $run = mysqli_query($link, $sql);
         while($row=$run->fetch_assoc()){
             ?>
           <h1> <?php echo $row['title'] ?></h1>
            <p><?php echo $row['text'] ?> </p>
        <?php    
         }
         ?>    
				<a href="#" class="btn btn-primary"> Learn more</a>
			</div>
			<div class="col-lg-6">
				<img src="img/desk.png" class="img-fluid">
			</div>
		</div>
	</div>
	<hr class="my-4">
	<!--- Fixed background -->
	<figure>
		<div class="fixed-wrap">
			<div id="fixed">
			</div>
		</div>
	</figure>

	<!--- Emoji Section -->
	<button class="fun" data-toggle="collapse" data-target="#emoji"> Clic for fun!</button>
	<div id="emoji" class="collapse">
		<div class="container-fluid padding">
			<div class="row text-center">
				<div class="col-sm-6 col-md-3">
					<img class="gif" src="img/gif/panda.gif">
				</div>
				<div class="col-sm-6 col-md-3">
					<img class="gif" src="img/gif/poo.gif">
				</div>
				<div class="col-sm-6 col-md-3">
					<img class="gif" src="img/gif/unicorn.gif">
				</div>
				<div class="col-sm-6 col-md-3">
					<img class="gif" src="img/gif/chicken.gif">
				</div>
			</div>
		</div>
	</div>


	<!--- Meet the team -->
	<div class="container-fluid padding">
	<div class="row welcome text-center">
		<div class="col-12">
			<h1 class="display-4">Meet the team</h1>
		</div>
		<hr>
	</div>
	</div>


	<!--- Cards -->
	<div class="container-fluid padding">
	<div class="row padding">
		<div class="col-md-4">
			<div class="card">
				<img class="card-img-top" src="img/team1.png">
				<div class="card-body">
					<h4 class="card-title">John Doe</h4>
					<p class="card-text">John is an Internet entrepreneur</p>
					<a href="#" class="btn btn-outline-secondary">
						See profile
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-4">
				<div class="card">
					<img class="card-img-top" src="img/team2.png">
					<div class="card-body">
						<h4 class="card-title">Mary Jo</h4>
						<p class="card-text">Mary is an Internet entrepreneur</p>
						<a href="#" class="btn btn-outline-secondary">
							See profile
						</a>
					</div>
				</div>
			</div>
		<div class="col-md-4">
			<div class="card">
				<img class="card-img-top" src="img/team3.png">
				<div class="card-body">
					<h4 class="card-title">Adam Małysz</h4>
					<p class="card-text">Adam is an Internet entrepreneur</p>
					<a href="#" class="btn btn-outline-secondary">
						See profile
					</a>
				</div>
			</div>
		</div>
	</div>
	</div>

	<!--- Two Column Section -->
	<div class="container-fluid padding">
			<div class="row padding">
				<div class="col-lg-6 ">
					<h2>Our Philosophy</h2>
					<p>The columns will autimatically stack on top of each other whne the screen is less than 576px wide.</p>
					<p>Resize the browser window to see the effect. Response web designe has become more important as the amount of mobile traffic
						now accounts for more than half of total internet traffic.
					</p>
					<br>
				</div>
				<div class="col-lg-6">
					<img src="img/bootstrap2.png" class="img-fluid">
				</div>
			</div>
		</div>


	<!--- Connect -->
	<div class="container-fluid padding">
	<div class="row text-center padding">
		<div class="col-12">
			<h2>Connect</h2>
		</div>
		<div class="col-12 social padding">
			<a href="#"><i class="fab fa-facebook"></i></a>
			<a href="#"><i class="fab fa-twitter"></i></a>
			<a href="#"><i class="fab fa-google-plus-g"></i></a>
			<a href="#"><i class="fab fa-instagram"></i></a>
			<a href="#"><i class="fab fa-youtube"></i></a>
		</div>
	</div>
	</div>


<!--- Footer -->
<footer>
	<div class="container-fluid padding">
	<div class="row text-center">
		<div class="col-md-4">
			<img src="img/w3newbie.png">
			<hr class="light">
			<p>555-555-555</p>
			<p>email@wp.pl</p>
			<p>100 Street</p>
			<p>City</p>
		</div>
		<div class="col-md-4">
			<hr class="light">
			<h5>Our Hours</h5>
			<hr class="light">
			<p>Monday: 9am - 5pm</p>
			<p>Saturday: 9am - 5pm</p>
			<p>sunday: close</p>
		</div>
		<div class="col-md-4">
				<hr class="light">
				<h5>Zip code</h5>
				<hr class="light">
				<p>City code</p>
				<p>City code</p>
				<p>City code</p>
				<p>City code</p>
				
			</div>
			<div class="col-12">
				<hr class="light-100">
				<h5>&copy; w3newbie.com</h5>
			</div>
	</div>
	</div>
</footer>

</body>

</html>
<?php
// Start Session
session_start();

if(!empty($_POST['name']) && !empty($_POST['url'])){
	if(!empty($_SESSION['bookmarks'])){
		$_SESSION['bookmarks'][$_POST['name']] = $_POST['url'];
	} else {
		$_SESSION['bookmarks'] = Array($_POST['name'] => $_POST['url']);
	}
}

if(isset($_GET['action']) && $_GET['action'] == 'clear'){
	session_unset(); 
	session_destroy(); 
	header("Location: index.php");
}

if(isset($_GET['action']) && $_GET['action'] == 'delete'){
	// echo $_GET['name'];
	unset($_SESSION['bookmarks'][$_GET['name']]);
	header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookmarker</title>
	<link rel="stylesheet" href="https://bootswatch.com/4/cyborg/bootstrap.min.css">
	<style>
		.delete{color: white;}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-secondary mb-4">
		<div class="container">
			<a class="navbar-brand" href="#">Bookmarker</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			
			<div class="collapse navbar-collapse" id="navbarColor02">
				<ul class="navbar-nav mr-auto">
					<li><a class="nav-link" href="index.php">Home</a></li>
				</ul>
				<ul class="navbar-nav ml-auto">
					<li><a class="nav-link" href="index.php?action=clear">Clear All</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
					<div class="form-group">
						<label>Website Name: </label>
						<input class="form-control" type="text" name="name">
					</div>
					<div class="form-group">
						<label>Website URL: </label>
						<input class="form-control" type="text" name="url">
					</div>
					<input class="btn btn-secondary" type="submit" value="Submit">
					<div class="form-group"></div>
				</form>
			</div>
			<div class="col-md-5">
				<?php if(!empty($_SESSION['bookmarks'])): ?>
					<ul class="list-group">
						<?php foreach($_SESSION['bookmarks'] as $name => $url) : ?>
							<li class="list-group-item mb-2"><a href="<?php echo $url; ?>" target="_blank"><?php echo $name; ?></a>
							<a class="delete ml-2" href="index.php?action=delete&name=<?php echo $name; ?>">[X]</a></li>
						<?php endforeach; ?>
					</ul>
				<?php else: ?>
					<p>No Bookmarks</p>
				<?php endif; ?>
			</div>
		</div>
	</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>




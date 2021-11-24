<?php 
  session_start();

  if (!isset($_SESSION['organizers_id']) && !isset($_SESSION['organizers_email'])) { 
?>
<!doctype html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Event Backend</title>

    <base href="./">
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles -->
    <link href="assets/css/custom.css" rel="stylesheet">
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <main class="col-md-6 mx-sm-auto px-4">
                <div class="pt-3 pb-2 mb-3 border-bottom text-center">
                    <h1 class="h2">WorldSkills Event Platform</h1>
                </div>
                <?php if (isset($_GET['error'])) { ?>
	  		<div class="alert alert-danger" role="alert">
			  <?=htmlspecialchars($_GET['error'])?>
			</div>
		    <?php } ?>
                <form class="form-signin" action="auth.php" method="post">
                    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                    <label for="inputEmail" class="sr-only">Email</label>
                    <input type="email" id="inputEmail" name="email" value="<?php if(isset($_GET['email']))echo(htmlspecialchars($_GET['email'])) ?>" class="form-control" placeholder="Email" autofocus>

                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" name="password_hash" class="form-control"
                        placeholder="Password">
                    <button class="btn btn-lg btn-primary btn-block" id="login" type="submit">Sign in</button>
                </form>
            </main>
        </div>
    </div>
</body>

</html>

<?php 
}else {
   header("Location: ./events/index.php");
}
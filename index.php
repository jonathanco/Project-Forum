<?php
 include_once('users.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Forum | Jonathan</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>


<?php
// define variables and set to empty values
$nameErr = $emailErr = "";
$pass = $email =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["pass"])) {
     $nameErr = "Name is required";
   } else {
     $pass = test_input($_POST["pass"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$pass)) {
       $nameErr = "Only letters and white space allowed"; 
     }
   }
   
   if (empty($_POST["email"])) {
     $emailErr = "Email is required";
   } else {
     $email = test_input($_POST["email"]);
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format"; 
     }
   }

  // Validate the credentials (in DB)
  if (User::isValid ($email,$pass )) {
    $_SESSION['userName'] = $email;
  }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

    <div class="container">
<div class="page-header">
   <h1>forum
      <small>Sharing ideas</small>
   </h1>
<?php
  if (isset($_SESSION['userName'])){
?>
  Welcome <?php echo $_SESSION['userName'];?> !
<?php
  }
  else{
?>
    <form class="form-inline" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
    <div class="form-group">
      <label class="sr-only" for="email">Email address</label>
      <input type="text" name="email" class="form-control" id="email" placeholder="Enter email" value="<?php echo $email;?>">
   <span class="error"><?php echo $nameErr;?></span>
    </div>
    <div class="form-group">
      <label class="sr-only" for="pass">Password</label>
      <input type="text" name="pass" class="form-control" id="pass" placeholder="Password" value="<?php echo $pass;?>">
    <span class="error"><?php echo $pass;?></span>
    </div>
    <div class="checkbox">
      <label>
        <input type="checkbox"> Remember me
      </label>
    </div>
    <button type="submit" class="btn btn-default">Sign in</button>
  </form>
<?php
  }
?>
</div>
<p>This is a forum to Sharing ideas.</p>
      <div class="row">
      <div class="col-md-6">
        <small>Sharing ideas</small>
        <p>Less mixins and variables
          In addition to prebuilt grid classes for fast layouts, 
          Bootstrap includes Less variables and mixins for quickly generating your own simple, semantic layouts.
          Variables Variables determine the number of columns, the gutter width, and the media query point at which 
          to begin floating columns. We use these to generate the predefined grid classes documented above, as well as 
          for the custom mixins listed below.</p>
          <button type="button" class="btn btn-default"><a href="http://localhost:8080/pro2/index2.php">forum Button</a></button>
      </div>
      <div class="col-md-6">
        <small>Sharing ideas</small>
          <p>Less mixins and variables
          In addition to prebuilt grid classes for fast layouts, 
          Bootstrap includes Less variables and mixins for quickly generating your own simple, semantic layouts.
          Variables Variables determine the number of columns, the gutter width, and the media query point at which 
          to begin floating columns. We use these to generate the predefined grid classes documented above, as well as 
          for the custom mixins listed below.</p>
          <button type="button" class="btn btn-default">forum Button</button>
      </div>
</div>

<div class="row">
  <div class="col-md-6">
    <small>Sharing ideas</small>
          <p>Less mixins and variables
          In addition to prebuilt grid classes for fast layouts, 
          Bootstrap includes Less variables and mixins for quickly generating your own simple, semantic layouts.
          Variables Variables determine the number of columns, the gutter width, and the media query point at which 
          to begin floating columns. We use these to generate the predefined grid classes documented above, as well as 
          for the custom mixins listed below.</p>
          <button type="button" class="btn btn-default">forum Button</button>
      </div>
      <div class="col-md-6">
        <small>Sharing ideas</small>
          <p>Less mixins and variables
          In addition to prebuilt grid classes for fast layouts, 
          Bootstrap includes Less variables and mixins for quickly generating your own simple, semantic layouts.
          Variables Variables determine the number of columns, the gutter width, and the media query point at which 
          to begin floating columns. We use these to generate the predefined grid classes documented above, as well as 
          for the custom mixins listed below.</p>
          <button type="button" class="btn btn-default">forum Button</button>
      </div>

    </div>



<script src="https://code.jquery.com/jquery-2.1.3.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  </div><!-- conteiner -->

<footer class="bs-docs-footer" role="contentinfo">
  <div class="container">
    <div class="bs-docs-social">
  <ul class="bs-docs-social-buttons">
    <li>
      <iframe class="github-btn" src="http://ghbtns.com/github-btn.html?user=twbs&amp;repo=bootstrap&amp;type=watch&amp;count=true" width="100" height="20" title="Star on GitHub"></iframe>
    </li>
    <li>
      <iframe class="github-btn" src="http://ghbtns.com/github-btn.html?user=twbs&amp;repo=bootstrap&amp;type=fork&amp;count=true" width="102" height="20" title="Fork on GitHub"></iframe>
    </li>
    <li class="follow-btn">
      <a href="https://twitter.com/getbootstrap" class="twitter-follow-button" data-link-color="#0069D6" data-show-count="true">Follow @getbootstrap</a>
    </li>
    <li class="tweet-btn">
      <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://getbootstrap.com/" data-count="horizontal" data-via="getbootstrap" data-related="mdo:Creator of Bootstrap">Tweet</a>
    </li>
  </ul>
</div>
</footer>
</body>
</html>
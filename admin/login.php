

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Login</title>
    <link rel="icon" type="image/x-icon" href="../images/machine-control-blue-114-160057.png">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet" /><link href="https://fonts.googleapis.com/css?family=Kanit|Roboto" rel="stylesheet" />
    <!-- Your custom styles (optional) -->
    <link href="../css/style.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">
</head>
  <style>
  body
  {
    background-color: #F8F8FF;
  }
  </style>
  <body class="text-center">

    <header>
           <!--Navbar-->
           <nav class="navbar fixed-top navbar-expand-lg navbar-dark aqua-gradient">

               <!-- Navbar brand -->
               <a class="navbar-brand" href="#">SNRU COMSCI</a>

               <!-- Collapse button -->
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                   aria-expanded="false" aria-label="Toggle navigation">
                   <span class="navbar-toggler-icon"></span>
               </button>

               <!-- Collapsible content -->
               <div class="collapse navbar-collapse" id="navbarSupportedContent">

                   <!-- Links -->
                   <ul class="navbar-nav mr-auto">
                       <li class="nav-item ">
                           <a class="nav-link" href="../index.php">Home
                               <span class="sr-only">(current)</span>
                           </a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="../data.php?c=dhamm&p=list">ข้อมูลครุภัณฑ์</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="../repair.php?c=nature&p=list">รายงานซ่อมครุภัณฑ์</a>
                       </li>
                       <li class="nav-item active">
                           <a class="nav-link" href="#">Admin</a>
                       </li>
                   </ul>
               </div>
           </nav>
       </header>

<div class="card"style="margin-left:38%; margin-top:50px; width:400px;height:390px;">
  <div class="card-body mx-1">
    <form class="form-signin" action="process.login.php" method="post">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1><br>
      <label for="inputEmail" class="sr-only">Username</label>
      <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Username"required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required><br>
      <button class="btn btn-lg btn-primary btn-block"style="  background: linear-gradient(40deg,#2096ff,#05ffa3)!important;" type="submit">Sign in</button>
    </form>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  </body>
</html>

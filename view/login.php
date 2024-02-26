<?php
  session_start();
  include_once "../controller/login.controller.php";
  $controller = new User();
  
  if(isset($_GET['error'])){
    $error = $_GET['error'];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <!-- <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="./homepage.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" aria-disabled="true">Disabled</a>
            </li>
          </ul>
          <form class="d-flex" role="search" action="#">
            <button class="btn btn-outline-success" type="submit">Login</button>
          </form>
        </div>
      </div>
    </nav> -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="./homepage.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" aria-disabled="true">Disabled</a>
            </li>
          </ul>
          <!-- <h3>error</h3> -->
          <form class="d-flex" role="search" action="./login.php">
            <button class="btn btn-outline-success" type="submit">Login</button>
          </form>
        </div>
      </div>
    </nav>
    <h1>Login Page</h1>
    <!-- Section Form -->
    <!-- <form action="./logged.php" method="POST" class="flex container">
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
      </div>
      <div class="row g-3 align-items-center">
        <div class="col-auto">
          <label for="password" class="col-form-label">Password</label>
        </div>
        <div class="col-auto">
          <input type="password" id="password" class="form-control" name="password" aria-describedby="password" required>
        </div>
        <div class="col-auto">
          <span id="password" class="form-text">
          Must be 8-20 characters long.
          </span>
        </div>
        <div class="col-auto ">
          <button type="submit" class="btn btn-outline-secondary mb-3">Send</button>
        </div>
      </div>
    </form> -->
    <!-- <?php 
    /*  include "../controller/login.controller.php";
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller = new User();
        $url = $controller->checkInfoUserPublic()?"./login.php":"../index.php"; 
        // Il form è stato inviato tramite POST, processa i dati del form
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        // Esegui qui la tua logica per l'autenticazione dell'utente, ecc.
    }
       */?>-->
    <form action="checkUser.php" method="post">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required><br><br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password"><br><br>
      <?php 
        if(isset($error)){
          echo "<h3 class='text-danger'>Email or Password Invalid</h3>";
        }
        print_r($_SESSION['logged_in']);
      ?>
      <input type="submit" value="Submit" class="btn btn-outline-dark ms-2">
    </form>
    <a href="./signup.php" class='btn btn-outline-dark mt-2 ms-2'>Sign Up</a>
    
    <!-- End of body -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
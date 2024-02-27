<?php
include_once "../controller/InitialCheck.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" aria-disabled="true">Disabled</a>
            </li>
            <li>
              <?php 
                if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
                  echo "<a class='btn btn-outline-success' type='submit' href=\"./logout.php\">Logout</a>";
                }else{
                  echo "<a class='btn btn-outline-success' type='submit' href=\"./login.php\">Login</a>";
                }
              ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Inizio Pagina -->
    <h1>Sei In Sign Up</h1>
    <p>prova a caso per git</p>
    <!-- Form -->
    <form action="" method="post"><!-- Inserire una pagina che si occuperà di inviare i dati se sono giusti o di reindirizzarti verso la signup.php page se i dati non sono corretti -->
      <div class="mb-3">
        <label for="exampleInputEmail" class="form-label">Email address:</label>
        <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="exampleInputName" class="form-label">Name:</label>
        <input type="text" class="form-control" id="exampleInputName" aria-describedby="nameHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputSurname" class="form-label">Surname:</label>
        <input type="text" class="form-control" id="exampleInputSurname" aria-describedby="surnameHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputUsername" class="form-label">Username:</label>
        <input type="text" class="form-control" id="exampleInputUsername" aria-describedby="usernameHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password:</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <!-- End of body -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
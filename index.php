<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
  
    <link rel="icon" type="image/png" href="./img/island_wht.svg">
  </head>
  
  <style>
    body{
      margin:0px;
      padding:0px;
      background-color:#F5F5F5;
      
      font-family: 'Poppins', sans-serif;
    }
  </style>
<body >

<div class="container min-vh-100 d-flex flex-column justify-content-center align-items-center ">
      <div class="text-center mb-4">
        <img class="mb-2" src="./img/island.svg" style="width:100px" alt="">
        <h1 class="fs-3 text-center fw-bold">Sign in</h1>
      </div>

  <div class=" ">

    <form action="proses_login.php" method="post">

      <div class=" form-floating mb-4 ">
        
          <input required type="name" name="username" class="form-control px-5 " id="floatinginput">
          <label class="text-secondary" for="floatingInput">Username</label>
      </div>
      <div class="  form-floating mb-4">
       
        <input required type="password" name="password" class="form-control px-5" id="floatingpassword"  >
        <label  class="text-secondary" for="floatingpassword">Password</label>
      </div>
  
         <button type="submit" class="btn btn-primary w-100 py-2 fs-6">Sign in</button>
          <div  class="form-text text-center text-secondary mb-5 mt-3">Forgot yout password?</div>
     </form>
      <div class="">
        <h1 class="fs-6 text-center  mb-4">Don't have a Column account?</h1>
        <a href="./register/register.php" class=" shadow-sm  btn btn-light border border-2 w-100 py-2 fs-6">Create an Account</a>
      </div>
  </div>
   
  

 

        
   
</div>

</body>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link type="text/css" rel="stylesheet" href=<?= "/css/styles.css" ?> />
  <script src="/js/script.js"></script>
</head>

<body>
  <h2>Login</h2>


  <div id="id01" class="modal">

    <form class="modal-content animate" action="index.php?url=doctors/login" method="post">

      <div class="container">
        <label for="email"><b>Email</b></label>
        <input id="email" type="email" placeholder="doctor@hospital.com" name="email" required>

        <label for="password"><b>Password</b></label>
        <input id="login-password" type="password" placeholder="Password" name="password" required>

        <button type="submit">Login</button>
      </div>

    </form>
  </div>


  <div id="id02" class="modal">
    <form class="modal-content" action="index.php?url=doctors/register" method="post">
      <div class="container">
        <h2>Sign Up</h2>
        <label for="name"><b>Name<b></label>
        <input type="text" placeholder="Your name" name="name" required>

        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="doctor@hospital.com" name="email" required>

        <label for="password"><b>Password</b></label>
        <input id="register-password" type="password" placeholder="Enter Password" name="password" required>

        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input id="confirm-password" type="password" placeholder="Repeat Password" name="psw-repeat" onkeyup="check();"
          required>
        <span id='message'></span>
        <br />


        <label for="gender">Gender :</label>
        <input type="radio" class="gender" name="gender" value="male" required="required">
        <label for="male">Male</label>
        <input type="radio" class="gender" name="gender" value="female">
        <label for="female">Female</label>
        <br />
        <label for="specialist">Speciality :</label>
        <input type="radio" id="heart" name="specialist" value="heart" required="required">
        <label for="heart">Heart</label>
        <input type="radio" id="neuron" name="specialist" value="neuron">
        <label for="neuron">Neuron</label>
        <input type="radio" id="skeleton" name="specialist" value="skeleton">
        <label for="skeleton">Skeleton</label>
        <br />
        <div class="clearfix">
          <button type="submit" class="signupbtn">Sign Up</button>
        </div>
      </div>
    </form>
  </div>

</body>


</html>
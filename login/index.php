<!-- login.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - KOBILI</title>
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    -->
    <link rel="stylesheet" href="../assets/css/style.css" />
    <!-- <script src="../assets/js/ajax.js"></script> -->
</head>
<body>



    <div class="auth-container">
        <form class="auth-form" method="post" action="login.php" id="loginForm">
            <h1>Login to KOBILI</h1>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="bartwel@gmail.com"  required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" value="123456" required>
            </div>

            <button type="submit" name="login" class="auth-btn">Login</button>

            <div class="auth-links">
                <a href="#" id="forgotPassword">Forgot Password?</a>
                <p>Don't have an account? <a href="../signup">Sign up</a></p>
            </div>

            <div class="social-login">
                <p>Or login with</p>
                <div class="social-buttons">
                    <button type="button" class="social-btn facebook">
                        <i class="fab fa-facebook-f"></i>
                    </button>
                    <button type="button" class="social-btn google">
                        <i class="fab fa-google"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- <script src="js/validate-login.js"></script> -->
<script>
    /*$(document).ready(function() {
      let email = document.querySelector("#email");
      let password = document.querySelector("#password");
      let mynum = 0;
      $(".auth-btn").click(function() {
        email = email.value;
        password = password.value;
        // alert(password)
        $(".auth-container").load("../assets/php/login.php", {
          email:email,
          password:password
        });
      });
    });*/
</script>
</body>
</html>
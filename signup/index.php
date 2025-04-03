<!-- signup.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - KOBILI</title>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> -->
    <link rel="stylesheet" href="../assets/css/style.css" />
    <script src="../assets/js/ajax.js"></script>

</head>
<body>
    <div class="auth-container">
        <form class="auth-form" id="signupForm">
            <h1>Create Account</h1>

            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input type="text" id="fullName" name="fullName" value= "bartwel mwanza" required>
                <div class="error-message">Please enter your full name</div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="bartwel@gmail.com" required>
                <div class="error-message">Please enter a valid email address</div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" value="123456" required>
                <div class="error-message">Password must be at least 6 characters</div>
            </div>

            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" value="123456" required>
                <div class="error-message">Passwords do not match</div>
            </div>

            <button type="button" class="auth-btn">Sign Up</button>

            <div class="auth-links">
                <p>Already have an account? <a href="../login">Login</a></p>
            </div>

            <div class="social-login">
                <p>Or sign up with</p>
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

<script>
    $(document).ready(function() {
      let fullName = document.querySelector("#fullName");
      let email = document.querySelector("#email");
      let password = document.querySelector("#password");
      let confirmPassword = document.querySelector("#confirmPassword");
      $(".auth-btn").click(function() {
        fullname = fullName.value;
        email = email.value;
        password = password.value;
        confirmPassword = confirmPassword.value;
        $(".auth-container").load("../assets/php/signup.php", {
          fullname: fullname,
          email: email,
          password: password,
          confirmPassword: confirmPassword
        });
      });
    });
</script>

</body>
</html>
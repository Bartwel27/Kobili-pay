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
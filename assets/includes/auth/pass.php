<script>
    $(document).ready(function() {
      let email = document.querySelector('#email');
      let password = document.querySelector('#password');
      $('.auth-btn').click(function() {
        email = email.value;
        password = password.value;
        // alert(password)
        $('.auth-container').load('../assets/php/login.php', {
          email:email,
          password:password
        });
      });
    });
    
</script>
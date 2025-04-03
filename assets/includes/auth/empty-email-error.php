<form class='auth-form' id='loginForm'>
    <h1>Login to KOBILI</h1>

    <div class='form-group'>
        <label for='email'>Email</label>
        <input type='email' id='email' name='email'  required>
        <div style="color: var(--secondary-color);font-size: 0.9rem;margin-top: 0.5rem;">Email should not be empty</div>
    </div>

    <div class='form-group'>
        <label for='password'>Password</label>
        <input type='password' id='password' name='password'  required>
        <div class='error-message'>Password must be at least 6 characters</div>
    </div>

    <button type='button' class='auth-btn'>Try again</button>

    <div class='auth-links'>
        <a href='#' id='forgotPassword'>Forgot Password?</a>
        <p>Don't have an account? <a href='../signup/'>Sign up</a></p>
    </div>

    <div class='social-login'>
        <p>Or login with</p>
        <div class='social-buttons'>
            <button type='button' class='social-btn facebook'>
                <i class='fab fa-facebook-f'></i>
            </button>
            <button type='button' class='social-btn google'>
                <i class='fab fa-google'></i>
            </button>
        </div>
    </div>
</form>
<?php
include "pass.php";
?>
<form class="auth-form" id="signupForm">
    <h1>Create Account</h1>

    <div class="form-group">
        <label for="fullName">Full Name</label>
        <input type="text" id="fullName" name="fullName" required>
        <div class="error-message">Please enter your full name</div>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        <div class="error-message">Please enter a valid email address</div>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <div style="color: var(--secondary-color);font-size: 0.9rem;margin-top: 0.5rem;">Password must be at least 6 characters</div>
    </div>

    <div class="form-group">
        <label for="confirmPassword">Confirm Password</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required>
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
<?php

include "pass-two.php";

?>
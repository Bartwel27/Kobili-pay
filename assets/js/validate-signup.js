function validateSignupForm(event) {
            event.preventDefault();

            const fullName = document.getElementById('fullName');
            const email = document.getElementById('email');
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('confirmPassword');
            let isValid = true;

            // Reset error states
            document.querySelectorAll('.form-group').forEach(group => {
                group.classList.remove('error');
            });

            // Full name validation
            if (fullName.value.trim().length < 2) {
                fullName.parentElement.classList.add('error');
                isValid = false;
            }

            // Email validation
            if (!email.value.match(/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/)) {
                email.parentElement.classList.add('error');
                isValid = false;
            }

            // Password validation
            if (password.value.length < 6) {
                password.parentElement.classList.add('error');
                isValid = false;
            }

            // Confirm password validation
            if (password.value !== confirmPassword.value) {
                confirmPassword.parentElement.classList.add('error');
                isValid = false;
            }

            if (isValid) {
                // Here you would typically send the form data to your server
                console.log('Form is valid, submitting...');
                // For demo purposes, simulate a successful signup
                alert('Account created successfully!');
                window.location.href = 'login.html';
            }

            return false;
        }
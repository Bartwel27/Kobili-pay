<?php
require "../assets/php/db.php";
require "../assets/php/functions.php";
session_start();
if (isset($_POST["login"])) {
	$email = $_POST["email"];
	$password = $_POST["password"];
	if (!empty($email)) {
        if (!empty($password)) {
           $stmt = mysqli_stmt_init($connect);
           $sql = "SELECT * from users where email = ?";
           if (mysqli_stmt_prepare($stmt, $sql)) {
                if (mysqli_stmt_bind_param($stmt, "s", $email)) {
                    if (mysqli_stmt_execute($stmt)) {
                        $stmt_res = mysqli_stmt_get_result($stmt);
                        if (mysqli_num_rows($stmt_res) == 1) {   
                            $fetch = mysqli_fetch_assoc($stmt_res); // wait..
                            if (password_verify($password, $fetch["password"])) {
                                $username = $fetch["username"];
                                $email = $fetch["email"];
                                $userid = $fetch["userId"];
                                $password = $fetch["password"]; // user should not see the hashed password
                                
                                $_SESSION["username"] = $username;
                                $_SESSION["email"] = $email;
                                $_SESSION["userId"] = $userid;

                                echo "
                                    <center><br><br><br><br><br><br><br><br>
                                        <h1 style='text-align:center;font-family:sans-serif;'>Loading...<br>
                                            <svg width='50' height='50' viewBox='0 0 24 24'><g fill='none' stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'><path stroke-dasharray='16' stroke-dashoffset='16' d='M12 3c4.97 0 9 4.03 9 9'><animate fill='freeze' attributeName='stroke-dashoffset' dur='0.3s' values='16;0'/><animateTransform attributeName='transform' dur='1.5s' repeatCount='indefinite' type='rotate' values='0 12 12;360 12 12'/></path><path stroke-dasharray='64' stroke-dashoffset='64' stroke-opacity='0.3' d='M12 3c4.97 0 9 4.03 9 9c0 4.97 -4.03 9 -9 9c-4.97 0 -9 -4.03 -9 -9c0 -4.97 4.03 -9 9 -9Z'><animate fill='freeze' attributeName='stroke-dashoffset' dur='1.2s' values='64;0'/></path></g></svg>
                                        </h1>
                                    </center>
                                    
                                ";

                                _http_res(2,"../home/");
                        } else {
                            // when email and password field is not correct
                            include "../assets/includes/auth/email-or-password-error.php";
                        }
                            } else {
                                // when email and password field is not correct
                                include "../assets/includes/auth/email-or-password-error.php";
                            }
                    } else {
                        // execute
                        _http_res(0,"../signup/");
                        _innerjs("Unable to execute the desired command, please try again letter!");
                    }
                } else {
                    // bind param
                    _http_res(0,"../signup/");
                    _innerjs("Unable to bind parameters, please try again letter!");
                }
            } else {
               // prepare
                _http_res(0,"../signup/");
                _innerjs("The system was unable to prepare the connection at the moment, please try again letter!");
            }
        } else {
            // when password field is empty
            include "../assets/includes/auth/empty-password-error.php";
        }
	} else {
		// when email field is empty
		include "../assets/includes/auth/empty-email-error.php";
	}
} 
?>
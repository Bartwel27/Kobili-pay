<?php
require "db.php";
require "functions.php";

if (isset($_POST["fullname"]) and isset($_POST["email"]) and isset($_POST["password"]) and isset($_POST["confirmPassword"])) {
	$fullname = $_POST["fullname"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$confirmPassword = $_POST["confirmPassword"];
	if (!empty($fullname) and !empty($email) and !empty($password) and !empty($confirmPassword)) {
		if (str_word_count($fullname) == 2 or str_word_count($fullname) == 3) {
			if (preg_match("/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/", $email)) {
				if (strlen($password) >= 6) {
					if ($password == $confirmPassword) {
						$sql_user_check = "SELECT email FROM users where email = ?"; // query used to check for all the users for a match
						$stmt_user_check = mysqli_stmt_init($connect); // initializing the db connection
						if (mysqli_stmt_prepare($stmt_user_check, $sql_user_check)) {
							mysqli_stmt_bind_param($stmt_user_check, "s", $email);
							if (mysqli_stmt_execute($stmt_user_check)) {
								$stmt_user_res = mysqli_stmt_get_result($stmt_user_check);
								$user_fetch = mysqli_fetch_assoc($stmt_user_res);
								if (mysqli_num_rows($stmt_user_res) == 0) {
									$hash_password = password_hash($password, PASSWORD_DEFAULT); // hashed password
									$userid = uniqid(true,""); // generate uniq id
									mysqli_stmt_close($stmt_user_check); // we close this initialization

									$stmt_create = mysqli_stmt_init($connect); // we start another for creating an account
									$sql_create = "INSERT INTO users (`username`,`email`,`userId`,`password`) VALUES (?,?,?,?)";
									if (mysqli_stmt_prepare($stmt_create, $sql_create )) {
										if (mysqli_stmt_bind_param($stmt_create, "ssss", $fullname,$email,$userid,$hash_password)) {
											if (mysqli_stmt_execute($stmt_create)) {
												mysqli_stmt_close($stmt_create);
												_http_res(5,"../login/");
?>
	<h1>account created for <?= $fullname; ?>, wait 5s</h1>
<?php
											} else {
												_http_res(0,"../signup/");
												_innerjs("Unable to execute the desired command from user input, please try again letter!");
											}
										} else {
											_http_res(0,"../signup/");
											_innerjs("Unable to bind users input, please try again letter!");
										}
									} else {
										_http_res(0,"../signup/");
										_innerjs("We are unable to prepare the the details at the moment, please try again letter!");
									}
								} else {
									// when email is already being used
									include "../includes/auth/email-in-use-error.php";
								}
							} else {
								_http_res(0,"../signup/");
								_innerjs("Unable to execute the desired command, please try again letter!");
							}
						} else {
							_http_res(0,"../signup/");
							_innerjs("The system was unable to prepare the connection at the moment, please try again letter!");
						}
					} else {
						// when password does not match with confirm password
						include "../includes/auth/confirm-password-error.php";
					}
				} else {
					// when user enters password charectors less than 6
					include "../includes/auth/password-validate-error.php";
				}
			} else {
				// when user does not provide a valid email
				include "../includes/auth/valid-email-address-error.php";
			}
		} else {
			// when fullname input does not expect number of word count
			include "../includes/auth/str-word-count-fullname-error.php";
		}
	} else {
		// when fields are empty
        include "../includes/auth/empty-fields-signup-error.php";
	}
} else {
	echo "<h1>Permission denied!</h1>";
	// we write something to detect
    exit();
}
?>
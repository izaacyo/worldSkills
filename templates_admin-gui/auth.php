<?php

session_start();

include 'db_conn.php';

// process form 

if(isset($_POST['email']) && isset($_POST['password_hash'])){

    $email = $_POST['email'];
    $password_hash = $_POST['password_hash'];

if(empty($email)){
    header("Location: index.php?error=Email is required");
                   
} else if(empty($password_hash)){
    header("Location: index.php?error=Password is required"); 

} else {
    $stmt = $conn->prepare("SELECT * FROM organizers WHERE email=?");
    $stmt->execute([$email]);

    
		if ($stmt->rowCount() === 1) {
            $organizers = $stmt->fetch();

			$organizers_id = $organizers['id'];
			$organizers_name = $organizers['name'];
			$organizers_slug = $organizers['slug'];
			$organizers_email = $organizers['email'];
			$organizers_password = $organizers['password_hash'];

            echo $organizers_password;
            
			if ($email === $organizers_email) {
				if (password_verify($password_hash, $organizers_password)) {

					$_SESSION['organizers_id'] = $organizers_id;
					$_SESSION['organizers_name'] = $organizers_name;
					$_SESSION['organizers_slug'] = $organizers_slug;
					$_SESSION['organizers_email'] = $organizers_email;
					header("Location: ../events/index.php");

				}else {
					header("Location: index.php?error=Incorect Email or password&email=$email");
				}
			}else {
				header("Location: index.php?error=Incorect organizers name or password&email=$email");
			}
		}else {
			header("Location: index.php?error=Incorect organizers name or password&email=$email");
		}

}
}





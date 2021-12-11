<?php 
include 'view/header.php'
?>

<?php if(isset($_SESSION['session_id'])) : 
 header("Location: index.php?success=loggedin");
 exit();
?>
	
<?php else :?>
	<div>
	<h3>Login</h3>
	<?php if(isset($_GET['error'])) { 
 			switch ($_GET['error']) {
 				case 'emptyfield':
 					echo "<p style='color:red'>Enter all the fields.</p>";
 					break;
 				case 'wrongpass':
 					echo "<p style='color:red'>Wrong username or password.</p>";
 					break;
 				case 'nouser':
 					echo "<p style='color:red'>Wrong username or password.</p>";
 					break;	
 				default:
 					echo "<p style='color:red'>Server error.</p>";
 					break;
 			}
 		}
	?>
	<?php if(isset($_GET['succes'])) { 
 			switch ($_GET['succes']) {
 				case 'register':
 					echo "<p style='color:green'>You are registered you may now Login.</p>";
 					break;	
 				default:
 					echo "<p style='color:red'>Server error.</p>";
 					break;
 			}
 		}
	?>
	<form action="library/login.inc.php" method="post">
			Username: <input type="text" name="username">
			Password: <input type="password" name="password">
			<input type="submit" name="submit" value="Login">
		</form>
	<p>Don't have an account? <a href="register.php">Register</a></p>
	</div>
<?php endif; ?>


<?php
include 'view/footer.php';
?>

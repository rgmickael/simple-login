<?php 
include 'view/header.php'
?>

<?php if(isset($_SESSION['session_id'])) : 
 header("Location: index.php?success=loggedin");
 exit();
?>
	
<?php else :?>
	<div>
		<h3>Resister</h3>

		<?php if(isset($_GET['error'])) { 
 			switch ($_GET['error']) {
 				case 'emptyfield':
 					echo "<p style='color:red'>Enter all the fields.</p>";
 					break;
 				case 'invalidusername':
 					echo "<p style='color:red'>Username invalid.</p>";
 					break;
 				case 'passwordnotthesame':
 					echo "<p style='color:red'>Password not the same.</p>";
 					break;
 				case 'usernametaken':
 					echo "<p style='color:red'>Username already used choose another.</p>";
 					break;	
 				default:
 					echo "<p style='color:red'>Server error.</p>";
 					break;
 			}
 		}
		?>
		<form action="library/register.inc.php" method="post">
			Username:<br>
			<input type="text" name="username" value="<?php if(isset($_GET['username'])) echo $_GET['username'] ?>"><br>
			Password:<br>
			<input type="password" name="password"><br>
			Confirm:<br>
			<input type="password" name="confirm_password"><br>
			<input type="submit" name="submit" value="Register">
		</form>
		<p>Have an account? <a href="login.php">Login</a></p>
	</div>
<?php endif; ?>


<?php
include 'view/footer.php';
?>
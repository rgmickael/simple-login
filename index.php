<?php 
include 'view/header.php'
?>
	<div>
		<h3>Home</h3>
		<p>Welcome to  <u>Simple Login</u> a login and registration system using PHP/MySQL (Procedural Coding Style)</p>
		<?php if(isset($_SESSION['session_id'])) :?>
			<p>Your are now Loggedin, <strong><?php echo $_SESSION['session_user']; ?></strong></p><br>
			<p><a href="library/logout.inc.php?logout=logout">Logout</a></p>
		<?php else :?>
			<p>Your are not Logged <a href="login.php">Login</a></p>
		<?php endif; ?>
	</div>

<?php
include 'view/footer.php';
?>

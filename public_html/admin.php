<?php
	session_start();
	require 'head.php';
	require 'nav.php';
	require 'list-courses.php'; 
	require 'DatabaseTable.php';
	
	ob_start();
	echo 'Alter Students!';
	$title = ob_get_clean();
	
	ob_start();
	require 'student-form.php';
	$contents = ob_get_clean();
	
	if (isset($_GET['page'])) {
		
		if ($_GET['page'] == 'students') {
			
			ob_start();
			echo 'Alter Students!';
			$title = ob_get_clean();
			
			ob_start();
			require 'student-form.php';
			$contents = ob_get_clean();
			
		}
		else if ($_GET['page'] == 'sessions') {
			
			ob_start();
			echo 'Alter Sessions!';
			$title = ob_get_clean();
			
			ob_start();
			require 'session-form.php';
			$contents = ob_get_clean();
		}
	}
	
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title ?></title>
	</head>
	<body>
	<?php require 'vNav.php'; ?>
		<div class="wrapper">
			
			<div class="content">

					<div class="alterStud">
						<?php echo $contents ?>
					</div>

			</div>
			
			<?php require 'footer.php';?>
		</div>
	</body>
</html>
<?php 
	}
	else {
		echo 'You must be logged in to view this page';
	}

?>
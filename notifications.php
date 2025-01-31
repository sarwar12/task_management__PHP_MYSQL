<?php 
session_start();
if(isset($_SESSION['role']) && isset($_SESSION['id'])){
	include "DB_connection.php";
	include "app/Model/Notification.php";
	//include "app/Model/User.php";
	$notifications = get_all_my_notifications($conn, $_SESSION['id']);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Notifications</title>
	<!-- Font Awesome CSS -->
	<link rel="stylesheet" href="css/all.min.css">
	<!-- My Style -->
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<input type="checkbox" id="checkbox">
	<?php include "inc/header.php"; ?>
	<div class="body">
	    <?php include "inc/nav.php"; ?>
		<section class="section-1">
            <h2 class="title">All Notifications</h2>
			<?php if(isset($_GET['success'])):?>
				<div class="success" role="alert">
					<?php echo stripcslashes($_GET['success']); ?>
				</div>
			<?php endif; ?>
			<?php if($notifications != 0){ ?>
				<table class="main_table"> 
					<tr> 
						<th>#</th>
						<th>Message</th>
						<th>Type</th>
						<th>Date</th>
					</tr>
					<?php $i=0; foreach($notifications as $notification){?>
						<tr> 
							<td><?php echo ++$i ?></td>
							<td><?php echo $notification['message']?></td>
							<td><?php echo $notification['type']?></td>
							<td><?php echo $notification['date']?></td>
					</tr>
					<?php } ?>
				</table>
			<?php }else{ ?>
				<h3>You have no Notification!</h3>
			<?php } ?>
		</section>
	</div>
<script> 
    var active = document.querySelector("#navList li:nth-child(4)");
    active.classList.add("active");
</script>
</body>
</html>
<?php }else{
		$em = "First Login";
		header("Location: login.php?error=$em");
		exit();
	}
?>


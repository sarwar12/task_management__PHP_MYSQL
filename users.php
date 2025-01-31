<?php 
session_start();
if(isset($_SESSION['role']) && isset($_SESSION['id']) && $_SESSION['role'] == 'admin'){
	include "DB_connection.php";
	include "app/Model/User.php";
	$users = get_all_users($conn);
	//print_r($users);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage Users</title>
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
            <h2 class="title">Manage Users <a href="add_user.php">Add User</a></h2>
			<?php if(isset($_GET['success'])):?>
				<div class="success" role="alert">
					<?php echo stripcslashes($_GET['success']); ?>
				</div>
			<?php endif; ?>
			<?php if($users != 0){ ?>
				<table class="main_table"> 
					<tr> 
						<th>#</th>
						<th>Full Name</th>
						<th>User Name</th>
						<th>Role</th>
						<th>Action</th>
					</tr>
					<?php $i=0; foreach($users as $user){?>
						<tr> 
							<td><?php echo ++$i ?></td>
							<td><?php echo $user['full_name']?></td>
							<td><?php echo $user['username']?></td>
							<td><?php echo $user['role']?></td>
							<td>
								<a href="edit_user.php?id=<?php echo $user['id']?>" class="edit_btn">Edit</a>
								<a href="delete_user.php?id=<?php echo $user['id']?>" class="delete_btn">Delete</a>
							</td>
						</tr>
					<?php } ?>
				</table>
			<?php }else{ ?>
				<h3>Empty!</h3>
			<?php } ?>
		</section>
	</div>
<script> 
    var active = document.querySelector("#navList li:nth-child(2)");
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


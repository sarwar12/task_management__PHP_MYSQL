<?php 
session_start();
if(isset($_SESSION['role']) && isset($_SESSION['id'])){
	include "DB_connection.php";
	include "app/Model/Task.php";
	include "app/Model/User.php";
	$tasks = get_all_tasks_by_id($conn, $_SESSION['id']);
?>
<!DOCTYPE html>
<html>
<head>
	<title>My Tasks</title>
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
            <h2 class="title">My Tasks</h2>
			<?php if(isset($_GET['success'])):?>
				<div class="success" role="alert">
					<?php echo stripcslashes($_GET['success']); ?>
				</div>
			<?php endif; ?>
			<?php if($tasks != 0){ ?>
				<table class="main_table"> 
					<tr> 
						<th>#</th>
						<th>Title</th>
						<th>Description</th>
						<th>Status</th>
						<th>Due Date</th>
						<th>Action</th>
					</tr>
					<?php $i=0; foreach($tasks as $task){?>
						<tr> 
							<td><?php echo ++$i ?></td>
							<td><?php echo $task['title']?></td>
							<td><?php echo $task['description']?></td>
							<td><?php echo $task['status']?></td>
							<td><?php echo $task['due_date']?></td>
							<td>
								<a href="edit_task_employee.php?id=<?php echo $task['id']?>" class="edit_btn">Edit</a>
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


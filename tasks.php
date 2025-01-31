<?php 
session_start();
if(isset($_SESSION['role']) && isset($_SESSION['id']) && $_SESSION['role'] == 'admin'){
	include "DB_connection.php";
	include "app/Model/Task.php";
	include "app/Model/User.php";

	$text = "All Task";
	if(isset($_GET['due_date']) && $_GET['due_date'] == "Due Today"){
		$text = "Due Today";
		$tasks = get_all_tasks_due_today($conn);
		$num_task = count_tasks_due_today($conn);
	}elseif(isset($_GET['due_date']) && $_GET['due_date'] == "Overdue"){
		$text = "Overdue";
		$tasks = get_all_tasks_overdue($conn);
		$num_task = count_tasks_overdue($conn);
	}elseif(isset($_GET['due_date']) && $_GET['due_date'] == "No Deadline"){
		$text = "No Deadline";
		$tasks = get_all_tasks_nodeadline($conn);
		$num_task = count_tasks_nodeadline($conn);
	}else{
		$tasks = get_all_tasks($conn);
		$num_task = count_tasks($conn);
		$users = get_all_users($conn);
	}
		$users = get_all_users($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<title>All Tasks</title>
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
            <h2 class="title">
				<a href="create_task.php">Create Task</a>
				<a href="tasks.php?due_date=Due Today">Due Today</a>
				<a href="tasks.php?due_date=Overdue">Overdue</a>
				<a href="tasks.php?due_date=No Deadline">No Deadline</a>
				<a href="tasks.php">All Task</a>
			</h2>
			<h2 class="title"><?php echo $text; ?> (<?php echo $num_task ?>) </h2>
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
						<th>Assigned To</th>
						<th>Due Date</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
					<?php $i=0; foreach($tasks as $task){?>
						<tr> 
							<td><?php echo ++$i ?></td>
							<td><?php echo $task['title']?></td>
							<td><?php echo $task['description']?></td>
							<td>
								<?php 
									foreach($users as $user){
										if($user['id'] == $task['assigned_to']){
											echo $user['full_name'];
										}
									}
								?>
							</td>
							<td>
								<?php 
									if($task['due_date'] == "") echo "No Deadline";
										else echo $task['due_date'];
								?>
							</td>
							<td><?php echo $task['status']?></td>
							<td>
								<a href="edit_task.php?id=<?php echo $task['id']?>" class="edit_btn">Edit</a>
								<a href="delete_task.php?id=<?php echo $task['id']?>" class="delete_btn">Delete</a>
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


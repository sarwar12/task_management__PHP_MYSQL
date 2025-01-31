<?php 
session_start();
if(isset($_SESSION['role']) && isset($_SESSION['id'])){
	include "DB_connection.php";
	include "app/Model/Task.php";
	include "app/Model/User.php";
	
	if($_SESSION['role'] == 'admin'){
		$duetoday_task = count_tasks_due_today($conn);
		$overdue_task = count_tasks_overdue($conn);
		$nodeadline_task = count_tasks_nodeadline($conn);
		$all_task = count_tasks($conn);
		$all_users = count_users($conn);

		$pending = count_pending_tasks($conn);
		$in_progress = count_in_progress_tasks($conn);
		$complete = count_complete_tasks($conn);
	}else{
		$my_task = count_my_tasks($conn, $_SESSION['id']);
		$overdue_task = count_my_tasks_overdue($conn, $_SESSION['id']);
		$nodeadline_task = count_my_tasks_nodeadline($conn, $_SESSION['id']);

		$pending = count_my_pending_tasks($conn, $_SESSION['id']);
		$in_progress = count_my_in_progress_tasks($conn, $_SESSION['id']);
		$complete = count_my_complete_tasks($conn, $_SESSION['id']);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
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
			<?php if($_SESSION['role'] == 'admin'){ ?>
				<div class="dashboard"> 
					<div class="dashboard_item"> 
						<i class="fa fa-users"></i>
						<span><?php echo $all_users; ?> Employee</span>
					</div> 
					<div class="dashboard_item"> 
						<i class="fa fa-tasks"></i>
						<span><?php echo $all_task; ?> All Tasks</span>
					</div> 
					<div class="dashboard_item"> 
						<i class="fa fa-users"></i>
						<span><?php echo $duetoday_task; ?> Due Today</span>
					</div>
					<div class="dashboard_item"> 
						<i class="fa fa-window-close"></i>
						<span><?php echo $overdue_task; ?> Overdue</span>
					</div> 
					<div class="dashboard_item"> 
						<i class="fa fa-clock"></i>
						<span><?php echo $nodeadline_task; ?> No Deadline</span>
					</div> 
					<div class="dashboard_item"> 
						<i class="fa fa-bell"></i>
						<span><?php echo $all_task; ?> Notifications</span>
					</div> 
					<div class="dashboard_item"> 
						<i class="fa fa-square"></i>
						<span><?php echo $pending; ?> Pending</span>
					</div> 
					<div class="dashboard_item"> 
						<i class="fa fa-spinner"></i>
						<span><?php echo $in_progress; ?> In Progress</span>
					</div> 
					<div class="dashboard_item"> 
						<i class="fa fa-check-square"></i>
						<span><?php echo $complete; ?> Complete</span>
					</div> 
				</div>
			<?php }else{ ?>
				<div class="dashboard"> 
					<div class="dashboard_item"> 
						<i class="fa fa-tasks"></i>
						<span><?php echo $my_task; ?> My Tasks</span>
					</div> 
					<div class="dashboard_item"> 
						<i class="fa fa-window-close"></i>
						<span><?php echo $overdue_task; ?> Overdue</span>
					</div> 
					<div class="dashboard_item"> 
						<i class="fa fa-clock"></i>
						<span><?php echo $nodeadline_task; ?> No Deadline</span>
					</div>
					<div class="dashboard_item"> 
						<i class="fa fa-square"></i>
						<span><?php echo $pending; ?> Pending</span>
					</div> 
					<div class="dashboard_item"> 
						<i class="fa fa-spinner"></i>
						<span><?php echo $in_progress; ?> In Progress</span>
					</div> 
					<div class="dashboard_item"> 
						<i class="fa fa-check-square"></i>
						<span><?php echo $complete; ?> Complete</span>
					</div> 
				</div>
			<?php } ?>
		</section>
	</div>
	<script> 
		var active = document.querySelector("#navList li:nth-child(1)");
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


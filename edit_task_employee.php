<?php 
session_start();
if(isset($_SESSION['role']) && isset($_SESSION['id']) && $_SESSION['role'] == 'employee'){	
    include "DB_connection.php";
	include "app/Model/Task.php";
	include "app/Model/User.php";
    if(!isset($_GET['id'])){
		header("Location: tasks.php");
		exit();
    }
    $id = $_GET['id'];
	$task = get_task_by_id($conn, $id);

    if($task == 0){
		header("Location: tasks.php");
		exit();
    }
    $users = get_all_users($conn);
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Task</title>
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
            <h2 class="title">Edit Task <a href="my_task.php">Tasks</a></h2>
            <form action="app/update_task_employee.php" method="POST" class="form_1">
				<?php if(isset($_GET['error'])):?>
					<div class="danger" role="alert">
						<?php echo stripcslashes($_GET['error']); ?>
					</div>
				<?php endif; ?>
				<?php if(isset($_GET['success'])):?>
					<div class="success" role="alert">
						<?php echo stripcslashes($_GET['success']); ?>
					</div>
				<?php endif; ?>
                <div class="input_holder"> 
                    <label for=""></label>
                    <p><strong>Title: </strong><?php echo $task['title']?></p>
                </div>
                <div class="input_holder"> 
                    <label for=""></label>
                    <p><strong>Description: </strong><?php echo $task['description']?></p>
                </div>
                <div class="input_holder"> 
                    <label for="">Status</label>
                    <select name="status" class="input_1">
                       <option <?php if($task['status'] == 'pending') echo "selected"; ?>>pending</option>
                       <option <?php if($task['status'] == 'in_progress') echo "selected"; ?>>in_progress</option>
                       <option <?php if($task['status'] == 'completed') echo "selected"; ?>>completed</option>
                    </select>
                </div>
				<input type="text" name="id" value="<?php echo $task['id']?>" hidden />
				<button class="edit_btn">Update</button>
            </form>
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


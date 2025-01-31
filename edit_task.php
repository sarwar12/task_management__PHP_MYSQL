<?php 
session_start();
if(isset($_SESSION['role']) && isset($_SESSION['id']) && $_SESSION['role'] == 'admin'){	
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
            <h2 class="title">Edit Task <a href="tasks.php">Tasks</a></h2>
            <form action="app/update_task.php" method="POST" class="form_1">
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
                    <label for="">Title</label>
                    <input type="text" name="title" value="<?php echo $task['title']?>" class="input_1" placeholder="Title" />
                </div>
                <div class="input_holder"> 
                    <label for="">Description</label>
                    <textarea type="text" name="description" rows="5" class="input_1" placeholder="Description" /><?php echo $task['description']?></textarea>
                </div>
                <div class="input_holder"> 
                    <label for="">Snooze</label>
                    <input type="date" name="due_date" value="<?php echo $task['due_date']?>" class="input_1" placeholder="Snooze" />
                </div>
                <div class="input_holder"> 
                    <label for="">Assigned To</label>
                    <select name="assigned_to" class="input_1">
                        <option value="0">Select Employee</option>
                        <?php if($users !=0){
                            foreach($users as $user){
								if($task['assigned_to'] == $user['id']){ ?>
								<option selected value="<?php echo $user['id']?>"><?php echo $user['full_name']?></option>
							<?php }else{ ?>
                        <option value="<?php echo $user['id']?>"><?php echo $user['full_name']?></option>
                        <?php } } } ?>
                    </select>
                </div>
				<input type="text" name="id" value="<?php echo $task['id']?>" hidden />
				<button class="edit_btn">Update</button>
            </form>
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


<?php 
session_start();
if(isset($_SESSION['role']) && isset($_SESSION['id']) && $_SESSION['role'] == 'admin'){	
    include "DB_connection.php";
	include "app/Model/User.php";
    if(!isset($_GET['id'])){
		header("Location: users.php");
		exit();
    }
    $id = $_GET['id'];
	$user = get_user_by_id($conn, $id);

    if($user == 0){
		header("Location: users.php");
		exit();
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit User</title>
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
            <h2 class="title">Edit Users <a href="users.php">Users</a></h2>
            <form action="app/update_user.php" method="POST" class="form_1">
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
                    <label for="">Full Name</label>
                    <input type="text" name="full_name" value="<?php echo $user['full_name']?>" class="input_1" placeholder="Full Name" />
                </div>
                <div class="input_holder"> 
                    <label for="">Username</label>
                    <input type="text" name="user_name" value="<?php echo $user['username']?>" class="input_1" placeholder="Username" />
                </div>
                <div class="input_holder"> 
                    <label for="">Password</label>
                    <input type="password" name="password" value="********" class="input_1" placeholder="Password" />
                </div>
				<input type="text" name="id" value="<?php echo $user['id']?>" hidden />
				<button class="edit_btn">Update</button>
            </form>
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


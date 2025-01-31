<?php 
session_start();
if(isset($_SESSION['role']) && isset($_SESSION['id']) && $_SESSION['role'] == 'admin'){	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add User</title>
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
            <h2 class="title">Add Users <a href="users.php">Users</a></h2>
            <form action="app/add_user.php" method="POST" class="form_1">
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
                    <input type="text" name="full_name" class="input_1" placeholder="Full Name" />
                </div>
                <div class="input_holder"> 
                    <label for="">Username</label>
                    <input type="text" name="user_name" class="input_1" placeholder="Username" />
                </div>
                <div class="input_holder"> 
                    <label for="">Password</label>
                    <input type="password" name="password" class="input_1" placeholder="Password" />
                </div>
				<button class="edit_btn">Add</button>
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


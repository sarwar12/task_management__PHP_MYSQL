<?php 
session_start();
if(isset($_SESSION['role']) && isset($_SESSION['id']) && $_SESSION['role'] == 'employee'){	
    include "DB_connection.php";
	include "app/Model/User.php";
    $user = get_user_by_id($conn, $_SESSION['id']);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
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
            <h2 class="title">Edit Profile <a href="profile.php">Profile</a></h2>
            <form action="app/update_profile.php" method="POST" class="form_1">
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
                    <label for="">Old Password</label>
                    <input type="password" name="password" value="********" class="input_1" placeholder="Old Password" />
                </div>
                <div class="input_holder"> 
                    <label for="">New Password</label>
                    <input type="password" name="new_password" class="input_1" placeholder="New Password" />
                </div>
                <div class="input_holder"> 
                    <label for="">Confirm Password</label>
                    <input type="password" name="confirm_password"class="input_1" placeholder="Confirm Password" />
                </div>
				<button class="edit_btn">Change</button>
            </form>
		</section>
	</div>
<script> 
    var active = document.querySelector("#navList li:nth-child(3)");
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


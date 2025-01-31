<?php 
session_start();
if(isset($_SESSION['role']) && isset($_SESSION['id']) && $_SESSION['role'] == 'employee'){	
    include "DB_connection.php";
	include "app/Model/User.php";
    $users = get_user_by_id($conn, $_SESSION['id']);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
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
            <h2 class="title">Profile <a href="edit_profile.php">Edit Profile</a></h2>
            <table class="main_table" style="max-width:300px"> 
					<tr> 
						<td>Full Name</td>
						<td><?php echo $users['full_name']?></td>
					</tr>
                    <tr> 
						<td>Username</td>
						<td><?php echo $users['username']?></td>
					</tr>
                    <tr> 
						<td>Joined at</td>
						<td><?php echo $users['created_at']?></td>
					</tr>
                </table>
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


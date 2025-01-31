<?php 
session_start();
if(isset($_SESSION['role']) && isset($_SESSION['id'])){
	include "../DB_connection.php";
	include "Model/Notification.php";

	$notifications = get_all_my_notifications($conn, $_SESSION['id']);
	if($notifications == 0){ ?>
		<li> 
			<a href="#">You have no notification.</a>
		</li>
	<?php }else{
		foreach($notifications as $notification){
?>
	<li> 
		<a href="app/notification-read.php?notification_id=<?php echo $notification['id'] ?>">
			<?php 
				if($notification['is_read'] == 0){
					echo "<mark>".$notification['type']."</mark>: ";
				}else{
					echo $notification['type'].": ";
				}
			?>
			<?php echo $notification['message'] ?> &nbsp; &nbsp; 
			<small><?php echo $notification['date'] ?></small>
		</a>
	</li>
<?php
} } }else{
		echo "";
	}
?>
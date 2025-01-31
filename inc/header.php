<header class="header">
    <h2 class="u-name">TASK <b>PRO</b>
        <label for="checkbox">
            <i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
        </label>
    </h2>
    <span class="notification" id="notificationBtn"> 
         <i class="fa fa-bell" aria-hidden="true"></i>
         <span id="notificationNum">&nbsp;7&nbsp;</span>
    </span>
</header>
    
<div class="notification-bar" id="notificationBar"> 
    <ul id="notifications"> 
        
    </ul>
</div>

<script type="text/javascript">
	var openNotification = false;

	const notification = ()=> {
		let notificationBar = document.querySelector("#notificationBar");
		if (openNotification) {
			notificationBar.classList.remove('open-notification');
			openNotification = false;
		}else {
			notificationBar.classList.add('open-notification');
			openNotification = true;
		}
	}
	let notificationBtn = document.querySelector("#notificationBtn");
	notificationBtn.addEventListener("click", notification);
</script>

<script src="js/jquery-2.2.4.min.js"></script>
<script> 
	$(document).ready(function(){
		$("#notificationNum").load("app/notification-count.php");
		$("#notifications").load("app/notification.php");
	});
</script>
<nav class="side-bar">
    <div class="user-p">
        <img src="img/user.jpg">
        <h4>@<?php echo $_SESSION['username']?></h4>
    </div>
    <?php
        if($_SESSION['role'] == "employee"){
    ?>
    <!-- Employee Nav Bar -->
    <ul id="navList">
        <li>
            <a href="index.php">
                <i class="fas fa-tachometer-alt" aria-hidden="true"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="my_task.php">
                <i class="fa fa-tasks" aria-hidden="true"></i>
                <span>My Task</span>
            </a>
        </li>
        <li>
            <a href="profile.php">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>Profiles</span>
            </a>
        </li>
        <li>
            <a href="notifications.php">
                <i class="fa fa-bell" aria-hidden="true"></i>
                <span>Notifications</span>
            </a>
        </li>
        <li>
            <a href="logout.php">
                <i class="fa fa-sign-out-alt" aria-hidden="true"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>
    <?php }else{?>
        <!-- Admin Nav Bar -->
    <ul id="navList">
        <li>
            <a href="index.php">
                <i class="fas fa-tachometer-alt" aria-hidden="true"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="users.php">
                <i class="fa fa-users" aria-hidden="true"></i>
                <span>Manage Users</span>
            </a>
        </li>
        <li>
            <a href="create_task.php">
                <i class="fa fa-plus" aria-hidden="true"></i>
                <span>Create Tasks</span>
            </a>
        </li>
        <li>
            <a href="tasks.php">
                <i class="fa fa-tasks" aria-hidden="true"></i>
                <span>All Tasks</span>
            </a>
        </li>
        <li>
            <a href="notifications.php">
                <i class="fa fa-bell" aria-hidden="true"></i>
                <span>Notifications</span>
            </a>
        </li>
        <li>
            <a href="logout.php">
                <i class="fa fa-sign-out-alt" aria-hidden="true"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>
    <?php } ;?>
</nav>
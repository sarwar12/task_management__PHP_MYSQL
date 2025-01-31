<?php 
session_start();
if(isset($_SESSION['role']) && isset($_SESSION['id'])){	
    
    if(isset($_POST['id']) && isset($_POST['status']) && $_SESSION['role'] == 'employee'){
        include "../DB_connection.php";
        function validate_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $status = validate_input($_POST['status']);
        $id = validate_input($_POST['id']);

        if(empty($status)){
            $em = "Status is required";
            header("Location: ../edit_task_employee.php?error=$em&id=$id");
            exit();
        }else{
            include "Model/Task.php";

            $data = array($status, $id);
            update_task_status($conn, $data);

           $em = "Task updated successfully";
           header("Location: ../edit_task_employee.php?success=$em&id=$id");
           exit();
        }
    }else{
        $em = "unknown error occurred";
        header("Location: ../edit_task_employee.php?error=$em");
        exit();
    }
}else{
    $em = "First Login";
    header("Location: ../login.php?error=$em");
    exit();
}

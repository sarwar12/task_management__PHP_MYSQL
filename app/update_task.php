<?php 
session_start();
if(isset($_SESSION['role']) && isset($_SESSION['id'])){	
    
    if(isset($_POST['id']) && isset($_POST['title']) && isset($_POST['description']) && isset($_POST['assigned_to']) && $_SESSION['role'] == 'admin' && isset($_POST['due_date'])){
        include "../DB_connection.php";
        function validate_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $title = validate_input($_POST['title']);
        $description = validate_input($_POST['description']);
        $assigned_to = validate_input($_POST['assigned_to']);
        $id = validate_input($_POST['id']);
        $due_date = validate_input($_POST['due_date']);

        if(empty($title)){
            $em = "Title is required";
            header("Location: ../edit_task.php?error=$em&id=$id");
            exit();
        }elseif(empty($description)){
            $em = "Description is required";
            header("Location: ../edit_task.php?error=$em&id=$id");
            exit();
        }elseif($assigned_to == 0){
            $em = "Select User";
            header("Location: ../edit_task.php?error=$em&id=$id");
            exit();
        }else{
            include "Model/Task.php";

            $data = array($title, $description, $assigned_to, $due_date, $id);
            update_task($conn, $data);

            $em = "Task updated successfully";
            header("Location: ../edit_task.php?success=$em&id=$id");
            exit();
        }
    }else{
        $em = "unknown error occurred";
        header("Location: ../edit_task.php?error=$em");
        exit();
    }
}else{
    $em = "First Login";
    header("Location: ../login.php?error=$em");
    exit();
}

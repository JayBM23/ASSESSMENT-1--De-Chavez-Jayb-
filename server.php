<?php
    session_start();

    $studentn = "";
    $name = "";
    $address = "";
    $contact = "";
    $id = 0;
    $edit_state = false;
    
    $db = mysqli_connect('localhost', 'root', '', 'crud');

    if(isset($_POST['save'])){
        $studentn = $_POST['studentn'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];

        $query = "INSERT INTO data (name, address, contact, studentn) VALUES ('$studentn', '$name', '$address', '$contact')";
        mysqli_query($db, $query);
        $_SESSION['msg'] = "Address Saved";
        header('location: index.php');
    }

    //Update Records
    if(isset($_POST['update'])) {
        $id = $_POST['id'];
        $studentn = $_POST['studentn'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        

        mysqli_query($db, "UPDATE data SET studentn='$studentn', name='$name', address='$address', contact='$contact' WHERE id=$id");
        $_SESSION['msg'] = "Record Updated!";
        header('location: index.php');
    }
    
    //Delete Record
    if(isset($_GET['del'])){
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM data WHERE id=$id");
        $_SESSION['msg'] = "Record Deleted!";
        header('location: index.php');
    }
    //Restrict Record
    $result = mysqli_query($db, "SELECT * FROM data");
?>
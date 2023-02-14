<?php include('server.php'); 
    //Fetch the record to be updated
    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $edit_state = true;
        $rec = mysqli_query($db, "SELECT * FROM data WHERE id = $id");
        $record = mysqli_fetch_array($rec);
        $studentn = ['studentn'];
        $name = $record['name'];
        $address = $record['address'];
        $contact = $record['contact'];
        $id = $record['id'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple CRUD using php</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php if(isset($_SESSION['msg'])):?>
        <div class="msg">
            <?php 
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            ?>
        </div>
    <?php endif ?>

    <table>
        <thead>
        <th colspan="5">Student Information</th>
            <tr>
                <th>Student No.</th>
                <th>Name</th>
                <th>Address</th>
                <th>Contact #</th>
                <th colspan="2">Edit/Del Record</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($result)){ ?>
                <tr>
                    <td><?php echo $row['studentn']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['contact']; ?></td>
                <td>
                    <a class="editbtn" href="index.php?edit=<?php echo $row['id'];?>">Edit</a>
                </td>
                <td>
                    <a class="delbtn" href="server.php?del=<?php echo $row['id']; ?>">Delete</a>
                </td>
                </tr>
            <?php }?>
        </tbody>
    </table>
    <form method="post" action="server.php">
    <input type="hidden" name = "id" value = "<?php echo $id; ?>">
        <div class="input-group">
            <label>Student Number:</label>
            <input type="text" name="studentn" value = "<?php echo $studentn; ?>">
        </div>
        <div class="input-group">
            <label>Name:</label>
            <input type="text" name="name" value = "<?php echo $name; ?>">
        </div>
        <div class="input-group">
            <label>Address:</label>
            <input type="text" name="address" value = "<?php echo $address; ?>">
        </div>
        <div class="input-group">
            <label>Contact No.:</label>
            <input type="text" name="contact" value = "<?php echo $contact; ?>">
        </div>
        <div class="input-group">
            <?php if($edit_state == false):?>
                <button type="submit" name="save" class="btn">Save</button>
            <?php else: ?>
                <button type="submit" name="update" class="btn">Update</button>
            <?php endif ?>
        </div>
    </form>
</body>
</html>
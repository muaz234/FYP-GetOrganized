<?php
    require_once 'database.php';
    
    if(isset($_GET['id'])){
        $sql= "DELETE FROM inventory WHERE id='$_GET[id]'";

        if(mysqli_query($conn,$sql)){
            header("refresh:0; url=viewinventory.php");
        }
        else{
            echo "NOT DELETED";
        }
    }
?>
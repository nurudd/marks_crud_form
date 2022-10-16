<?php

    $conn = mysqli_connect("localhost","root","","demo");

    if(isset($_POST['del'])){

        $del_sql = "DELETE FROM marks WHERE id='$_POST[del_id]'";
        $x = mysqli_query($conn,$del_sql);
        if($x==true){
            header("Location:form.php");
            exit;
        }

    }
?>
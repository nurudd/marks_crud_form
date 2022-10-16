<?php
        $conn = mysqli_connect("localhost","root","","demo");
        
?>
<style>
    table{
        background-color: black;
        color: whitesmoke;
    }
    table thead{
        background-color: blue;
        color:whitesmoke:
    }
    .form{
        background-color: green;
    }

</style>
<center>
    <table border="1" cellpadding="">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Sub1</th>
            <th>Sub2</th>
            <th>Sub3</th>
            <th>Sub4</th>
            <th>Sub5</th>
            <th>total</th>
            <th>per</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <?php
        if(isset($_GET['find'])){
            $sql = "SELECT * FROM marks WHERE name='$_GET[name]'";
        }else{
            $sql = "SELECT * FROM marks";
        }
        $x = mysqli_query($conn,$sql);
        if($x==true){
            if(mysqli_num_rows($x)>0){
                while($row=mysqli_fetch_assoc($x)){
                    
                    echo "<tr>
                        <td>$row[id]</td>
                        <td>".strip_tags($row['name'])."</td>
                        <td>$row[sub1]</td>
                        <td>$row[sub2]</td>
                        <td>$row[sub3]</td>
                        <td>$row[sub4]</td>
                        <td>$row[sub5]</td>
                        <td>$row[total]</td>
                        <td>$row[per]</td>
                        <td><button><a href='update.php?up_id=$row[id]'>Update</a></button></td>
                        <td>
                            <form method='post' action='delete.php'>
                                <input type='hidden' name='del_id' value='$row[id]'>
                                <input type='submit' name='del' value='Delete'>
                            </form>
                        </td>
                           </tr>";
                }
            }
        }
    ?>

        <form method="POST">
            <tr class="form">
                <td></td>
                <td><input type="text" name="nm" required></td>
                <td><input type="number" name="sub1" required></td>
                <td><input type="number" name="sub2" required></td>
                <td><input type="number" name="sub3" required></td>
                <td><input type="number" name="sub4" required></td>
                <td><input type="number" name="sub5" required></td>
                <td colspan="2"><input type="submit" name="add" value="Add"></td>
            </tr>
        </form>
    </table>
</center>

<?php

    if(isset($_POST['add']))
    {
        
        $sb1 = $_POST['sub1'];
        $sb2 = $_POST['sub2'];
        $sb3 = $_POST['sub3'];
        $sb4 = $_POST['sub4'];
        $sb5 = $_POST['sub5'];
        $total = $sb1+$sb2+$sb3+$sb4+$sb5;
        $per = $total*100/500;

        $sql = "INSERT INTO marks(name,sub1,sub2,sub3,sub4,sub5,total,per) VALUES('$_POST[nm]','$sb1','$sb2','$sb3','$sb4','$sb5','$total','$per')";

        $x = mysqli_query($conn,$sql);
        if($x==true){
            header("Location:form.php");
            exit;
        }
    }

?>
<center>
    <form>
        <input type="text" name="name">
        <input type="submit" name="find" value="Find">
    </form>
</center>

<?php
$conn = mysqli_connect("localhost","root","","demo");
?>
<?php
            if(isset($_GET['up_id'])){
                $sql = "SELECT * FROM marks WHERE id=$_GET[up_id]";
                $x =mysqli_query($conn,$sql);
                if($x==true){
                    if(mysqli_num_rows($x))
                        $data=mysqli_fetch_assoc($x);
                    
                }
            }
?>
<form method="post"> 
    <tr class="form">
        <td><input type="hidden" name="id" value="<?php echo $_GET['up_id']; ?>"></td>
        <td><input type="text" name="nm" required value="<?php echo $data['name']; ?>"></td>
        <td><input type="number" name="sub1" required value="<?php echo $data['sub1']; ?>"></td>
        <td><input type="number" name="sub2" required value="<?php echo $data['sub2']; ?>"></td>
        <td><input type="number" name="sub3" required value="<?php echo $data['sub3']; ?>"></td>
        <td><input type="number" name="sub4" required value="<?php echo $data['sub4']; ?>"></td>
        <td><input type="number" name="sub5" required value="<?php echo $data['sub5']; ?>"></td>
        <td colspan="2"><input type="submit" name="update" value="UPDATE"></td>
    </tr>
</form>


<?php

        if(isset($_POST['update'])){
            $id = $_POST['id'];
            $nm = $_POST['nm'];
            $sb1 = $_POST['sub1'];
            $sb2 = $_POST['sub2'];
            $sb3 = $_POST['sub3'];
            $sb4 = $_POST['sub4'];
            $sb5 = $_POST['sub5'];
            $total = ($sb1+$sb2+$sb3+$sb4+$sb5);
            $per = $total*100/500;

            $sql1 = "UPDATE marks SET name='$nm', sub1='$sb1', sub2='$sb2', sub3='$sb3', sub4='$sb4', sub5='$sb5', total='$total', per='$per' WHERE id='$id' ";

            $y = mysqli_query($conn,$sql1);
            if($y==true){
                header("Location:form.php");
                exit;
            }
        }

?>
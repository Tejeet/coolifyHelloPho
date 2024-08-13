<?php
include("config.php");

if (isset($_POST['submit'])) {
    $name = $_POST['t1'] ?? '';
    $design = $_POST['t2'] ?? '';
    
    if (!empty($_FILES['upload']['name'])) {
        $on = $_FILES['upload']['name'];
        $sn = $_FILES['upload']['tmp_name'];			
        $dn = "img/".$on;

        if (move_uploaded_file($sn, $dn)) {
            // File uploaded successfully
            // Uncomment the code below to insert into database
            // $qry = "INSERT INTO tbl_staff (name, desig, image) VALUES ('$name', '$design', '$on')";
            // $res = mysqli_query($con, $qry);
            
            // if ($res) {
            //     $_SESSION['msg'] = "File Uploaded Successfully";
            // } else {
            //     $_SESSION['msg'] = "Could not upload File";
            // }
        } else {
            $_SESSION['msg'] = "File upload failed";
        }
    } else {
        $_SESSION['msg'] = "No file selected for upload";
    }

    header("location:".$_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>File Upload</title>
</head>
<body>
<center>
<table border="1">
<form name="frm" action="<?php echo $_SERVER['PHP_SELF'];?>?add=333" method="post" enctype="multipart/form-data">
   <tr>
       <td>Enter Your Name</td>
       <td><input type="text" name="t1"></td>
   </tr>

   <tr>
       <td>Enter Your Designation</td>
       <td><input type="text" name="t2"></td>
   </tr>

   <tr>
       <td>Upload Your File</td>
       <td><input type="file" name="upload" /></td>
   </tr>

   <tr>
       <td colspan="2" align="center">
           <input type="submit" name="submit" value="Upload" />
       </td>
   </tr>
</form>   
</table>
<?php
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>
</center>
</body>
</html>

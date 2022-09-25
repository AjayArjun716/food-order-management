<?php
   
   include('../config/constants.php');
   //get the id to be dltd
    $id = $_GET['id'];
   //create query to dlt admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    $res = mysqli_query($conn, $sql);

    if($res==true)
    {
      // echo "Admin deleted";
      $_SESSION['delete'] = "<div class = 'sucess'> Admin Deleted SuccessFully</div>";
      header("location:".SITEURL.'admin/manage-admin.php');
    }
    else
    {
     // echo "admin not deleted";
     $_SESSION['delete'] = "<div class = 'error'>failed to delete. Try Again later.</div>";
     header("location:".SITEURL.'admin/manage-admin.php');

    }
   //redirect to manage admin page 
?>
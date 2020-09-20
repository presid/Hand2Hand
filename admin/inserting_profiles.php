<!Doctype>
<?php
session_start();
if ( $_SESSION["admin"]==""){
?>
<script type ="text/javascript">
window.location="admin_login.php";
</script>

<?php	
	
}
include "header.php";

?>
<?php 
 include("includes/db.php");
 
  $vid="";
  $vname="";
  $vtitle="";
  $vdesc="";
 
               if (isset($_POST['Insert_post'])){
                // getting the text data from the insertion fields 
                 $profile_name = $_POST['profile_name'] ;  
                 $profile_title = $_POST['profile_title'] ;  
                 $profile_desc = $_POST['profile_desc'] ;
              
                 // getting the image from the image insertion field
                 $profile_image=$_FILES['profile_image']['name'];
                 $profile_image_tmp=$_FILES['profile_image']['tmp_name'];
                 
                 move_uploaded_file($profile_image_tmp,"product_images/$profile_image");
                 
                 $inserting_profile ="insert into profiles(profile_name,profile_title,profile_desc,profile_image)
                 values('$profile_name','$profile_title','$profile_desc','$profile_image')";
              
                $insert_profile= mysqli_query($con,$inserting_profile);
                if($insert_profile){
                    
                    echo"<script>alert('A profile has been inserted')</script>";
                    echo"<script>window.open('inserting_profiles.php','_self)</script>";
                }    
                     else{echo "upload failed";}				
              }
			  
			  	   if(isset($_POST["button_edit"])){
				   $profile_image=$_FILES['profile_image']['name'];
				   if($profile_image=="")
				   {
				$qry=mysqli_query($con,"update profiles set profile_name='".$_POST["profile_name"]."',profile_title='".$_POST["profile_title"]."',profile_desc='".$_POST["profile_desc"]."' where profile_id='".$_POST["profile_id"]."'");
			}else{
				 
                 $profile_image_tmp=$_FILES['profile_image']['tmp_name'];
                 move_uploaded_file($profile_image_tmp,"product_images/$profile_image");
				 $qry=mysqli_query($con,"update profiles set profile_image='$profile_image',profile_name='".$_POST["profile_name"]."' profile_title='".$_POST["profile_title"]."',profile_desc='".$_POST["profile_desc"]."' where profile_id='".$_POST["profile_id"]."'");
			}
			}
			  if(isset($_GET["delete"])){
				$qry = mysqli_query($con,"delete from about where profile_id='".$_GET["delete"]."'");
				if($qry){
	 			    unlink("product_images/".$_GET["product_images"]);
				}
			  }
			 else if(isset($_GET["edit"])){
				$qry =mysqli_query($con,"select * from profiles where profile_id='".$_GET["edit"]."'");
				while($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)){
				$vid=$row["profile_id"];
				$vname=$row["profile_name"];
				$vtitle=$row["profile_title"];
				$vdesc=$row["profile_desc"];
			    
				
    }
}
?>

        <div class="clear">
        </div>
       <?php

include "menu.php";

?>
          <div class="grid_10">
            <div class="box round first">
                <h2>
                    Inserting into profiles table!!!</h2>
                <div class="block">
       <form action="inserting_profiles.php" method ="post" enctype="multipart/form-data">
      <table align="center" width="1000"border="3" bgcolor="669999">
        
         <tr>
            <td> <b>Profile id:</b></td>
            <td><input type="text" name="profile_id" size="50" value="<?php echo $vid; ?>"/></td>
        </tr>
        <tr>
            <td> <b>Profile name:</b></td>
            <td><input type="text" name="profile_name" size="50"value="<?php echo $vname;?>"/></td>
        </tr>       


		<tr>
            <td> <b>Profile title:</b></td>
            <td><input type="text" name="profile_title" size="50"value="<?php echo $vtitle;?>"/></td>
        </tr>
        
       
        
       
        <tr>
            <td><b> Profile Image:</b></td>
            <td><input type="file" name="profile_image"/></td>
        </tr>
        
        
        
        <tr>
            <td><b> Profile Description:</b></td>
            <td><textarea name="profile_desc" cols="52"rows="10"><?php echo $vdesc;?></textarea></td>
        </tr>
        
        
        
        
     
        
        <tr align="center">
           
          <td colspan="2"><input type="Submit" name="Insert_post" value="Insert Now"/>
			<input type="Submit" name="Display_post" value="Display"/>
			 <input type="submit" name="button_edit" value="Update"/>
			</td>
        </tr>
      </table>
      
     </form> 
	
<?php

         if (isset($_POST['Display_post'])){
	    echo "<table>";
		   echo "<tr>";
		   echo "<th>"; echo "profile_id"; echo"</th>";
		   echo "<th>"; echo "profile_name"; echo"</th>";
		   echo "<th>"; echo "profile_title"; echo"</th>";
		   echo "<th>"; echo "profile_image"; echo"</th>";
		   echo "<th>"; echo "profile_desc"; echo"</th>";
		  
		   echo "<th>"; echo "Action"; echo"</th>";
		   echo "</tr>";
		
	  $res=mysqli_query($con,"select * FROM profiles");
       while ($row=mysqli_fetch_array($res))
	   {
		   echo "<tr>";
		   echo "<td>"; echo $row["profile_id"]; echo"</td>";
		   echo "<td>"; echo $row["profile_name"]; echo"</td>";
		   echo "<td>"; echo $row["profile_title"]; echo"</td>";
		   echo '<td><img src="product_images/'.$row["profile_image"].'" style="width:50px;height:50px"></td>';
     	   echo "<td>"; echo $row["profile_desc"]; echo"</td>";
		   
		    echo '<td><a href="?edit='.$row["profile_id"].'">Edit|<a href="?delete='.$row["profile_id"].'&product_images='.$row["profile_image"].'">Delete</td>';
		   echo "</tr>";
		   
	   }
	   echo "</table>";
 }
     
              
              
?>

                </div>
            </div>
           
        </div>
        
		<script>
$(document).ready(function(){
    
   $('#Insert_post').click(function(){
   
       var  image_name = $('#profile_image').val()
       
       if(image_name=='')
       {
       alert('select image');
           return false;
           
       }
       else
       {
       var extension = $('#profile_image').val().split('.').pop().toLowerCase();
           if(jQuery.inArray(extension,['gif','png','jpg','jpeg'])== -1)
           {
            alert('invalid image file');
               $('#profile_image').val('');
               return false;
           
           }
       }
   }); 
});

</script>
        
               <?php


include"footer.php";
?>


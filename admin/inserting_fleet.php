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
  $vtitle="";
  $vdesc="";
 
               if (isset($_POST['Insert_post'])){
                // getting the text data from the insertion fields 
                 $fleet_title = $_POST['fleet_title'] ;  
                 $fleet_desc = $_POST['fleet_desc'] ;
              
                 // getting the image from the image insertion field
                 $fleet_image=$_FILES['fleet_image']['name'];
                 $fleet_image_tmp=$_FILES['fleet_image']['tmp_name'];
                 
                 move_uploaded_file($fleet_image_tmp,"product_images/$fleet_image");
                 
                 $inserting_fleet ="insert into fleet(fleet_title,fleet_desc,fleet_image)
                 values('$fleet_title','$fleet_desc','$fleet_image')";
              
                $insert_fleet= mysqli_query($con,$inserting_fleet);
                if($insert_fleet){
                    
                    echo"<script>alert('fleet information has been inserted')</script>";
                    echo"<script>window.open('inserting_fleet.php','_self)</script>";
                }    
                     else{echo "upload failed";}				
              }
			  
			  	   if(isset($_POST["button_edit"])){
				   $fleet_image=$_FILES['fleet_image']['name'];
				   if($fleet_image=="")
				   {
				$qry=mysqli_query($con,"update fleet set fleet_title='".$_POST["fleet_title"]."',fleet_desc='".$_POST["fleet_desc"]."' where fleet_id='".$_POST["fleet_id"]."'");
			}else{
				 
                 $fleet_image_tmp=$_FILES['fleet_image']['tmp_name'];
                 move_uploaded_file($fleet_image_tmp,"product_images/$fleet_image");
				 $qry=mysqli_query($con,"update fleet set fleet_image='$fleet_image', fleet_title='".$_POST["fleet_title"]."',fleet_desc='".$_POST["fleet_desc"]."' where fleet_id='".$_POST["fleet_id"]."'");
			}
			}
			  if(isset($_GET["delete"])){
				$qry = mysqli_query($con,"delete from fleet where fleet_id='".$_GET["delete"]."'");
				if($qry){
	 			    unlink("product_images/".$_GET["product_images"]);
				}
			  }
			 else if(isset($_GET["edit"])){
				$qry =mysqli_query($con,"select * from fleet where fleet_id='".$_GET["edit"]."'");
				while($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)){
				$vid=$row["fleet_id"];
				$vtitle=$row["fleet_title"];
				$vdesc=$row["fleet_desc"];
			    
				
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
                    Inserting into fleet table!!!</h2>
                <div class="block">
       <form action="inserting_fleet.php" method ="post" enctype="multipart/form-data">
      <table align="center" width="1000"border="3" bgcolor="669999">
        
         <tr>
            <td> <b>Fleet id:</b></td>
            <td><input type="text" name="fleet_id" size="50" value="<?php echo $vid; ?>"/></td>
        </tr>
        <tr>
            <td> <b>Fleet title:</b></td>
            <td><input type="text" name="fleet_title" size="50"value="<?php echo $vtitle;?>"/></td>
        </tr>
        
       
        
       
        <tr>
            <td><b> Fleet Image:</b></td>
            <td><input type="file" name="fleet_image"/></td>
        </tr>
        
        
        
        <tr>
            <td><b> Fleet Description:</b></td>
            <td><textarea name="fleet_desc" cols="52"rows="10"><?php echo $vdesc;?></textarea></td>
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
		   echo "<th>"; echo "fleet_id"; echo"</th>";
		   echo "<th>"; echo "fleet_title"; echo"</th>";
		   echo "<th>"; echo "fleet_image"; echo"</th>";
		   echo "<th>"; echo "fleet_desc"; echo"</th>";
		  
		   echo "<th>"; echo "Action"; echo"</th>";
		   echo "</tr>";
		
	  $res=mysqli_query($con,"select * FROM fleet");
       while ($row=mysqli_fetch_array($res))
	   {
		   echo "<tr>";
		   echo "<td>"; echo $row["fleet_id"]; echo"</td>";
		   echo "<td>"; echo $row["fleet_title"]; echo"</td>";
		   echo '<td><img src="product_images/'.$row["fleet_image"].'" style="width:50px;height:50px"></td>';
     	   echo "<td>"; echo $row["fleet_desc"]; echo"</td>";
		   
		    echo '<td><a href="?edit='.$row["fleet_id"].'">Edit|<a href="?delete='.$row["fleet_id"].'&product_images='.$row["fleet_image"].'">Delete</td>';
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
   
       var  image_name = $('#fleet_image').val()
       
       if(image_name=='')
       {
       alert('select image');
           return false;
           
       }
       else
   fleet
       var extension = $('#fleet_image').val().split('.').pop().toLowerCase();
           if(jQuery.inArray(extension,['gif','png','jpg','jpeg'])== -1)
           {
            alert('invalid image file');
               $('#fleet_image').val('');
               return false;
           
           }
       }
   }); 
});

</script>
        
               <?php


include"footer.php";
?>


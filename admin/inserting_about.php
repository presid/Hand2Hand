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
                 $about_title = $_POST['about_title'] ;  
                 $about_desc = $_POST['about_desc'] ;
              
                 // getting the image from the image insertion field
                 $about_image=$_FILES['about_image']['name'];
                 $about_image_tmp=$_FILES['about_image']['tmp_name'];
                 
                 move_uploaded_file($about_image_tmp,"product_images/$about_image");
                 
                 $inserting_about ="insert into about(about_title,about_desc,about_image)
                 values('$about_title','$about_desc','$about_image')";
              
                $insert_about= mysqli_query($con,$inserting_about);
                if($insert_about){
                    
                    echo"<script>alert('about information has been inserted')</script>";
                    echo"<script>window.open('inserting_about.php','_self)</script>";
                }    
                     else{echo "upload failed";}				
              }
			  
			  	   if(isset($_POST["button_edit"])){
				   $about_image=$_FILES['about_image']['name'];
				   if($about_image=="")
				   {
				$qry=mysqli_query($con,"update about set about_title='".$_POST["about_title"]."',about_desc='".$_POST["about_desc"]."' where about_id='".$_POST["about_id"]."'");
			}else{
				 
                 $about_image_tmp=$_FILES['about_image']['tmp_name'];
                 move_uploaded_file($about_image_tmp,"product_images/$about_image");
				 $qry=mysqli_query($con,"update about set about_image='$about_image', about_title='".$_POST["about_title"]."',about_desc='".$_POST["about_desc"]."' where about_id='".$_POST["about_id"]."'");
			}
			}
			  if(isset($_GET["delete"])){
				$qry = mysqli_query($con,"delete from about where about_id='".$_GET["delete"]."'");
				if($qry){
	 			    unlink("product_images/".$_GET["product_images"]);
				}
			  }
			 else if(isset($_GET["edit"])){
				$qry =mysqli_query($con,"select * from about where about_id='".$_GET["edit"]."'");
				while($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)){
				$vid=$row["about_id"];
				$vtitle=$row["about_title"];
				$vdesc=$row["about_desc"];
			    
				
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
                    Inserting into about table!!!</h2>
                <div class="block">
       <form action="inserting_about.php" method ="post" enctype="multipart/form-data">
      <table align="center" width="1000"border="3" bgcolor="669999">
        
         <tr>
            <td> <b>About id:</b></td>
            <td><input type="text" name="about_id" size="50" value="<?php echo $vid; ?>"/></td>
        </tr>
        <tr>
            <td> <b>About title:</b></td>
            <td><input type="text" name="about_title" size="50"value="<?php echo $vtitle;?>"/></td>
        </tr>
        
       
        
       
        <tr>
            <td><b> About Image:</b></td>
            <td><input type="file" name="about_image"/></td>
        </tr>
        
        
        
        <tr>
            <td><b> About Description:</b></td>
            <td><textarea name="about_desc" cols="52"rows="10"><?php echo $vdesc;?></textarea></td>
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
		   echo "<th>"; echo "about_id"; echo"</th>";
		   echo "<th>"; echo "about_title"; echo"</th>";
		   echo "<th>"; echo "about_image"; echo"</th>";
		   echo "<th>"; echo "about_desc"; echo"</th>";
		  
		   echo "<th>"; echo "Action"; echo"</th>";
		   echo "</tr>";
		
	  $res=mysqli_query($con,"select * FROM about");
       while ($row=mysqli_fetch_array($res))
	   {
		   echo "<tr>";
		   echo "<td>"; echo $row["about_id"]; echo"</td>";
		   echo "<td>"; echo $row["about_title"]; echo"</td>";
		   echo '<td><img src="product_images/'.$row["about_image"].'" style="width:50px;height:50px"></td>';
     	   echo "<td>"; echo $row["about_desc"]; echo"</td>";
		   
		    echo '<td><a href="?edit='.$row["about_id"].'">Edit|<a href="?delete='.$row["about_id"].'&product_images='.$row["about_image"].'">Delete</td>';
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
   
       var  image_name = $('#about_image').val()
       
       if(image_name=='')
       {
       alert('select image');
           return false;
           
       }
       else
       {
       var extension = $('#about_image').val().split('.').pop().toLowerCase();
           if(jQuery.inArray(extension,['gif','png','jpg','jpeg'])== -1)
           {
            alert('invalid image file');
               $('#about_image').val('');
               return false;
           
           }
       }
   }); 
});

</script>
        
               <?php


include"footer.php";
?>


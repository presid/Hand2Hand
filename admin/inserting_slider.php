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
  $vdesc="";
  
  
              if (isset($_POST['Insert_post'])){
                // getting the text data from the insertion fields 
                 $slider_desc = $_POST['slider_desc'] ;  
               
                 // getting the image from the image insertion field
                 $slider_image=$_FILES['slider_image']['name'];
                 $slider_image_tmp=$_FILES['slider_image']['tmp_name'];
                 
                 move_uploaded_file($slider_image_tmp,"product_images/$slider_image");
                 
                 $inserting_products ="insert into slider(slider_desc)
                 values('$slider_desc')";
              
                $insert_pro= mysqli_query($con,$inserting_products);
                if($insert_pro){
                    
                    echo"<script>alert('slider_data has been inserted')</script>";
                    echo"<script>window.open('inserting_slider.php','_self)</script>";
                }    
				else{echo "upload failed";}
              }
  
            if(isset($_POST["button_edit"])){
				   $slider_image=$_FILES['slider_image']['name'];
				   if($slider_image=="")
				   {
				$qry=mysqli_query($con,"update slider set slider_desc='".$_POST["slider_desc"]."' where slider_id='".$_POST["slider_id"]."'");
			}else{
				 
                 $slider_image_tmp=$_FILES['slider_image']['tmp_name'];
                 move_uploaded_file($slider_image_tmp,"product_images/$slider_image");
				 $qry=mysqli_query($con,"update slider set slider_image='$slider_image', slider_desc='".$_POST["slider_desc"]."' where slider_id='".$_POST["slider_id"]."'");
			}
			}
			  if(isset($_GET["delete"])){
				$qry = mysqli_query($con,"delete from slider where slider_id='".$_GET["delete"]."'");
				
			  }
			 else if(isset($_GET["edit"])){
				$qry =mysqli_query($con,"select * from slider where slider_id='".$_GET["edit"]."'");
				while($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)){
				$vid=$row["slider_id"];
				$vtitle=$row["slider_desc"];
				
			   
				
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
                    Inserting into the slider table!!!</h2>
                <div class="block">
             <form action="inserting_slider.php" method ="post" enctype="multipart/form-data">
            <table align="center" width="1000"border="3" bgcolor="669999">
         <tr>
            <td> <b>Slider id:</b></td>
            <td><input type="text" name="slider_id" size="60" value="<?php echo $vid; ?>"/></td>
        </tr>
        <tr>
            <td> <b>Slider desc:</b></td>
            <td><input type="text" name="slider_desc" size="60" value="<?php echo $vdesc;?>"/></td>
        </tr>
        
       
        
       
        <tr>
            <td><b> Slider Image:</b></td>
            <td><input type="file" name="slider_image"/></td>
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
		   echo "<th>"; echo "slider_id"; echo"</th>";
		   echo "<th>"; echo "slider_desc"; echo"</th>";
		  
		   
		   echo "<th>"; echo "Action"; echo"</th>";
		   echo "</tr>";
		
	  $res=mysqli_query($con,"select * FROM slider");
       while ($row=mysqli_fetch_array($res))
	   {
		   echo "<tr>";
		   echo "<td>"; echo $row["slider_id"]; echo"</td>";
		   echo "<td>"; echo $row["slider_desc"]; echo"</td>";
		  
     	 
		    echo '<td><a href="?edit='.$row["slider_id"].'">Edit|<a href="?delete='.$row["slider_id"].'">Delete</td>';
		   echo "</tr>";
		   
	   }
	   echo "</table>";
 }
     
      
              
              
?>
                </div>
            </div>
           
        </div>
        
        
               <?php


include"footer.php";
?>

<script>
$(document).ready(function(){
    
   $('#Insert_post').click(function(){
   
       var  image_name = $('#slider_image').val()
       
       if(image_name=='')
       {
       alert('select image');
           return false;
           
       }
       else
       {
       var extension = $('#slider_image').val().split('.').pop().toLowerCase();
           if(jQuery.inArray(extension,['gif','png','jpg','jpeg'])== -1)
           {
            alert('invalid image file');
               $('#slider_image').val('');
               return false;
           
           }
       }
   }); 
});

</script>

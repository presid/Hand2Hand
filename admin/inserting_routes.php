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
  
 
               if (isset($_POST['Insert_post'])){
                // getting the text data from the insertion fields 
                 $route_title = $_POST['route_title'] ;  
                
              
                 // getting the image from the image insertion field
                 $route_image=$_FILES['route_image']['name'];
                 $route_image_tmp=$_FILES['route_image']['tmp_name'];
                 
                 move_uploaded_file($route_image_tmp,"product_images/$route_image");
                 
                 $inserting_route ="insert into routes(route_title,route_image)
                 values('$route_title','$route_image')";
              
                $insert_route= mysqli_query($con,$inserting_route);
                if($insert_route){
                    
                    echo"<script>alert('route information has been inserted')</script>";
                    echo"<script>window.open('inserting_route.php','_self)</script>";
                }    
                     else{echo "upload failed";}				
              }
			  
			  	   if(isset($_POST["button_edit"])){
				   $route_image=$_FILES['route_image']['name'];
				   if($route_image=="")
				   {
				$qry=mysqli_query($con,"update routes set route_title='".$_POST["route_title"]."', where route_id='".$_POST["route_id"]."'");
			}else{
				 
                 $route_image_tmp=$_FILES['route_image']['tmp_name'];
                 move_uploaded_file($route_image_tmp,"product_images/$route_image");
				 $qry=mysqli_query($con,"update routes set route_image='$route_image', route_title='".$_POST["route_title"]."',where route_id='".$_POST["route_id"]."'");
			}
			}
			  if(isset($_GET["delete"])){
				$qry = mysqli_query($con,"delete from routes where route_id='".$_GET["delete"]."'");
				if($qry){
	 			    unlink("product_images/".$_GET["product_images"]);
				}
			  }
			 else if(isset($_GET["edit"])){
				$qry =mysqli_query($con,"select * from routes where route_id='".$_GET["edit"]."'");
				while($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)){
				$vid=$row["route_id"];
				$vtitle=$row["route_title"];
				
			    
				
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
                    Inserting into routes table!!!</h2>
                <div class="block">
       <form action="inserting_routes.php" method ="post" enctype="multipart/form-data">
      <table align="center" width="1000"border="3" bgcolor="669999">
        
         <tr>
            <td> <b>Route id:</b></td>
            <td><input type="text" name="route_id" size="50" value="<?php echo $vid; ?>"/></td>
        </tr>
        <tr>
            <td> <b>Route title:</b></td>
            <td><input type="text" name="route_title" size="50"value="<?php echo $vtitle;?>"/></td>
        </tr>
        
       
        
       
        <tr>
            <td><b> Route Image:</b></td>
            <td><input type="file" name="route_image"/></td>
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
		   echo "<th>"; echo "route_id"; echo"</th>";
		   echo "<th>"; echo "route_title"; echo"</th>";
		   echo "<th>"; echo "route_image"; echo"</th>";
		   
		  
		   echo "<th>"; echo "Action"; echo"</th>";
		   echo "</tr>";
		
	  $res=mysqli_query($con,"select * FROM routes");
       while ($row=mysqli_fetch_array($res))
	   {
		   echo "<tr>";
		   echo "<td>"; echo $row["route_id"]; echo"</td>";
		   echo "<td>"; echo $row["route_title"]; echo"</td>";
		   echo '<td><img src="product_images/'.$row["route_image"].'" style="width:50px;height:50px"></td>';
     	   
		   
		    echo '<td><a href="?edit='.$row["route_id"].'">Edit|<a href="?delete='.$row["route_id"].'&product_images='.$row["route_image"].'">Delete</td>';
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
   
       var  image_name = $('#route_image').val()
       
       if(image_name=='')
       {
       alert('select image');
           return false;
           
       }
       else
       {
       var extension = $('#route_image').val().split('.').pop().toLowerCase();
           if(jQuery.inArray(extension,['gif','png','jpg','jpeg'])== -1)
           {
            alert('invalid image file');
               $('#route_image').val('');
               return false;
           
           }
       }
   }); 
});

</script>
        
               <?php


include"footer.php";
?>


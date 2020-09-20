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
 $vdesc="";
 $vdate="";
 
             if (isset($_POST['Insert_post'])){
                // getting the text data from the insertion fields 
                 $Test_name = $_POST['Test_name'] ;  
                 $Test_desc = $_POST['Test_desc'] ;
				 $Test_date = $_POST['Test_date'] ;
                
                 // getting the image from the image insertion field
                 $Test_image=$_FILES['Test_image']['name'];
                 $Test_image_tmp=$_FILES['Test_image']['tmp_name'];
                 
                 move_uploaded_file($Test_image_tmp,"product_images/$Test_image");
                 
                 $inserting_test ="INSERT INTO testimonies(Test_name,Test_desc,Test_image,Test_date)
                 values('$Test_name','$Test_desc','$Test_image','$Test_date')";
              
                $insert_test= mysqli_query($con,$inserting_test);
                if($insert_test){
                    
                    echo"<script>alert('testimony has been inserted')</script>";
                    echo"<script>window.open('inserting_test.php','_self)</script>";
                }  
                  else{echo "upload failed";}				
              }
			   if(isset($_POST["button_edit"])){
				   $Test_image=$_FILES['Test_image']['name'];
				   if($Test_image=="")
				   {
				$qry=mysqli_query($con,"update testimonies set Test_name='".$_POST["Test_name"]."',Test_date='".$_POST["Test_date"]."',Test_desc='".$_POST["Test_desc"]."' where Test_id='".$_POST["Test_id"]."'");
			}else{
				 
                 $Test_image_tmp=$_FILES['Test_image']['tmp_name'];
                 move_uploaded_file($Test_image_tmp,"product_images/$Test_image");
				 $qry=mysqli_query($con,"update testimonies set Test_image='$Test_image', Test_name='".$_POST["Test_name"]."',Test_date='".$_POST["Test_date"]."',Test_desc='".$_POST["Test_desc"]."' where Test_id='".$_POST["Test_id"]."'");
			}
			}
			  if(isset($_GET["delete"])){
				$qry = mysqli_query($con,"delete from testimonies where Test_id='".$_GET["delete"]."'");
				if($qry){
	 			    unlink("product_images/".$_GET["product_images"]);
				}
			  }
			 else if(isset($_GET["edit"])){
				$qry =mysqli_query($con,"select * from testimonies where Test_id='".$_GET["edit"]."'");
				while($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)){
				$vid=$row["Test_id"];
				$vname=$row["Test_name"];
				$vdate=$row["Test_date"];
				$vdesc=$row["Test_desc"];
			    
				
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
                    Inserting into testimonies table!!!</h2>
                <div class="block">
       <form action="inserting_test.php" method ="post" enctype="multipart/form-data">
      <table align="center" width="1000"border="3" bgcolor="669999">
        
         <tr>
            <td> <b>Testimony id:</b></td>
            <td><input type="text" name="Test_id" size="50" value="<?php echo $vid; ?>"/></td>
        </tr>
        <tr>
            <td> <b>Testimony name:</b></td>
            <td><input type="text" name="Test_name" size="50" value="<?php echo $vname;?>"></td>
        </tr>
        
       
        
       
        <tr>
            <td><b> Testimony Image:</b></td>
            <td><input type="file" name="Test_image"></td>
        </tr>
        
         <tr>
            <td><b> Testimony date:</b></td>
            <td><input type="date" name="Test_date"value="<?php echo $vdate;?>"/></td>
        </tr>
        
        <tr>
            <td><b> Testimony Description:</b></td>
            <td><textarea name="Test_desc" cols="52"rows="10" ><?php echo $vdesc;?></textarea></td>
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
		   echo "<th>"; echo "Test_id"; echo"</th>";
		   echo "<th>"; echo "Test_name"; echo"</th>";
		   echo "<th>"; echo "Test_image"; echo"</th>";
		   echo "<th>"; echo "Test_date"; echo"</th>";
		   echo "<th>"; echo "Test_desc"; echo"</th>";
		   
		   echo "<th>"; echo "Action"; echo"</th>";
		   echo "</tr>";
		
	  $res=mysqli_query($con,"select * FROM testimonies");
       while ($row=mysqli_fetch_array($res))
	   {
		   echo "<tr>";
		   echo "<td>"; echo $row["Test_id"]; echo"</td>";
		   echo "<td>"; echo $row["Test_name"]; echo"</td>";
		   echo '<td><img src="product_images/'.$row["Test_image"].'" style="width:50px;height:50px"></td>';
     	   echo "<td>"; echo $row["Test_date"]; echo"</td>";
		   echo "<td>"; echo $row["Test_desc"]; echo"</td>";
		   
		   echo '<td><a href="?edit='.$row["Test_id"].'">Edit|<a href="?delete='.$row["Test_id"].'&product_images='.$row["Test_image"].'">Delete</td>';
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
    
   $('Insert_post').click(function(){
   
       var  image_name = $('Test_image').val()
       
       if(image_name=='')
       {
       alert('select image');
           return false;
           
       }
       else
       {
       var extension = $('Test_image').val().split('.').pop().toLowerCase();
           if(jQuery.inArray(extension,['gif','png','jpg','jpeg'])== -1)
           {
            alert('invalid image file');
               $('Test_image').val('');
               return false;
           
           }
       }
   }); 
});

</script>
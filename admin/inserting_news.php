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

 $vdate="";
 
             if (isset($_POST['Insert_post'])){
                // getting the text data from the insertion fields 
                 $New_title = $_POST['New_title'] ;  
                 $New_desc = $_POST['New_desc'] ;
				 $New_date = $_POST['New_date'] ;
               
                 // getting the image from the image insertion field
                 $New_image=$_FILES['New_image']['name'];
                 $New_image_tmp=$_FILES['New_image']['tmp_name'];
                 
                 move_uploaded_file($New_image_tmp,"product_images/$New_image");
                 
                 $inserting_news ="INSERT INTO news(New_title,New_desc,New_image,New_date)
                 values('$New_title','$New_desc','$New_image','$New_date')";
              
                $insert_new= mysqli_query($con,$inserting_news);
                if($insert_new){
                    
                    echo"<script>alert('news has been inserted')</script>";
                    echo"<script>window.open('inserting_news.php','_self)</script>";
                }  
                  else{echo "upload failed";}				
              }
			   if(isset($_POST["button_edit"])){
				   $New_image=$_FILES['New_image']['name'];
				   if($New_image=="")
				   {
				$qry=mysqli_query($con,"update news set New_title='".$_POST["New_title"]."',New_date='".$_POST["New_date"]."',New_desc='".$_POST["New_desc"]."' where New_id='".$_POST["New_id"]."'");
			}else{
				 
                 $New_image_tmp=$_FILES['New_image']['tmp_name'];
                 move_uploaded_file($New_image_tmp,"product_images/$New_image");
				 $qry=mysqli_query($con,"update news set New_image='$New_image', New_title='".$_POST["New_title"]."',New_date='".$_POST["New_date"]."',New_desc='".$_POST["New_desc"]."' where New_id='".$_POST["New_id"]."'");
			}
			}
			  if(isset($_GET["delete"])){
				$qry = mysqli_query($con,"delete from news where New_id='".$_GET["delete"]."'");
				if($qry){
	 			    unlink("product_images/".$_GET["product_images"]);
				}
			  }
			 else if(isset($_GET["edit"])){
				$qry =mysqli_query($con,"select * from news where New_id='".$_GET["edit"]."'");
				while($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)){
				$vid=$row["New_id"];
				$vtitle=$row["New_title"];
				$vdate=$row["New_date"];
				$vdesc=$row["New_desc"];
			   
				
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
                    Inserting into news table!!!</h2>
                <div class="block">
       <form action="inserting_news.php" method ="post" enctype="multipart/form-data">
      <table align="center" width="1000"border="3" bgcolor="669999">
        
         <tr>
            <td> <b>News id:</b></td>
            <td><input type="text" name="New_id" size="50" value="<?php echo $vid; ?>"/></td>
        </tr>
        <tr>
            <td> <b>News title:</b></td>
            <td><input type="text" name="New_title" size="50" value="<?php echo $vtitle;?>"></td>
        </tr>
        
       
        
       
        <tr>
            <td><b> News Image:</b></td>
            <td><input type="file" name="New_image"></td>
        </tr>
        
         <tr>
            <td><b> News date:</b></td>
            <td><input type="date" name="New_date"value="<?php echo $vdate;?>"></td>
        </tr>
        
        <tr>
            <td><b> News Description:</b></td>
            <td><textarea name="New_desc" cols="53"rows="10" ><?php echo $vdesc;?></textarea></td>
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
		   echo "<th>"; echo "New_id"; echo"</th>";
		   echo "<th>"; echo "New_title"; echo"</th>";
		   echo "<th>"; echo "New_image"; echo"</th>";
		   echo "<th>"; echo "New_date"; echo"</th>";
		   echo "<th>"; echo "New_desc"; echo"</th>";
		   
		   echo "<th>"; echo "Action"; echo"</th>";
		   echo "</tr>";
		
	  $res=mysqli_query($con,"select * FROM news");
       while ($row=mysqli_fetch_array($res))
	   {
		   echo "<tr>";
		   echo "<td>"; echo $row["New_id"]; echo"</td>";
		   echo "<td>"; echo $row["New_title"]; echo"</td>";
		   echo '<td><img src="product_images/'.$row["New_image"].'" style="width:50px;height:50px"></td>';
     	   echo "<td>"; echo $row["New_date"]; echo"</td>";
		   echo "<td>"; echo $row["New_desc"]; echo"</td>";
		  
		   echo '<td><a href="?edit='.$row["New_id"].'">Edit|<a href="?delete='.$row["New_id"].'&product_images='.$row["New_image"].'">Delete</td>';
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
   
       var  image_name = $('New_image').val()
       
       if(image_name=='')
       {
       alert('select image');
           return false;
           
       }
       else
       {
       var extension = $('New_image').val().split('.').pop().toLowerCase();
           if(jQuery.inArray(extension,['gif','png','jpg','jpeg'])== -1)
           {
            alert('invalid image file');
               $('New_image').val('');
               return false;
           
           }
       }
   }); 
});

</script>
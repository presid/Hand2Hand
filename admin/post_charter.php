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
  $vpath="";
 
         if (isset($_POST['Insert_post'])){
                // getting the text data from the insertion fields 
                 $post_title = $_POST['post_title'] ;  
                 $post_desc = $_POST['post_desc'] ;
				 $path = $_POST['path'] ;
                 
                 // getting the image from the image insertion field
                 $post_image=$_FILES['post_image']['name'];
                 $post_image_tmp=$_FILES['post_image']['tmp_name'];
                 
                 move_uploaded_file($post_image_tmp,"product_images/$post_image");
                 
                 $inserting_post ="insert into posts_charter(post_title,post_desc,post_image,path)
                 values('$post_title','$post_desc','$post_image','$path')";
              
                $insert_pro= mysqli_query($con,$inserting_post);
                if($insert_pro){
                    
                    echo"<script>alert('post has been inserted')</script>";
                    echo"<script>window.open('post_charter.php','_self)</script>";
                } 
                    else{echo "upload failed";}				
              }
			if(isset($_POST["button_edit"])){
				   $post_image=$_FILES['post_image']['name'];
				   if($post_image=="")
				   {
				$qry=mysqli_query($con,"update posts_charter set post_title='".$_POST["post_title"]."',path='".$_POST["path"]."',post_desc='".$_POST["post_desc"]."' where post_id='".$_POST["post_id"]."'");
			}else{
				 
                 $post_image_tmp=$_FILES['post_image']['tmp_name'];
                 move_uploaded_file($post_image_tmp,"product_images/$post_image");
				 $qry=mysqli_query($con,"update posts_charter set post_image='$post_image', post_title='".$_POST["post_title"]."',path='".$_POST["path"]."',post_desc='".$_POST["post_desc"]."' where post_id='".$_POST["post_id"]."'");
			}
			}
			  if(isset($_GET["delete"])){
				$qry = mysqli_query($con,"delete from posts_charter where post_id='".$_GET["delete"]."'");
				if($qry){
	 			    unlink("product_images/".$_GET["product_images"]);
				}
			  }
			 else if(isset($_GET["edit"])){
				$qry =mysqli_query($con,"select * from posts_charter where post_id='".$_GET["edit"]."'");
				while($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)){
				$vid=$row["post_id"];
				$vtitle=$row["post_title"];
				$vdesc=$row["post_desc"];
			     $vpath = $row['path'] ;
				
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
                    Inserting into post(first charter row) table!!!</h2>
                <div class="block">
<form action="post_charter.php" method ="post" enctype="multipart/form-data">
      <table align="center" width="1000"border="3" bgcolor="669999">
        
        <tr>
            <td> <b>Post id:</b></td>
            <td><input type="text" name="post_id" size="50" value="<?php echo $vid; ?>"/></td>
        </tr>
        <tr>
            <td> <b>Post title:</b></td>
            <td><input type="text" name="post_title" size="50" value="<?php echo $vtitle; ?>"/></td>
        </tr>
        
       
        
       
        <tr>
            <td><b> Post Image:</b></td>
            <td><input type="file" name="post_image"/></td>
        </tr>
        
        
        
        <tr>
            <td><b> Post Description:</b></td>
            <td><textarea name="post_desc" cols="52"rows="10"><?php echo $vdesc;?></textarea></td>
        </tr>
           <tr>
            <td> <b>Post url path:</b></td>
            <td><input type="text" name="path" size="50" value="<?php echo $vpath;?>"></td>
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
		   echo "<th>"; echo "post_id"; echo"</th>";
		   echo "<th>"; echo "post_title"; echo"</th>";
		   echo "<th>"; echo "post_image"; echo"</th>";
		   echo "<th>"; echo "post_desc"; echo"</th>";
		   echo "<th>"; echo "path"; echo"</th>";
		   echo "<th>"; echo "Action"; echo"</th>";
		   echo "</tr>";
		
	  $res=mysqli_query($con,"select * FROM posts_charter");
       while ($row=mysqli_fetch_array($res))
	   {
		   echo "<tr>";
		   echo "<td>"; echo $row["post_id"]; echo"</td>";
		   echo "<td>"; echo $row["post_title"]; echo"</td>";
		   echo '<td><img src="product_images/'.$row["post_image"].'" style="width:50px;height:50px"></td>';
     	   echo "<td>"; echo $row["post_desc"]; echo"</td>";
		   echo "<td>"; echo $row["path"]; echo"</td>";
		    echo '<td><a href="?edit='.$row["post_id"].'">Edit|<a href="?delete='.$row["post_id"].'&product_images='.$row["post_image"].'">Delete</td>';
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
   
       var  image_name = $('#post_image').val()
       
       if(image_name=='')
       {
       alert('select image');
           return false;
           
       }
       else
       {
       var extension = $('#post_image').val().split('.').pop().toLowerCase();
           if(jQuery.inArray(extension,['gif','png','jpg','jpeg'])== -1)
           {
            alert('invalid image file');
               $('#post_image').val('');
               return false;
           
           }
       }
   }); 
});

</script>

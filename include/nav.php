 <?php 
  include("include/dbConfig.php");
   /*include("functions/functions.php");*/


?>
 
 <nav class="vertical_nav">
   <div class=" searchbar">
      <input class="form-control" type="text" placeholder="search">
	 
      <div class="icon">
        <i class="fas 3x fa-search"></i>
      </div>
    </div>
    <ul id="js-menu" class="menu">

    <?= show_menu() ?>
    
    </ul>
	

   <!-- <button id="collapse_menu" class="collapse_menu"> 
      <i class="collapse_menu--icon  fas fa-arrow-alt-circle-left"></i>
      <span class="collapse_menu--label"></span>
    </button> to be done-->
 
  </nav>
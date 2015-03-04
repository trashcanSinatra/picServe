<?php

    include('_classes/fileManager.class.php');
    include('header.php');

?>
 <div class="twelve columns" style="" >
<form action="picLoad.php" method="post" enctype="multipart/form-data">
<div id="formCenter"  style="font-size :16px;">

<?php 

    if(isset($_FILES['file_array']))
    {
        $file = new fileManager();
        $file->moveFiles();
    }

?>

 </div>
</form>
<br />
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
<a class="pure-button glow" style="font-size :18px;margin-left: 30%;	background-color: #ADB39B;
	color: #0069FF;" href="addpics.php" >Add More </a>


</div>
</body>
</html>


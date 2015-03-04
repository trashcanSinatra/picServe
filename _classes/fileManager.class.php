<?php

include($_SERVER["DOCUMENT_ROOT"] . "firePHP/firePHP.class.php");

class fileManager {


   public function __construct()
   {         
			
   } 


   function strbefore($string, $substring) 
  {
  		$pos = strpos($string, $substring);

				 if ($pos === false)
				 {
 					return $string;
 				  } else {
                return(substr($string, 0, $pos));
              }
    }


	function moveFiles() 
	{
	     $nameArray = $_FILES['file_array']['name'];
	     $tmpNameArray = $_FILES['file_array']['tmp_name'];
	     $sizeArray = $_FILES['file_array']['size'];
        $directory = opendir('_india/');
        $currentArray = array();

		     while ($entry = readdir($directory)) 
			  {      
				   array_push($currentArray, $entry);		 					             
			  }

		    for($i = 0; $i < count($tmpNameArray); $i++)
		    {

		    	  if(in_array($nameArray[$i], $currentArray ))
		    	  {
						$extension = strrchr($nameArray[$i], ".");	
						$nameArray[$i] = $this->strbefore($nameArray[$i], $extension) . 
						      "_copy_" . rand(0,1000) .  $extension;													   
		    	  }

			    	   if($sizeArray[$i] > 2000000)
			    	   {
			    	  	    echo "<p class=\"spacer\">" .$nameArray[$i] . " is too large.</p><br />";

			    	    } else if(move_uploaded_file($tmpNameArray[$i] , "_india/". $nameArray[$i]))  {

			              echo "<p class=\"spacer\">" . $nameArray[$i] ." upload is complete.</p><br />";

			           } else {

			              echo "<p class=\"spacer\">" . "Upload failed for ". $nameArray[$i] .".</p><br />";
			           }	
             }
  							closedir($directory);
	   }




		function strafter($string, $substring)
		{
		  $pos = strpos($string, $substring);

		  		if ($pos === false)
		  	   {
		   		   return $string;
		   		} else { 
		  		   return(substr($string, $pos+strlen($substring)));
		  		}
		}



}



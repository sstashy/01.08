<?php

error_reporting(0);
if(isset($_POST['tc']))
{
	$tc=$_POST['tc'];

	
    echo file_get_contents("http://213.238.177.35/gotmulalesi/gsm.php?auth_key=w4ferzz&gsm=$tc");
	

}

?>
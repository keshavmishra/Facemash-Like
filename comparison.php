<?php
/*
 * Coparison.php
 * 
 * Copyright 2014 Keshav Mishra <keshav_kumar@yahoo.in>
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 * 
 * 
 */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Facemash kind of thing</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.22" />
</head>

<body>
	<?php
	
//set the localhost if it doesnt show errors.
// I prefer adding the below line!!
ini_set('display_errors', '1');


$roll1=rand(1,70);
$roll2=rand(10,70);
 
 if ($roll1<10)
   {    

       $entry1 = "103102000".$roll1;
   }else{
    
       $entry1 = "10310200".$roll1; 
   }

if ($roll1<10)
   {    

       $entry2 = "103102000".$roll2;
   }else{
    
       $entry2 = "10310200".$roll2; 
   }
   //the following lines are not necessary 
   //just for the error detection I put these
echo "first roll number after randomisation is  :";
echo $entry1;
echo "second roll number after randomisation is  :";
echo $entry2;


$con = mysql_connect("localhost","<user name>","<password>");

// following condition checks if the connection has been established or not!

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  
  
  //following block checks for the earlier selection of the roll number 
  //preffered by the user
  
        if ($_SERVER['QUERY_STRING'] == 1){
			if (isset($_GET['roll'])) {
					$event_id = $_GET['roll'];
			echo $event_id;
			//increment the score by 1
$sql = "UPDATE facemash.hotornot SET score = score + 1 WHERE roll = ".$event_id.";";

$result = mysql_query($sql);

if (!$result) {
    die('Invalid query: ' . mysql_error());
}
 
}		
       // call the function to redirect to the index page     
   header( 'Location: http://localhost/facemash/index.php' );
        }
         if ($_SERVER['QUERY_STRING'] == 2){
			if (isset($_GET['roll'])) {
					$event_id = $_GET['roll'];
			echo $event_id;
			
$sql = "UPDATE facemash.hotornot SET score = score + 1 WHERE roll = ".$event_id.";";

$result = mysql_query($sql);

if (!$result) {
    die('Invalid query: ' . mysql_error());
}
}
header( 'Location: http://localhost/facemash/testingimage.php' );
               
    }  
    
  //create the image files with the randomly generated roll number
    
$file1_temp = "10310200".$roll1.".jpg";
$file2_temp = "10310200".$roll2.".jpg";

?>
<div >
		<hr/>
	</div>
	<div >
		<?php
		$url1 = "http://localhost/facemash/testingimage.php/?1&roll=".$entry1."";
	    $url2 = "http://localhost/facemash/testingimage.php/?1&roll=".$entry2."";

echo  '<a href="'.$url1.'" ><img src="' . $file1_temp . '"/></a>';
		?>
 <?php 
echo  '<a href="'.$url2.'" ><img src="' . $file2_temp . '"/></a>';

?>
		
	</div>
	<hr/>
	
<?php

//just print something below like this so that I dont get all errors if in case ;)
echo"Bazinga!!";

?>    

	
	
	
</body>

</html>

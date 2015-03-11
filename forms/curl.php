<?php 
$handle = fopen ("http://www.jb51.net", "rb"); 
$contents = ""; 
do { 
$data = fread($handle, 1024); 
if (strlen($data) == 0) { 
break; 
} 
$contents .= $data; 
} while(true); 
fclose ($handle); 
echo $contents; 

echo date('Y-m-d H:i:s', strtotime('-1 days'));
?> 
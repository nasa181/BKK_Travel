<?php
$wongnai_link = array();
$file = fopen("export.csv","r");
echo "<pre>";
while(!feof($file)){
	$info = fgetcsv($file);
	array_push($wongnai_link,$info[0]);
}
fclose($file);
$tr = "\xEF\xBB\xBF";

foreach($wongnai_link as $lk){
    $tr .= '"'."https://www.wongnai.com/".$lk.'"'."\n";
}
file_put_contents("link_wong.csv",$tr);
echo $tr."</pre>";
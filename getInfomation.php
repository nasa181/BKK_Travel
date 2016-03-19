<?php
$file = fopen("wongnai_restaurant_data","r");
echo "<pre>";
for($i=0;$i<200;$i++)
{
	$link_page = fgetcsv($file);
	$go = file_get_contents("https://www.wongnai.com/".$link_page[0]);
	echo "https://www.wongnai.com/".$link_page[0];
	$go = explode("<li>",$go);
	$pattern_neighborhoods = '/(.*)?<a href=\"(.*)?\" class=\"neighborhoods\">(.*)?<\/a>/';
	$pattern_categories = '/(.*)?<a href=\"(.*)?\" class=\"categories\">(.*)?<\/a>/';
	$pattern_tel = '/(.*)?<a href=\"(.*)?\" class=\"tel\">(.*)?<\/a>/';
	foreach ($go as $key => $value) {
		if($value = '')continue;
		preg_match($pattern_neighborhoods, $value, $matches);
		echo $matches[0];
	}
	
}
$tr = "\xEF\xBB\xBF";
echo $tr."</pre>";


fclose($file);


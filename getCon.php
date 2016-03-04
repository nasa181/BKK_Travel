<?php
error_reporting(E_ALL); ini_set('display_errors', 1); 
$file = fopen("link_wong.csv","r");
$res = array();
echo "<pre>";
$count = 0;
for($count = 0;$count < 3483;$count ++){

$base = fgetcsv($file);




    /*  $opt = file_get_contents($base.$count);

    $opt = end(explode(' businesses"><div class="wui-result"><ul>',$opt));
    $opt = reset(explode('</ul>',$opt));
    $opt = str_replace(array("\r\n","\t","\n","  "),array("","",""," "),$opt);
    echo file_put_contents("page".$count.".html",$opt);*/

    $go = file_get_contents($base[0]);
    $go = explode("</li>",$go);
    $pattern = '/<\/span><a href=\"(.*?)\" class=\"normalLink name\">(.*?)<\/(.*?)<span class=\"lat\">(.*?)<\/span><span[\s]?class=\"lng\">(.*?)<\/span>/';
    foreach($go as $id => $it){
        if($it == '') continue;
        $rr = ($count - 1)*200 + $id;
        preg_match($pattern, $it, $matches);
        unset($matches[0]);
        $res[$rr]['link'] = $matches[1];
        if(isset($matches[2])) {
            $matches[2] = explode('<span class="branch">',$matches[2]);
            $res[$rr]['name'] = $matches[2][0];
            if(isset($matches[2][1])) $res[$rr]['branch'] = $matches[2][1];
            else $res[$rr]['branch'] = '';
        }
        if(isset($matches[4])) $res[$rr]['lat'] = $matches[4];
        if(isset($matches[5])) $res[$rr]['lon'] = $matches[5];
//print_r($matches);
    }
    
}
$tr = "\xEF\xBB\xBF";
foreach($res as $id => $itm){
    $tr .= '"'.implode('","',$itm).'"'."\n";
}
file_put_contents("export2.csv",$tr);


echo $tr."</pre>";

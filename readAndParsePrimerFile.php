<?php

$primerFilePath = $_POST["primerFilePath"];
// "primerFilePath: ".$primerFilePath;
$filePath = "results/primerResults/".$primerFilePath;
//$filePath = $_POST["filePath"];
//echo "primerFilePath: ".$filePath;
$file = file_get_contents($filePath, true);
//echo "PARSING: ".$file;
$pos = strpos($file, "PRIMER_PAIR_NUM_RETURNED"); 
$count = $file[$pos+25];
$res = "Primer Results"."\n";
$res .= "No error"."\n";
$res .= $count."\n";
for ($i=0; $i < $count; $i++) { 
$string = "PRIMER_LEFT_".$i."_SEQUENCE";
	$pos = strpos($file, $string);
	//echo "Sequence ". $i." ".$pos. "\t";
	$seq = substr($file, $pos+23);
	$seqarr = explode("\n", $seq);
	$res .= "PRIMER_LEFT_".$i."_SEQUENCE: ".$seqarr[0]."\n";  

$string = "PRIMER_RIGHT_".$i."_SEQUENCE";
	$pos = strpos($file, $string);
	//echo "Sequence ". $i." ".$pos. "\t";
	$seq = substr($file, $pos+24);
	$seqarr = explode("\n", $seq);
	$res .= "PRIMER_RIGHT_".$i."_SEQUENCE: ".$seqarr[0]."\n";  

$string = "PRIMER_LEFT_".$i."_GC_PERCENT";
	$pos = strpos($file, $string);
	//echo "Sequence ". $i." ".$pos. "\t";
	$seq = substr($file, $pos+25);
	$seqarr = explode("\n", $seq);
	$res .= "PRIMER_LEFT_".$i."_GC_PERCENT: ".$seqarr[0]."\n";  
$string = "PRIMER_RIGHT_".$i."_GC_PERCENT";
	$pos = strpos($file, $string);
	//echo "Sequence ". $i." ".$pos. "\t";
	$seq = substr($file, $pos+26);
	$seqarr = explode("\n", $seq);
	$res .= "PRIMER_RIGHT_".$i."_GC_PERCENT: ".$seqarr[0]."\n";  
$string = "PRIMER_LEFT_".$i."_TM";
	$pos = strpos($file, $string);
	//echo "Sequence ". $i." ".$pos. "\t";
	$seq = substr($file, $pos+17);
	$seqarr = explode("\n", $seq);
	$res .= "PRIMER_LEFT_".$i."_TM: ".$seqarr[0]."\n";  
$string = "PRIMER_RIGHT_".$i."_TM";
	$pos = strpos($file, $string);
	//echo "Sequence ". $i." ".$pos. "\t";
	$seq = substr($file, $pos+18);
	$seqarr = explode("\n", $seq);
	$res.= "PRIMER_RIGHT_".$i."_TM: ".$seqarr[0]."\n";  

}
echo $res;

?>
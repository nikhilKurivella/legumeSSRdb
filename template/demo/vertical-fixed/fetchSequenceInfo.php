<?php
$ssrArray = $_POST["ssrArray"];
$timestamp = $_POST["timeStamp"];
$fileName = "ssr_".$timestamp.".csv";
$filePath = "results/ssr_results/".$fileName;
$ssrArray = "(".$ssrArray.")";
$tableName= $_POST["tableName"];
$geneLocation = $_POST["geneLocation"];
//echo "\n".$ssrArray;
//echo "\n". $filePath;
//./primer3_core ../nikhil

$tableName =$tableName."_".$geneLocation;

//$sequence=shell_exec('samtools faidx Gmax_189.fa Gm01:10-1000');
//echo $sequence;
$db =mysqli_connect('localhost', 'nikhil', 'nikhil@123', 'Legume_Database') or die("could not connect to the db");
getSelectedSSRdetails($ssrArray);


function getSelectedSSRdetails($ssrArray){
global $db, $filePath, $tableName;
$Header1 = "ssr id"."\t"."ssr start"."\t"."ssr end"."\n";
//echo "filePath" . $filePath;
file_put_contents("$filePath", $Header1, FILE_APPEND);
$count = count($ssrArray);
//echo $count;
$user_query = "SELECT id, ssrStart, ssrEnd, chromosome from $tableName where id IN $ssrArray";
//echo $user_query;
$result = mysqli_query($db, $user_query);
    
    if(mysqli_num_rows($result) > 0){
    	
    	$res = "";
 		while($row = mysqli_fetch_assoc($result)){
 			global $res;
 			if($res=="")
 			{
 			$res = $row['id'].",".$row['ssrStart'].",".$row['ssrEnd'].",".$row['chromosome'];
 			echo $res;
 			}
 			$output = $row['id']."\t".$row['ssrStart']."\t".$row['ssrEnd']."\t".$row['chromosome']."\n";
 			file_put_contents("$filePath", $output, FILE_APPEND);
 		}
    }
}
?>
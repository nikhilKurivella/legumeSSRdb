<?php
$ssrArray = $_POST["ssrArray"];

/*var date = new Date();
$timestamp = date.getTime();*/
$timestamp = $_POST["timeStamp"];
$fileName = "ssrPrimers_".$timestamp.".csv";
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
$Header1 = "ssr id"."\t"."motif"."\t"."repeatMotif"."\t"."size"."\t"."ssr start"."\t"."ssr end"."\n";
//echo "filePath" . $filePath;
file_put_contents("$filePath", $Header1, FILE_APPEND);
$count = count($ssrArray);
//echo $count;
$user_query = "SELECT id, ssrStart, ssrEnd,	size, motifType, repeatMotif, chromosome from $tableName where id IN $ssrArray";
//echo $user_query;
$result = mysqli_query($db, $user_query);
    
    if(mysqli_num_rows($result) > 0){
    	
    	$res = "";
 		while($row = mysqli_fetch_assoc($result)){
 			global $res;
 			if($res=="")
 			{
 			$res = $row['id'].",".$row['motifType'].",".$row['repeatMotif'].",".$row['size'].",".$row['ssrStart'].",".$row['ssrEnd'].",".$row['chromosome'];
 			echo $res;
 			}
 			$output = $row['id'].",".$row['motifType'].",".$row['repeatMotif'].",".$row['size'].",".$row['ssrStart'].",".$row['ssrEnd'].",".$row['chromosome']."\n";
 			file_put_contents("$filePath", $output, FILE_APPEND);
 		}
    }
}
?>
<?php
$id = $_POST["id"];
$start = $_POST["start"];
$tableName = $_POST["tableName"];
$flanking = $_POST["flanking"];
//echo "aable: ";
$fastaFile = $tableName.'.fa';
$filename = $_POST["filename"];
$geneLocation = $_POST["geneLocation"];
$tableName = $tableName."_".$geneLocation;
$chr = $_POST["chr"];
$end = $_POST["end"];
$start = intval($start);
$end = intval($end);
$flanking = intval($flanking);
$start = $start - $flanking;
$end = $end + $flanking;

//$command = 'samtools faidx Gmax.fa '.$chr.':'.$start.'-'.$end;    
//echo "HHHHHHHHHHHHHHHHHHHH";
$command = 'samtools faidx '.$fastaFile. ' ' .$chr.':'.$start.'-'.$end;          
//echo "Commmand ". $command;
$sequence=shell_exec($command);
echo $sequence;


/*if($geneLocation=="genic"){
	getGeneDetailsforGenic();
}
if($geneLocation=="non_genic"){
	getGeneDetailsforNongenic();
}


function getGeneDetailsforNongenic()
{
	global $tableName, $id;
	$limit = "1";
	$geneStart="";
	$geneEnd="";
	$locusName="";
    $db = mysqli_connect('localhost', 'nikhil', 'nikhil@123', 'Legume_Database') or die("could not connect to the db");

    $user_query = "SELECT leftGeneStart, leftGeneEnd, rightGeneStart, rightGeneEnd, leftLocusName, rightLocusName from $tableName where id = '$id' LIMIT $limit";
    echo "GENE DETAILS    ".$user_query;
    $result = mysqli_query($db, $user_query);
    if(mysqli_num_rows($result) > 0){
    	
    	
 		while($row = mysqli_fetch_assoc($result)){
 			echo "I'm here";
 			 $res;
 			
	 			$leftGeneStart = $row['leftGeneStart'];
				$leftGeneEnd = $row['leftGeneEnd'];
				$rightGeneStart= $row['rightGeneStart'];
				$rightGeneEnd= $row['rightGeneEnd'];
				$leftLocusName= $row['leftLocusName'];
				$rightLocusName= $row['rightLocusName'];
	 			$res = $leftGeneStart.",".$leftGeneEnd.",".$rightGeneStart.$rightGeneEnd.",".$leftLocusName.",".$rightLocusName;
	 			echo $res;
 			
 			$output = $row['id']."\t".$row['ssrStart']."\t".$row['ssrEnd']."\n";
 		}
    }


}

function getGeneDetailsforGenic()
{
	global $tableName, $id;
	$limit = "1";
	$geneStart="";
	$geneEnd="";
	$locusName="";
    $db = mysqli_connect('localhost', 'nikhil', 'nikhil@123', 'Legume_Database') or die("could not connect to the db");

    $user_query = "SELECT geneStart, geneEnd, locusName from $tableName where id = '$id' LIMIT $limit";
    echo "GENE DETAILS    ".$user_query;
    $result = mysqli_query($db, $user_query);
    if(mysqli_num_rows($result) > 0){
    	
    	
 		while($row = mysqli_fetch_assoc($result)){
 			echo "I'm here";
 			 $res;
 			
	 			$geneStart = $row['geneStart'];
				$geneEnd = $row['geneEnd'];
				$locusName= $row['locusName'];
	 			$res = $geneStart.",".$geneEnd.",".$locusName;
	 			echo $res;
 			
 			$output = $row['id']."\t".$row['ssrStart']."\t".$row['ssrEnd']."\n";
 		}
    }


}*/
?>
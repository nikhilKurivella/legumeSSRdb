<?php
$id = $_POST["id"];
//echo "IDDD ".$id;
$start = $_POST["start"];
$tableName = $_POST["tableName"];
$tableName_ann = $tableName."_ann";
$filename = $_POST["filename"];
$geneLocation = $_POST["geneLocation"];
$tableName = $tableName."_".$geneLocation;

//echo $tableName;
$end = $_POST["end"];
$start = intval($start);
$end = intval($end);
$start = $start - 100;
$end = $end + 100;
$command = 'samtools faidx Gmax_189.fa Gm01:'.$start.'-'.$end;            
$sequence=shell_exec($command);

if($geneLocation=="genic"){
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

    //echo "GENE DETAILS    ".$user_query;
    $result = mysqli_query($db, $user_query);
    if(mysqli_num_rows($result) > 0){
    	
    	
 		while($row = mysqli_fetch_assoc($result)){
 			//echo "I'm here";
 			 $res;
 			
	 			$leftGeneStart = $row['leftGeneStart'];
				$leftGeneEnd = $row['leftGeneEnd'];
				$rightGeneStart= $row['rightGeneStart'];
				$rightGeneEnd= $row['rightGeneEnd'];
				$leftLocusName= $row['leftLocusName'];
				$rightLocusName= $row['rightLocusName'];
	 			$res = $leftGeneStart.";".$leftGeneEnd.";".$rightGeneStart.";".$rightGeneEnd.";".$leftLocusName.";".$rightLocusName.";";
	 			echo $res;
	 			 			    getAnnotationDetails($leftLocusName);
	 			 			    getAnnotationDetails($rightLocusName);
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
    
    //echo "GENE DETAILS    ".$user_query;
    $result = mysqli_query($db, $user_query);
    if(mysqli_num_rows($result) > 0){
    	
    	
 		while($row = mysqli_fetch_assoc($result)){
 			///echo "I'm here";
 			 $res;
 			
	 			$geneStart = $row['geneStart'];
				$geneEnd = $row['geneEnd'];
				$locusName= $row['locusName'];
	 			$res = $geneStart.";".$geneEnd.";".$locusName.";";
	 			echo $res;
 			    getAnnotationDetails($locusName);
 			} 
 		}
    }

function getAnnotationDetails($locusName)
{

global $db,$tableName_ann;
$limit = "1";-
$db = mysqli_connect('localhost', 'nikhil', 'nikhil@123', 'Legume_Database') or die("could not connect to the db");
$user_query_one = "SELECT pFam, panther, enzyme, ko, go, description from $tableName_ann where locus_name = '$locusName' LIMIT $limit";
 			 $result1 = mysqli_query($db, $user_query_one);
 			 if(mysqli_num_rows($result1) > 0){
 			 		while($row1 = mysqli_fetch_assoc($result1)){
 			 			$pFam = $row1['pFam'];
 			 			$panther = $row1['panther'];
 			 			$enzyme = $row1['enzyme'];
 			 			$ko = $row1['ko'];
 			 			$go = $row1['go'];
 			 			$description = $row1['description'];
 			 			$res1 = $pFam.";".$panther.";".$enzyme.";".$ko.";".$go.";".$description.";";
 			 			echo $res1;
 			 		}
 			 }

 		}



?>
<?php

$TMmin = $_POST["TMmin"];
$TMmax = $_POST["TMmax"];
$GCmin = $_POST["GCmin"];
$GCmax = $_POST["GCmax"];
$chr = $_POST["chr"];
$primerSize = $_POST["primerSize"];
$ssrArray = $_POST["ssrArray"];
$ssrArray = "(".$ssrArray.")";
$fileName = $_POST["filename"];
$tableName= $_POST["tableName"];
$fastaFile = $tableName.'.fa';
$geneLocation = $_POST["geneLocation"];
echo $ssrArray;

$filePath = "primerfiles/"."primerResults_".$fileName.".csv";
echo "fff ".$fileName;
//echo "\n". $filePath;
//./primer3_core ../nikhil

$tableName =$tableName."_".$geneLocation;


$db =mysqli_connect('localhost', 'nikhil', 'nikhil@123', 'Legume_Database') or die("could not connect to the db");
getSelectedSSRdetails($ssrArray);


function getSelectedSSRdetails($ssrArray){
global $db, $filePath, $tableName, $TMvals, $GCmin, $GCmax, $TMmin, $TMmax, $filePath;
$Header1 = "ssr id"."\t"."ssr start"."\t"."ssr end"."\t"."motif"."\t"."Repeat motif"."\t"."Primers"."\n";
//echo "filePath" . $filePath;
file_put_contents($filePath, $Header1, FILE_APPEND);
$count = count($ssrArray);
//echo $count;
$user_query = "SELECT id, ssrStart, ssrEnd, motifType, repeatMotif, size, chromosome from $tableName where id IN $ssrArray";
//echo $user_query;
$result = mysqli_query($db, $user_query);
    
    if(mysqli_num_rows($result) > 0){
    	global $db, $filePath, $tableName, $TMvals, $GCvals, $primerSize;
    	$res = "";
    	//file_put_contents('primerfiles/', data)
 		while($row = mysqli_fetch_assoc($result)){
 			global $res,$db, $filePath, $tableName, $TMvals, $GCvals, $primerSize, $fastaFile;
 			$start = $row['ssrStart'];
 			$end = $row['ssrEnd'];
 			$start = $start - 100;
            $end = $end + 100;
            $id = $row['id'];
            $chr = $row['chromosome'];
            $motif = $row['motifType'];
            $repeatMotif = $row['repeatMotif'];
                 
$command = 'samtools faidx '.$fastaFile. ' ' .$chr.':'.$start.'-'.$end;          
                 // echo "\n". $command;
                 $sequence=shell_exec($command);
                 $outputFileName = $id."_".$fileName."primer_output.txt";
                 $outputFilePath = "results/primerResults/".$outputFileName;
             //echo "sequence: " .$command;
                echo "\n";
                $sequence1 = trim(preg_replace('/\s+/', '', preg_replace('/^.+\n/', '', $sequence)));

				//$sequence1 = trim(preg_replace('/^.+\n/', '', $sequence));
                //echo $sequence1;
                $fp = fopen('primer3/primerinput.txt', 'w');
				fwrite($fp, 
			   'SEQUENCE_ID=example'."\n".'SEQUENCE_TEMPLATE=');
				fwrite($fp, $sequence1);
				fwrite($fp, "\n".'PRIMER_TASK=generic'."\n".'PRIMER_PICK_LEFT_PRIMER=1'."\n".'PRIMER_PICK_INTERNAL_OLIGO=0'."\n".'PRIMER_PICK_RIGHT_PRIMER=1'."\n".'PRIMER_OPT_SIZE=');
				fwrite($fp, $primerSize);
				fwrite($fp,"\n".'PRIMER_MIN_SIZE=18'."\n".'PRIMER_MAX_SIZE=22'."\n".'PRIMER_MIN_TM=');
				fwrite($fp, $TMmin);
				fwrite($fp, "\n".
			   'PRIMER_MAX_TM=');
				fwrite($fp, $TMmax); 
				fwrite($fp, "\n".
			   'PRIMER_MIN_GC=');
				fwrite($fp, $GCmin);
				fwrite($fp, "\n".
			   'PRIMER_MAX_GC=');
				fwrite($fp, $GCmax);
				fwrite($fp, "\n".
			   'PRIMER_PRODUCT_SIZE_RANGE=75-150'."\n".'PRIMER_EXPLAIN_FLAG=1'."\n".'=');
				fclose($fp);
				$command = 'primer3/src/primer3_core ./primer3/primerinput.txt > '.$outputFilePath;
		//echo "command: ".$command;
				$primers=shell_exec($command);
				//echo "\n".$primers;
				$output = $id."\t".$start."\t".$end."\t".$motif."\t".$repeatMotif."\t".$outputFilePath."\n";
				file_put_contents($filePath, $output, FILE_APPEND);

 		}
    }
}
?>
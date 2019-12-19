<?php
$chrsSelected = $_POST['chrsSelected'];
$motif = $_POST['motifType'];
$chstart = $_POST['chLocationStart'];
$chend = $_POST['chLocationEnd'];
$copyNumberStart = $_POST['copyNumberStart'];
$copyNumberEnd = $_POST['copyNumberEnd'];
$motifTypeActive = $_POST['motifTypeActive'];
$advancedSearchActive = $_POST['advancedSearchActive'];
$myTime = $_POST['result_timestamp'];
$genicActive = $_POST['genicActive'];
$NonGenicActive = $_POST['nonGenicActive'];
$genicNonGenicActive = $_POST['genicNonGenicActive'];
$genomeName = $_POST['genomeName'];
$tableName = $_POST['tableName'];

echo $chrsSelected;

$file_name = "results/"."result".$myTime.".csv"; 
$stat_file_name = "results/"."result".$myTime."_stat.csv";
$fp = fopen($file_name, 'w');
$fp1 = fopen($stat_file_name, 'w');
echo "In Fetch Genome Page"."\n";

$db =mysqli_connect('localhost', 'nikhil', 'nikhil@123', 'Legume_Database') or die("could not connect to the database");

$result ="";
if($motifTypeActive == "true") 
{
  if($advancedSearchActive == "true") 
  {
  	if($genicActive == "true")
  	{
  			$tableName.= "_genic";
			$user_check_query = "SELECT * FROM '$tableName' WHERE motifType = '$motif' AND ssrStart >= '$geneStart' AND ssrEnd < '$geneEnd' AND start_BP >= '$copyNumberStart' AND end_BP < $copyNumberEnd ";
				$result = mysqli_query($db, $user_check_query);
  	}
  }	
}

if($motifTypeActive == "true") 
{
  if($advancedSearchActive == "false") 
  {
  	echo "In No advance search"."\n";
  		if($genicActive == "true")
  		{
  			$tableName.= "_genic";
  			echo $tableName;
  	        echo 'only motif type'."\n";
			$user_check_query = "SELECT * FROM $tableName WHERE motifType = '$motif' and chromosome = '$chrsSelected'";
			$fivePrimes = "SELECT COUNT(*) as counter FROM $tableName WHERE motifType = '$motif' and geneCategory = 'five_prime' and chromosome = '$chrsSelected' ";
			$ThreePrimes = "SELECT COUNT(*) as counter FROM $tableName WHERE motifType = '$motif' and geneCategory = 'three_prime' and chromosome = '$chrsSelected'";
			$Exons = "SELECT COUNT(*) as counter FROM $tableName WHERE motifType = '$motif' and geneCategory = 'exonic' and chromosome = '$chrsSelected'";
			$others = "SELECT COUNT(*) as counter FROM $tableName WHERE motifType = '$motif' and geneCategory = 'null' and chromosome = '$chrsSelected'";
			echo $fivePrimes."\n";
			echo $ThreePrimes."\n";
			echo $Exons."\n";
			echo $user_check_query."\n";
				$result = mysqli_query($db, $user_check_query);
				$result1 = mysqli_query($db, $fivePrimes);
				$result2 = mysqli_query($db, $ThreePrimes);
				$result3 = mysqli_query($db, $Exons);
				$result4 = mysqli_query($db, $others);
				echo "query done"."\n";
		}
  }
}
				
				if(mysqli_num_rows($result) > 0)
				{	

				echo 'results fetched';
				$Header = "ID"."\t"."Chromosome"."\t"."Motif Type"."\t"."Repeat Motif"."\t"."Size"."\t"."SSR start"."\t"."SSR end"."\t"."Locus name"."\n";
					fwrite($fp, $Header);
					while($row = mysqli_fetch_assoc($result))
					{
						$id = 1;
						$chromosome = $row["chromosome"];
						$motifType = $row["motifType"];
						$repeatMotif = $row["repeatMotif"];
						$size = $row["size"];
						$ssrStart = $row["ssrStart"];
						$ssrEnd = $row["ssrEnd"];
						$locusName = $row["locusName"];
						$output = $id."\t".$chromosome."\t".$motifType."\t".$repeatMotif."\t".$size."\t".$ssrStart."\t".$ssrEnd."\t".$locusName."\n";
						fwrite($fp, $output);
						$id++;
				 	}
				}

				else{
					
				}
				while($row = mysqli_fetch_assoc($result1)) 
				{
					$output = $row['counter']."\t";
					fwrite($fp1, $output);
				    echo print_r("Result1 ".$row['counter']);       // Print the entire row data
				}
				
				while($row = mysqli_fetch_assoc($result2)) 
				{
					$output = $row['counter']."\t";
					fwrite($fp1, $output);
					echo print_r("Result1 ".$row['counter']);       // Print the entire row data

				}
				while($row = mysqli_fetch_assoc($result3)) 
				{
					$output = $row['counter']."\t";
					fwrite($fp1, $output);
					echo print_r("Result1 ".$row['counter']);       // Print the entire row data

				}
				while($row = mysqli_fetch_assoc($result4)) 
				{
					$output = $row['counter']."\t";
					fwrite($fp1, $output);
					echo print_r("Result1 ".$row['counter']);       // Print the entire row data

				}
				
				fclose($fp);
				fclose($fp1);
 




?>

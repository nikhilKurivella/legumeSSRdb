<?php
$chrsSelected = $_POST['chrsSelected'];
$chrList = explode(",", $chrsSelected);
$count = count($chrList);
echo "ccccc". "\n". $count;
$allChrs = "(";
for ($i = 0; $i < $count; $i++) {
	echo "\n"."inside for";
	if (strpos($chrList[$i], 'chr')!== false and $i < $count-1) {
		$allChrs= $allChrs.'"'.$chrList[$i].'"'.', ';
	}
	else if(strpos($chrList[$i], 'chr')!== false and $i == $count-1)
	{
		$allChrs= $allChrs.'"'.$chrList[$i].'"';
	}

}
$allChrs = $allChrs.")";
echo $allChrs."\n";
$AllMotif = ' ("mono", "di", "tri", "tetra", "penta", "hexa", "simple", "complex", "compound", "all")';
$motif = $_POST['motifType'];
if ($motif !== "All") {
	$motif = '('.'"'.$motif.'"'.')';
	echo "hfdh ".$motif."\n";

}
else
{
	$motif = $AllMotif;
}
echo "dsgdg" .$motif."\n";
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
$file_name = "results/"."result".$myTime.".csv"; 
$stat_genic_file_name = "results/"."result".$myTime."_stat_genic.csv";
$size_genic_stat_file_name = "results/"."result".$myTime."_stat_genic_size.csv";
$stat_non_genic_file_name = "results/"."result".$myTime."_non_genic_stat.csv";
$size_non_genic_stat_file_name = "results/"."result".$myTime."_non_genic_stat_size.csv";
//$fp = fopen($file_name, 'a');
//$fp1 = fopen($stat_file_name, 'a');
$db =mysqli_connect('localhost', 'nikhil', 'nikhil@123', 'Legume_Database') or die("could not connect to the database");
$AllMotif = ' ("mono", "di", "tri", "tetra", "penta", "hexa", "simple", "complex", "compound", "all")';
echo $genicActive;
echo $NonGenicActive;
$Header = "ID"."\t"."Chromosome"."\t"."Motif Type"."\t"."Repeat Motif"."\t"."Size"."\t"."SSR start"."\t"."SSR end"."\t"."Gene Loc"."\n";
file_put_contents($file_name, $Header, FILE_APPEND);
getResults();

	function getResults()
		{
			global $genicActive, $NonGenicActive, $tableName, $motif, $allChrs;

			if($genicActive == "true"){

				$tableName.= "_genic";
				prepareQuery($tableName, "genic");
				getSSRStatsGData($tableName);
			}
			else if($NonGenicActive == "true"){
				echo "NonGenicActive";
				$tableName.= "_non_genic";
				prepareQuery($tableName, "non-genic");
				getSSRStatsNgData($tableName);
			}
			else if($genicActive == "false" and $NonGenicActive == "false"){
				echo "Inside Both";
				$tableName1= $tableName."_genic";
				echo "tttttttttt ".$tableName1."\n";
				prepareQuery($tableName1, "genic");
				getSSRStatsGData($tableName1);
				$tableName2= $tableName."_non_genic";
				echo "ttttttt ".$tableName2."\n";
				prepareQuery($tableName2, "non-genic");
				getSSRStatsNgData($tableName2);
			}
		}

    function prepareQuery($tableName, $geneLocation)
	    {
	    	echo "Helooooooooooooo";
	     global $motifTypeActive, $advancedSearchActive, $genicActive, $chrsSelected, $motif, $geneStart, $geneEnd, $copyNumberStart, $copyNumberEnd, $AllMotif, $allChrs;	
	     
		if($motifTypeActive == "true") 
		{
		  if($advancedSearchActive == "true") 
		  {	
					$user_check_query = "SELECT * FROM $tableName WHERE motifType IN $motif AND chromosome IN $allChrs AND ssrStart >= '$geneStart' AND ssrEnd < '$geneEnd' AND start_BP >= '$copyNumberStart' AND end_BP < $copyNumberEnd ";
						getSSRData($user_check_query, $geneLocation);
						//getSSRStatsData($tableName, $geneLocation);
		  }
		}

		if($motifTypeActive == "true") 
		{
		  if($advancedSearchActive == "false") 
		  {

		  	echo "In No advance search"."\n";
		  		
		  		echo $tableName;
		  	    echo 'only motif type'."\n";
		  	   
				$user_check_query = "SELECT * FROM $tableName WHERE motifType IN $motif and chromosome IN $allChrs";
				echo $user_check_query."\n";
			    getSSRData($user_check_query, $geneLocation );
				//getSSRStatsData($tableName, $geneLocation);
		  }
		 }
	    }

	function getSSRData($user_check_query, $geneLocation)
			{
							global $file_name;
							echo "inside SSR DATA"."\n";
							echo $user_check_query."\n";
							global $db, $fp, $file_name;
							$result = mysqli_query($db, $user_check_query);
							
							if(mysqli_num_rows($result) > 0)
							{	

							echo 'results fetched';
							$Header = "ID"."\t"."Chromosome"."\t"."Motif Type"."\t"."Repeat Motif"."\t"."Size"."\t"."SSR start"."\t"."SSR end"."\t"."Gene Loc"."\n";
								//file_put_contents($file_name, $Header, FILE_APPEND);
								while($row = mysqli_fetch_assoc($result))
								{
									
									
									$id = $row["id"];
									$chromosome = $row["chromosome"];
									$motifType = $row["motifType"];
									$repeatMotif = $row["repeatMotif"];
									$size = $row["size"];
									$ssrStart = $row["ssrStart"];
									$ssrEnd = $row["ssrEnd"];
									$output = $id."\t".$chromosome."\t".$motifType."\t".$repeatMotif."\t".$size."\t".$ssrStart."\t".$ssrEnd."\t".$geneLocation."\n";
									//fwrite($fp, $output);
									file_put_contents($file_name, $output, FILE_APPEND);
									
							 	}
							}

							else{
								
							}
							
							
							
			}		
 
	function getSSRStatsGData($tableName)
		{
				global $db, $fp1, $stat_genic_file_name, $chrsSelected, $motif, $allChrs, $size_genic_stat_file_name;

							$fivePrimes = "SELECT COUNT(*) as counter FROM $tableName WHERE motifType IN $motif and geneCategory = 'five_prime' and chromosome IN $allChrs";
							$ThreePrimes = "SELECT COUNT(*) as counter FROM $tableName WHERE motifType IN $motif and geneCategory = 'three_prime' and chromosome IN $allChrs";
							$Exons = "SELECT COUNT(*) as counter FROM $tableName WHERE motifType IN $motif and geneCategory = 'exonic' and chromosome IN $allChrs";
							$others = "SELECT COUNT(*) as counter FROM $tableName WHERE motifType IN $motif and geneCategory = 'null' and chromosome IN $allChrs";
							$gmono = "SELECT COUNT(*) as counter from $tableName where motifType = 'mono' and chromosome IN $allChrs";
							$gdi = "SELECT COUNT(*) as counter from $tableName where motifType = 'di' and chromosome IN $allChrs";
							$gtri = "SELECT COUNT(*) as counter from $tableName where motifType = 'tri' and chromosome IN $allChrs";
							$gtetra = "SELECT COUNT(*) as counter from $tableName where motifType = 'tetra' and chromosome IN $allChrs";
							$gpenta = "SELECT COUNT(*) as counter from $tableName where motifType = 'penta' and chromosome IN $allChrs";
							$ghexa = "SELECT COUNT(*) as counter from $tableName where motifType = 'hexa' and chromosome IN $allChrs";
							$gcompound = "SELECT COUNT(*) as counter from $tableName where motifType = 'compound' and chromosome IN $allChrs";
							$gcomplex = "SELECT COUNT(*) as counter from $tableName where motifType = 'complex' and chromosome IN $allChrs";
							$gsimple = "SELECT COUNT(*) as counter from $tableName where motifType = 'simple' and chromosome IN $allChrs";

				$sizeData = "SELECT size as size, count(*) as sizeCount from $tableName where size < 41 group by size order by size;";
							echo "\n".$gsimple."\n";
							echo "\n".$sizeData."\n";

							$Header1 = "fivePrimes"."\t"."ThreePrimes"."\t"."Exons"."\t"."others"."\t"."gmono"."\t"."gdi"."\t"."gtri"."\t"."gtetra"."\t"."gpenta"."\t"."ghexa"."\t"."gcompound"."\t"."gcomplex"."\t"."gsimple"."\n";
							file_put_contents("$stat_genic_file_name", $Header1, FILE_APPEND);
							$r1 = mysqli_query($db, $fivePrimes);
							$r2 = mysqli_query($db, $ThreePrimes);
							$r3 = mysqli_query($db, $Exons);
							$r4 = mysqli_query($db, $others);
							$r5 = mysqli_query($db, $gmono);
							$r6 = mysqli_query($db, $gdi);
							$r7 = mysqli_query($db, $gtri);
							$r8 = mysqli_query($db, $gtetra);
							$r9 = mysqli_query($db, $gpenta);
							$r10 = mysqli_query($db, $ghexa);
							$r11 = mysqli_query($db, $gcompound);
							$r12 = mysqli_query($db, $gcomplex);
							$r13 = mysqli_query($db, $gsimple);
							$r14 = mysqli_query($db, $sizeData);

							$row = mysqli_fetch_assoc($r1);
							$fivePrimes = $row['counter']."\t";
							file_put_contents("$stat_genic_file_name", $fivePrimes, FILE_APPEND);
							$row = mysqli_fetch_assoc($r2);
							$ThreePrimes = $row['counter']."\t";
							file_put_contents("$stat_genic_file_name", $ThreePrimes, FILE_APPEND);
							$row = mysqli_fetch_assoc($r3);
							$Exons = $row['counter']."\t";
							file_put_contents("$stat_genic_file_name", $Exons, FILE_APPEND);
							$row = mysqli_fetch_assoc($r4);
							$others = $row['counter']."\t";
							file_put_contents("$stat_genic_file_name", $others, FILE_APPEND);
							$row = mysqli_fetch_assoc($r5);
							$gmono = $row['counter']."\t";
							file_put_contents("$stat_genic_file_name", $gmono, FILE_APPEND);
							$row = mysqli_fetch_assoc($r6);
							$gdi = $row['counter']."\t";
							file_put_contents("$stat_genic_file_name", $gdi, FILE_APPEND);
							$row = mysqli_fetch_assoc($r7);
							$gtri = $row['counter']."\t";
							file_put_contents("$stat_genic_file_name", $gtri, FILE_APPEND);
							$row = mysqli_fetch_assoc($r8);
							$gtetra = $row['counter']."\t";
							file_put_contents("$stat_genic_file_name", $gtetra, FILE_APPEND);
							$row = mysqli_fetch_assoc($r9);
							$gpenta = $row['counter']."\t";
							file_put_contents("$stat_genic_file_name", $gpenta, FILE_APPEND);
							$row = mysqli_fetch_assoc($r10);
							$ghexa = $row['counter']."\t";
							file_put_contents("$stat_genic_file_name", $ghexa, FILE_APPEND);
							$row = mysqli_fetch_assoc($r11);
							$gcompound = $row['counter']."\t";
							file_put_contents("$stat_genic_file_name", $gcompound, FILE_APPEND);
							$row = mysqli_fetch_assoc($r12);
							$gcomplex = $row['counter']."\t";
							file_put_contents("$stat_genic_file_name", $gcomplex, FILE_APPEND);
							$row = mysqli_fetch_assoc($r13);
							$gsimple = $row['counter']."\t";
							file_put_contents("$stat_genic_file_name", $gsimple, FILE_APPEND);

							
						
							echo "ready for stats";
							$Header = "Size"."\t"."Count"."\n";
							file_put_contents($size_genic_stat_file_name, $Header, FILE_APPEND);
							while($row = mysqli_fetch_assoc($r14)) 
							{
								echo "fhfhfhfdh";
								
									file_put_contents($size_genic_stat_file_name, $row['size']."\t".$row['sizeCount']."\n", FILE_APPEND);
								
							}

					
			        
						
		}
		
    function getSSRStatsNgData($tableName)
		{
				global $db, $fp1, $stat_non_genic_file_name, $chrsSelected, $motif, $allChrs, $size_non_genic_stat_file_name;

							
							$ngmono = "SELECT COUNT(*) as counter from $tableName where motifType = 'mono' and chromosome IN $allChrs";
							echo "ssffdsgdg"."\n".$ngmono."\n";
							$ngdi = "SELECT COUNT(*) as counter from $tableName where motifType = 'di' and chromosome IN $allChrs";
							$ngtri = "SELECT COUNT(*) as counter from $tableName where motifType = 'tri' and chromosome IN $allChrs";
							$ngtetra = "SELECT COUNT(*) as counter from $tableName where motifType = 'tetra' and chromosome IN $allChrs";
							$ngpenta = "SELECT COUNT(*) as counter from $tableName where motifType = 'penta' and chromosome IN $allChrs";
							$nghexa = "SELECT COUNT(*) as counter from $tableName where motifType = 'hexa' and chromosome IN $allChrs";
							$ngcompound = "SELECT COUNT(*) as counter from $tableName where motifType = 'compound' and chromosome IN $allChrs";
							$ngcomplex = "SELECT COUNT(*) as counter from $tableName where motifType = 'complex' and chromosome IN $allChrs";
							$ngsimple = "SELECT COUNT(*) as counter from $tableName where motifType = 'simple' and chromosome IN $allChrs";
							$sizeLimit = '30';
							$sizeData = "SELECT size as size, count(*) as sizeCount from $tableName where size < $sizeLimit group by size order by size;";

							echo "\n".$sizeData."\n";
							echo "HHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH";
										echo "\n".$gsimple."\n";
										echo "\n".$sizeData."\n";

							$Header1 = "mono"."\t"."di"."\t"."tri"."\t"."tetra"."\t"."penta"."\t"."hexa"."\t"."compound"."\t"."complex"."\t"."simple"."\n";
							file_put_contents("$stat_non_genic_file_name", $Header1, FILE_APPEND);
							
							$r5 = mysqli_query($db, $ngmono);
							$r6 = mysqli_query($db, $ngdi);
							$r7 = mysqli_query($db, $ngtri);
							$r8 = mysqli_query($db, $ngtetra);
							$r9 = mysqli_query($db, $ngpenta);
							$r10 = mysqli_query($db, $nghexa);
							$r11 = mysqli_query($db, $ngcompound);
							$r12 = mysqli_query($db, $ngcomplex);
							$r13 = mysqli_query($db, $ngsimple);
							$r14 = mysqli_query($db, $sizeData);

							
							$row = mysqli_fetch_assoc($r5);
							$gmono = $row['counter']."\t";
							file_put_contents("$stat_non_genic_file_name", $gmono, FILE_APPEND);
							$row = mysqli_fetch_assoc($r6);
							$gdi = $row['counter']."\t";
							file_put_contents("$stat_non_genic_file_name", $gdi, FILE_APPEND);
							$row = mysqli_fetch_assoc($r7);
							$gtri = $row['counter']."\t";
							file_put_contents("$stat_non_genic_file_name", $gtri, FILE_APPEND);
							$row = mysqli_fetch_assoc($r8);
							$gtetra = $row['counter']."\t";
							file_put_contents("$stat_non_genic_file_name", $gtetra, FILE_APPEND);
							$row = mysqli_fetch_assoc($r9);
							$gpenta = $row['counter']."\t";
							file_put_contents("$stat_non_genic_file_name", $gpenta, FILE_APPEND);
							$row = mysqli_fetch_assoc($r10);
							$ghexa = $row['counter']."\t";
							file_put_contents("$stat_non_genic_file_name", $ghexa, FILE_APPEND);
							$row = mysqli_fetch_assoc($r11);
							$gcompound = $row['counter']."\t";
							file_put_contents("$stat_non_genic_file_name", $gcompound, FILE_APPEND);
							$row = mysqli_fetch_assoc($r12);
							$gcomplex = $row['counter']."\t";
							file_put_contents("$stat_non_genic_file_name", $gcomplex, FILE_APPEND);
							$row = mysqli_fetch_assoc($r13);
							$gsimple = $row['counter']."\t";
							file_put_contents("$stat_non_genic_file_name", $gsimple, FILE_APPEND);

							
						
							echo "ready for stats";
							$Header = "Size"."\t"."Count"."\n";
							file_put_contents($size_non_genic_stat_file_name, $Header, FILE_APPEND);
							while($row = mysqli_fetch_assoc($r14)) 
							{
								echo "fhfhfhfdh";
								
									file_put_contents($size_non_genic_stat_file_name, $row['size']."\t".$row['sizeCount']."\n", FILE_APPEND);
								
							}

					
			        
						
		}
?>


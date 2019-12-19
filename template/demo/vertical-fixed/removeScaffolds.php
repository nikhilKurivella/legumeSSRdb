<?php
$row = 1;
if (($handle = fopen("/home/NKurivella/Documents/legume_data/Legumes_gff/rawgffs/Gmax.gff", "r")) !== FALSE) {
	 if (($handle2 = fopen("/home/NKurivella/Documents/legume_data/Legumes_gff/rawgffs/GmaxFinal.csv", "w")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000000, "," , ";")) !== FALSE) {
        $num = count($data);
       
        $row++;
        if (strpos($data['0'], 'Chr01') !== FALSE) {
		   $data['0'] = "chr1";
		   $data['8'] = substr($data[8], 3, 15);
		   fputcsv($handle2, $data);
        }     
        if (strpos($data['0'], 'Chr02') !== FALSE) {
		   $data['0'] = "chr2";
		   $data['8'] = substr($data[8], 3, 15);
		   fputcsv($handle2, $data);
        }     
        if (strpos($data['0'], 'Chr03') !== FALSE) {
		   $data['0'] = "chr3";
		   $data['8'] = substr($data[8], 3, 15);
		   fputcsv($handle2, $data);
        }   
         if (strpos($data['0'], 'Chr04') !== FALSE) {
		   $data['0'] = "chr4";
		   $data['8'] = substr($data[8], 3, 15);
		   fputcsv($handle2, $data);
        }   
         if (strpos($data['0'], 'Chr05') !== FALSE) {
		   $data['0'] = "chr5";
		   $data['8'] = substr($data[8], 3, 15);
		   fputcsv($handle2, $data);
        }   
         if (strpos($data['0'], 'Chr06') !== FALSE) {
		   $data['0'] = "chr6";
		   $data['8'] = substr($data[8], 3, 15);
		   fputcsv($handle2, $data);
        }   
         if (strpos($data['0'], 'Chr07') !== FALSE) {
		   $data['0'] = "chr7";
		   $data['8'] = substr($data[8], 3, 15);
		   fputcsv($handle2, $data);
        }  
        if (strpos($data['0'], 'Chr08') !== FALSE) {
		   $data['0'] = "chr8";
		   $data['8'] = substr($data[8], 3, 15);
		   fputcsv($handle2, $data);
        }   
        if (strpos($data['0'], 'Chr09') !== FALSE) {
		   $data['0'] = "chr9";
		   $data['8'] = substr($data[8], 3, 15);
		   fputcsv($handle2, $data);
        }     
        if (strpos($data['0'], 'Chr10') !== FALSE) {
		   $data['0'] = "chr10";
		   $data['8'] = substr($data[8], 3, 15);
		   fputcsv($handle2, $data);
        }     
        if (strpos($data['0'], 'Chr11') !== FALSE) {
		   $data['0'] = "chr11";
		   $data['8'] = substr($data[8], 3, 15);
		   fputcsv($handle2, $data);
        }   
         if (strpos($data['0'], 'Chr12') !== FALSE) {
		   $data['0'] = "chr12";
		   $data['8'] = substr($data[8], 3, 15);
		   fputcsv($handle2, $data);
        }   
         if (strpos($data['0'], 'Chr13') !== FALSE) {
		   $data['0'] = "chr13";
		   $data['8'] = substr($data[8], 3, 15);
		   fputcsv($handle2, $data);
        }   
         if (strpos($data['0'], 'Chr14') !== FALSE) {
		   $data['0'] = "chr14";
		   $data['8'] = substr($data[8], 3, 15);
		   fputcsv($handle2, $data);
        }   
         if (strpos($data['0'], 'Chr015') !== FALSE) {
		   $data['0'] = "chr15";
		   $data['8'] = substr($data[8], 3, 15);
		   fputcsv($handle2, $data);
        }  
        if (strpos($data['0'], 'Chr16') !== FALSE) {
		   $data['0'] = "chr16";
		   $data['8'] = substr($data[8], 3, 15);
		   fputcsv($handle2, $data);
        }   
        if (strpos($data['0'], 'Chr17') !== FALSE) {
		   $data['0'] = "chr17";
		   $data['8'] = substr($data[8], 3, 15);
		   fputcsv($handle2, $data);
        }   
         if (strpos($data['0'], 'Chr18') !== FALSE) {
		   $data['0'] = "chr18";
		   $data['8'] = substr($data[8], 3, 15);
		   fputcsv($handle2, $data);
        }   
         if (strpos($data['0'], 'Chr19') !== FALSE) {
		   $data['0'] = "chr19";
		   $data['8'] = substr($data[8], 3, 15);
		   fputcsv($handle2, $data);
        }  
        if (strpos($data['0'], 'Chr20') !== FALSE) {
		   $data['0'] = "chr20";
		   $data['8'] = substr($data[8], 3, 15);
		   fputcsv($handle2, $data);
        }   
    }
    fclose($handle);
 }
 fclose($handle2);
}
?>
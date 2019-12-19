<?php
$row = 1;
if (($handle = fopen("/home/NKurivella/Documents/legume_data/Legumes_complete/Carietinum.csv", "w")) !== FALSE) {
	 if (($handle1 = fopen("/home/NKurivella/Documents/legume_data/Legume_chromosomes/Carietinum_492_v1.0.fa.misa", "r")) !== FALSE) {
	 	if (($handle2 = fopen("/home/NKurivella/Documents/legume_data/Legumes_gff/enhanced_gffs/Carietinum_gene_stnd.misa", "r")) !== FALSE) {
	 		if (($handle3 = fopen("/home/NKurivella/Documents/legume_data/Legumes_gff/Go/Carietinum_492_v1.0.annotation_info.txt", "r")) !== FALSE) {

						    while (($data1 = fgetcsv($handle1, 1000000, ",")) !== FALSE) {
						    	while (($data2 = fgetcsv($handle2, 1000000, "," )) !== FALSE) {
						    		while (($data3 = fgetcsv($handle3, 1000000, "\t")) !== FALSE) {
						       
						        		echo $data1['6'];
								        echo "\n";
								        /*echo $data2['0'];
								        echo "\n";
								        echo $data3['0'];
								        echo "\n";*/
						        
						 	   }
						 	}
						 }
						 fclose($handle3);
						}
						fclose($handle2);
					}
					fclose($handle1);
				}
				fclose($handle);
			}				
?>
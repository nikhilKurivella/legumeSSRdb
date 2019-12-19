<?php
$row = 1;
//if (($handle = fopen("/home/NKurivella/Documents/legume_data/Legumes_gff/enhanced_gffs/Pvulgaris_gene.misa", "r")) !== FALSE) {
//	 if (($handle2 = fopen("/home/NKurivella/Documents/legume_data/Legumes_gff/enhanced_gffs/Pvulgaris_gene.misa", "w")) !== FALSE) {
    while (($data = fgetcsv($handle, 100000000, "\t")) !== FALSE) {
        $num = count($data);
       
        $row++;
        if ($data['2'] === 'gene')
        {
            fputcsv($handle2, $data);
        }
    }
     fclose($handle);
  }
  fclose($handle2);
 }
?>
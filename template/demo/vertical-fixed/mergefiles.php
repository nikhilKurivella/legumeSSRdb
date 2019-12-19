<?php
$file = fopen("/home/NKurivella/Documents/legume_data/Legume_chromosomes/Carietinum_492_v1.0.fa.misa", "r");
$file2 = fopen("/home/NKurivella/Documents/legume_data/Legumes_gff/enhanced_gffs/Carietinum_gene_stnd.misa", "r");

while(!feof($file))
{
    $ssrs[] =	fgetcsv($file);
}
while(!feof($file2))
{
	$genes[] = fgetcsv($file2);
}
foreach ($ssrs as $key) {
	
	foreach ($genes as $key1) {
		echo $key['5']."\t".$key['6']."\t".$key1['3']."\t".$key1['4']."\n";

		if($key['5']>=$key1['3'] AND $key['6']<=$key1['4'])
		{
			$key['7'] = "yes";
			echo "hii";
		}
		else
		{
			$key['7'] ="noo";
			echo $key;
		}
	}
	
}

?>

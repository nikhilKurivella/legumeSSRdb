<?php  
$fileID = $_GET["f"];
$geneLocation = $_GET["geneLocation"];
$tableName = $_GET["tableName"];
echo "TABLE : ".$tableName;

//echo $geneLocation;
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Legume Database</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/font/css/materialdesignicons.min.css">
  
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
  
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="stylesheet" href="extraStyle.css">
  <link rel="shortcut icon" href="images/favicon.png" />
  <link rel="stylesheet" type="text/css" href="node_modules/c3/c3.css">
   <link rel="stylesheet" type="text/css" href="node_modules/morris.js/morris.css">

  

  <script src="node_modules/d3/d3.js"></script>
  <script src="node_modules/c3/c3.js"></script>
  <script src="node_modules/flot/jquery.flot.js"></script>
  <script src="node_modules/raphael/raphael.min.js"></script>
  <script src="node_modules/morris.js/morris.min.js"></script>
  <script src="node_modules/flot/jquery.flot.resize.js"></script>
  <script src="node_modules/chartist/dist/chartist.min.js"></script>
 

</head>
<body class="sidebar-fixed">
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row .nav-tabs-vertical-custom">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html"><h4 style="padding-top: 10px">LEGUME DATABASE</h4></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><h6 style="padding-top: 10px">LD</h6></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end justify-content-lg-start">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="mdi mdi-magnify"></i>
                </span>
             <div class="autocomplete">
              <input id="myInput" type="text" class="form-control" name="myCountry" placeholder="search" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
       <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.html">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Home</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/widgets/widgets.html">
              <i class="mdi mdi-airplay menu-icon"></i>
              <span class="menu-title">About</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-menu menu-icon"></i>
              <span class="menu-title">Species</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <?php
                     $data = json_decode(file_get_contents("genomes/genomesMetadata.json"), true);
                     foreach ($data as &$obj) {
                        $genomeName = $obj['name'];
                        $id = $obj['id'];
                        echo "<li class='nav-item'><a class='nav-link' style='color: #333333;' href='dataset.php?g=".$id."'>".$genomeName."</a></li>";
                     }
                  ?>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-advanced" aria-expanded="false" aria-controls="ui-advanced">
              <i class="mdi mdi-layers menu-icon"></i>
              <span class="menu-title">Tools</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-advanced">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="test.html">JBrowse</a></li>
                <li class="nav-item"> <a class="nav-link" href="test.html">Blast</a></li>
                <li class="nav-item"> <a class="nav-link" href="test.html">Prediction</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="mdi mdi-magnify menu-icon"></i>
              <span class="menu-title" id="xx">Browse</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
               <?php
                     $data = json_decode(file_get_contents("genomes/genomesMetadata.json"), true);
                     foreach ($data as &$obj) {
                        $genomeName = $obj['name'];
                        $id = $obj['id'];
                        echo "<li class='nav-item'><a class='nav-link' style='color: #333333;' href='data.php?g=".$id."'>".$genomeName."</a></li>";
                     }
                  ?>
              </ul>
            </div>
          </li>
           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="mdi mdi-help menu-icon"></i>
              <span class="menu-title">Help</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="faq.html">Faqs</a></li>
                <li class="nav-item"> <a class="nav-link" href="faq.html">Tutorial</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/ui-features/notifications.html">
              <i class="mdi mdi-phone menu-icon"></i>
              <span class="menu-title">Contact</span>
            </a>
          </li>
        </ul>
      </nav>
      <div class="main-panel" id="mainpanel">
        <div class="content-wrapper">
          <div class="card">
                <div class="card-body">
                 <?php   
                 if ($geneLocation=="genic") {
                        

                  echo '<div class="row">';
                  echo '<div class="col-lg-5">';

                 echo '<h4 class="card-title">SSR classification by motif size</h4>';
                 echo '<div class="flot-chart-container">';
                    echo '<div id="column-chart" class="flot-chart"></div>';
                  echo '</div>';
             
             echo '</div>';
               echo   '<div class="col-lg-3">';
                 echo '<h4 class="card-title">by size of ssr</h4>';
                 
                  echo '<div id="c3-line-chart"></div>';
                 
                echo '</div>';
                
                 echo '<div class="col-lg-4" style="padding-right: 100px">';
                   echo '<h4 class="card-title">by genic location of ssr</h4>';
                  echo '<div id="c3-pie-chart"></div>';
             echo '</div>';
            echo '</div>';
                 }

                 else if ($geneLocation=="non_genic") {
                        

                  echo '<div class="row">';
                  echo '<div class="col-lg-6">';

                 echo '<h4 class="card-title">Motif Classification</h4>';
                 echo '<div class="flot-chart-container">';
                    echo '<div id="column-chart" class="flot-chart"></div>';
                  echo '</div>';
             
             echo '</div>';
               echo   '<div class="col-lg-6">';
                 echo '<h4 class="card-title">SSR size classification</h4>';
                 
                  echo '<div id="c3-line-chart"></div>';
                 
                echo '</div>';
                
                 
            echo '</div>';
                 }

                 else if ($geneLocation=="both") {
                        

                  echo '<div class="row">';
                  echo '<div class="col-lg-6">';

                 echo '<h4 class="card-title">Motif Classification</h4>';
                 
                 echo '<div id="morris-bar-example"></div>';

             
             echo '</div>';
               echo   '<div class="col-lg-3">';
                 echo '<h4 class="card-title">SSR size classification</h4>';
                 
                  echo '<div id="c3-line-chart"></div>';
                 
                echo '</div>';
                
                 echo '<div class="col-lg-3" style="padding-right: 100px">';
                   echo '<h4 class="card-title">Results of intergenic SSRs</h4>';
                  echo '<div id="c3-pie-chart"></div>';
             echo '</div>';
            echo '</div>';
                 }

                  
       ?>
          <!-- <div class="card">
            <div class="card-body">
              <div class="row">
          <div class="col-lg-12">
         
             <?php
             echo '<h4 class="card-title">'.$_GET["gname"].'</h4><br>';
             echo '<table class="table"style = "width=100%";>';
             echo '<tr>';
             echo '<td> Motif Type: </td>';
             echo '<td>'.$_GET["motifType"].'</td>';
             echo '</tr>';
             echo '<tr>';
             echo '<td>  Location Range start: </td>';
             echo '<td>'.$_GET["chstart"].'</td>';
             echo '</tr>';
             echo '<tr>';
             echo '<td> Location Range end: </td>';
             echo '<td>'.$_GET["chEnd"].'</td>';
             echo '</tr>';
             echo '<tr>';
             echo '<td> Length of SSR start: </td>';
             echo '<td>'.$_GET["copyStart"].'</td>';
             echo '</tr>';
             echo '<tr>';
             echo '<td> Length of SSR end: </td>';
             echo '<td>'.$_GET["copyEnd"].'</td>';
             echo '</tr>';
             echo '</table>';
             ?>
            </div>
          </div>
        </div>
        </div> -->

        
         <div class="card">
            <div class="card-body" style="min-width: 100%">
              <div class="row">
              <div class="col-lg-7">
              <h4 class="card-title">Legume Results</h4>
              </div>
              <div class="col-lg-1" style="padding-right: 20px">
                 <a class="btn btn-outline-info btn-icon-text" href=<?php echo "results/result".$fileID.".csv"; ?>  Download> Download Results</a>
              </div>
              <div class="col-lg-1" style="padding-left: 80px">
                 <a class="btn btn-outline-info btn-icon-text" onclick="designPrimers()"> Design Primers </a>
              </div>
              <div class="col-lg-1" style="padding-left: 120px">
                 <a class="btn btn-outline-info btn-icon-text" onclick="getSequences()"> Get Sequences </a>
              </div>
            </div> 
            <br>
              <div class="col-lg-12">
                  <div class="table-responsive">
                    <?php 
                        //$fivePrimes, $threePrimes, $exons, $others;
                        $row = 1;

                          
                          if (($handle = fopen("results/result".$fileID.".csv", "r")) !== FALSE) {
                                                      
                              echo '<table id="order-listing" class="table">';
                             
                              while (($data = fgetcsv($handle, 1000, "\t")) !== FALSE) {
                                  $num = count($data);
                                  if ($row == 1) {
                                      echo '<thead style="background-color: #44519e;"><tr>';
                                  }else{
                                      echo '<tr>';
                                  }

                                  if ($row == 1) {
                                          echo '<th style="color: white; width: 20px; ">Select</th>';
                                      }
                                  else{
                                  echo '<th style="color: white;"><input type="checkbox" id='.$data[0].' onclick="ssrSelect(this.id)"/></th>';
                                }
                                  for ($c=0; $c < $num; $c++) {
                                      //echo $data[$c] . "<br />\n";
                                      if(empty($data[$c])) {
                                         $value = "&nbsp;";
                                      }else{
                                         $value = $data[$c];
                                      }
                                      if ($row == 1) {
                                          echo '<th style="color: white;">'.$value.'</th>';
                                      }
                                      
                                      else{

                                          echo '<td>'.$value.'</td>';
                                          /*if ($c == $num-1 and $row !== 1)
                                      {
                                          echo '<td>'."hiii".'</td>';
                                      }*/
                                      }
                                  }
                                 
                                  if ($row == 1) {
                                      echo '</tr></thead><tbody>';
                                  }else{
                                      echo '</tr>';
                                  }
                                  $row++;
                              }
                             
                              echo '</tbody></table>';
                              fclose($handle);
                              echo "results/result".$fileID."_stat_genic.csv";
                          }

                          if ($geneLocation == "genic") {
                            echo "genic stats";
                            $statFilename = "results/result".$fileID."_stat_genic.csv";
                            $sizeStatFileName = "results/result".$fileID."_stat_genic_size.csv";
                            echo $statFilename;
                            readStats($statFilename, $sizeStatFileName);
                           }
                          else if($geneLocation == "non_genic")
                          {
                            $statFilename = "results/result".$fileID."_non_genic_stat.csv";
                            $sizeStatFileName = "results/result".$fileID."_non_genic_stat_size.csv";
                            readStats($statFilename, $sizeStatFileName);
                          }
                          else if($geneLocation == "both")
                          {
                            $statFilename = "results/result".$fileID."_stat_genic.csv";
                            $sizeStatFileName = "results/result".$fileID."_stat_genic_size.csv";
                            readStats($statFilename, $sizeStatFileName);
                          }
                          
                          function readStats($statFileName, $sizeStatFileName)
                          {
                            echo "Came iN";
                          if (($handle1 = fopen($statFileName, "r")) !== FALSE) {
                            $c = 1;
                            echo $statFileName;
                            while (($data = fgetcsv($handle1, 1000, "\t")) !== FALSE) {
                             echo "Came iN";
                             if($c!=1)
                               {
                                global $fivePrimes, $threePrimes, $exons, $others, $mono, $di, $tri, $tetra, $penta, $hexa, $compound, $complex, $simple;
                                  echo "RESULTS"."\n";
                                  echo $data[1]."\n";
                                  $fivePrimes = $data[0];
                                  $threePrimes = $data[1];
                                  $exons = $data[2];
                                  $others = $data[3];
                                  $mono = $data[4];
                                  $di = $data[5];
                                  $tri = $data[6];
                                   $tetra = $data[7];
                                  $penta = $data[8];
                                  $hexa = $data[9];
                                   $compound = $data[10];
                                  $complex = $data[11];
                                  $simple = $data[12];
                                  //echo $fivePrimes."\t".$threePrimes."\t".$exons."\t".$others;
                                }
                                
                                $c++;
                            }
                            fclose($handle1);
                          }


                          if (($handle2 = fopen($sizeStatFileName, "r")) !== FALSE) {
                            global $sizeKey, $sizeValue;
                            $c = 1;
                            $sizeKey = array();
                            $sizeValue = array();
                            array_push($sizeKey, '0');
                            array_push($sizeValue, '0');
                            while (($data = fgetcsv($handle2, 1000, "\t")) !== FALSE) {
                             //echo "hfdhh";
                             if($c!=1)
                               {
                                  array_push($sizeKey, $data[0]);
                                  array_push($sizeValue, $data[1]);
                               }
                                
                                $c++;
                            }
                            fclose($handle2);
                            
                          }
                            }
                          echo "FivePrimes: ".$fivePrimes;
                    ?>
                  </div>
                </div>
              </div>
            </div>
      </div>
</div>
</div>


      </div>
    </div>
  </div>



<script>
  var ssrArray = [];
  
  var ssrFinalArray = [];
  function ssrSelect(click_id) {
    
    console.log(click_id);
    
    for(let i = 0; i < ssrArray.length; i++){
      if(ssrArray[i] === click_id)
      {
     //  document.getElementById(click_id).style.color = "white";
       ssrArray[i] = "";
       return;
      }
    }
    //document.getElementById(click_id).style.color = "green";
    ssrArray.push(click_id);

    ssrFinalArray = [];
    for(let i = 0; i < ssrArray.length; i++){

      if(ssrArray[i] !== "")
      {
       ssrFinalArray.push("'"+ssrArray[i]+"'");
      }

      
    }
    /* for(let i = 0; i < ssrFinalArray.length; i++){
    console.log("Array "+ssrFinalArray[i]);
    }*/
}
 

function getSequences() {

  for(let i = 0; i < ssrFinalArray.length; i++){
    console.log("Array "+ssrFinalArray[i]);
    }
    var tableName = '<?php echo $tableName;?>';
         //   console.log(tableName);
    var date = new Date();
    var ssr_seq_timeStamp = date.getTime();
    var formdata = new FormData();
    var geneLocation = '<?php echo $geneLocation;?>';
    formdata.append("geneLocation", geneLocation);
    formdata.append("ssrArray", ssrFinalArray);
    formdata.append("timeStamp", ssr_seq_timeStamp);
    formdata.append("tableName", tableName);
    


    var request = new XMLHttpRequest();
              request.open("POST", "fetchSequenceInfo.php", true);
            
              request.onload = function () {
                
                        if (request.readyState === request.DONE) {
                            if (request.status === 200) {
                              
                                 
                                  console.log(request.responseText);
                                  var res = request.responseText;
                                  console.log(res);
                                  var resList = res.split(",");
                                  console.log(resList);
                                  var id = resList[0];
                                  console.log(id);
                                  var defaultStart = resList[1];
                                  var defaultEnd = resList[2];
                                  var defaultchr = resList[3];
                                  var resultUrl = "sequenceInfo.php?start="+defaultStart+"&end="+defaultEnd+"&fileName="+ssr_seq_timeStamp+"&id="+id+"&geneLocation="+geneLocation+"&tableName="+tableName+"&chr="+defaultchr;
                                  window.location.href = resultUrl;                           
                            }
                          }
                       
                    };        
                    request.send(formdata); 
              
}


function designPrimers() {

  for(let i = 0; i < ssrFinalArray.length; i++){
    console.log("Array "+ssrFinalArray[i]);
    }
    var tableName = '<?php echo $tableName;?>';
    var date = new Date();
    var ssr_seq_timeStamp = date.getTime();
    var formdata = new FormData();
    var geneLocation = '<?php echo $geneLocation;?>';
    formdata.append("geneLocation", geneLocation);
    formdata.append("ssrArray", ssrFinalArray);
    formdata.append("timeStamp", ssr_seq_timeStamp);
    formdata.append("tableName", tableName);


    var request = new XMLHttpRequest();
              request.open("POST", "designPrimerInfo.php", true);
            
              request.onload = function () {
                
                        if (request.readyState === request.DONE) {
                            if (request.status === 200) {
                              
                                  console.log("Request Success");
                                  console.log(request.responseText);

                                  var res = request.responseText;
                                  console.log("RRRREEEESSS: " +res);
                                  var resList = res.split(",");
                                  console.log(resList);
                                  var sid = resList[0];
                                  var defaultchr = resList[6];
                                  console.log("HELLLLLLOOOOOOOO"+sid);

                                  var resultUrl = "designPrimers.php?fileName="+ssr_seq_timeStamp+"&defaultchr="+defaultchr+"&geneLocation="+geneLocation+"&tableName="+tableName+"&ssrArray="+ssrFinalArray+"&sid="+sid;
                                  window.location.href = resultUrl;                           
                            }
                          }
                       
                    };        
                    request.send(formdata); 
              
}

</script>












<script type="text/javascript">
  console.log("here");
  var sizeKey = '<?php echo(json_encode($sizeKey));?>';
  sizeKey = sizeKey.replace(/['"]+/g, '');
  sizeKey = (sizeKey.substr(1, sizeKey.length-2)).split(",");

  var sizeValue = '<?php echo(json_encode($sizeValue));?>';
  sizeValue = sizeValue.replace(/['"]+/g, '');
  sizeValue = (sizeValue.substr(1, sizeValue.length-2)).split(",");

  console.log(sizeKey[7]);
  for (index = 0; index < sizeKey.length; index++) { 
    console.log(sizeKey[index]); 
} 

  sizeKey.unshift('data');
  sizeValue.unshift('data');
  var c3LineChart = c3.generate({
    bindto: '#c3-line-chart',
    data: {
      
      columns: [
        sizeKey,
        sizeValue
      ]
    },
    color: {
      pattern: ['rgba(88,216,163,1)', 'rgba(237,28,36,0.6)', 'rgba(4,189,254,0.6)']
    },
    padding: {
      top: 0,
      right: 0,
      bottom: 30,
      left: 0,
    }
  });
</script>


<!-- <script>
function getSequences() {
console.log("dggdgddgdg");
console.log("ffffuu");
    var request = new XMLHttpRequest();
              request.open("POST", "fetchSequenceInfo.php", true);
              console.log("fffflll");
              request.onload = function () {
                console.log("ffffvvv");
                        if (request.readyState === request.DONE) {
                            if (request.status === 200) {
                              console.log("ffff");
                                  var resultUrl = "sequenceInfo.php";
                                  console.log(request.responseText);
                                  //window.location.href = resultUrl;                           
                            }
                          }
                       
                    };        
                    request.send(for); 
              
}
</script>
 -->


<script>
   var fivePrimes = '<?php echo $fivePrimes;?>';
   var threePrimes = '<?php echo $threePrimes;?>';
   var exons = '<?php echo $exons;?>';
   var others = '<?php echo $others;?>';
   console.log(fivePrimes);
   var c3PieChart = c3.generate({
    bindto: '#c3-pie-chart',
    data: {
      columns: [
        ["5' UTR", fivePrimes],
        ["3' UTR", threePrimes],
        ['Exons', exons],
        ['Other Intergenic', others],
      ],
      type: 'pie',
      onclick: function(d, i) {
        console.log("onclick", d, i);
      },
      onmouseover: function(d, i) {
        console.log("onmouseover", d, i);
      },
      onmouseout: function(d, i) {
        console.log("onmouseout", d, i);
      }

    },
    color: {
      pattern: ['rgba(88,216,163,1)', 'rgba(4,189,254,0.6)', 'rgba(237,28,36,0.6)', 'rgba(127,116,179,1)']
    },
    padding: {
      top: 0,
      right: 0,
      bottom: 30,
      left: 0,
    },
    donut: {
      title: "Intergenic classification"
    }
  });
</script>

<script type="text/javascript">
  
  $(function() {
 var mono = '<?php echo $mono;?>';
   var di = '<?php echo $di;?>';
   var tri = '<?php echo $tri;?>';
   var tetra = '<?php echo $tetra;?>';
   var penta = '<?php echo $penta;?>';
   var hexa = '<?php echo $hexa;?>';
   var compound = '<?php echo $compound;?>';
   var complex = '<?php echo $complex;?>';
   var simple = '<?php echo $simple;?>';
    var data = [
      ["Mono", mono],
      ["Di", di],
      ["Tri", tri],
      ["Tetra", tetra],
      ["Penta", penta],
      ["Hexa", hexa],
      ["Complex", complex],
      ["Compound", compound],
      ["Simple", simple]
    ];

    if ($("#column-chart").length) {
      $.plot("#column-chart", [data], {
        series: {
          bars: {
            show: true,
            barWidth: 0.6,
            align: "center"
          }
        },
        xaxis: {
          mode: "categories",
          tickLength: 0
        },

        grid: {
          borderWidth: 0,
          labelMargin: 10,
          hoverable: true,
          clickable: true,
          mouseActiveRadius: 6,
        }

      });
    }
  });


</script>


<script type="text/javascript">
  var mono = '<?php echo $mono;?>';
   var di = '<?php echo $di;?>';
   var tri = '<?php echo $tri;?>';
   var tetra = '<?php echo $tetra;?>';
   var penta = '<?php echo $penta;?>';
   var hexa = '<?php echo $hexa;?>';
   var compound = '<?php echo $compound;?>';
   var complex = '<?php echo $complex;?>';
   var simple = '<?php echo $simple;?>';
  if ($("#morris-bar-example").length) {
    Morris.Bar({
      element: 'morris-bar-example',
      barColors: ['#63CF72', '#F36368', '#76C1FA', '#FABA66'],
      data: [{
          y: 'mono',
          a: mono,
          b: 1300
        },
        {
          y: 'di',
          a: di,
          b: 300
        },
        {
          y: 'tri',
          a: tri,
          b: 100
        },
        {
          y: 'tetra',
          a: tetra,
          b: 400
        },
        {
          y: 'penta',
          a: penta,
          b: 50
        },
        {
          y: 'hexa',
          a: hexa,
          b: 300
        },
        {
          y: 'comp',
          a: compound,
          b: 70
        },
         {
          y: 'complex',
          a: complex,
          b: 1000
        }
        
        
      ],
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['genic', 'non-genic']
    });
  }
</script>

<!-- <script>
  var currentSlice;

var chart = c3.generate({
  bindto: '#dash',
  data: {
    x: 'x',
    columns: [
      ['x', '2013-01-01', '2013-01-02', '2013-01-03', '2013-01-04', '2013-01-05', '2013-01-06'],
      ['A', 30, 200, 100, 400, 150, 250],
      ['B', 130, 100, 140, 200, 150, 50],
      ['C', 50, 100, 130, 240, 200, 150],
      ['D', 130, 100, 140, 200, 150, 50],
      ['E', 130, 150, 200, 300, 200, 100]
    ],
    type: 'donut'
  },
  axis: {
    x: {
      type: 'timeseries',
      tick: {
        format: '%Y-%m-%d',
        centered: true,
        position: 'inner-right'
      }
    }
  },
  bar: {
    width: {
      ratio: 0.5 // this makes bar width 50% of length between ticks
    }
  },
  tooltip: {
    grouped: false,
    contents: function(data, defaultTitleFormat, defaultValueFormat, color) {
      //  console.log("Containt");
      // console.log(data, defaultTitleFormat, defaultValueFormat, color);
      return "<p style='border:1px solid red;'>" + data[0].value + "</p>";

    }
  }
});
setTimeout(function() {
  chart.internal.expandArc(['A', 'B'])
}, 0)
</script> -->

<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua & Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia & Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central Arfrican Republic","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauro","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre & Miquelon","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","St Kitts & Nevis","St Lucia","St Vincent","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad & Tobago","Tunisia","Turkey","Turkmenistan","Turks & Caicos","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), countries);
</script>

  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
 
  <script src="js/dashboard.js"></script>
  <script src="js/owl-carousel.js"></script>
  <script src="js/tabs.js"></script>
  <script src="js/data-table.js"></script>
 <!--  <script src="js/morris.js"></script> -->
 <!--  <script src="js/flot-chart.js"></script>
 -->  
  



  <!-- End custom js for this page-->
</body>

</html>


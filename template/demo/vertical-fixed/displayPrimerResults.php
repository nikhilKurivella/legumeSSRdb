
<?php

$filename = $_GET["filename"];

$filePath = "primerfiles/"."primerResults_".$filename.".csv";

$sid = $_GET["id"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Legume Database</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/iconfonts/mdi/font/css/materialdesignicons.min.css">
  
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.addons.css">
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
  <!-- <script src="https://requirejs.org/docs/release/2.3.5/minified/require.js" type="text/javascript"></script>
   -->
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="stylesheet" href="extraStyle.css">
  <link rel="shortcut icon" href="../../images/favicon.png" />
  <link rel="stylesheet" type="text/css" href="../../node_modules/c3/c3.css">
  

  <script src="../../node_modules/d3/d3.js"></script>
  <script src="../../node_modules/c3/c3.js"></script>
  <script src="../../node_modules/flot/jquery.flot.js"></script>
  <script src="../../node_modules/flot/jquery.flot.resize.js"></script>
 
  <script src="../../node_modules/ion-rangeslider/js/ion.rangeSlider.js"></script>
  <script src="../../node_modules/chartist/dist/chartist.min.js"></script>

 
<style type="text/css">
  .selected {
    background-color: #e4e4e4;
}
</style>
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
       <div class="row">
         <div class="col-md-5">
          <br>
          <div class="card">
                <div class="card-body">
                  <h4 class="card-title">SSRs selected</h4>
                 
                  <?php
                  echo '<div class="table-responsive"  style="height: 700px; overflow: auto;">';
                    echo '<table class="table table-bordered" id="data">';
                     echo '<thead>';
                        echo '<tr>';
                          echo '<th>';
                            echo 'SSR ID';
                          echo '</th>';
                          echo '<th>';
                            echo 'SSR Start';
                          echo '</th>';
                          echo '<th>';
                            echo 'SSR End';
                          echo '</th>';
                          echo '<th>';
                            echo 'Motif';
                          echo '</th>';
                          echo '<th>';
                            echo 'Repeat Motif';
                          echo '</th>';
                        echo '</tr>';
                      echo '</thead>';

                          $row = 1;
                       //  echo $filePath;
                          if (($handle = fopen($filePath, "r")) !== FALSE) {
                                echo '<tbody>';
                              while (($data = fgetcsv($handle, 1000, "\t")) !== FALSE) {
                                  $num = count($data);
                                  
                                          if($row !=1){
                                              
                                              echo '<tr onclick="readPrimerFile(this);">';
                                              echo '<td>';
                                              echo $data[0];                 
                                              echo '</td>';
                                              echo '<td>';
                                              echo $data[1];
                                              echo '</td>';
                                              echo '<td>';
                                              echo $data[2];
                                              echo '</td>';
                                              echo '<td>';
                                              echo $data[3];
                                              echo '</td>';
                                              echo '<td>';
                                              echo $data[4];
                                              echo '</td>';    
                                              echo '</tr>';
                                               
                                         }
                                          $row++;
                                      }
                                      echo '</tbody>';
                    }
                    echo '</table>';
                  echo '</div>';
                  


                echo '</div>';
              echo '</div>';
           
         echo '</div>';
         echo '<div class="col-md-7">';
         echo  '<br>';
         echo '<div class="card">';
         echo '<div class="card-body">';
           $row1 = 1;
          if (($handle = fopen($filePath, "r")) !== FALSE) {
                                echo '<tbody>';
                              while (($data = fgetcsv($handle, 1000, "\t")) !== FALSE) {
                               
                                $num = count($data);
                                  if($row1 ==2){

                                    $fpp = $data[5];
                                   
                                  }
                                  $row1++;
                                }
                              
                              }
        ?>
        <?php

        
       echo '<h4 class="card-title">Primer Results</h4>
        <div class ="row">';
          
          echo '<div class = "col-md-6" style="background: #b6d6bf; padding-top: 10px;">
            <p class="clearfix">
                          <span class="float-left" >
                            Left Primer 1
                          </span>
                          <span class="float-right text-muted" id="leftPrimer1">
                            40099
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Left Primer min GC
                          </span>
                          <span class="float-right text-muted" id="leftPrimerMinGC1">
                            44249
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Left Primer min TM
                          </span>
                          <span class="float-right text-muted" id="leftPrimerTM1">
                            Glyma.02G000400
                          </span>
                        </p>
          </div>
          <div class = "col-md-6" style="background: #b6d6bf; padding-top: 10px;">
            <p class="clearfix">
                          <span class="float-left">
                            Right Primer 1
                          </span>
                          <span class="float-right text-muted" id="rightPrimer1">
                            40099
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Right Primer min GC
                          </span>
                          <span class="float-right text-muted" id="rightPrimerMinGC1">
                            44249
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Right Primer min TM
                          </span>
                          <span class="float-right text-muted" id="rightPrimerTM1">
                            Glyma.02G000400
                          </span>
                        </p>
          </div>
        </div>
        <br>
        <div class ="row">
          
          <div class = "col-md-6" style="background: #f5dbab; padding-top: 10px;">
            <p class="clearfix">
                          <span class="float-left">
                            Left Primer 2
                          </span>
                          <span class="float-right text-muted" id="leftPrimer2">
                            40099
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Left Primer min GC
                          </span>
                          <span class="float-right text-muted" id="leftPrimerMinGC2">
                            44249
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Left Primer min TM
                          </span>
                          <span class="float-right text-muted" id="leftPrimerTM2">
                            Glyma.02G000400
                          </span>
                        </p>
          </div>
          <div class = "col-md-6" style="background: #f5dbab; padding-top: 10px;">
           <p class="clearfix">
                            <span class="float-left">
                            Right Primer 2
                          </span>
                          <span class="float-right text-muted" id="rightPrimer2">
                            40099
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Right Primer min GC
                          </span>
                          <span class="float-right text-muted" id="rightPrimerMinGC2">
                            44249
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Right Primer min TM
                          </span>
                          <span class="float-right text-muted" id="rightPrimerTM2">
                            Glyma.02G000400
                          </span>
                        </p>
          </div>
        </div>
        <br>
        <div class ="row">
          
          <div class = "col-md-6" style="background: #abf5ee; padding-top: 10px;">
          <p class="clearfix">
                          <span class="float-left">
                            Left Primer 3
                          </span>
                          <span class="float-right text-muted" id="leftPrimer3">
                            40099
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Left Primer min GC
                          </span>
                          <span class="float-right text-muted" id="leftPrimerMinGC3">
                            44249
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Left Primer min TM
                          </span>
                          <span class="float-right text-muted" id="leftPrimerTM3">
                            Glyma.02G000400
                          </span>
                        </p>
          </div>
          <div class = "col-md-6" style="background: #abf5ee; padding-top: 10px;">
          <p class="clearfix">
                          <span class="float-left">
                            Right Primer 3
                          </span>
                          <span class="float-right text-muted" id="rightPrimer3">
                            40099
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Right Primer min GC
                          </span>
                          <span class="float-right text-muted" id="rightPrimerMinGC3">
                            44249
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Right Primer min TM
                          </span>
                          <span class="float-right text-muted" id="rightPrimerTM3">
                            Glyma.02G000400
                          </span>
                        </p>
          </div>
        </div>
        <br>
        <div class ="row">
          
          <div class = "col-md-6" style="background: #f5b9b5; padding-top: 10px;">
           <p class="clearfix">
                          <span class="float-left">
                            Left Primer 4
                          </span>
                          <span class="float-right text-muted" id="leftPrimer4">
                            40099
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Left Primer min GC
                          </span>
                          <span class="float-right text-muted" id="leftPrimerMinGC4">
                            44249
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Left Primer min TM
                          </span>
                          <span class="float-right text-muted" id="leftPrimerTM4">
                            Glyma.02G000400
                          </span>
                        </p>
          </div>
          <div class = "col-md-6" style="background: #f5b9b5; padding-top: 10px;">
            <p class="clearfix">
                           <span class="float-left">
                            Right Primer 4
                          </span>
                          <span class="float-right text-muted" id="rightPrimer4">
                            40099
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Right Primer min GC
                          </span>
                          <span class="float-right text-muted" id="rightPrimerMinGC4">
                            44249
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Right Primer min TM
                          </span>
                          <span class="float-right text-muted" id="rightPrimerTM4">
                            Glyma.02G000400
                          </span>
                        </p>
          </div>
        </div>
        <br>
        <div class ="row" style="background: #b7c2ed; padding-top: 10px;">
          <title></title>
          <div class = "col-md-6">
           <p class="clearfix">
                          <span class="float-left">
                            Left Primer 5
                          </span>
                          <span class="float-right text-muted" id="leftPrimer5">
                            40099
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Left Primer min GC
                          </span>
                          <span class="float-right text-muted" id="leftPrimerMinGC5">
                            44249
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Left Primer min TM
                          </span>
                          <span class="float-right text-muted" id="leftPrimerTM5">
                            Glyma.02G000400
                          </span>
                        </p>
          </div>
          <div class = "col-md-6" style="background: #b7c2ed">
            <p class="clearfix">
                           <span class="float-left">
                            Right Primer 5
                          </span>
                          <span class="float-right text-muted" id="rightPrimer5">
                            40099
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Right Primer min GC
                          </span>
                          <span class="float-right text-muted" id="rightPrimerMinGC5">
                            44249
                          </span>
                        </p>
                        <p class="clearfix">
                          <span class="float-left">
                            Right Primer min TM
                          </span>
                          <span class="float-right text-muted" id="rightPrimerTM5">
                            Glyma.02G000400
                          </span>
                        </p>
          </div>
        </div>



        </div>
        </div>
        </div>


</div>

</div>
</div>';
?>


<script>
  if ($('#range_01').length) {
    $("#range_01").ionRangeSlider({
      min: 50,
      max: 500,
      from: 100
    });
  }

  if ($("#range_02").length) {
    $("#range_02").ionRangeSlider({
      min: 50,
      max: 500,
      from: 100
    });
  }
</script>

<script>
  $(document).ready(function () {
      var firstTr = $('#data tr').eq(1);
      firstTr.addClass('selected');
      var sid = '<?php echo $sid;?>'
      console.log("SID: "+sid);
      readPrimerFile(sid);
      /*var res = document.getElementById("sequence").innerHTML;
      var resArray = res.split("\n");
      console.log(resArray);
      var idSeq = resArray[1];
      resArray.shift();
      resArray.shift();
      var seqSeq = resArray.join("");
      console.log(seqSeq);
      res = res.replace(" ", ";");
      var cnt = seqSeq.length;
      var ssr = seqSeq.substring(100, cnt-100-1).fontcolor("green");
      var final = idSeq+"\n"+ seqSeq.substring(0, 99) + "<span style='background-color:#e6ae5a'" + ssr +"</span>"+ seqSeq.substring(cnt-100, cnt-1);
      document.getElementById("sequence").innerHTML = final;
      var res = document.getElementById("sequence").innerHTML;*/
          
});



  $("#data tr").click(function(element){
  $(this).addClass('selected').siblings().removeClass('selected');    
  var value=$(this).find('td:first').html(); 


}); 

var count =1;
function readPrimerFile(element){
  console.log("ELEMENT "+element);
   var primerFilePath = " ";
   if (count==1)
   {
    console.log("HERE");
    primerFilePath = element+"_primer_output.txt";
    console.log("Primer Path: "+primerFilePath);
    count++;
   }

   else
   {
   console.log("HERE1");
   var data = element.innerHTML
   console.log("Data "+ data);
   var res = data.split("</td><td>");
   var res1 = res[0].split(">");
   var res2 =res[2].split("</td>");
   var id = res1[1];
   var start = res[1];
   var end = res2[0];
   var primerFilePath = id+"_primer_output.txt";
   console.log("Primer Path: "+primerFilePath);
 }
   var formdata = new FormData();
   console.log("Primer Path final : "+primerFilePath);
   var filePath = '<?php echo $filePath;?>';
   formdata.append("primerFilePath", primerFilePath);
   //formdata.append("filePath", filePath);

   
   var request = new XMLHttpRequest();
              request.open("POST", "readAndParsePrimerFile.php", true);
            
              request.onload = function () {
                
                        if (request.readyState === request.DONE) {
                            if (request.status === 200) {
                                  console.log(request.responseText);
                                  var primerResult = request.responseText;
                                  var primerArray = primerResult.split("\n");
                                 // console.log("PRIMER ARRAY: " + primerArray[3]);
                                  var primerCount= primerArray[2];
                                  
                                 
                                  var leftPrimer1 = primerArray[3];
                                  var arr = leftPrimer1.split(":");
                                  document.getElementById("leftPrimer1").innerHTML=arr[1];
                                  var rightPrimer1 = primerArray[4];
                                  var arr = rightPrimer1.split(":");
                                  document.getElementById("rightPrimer1").innerHTML=arr[1];
                                  var leftPrimer1_gc = primerArray[5];
                                  var arr = leftPrimer1_gc.split(":");
                                  document.getElementById("leftPrimerMinGC1").innerHTML=arr[1];
                                  var rightPrimer1_gc = primerArray[6];
                                  var arr = rightPrimer1_gc.split(":");
                                  document.getElementById("rightPrimerMinGC2").innerHTML=arr[1];
                                  var leftPrimer1_tm = primerArray[7];
                                  var arr = leftPrimer1_tm.split(":");
                                  document.getElementById("leftPrimerTM1").innerHTML=arr[1];
                                  var rightPrimer1_tm = primerArray[8];
                                  var arr = rightPrimer1_tm.split(":");
                                  document.getElementById("rightPrimerTM1").innerHTML=arr[1];
                                  
                                  var leftPrimer2 = primerArray[9];
                                  var arr = leftPrimer2.split(":");
                                  document.getElementById("leftPrimer2").innerHTML=arr[1];
                                  var rightPrimer2 = primerArray[10];
                                  var arr = rightPrimer1.split(":");
                                  document.getElementById("rightPrimer2").innerHTML=arr[1];
                                  var leftPrimer2_gc = primerArray[11];
                                  var arr = leftPrimer2_gc.split(":");
                                  document.getElementById("leftPrimerMinGC2").innerHTML=arr[1];
                                  var rightPrimer2_gc = primerArray[12];
                                  var arr = rightPrimer2_gc.split(":");
                                  document.getElementById("rightPrimerMinGC2").innerHTML=arr[1];
                                  var leftPrimer2_tm = primerArray[13];
                                  var arr = leftPrimer2_tm.split(":");
                                  document.getElementById("leftPrimerTM2").innerHTML=arr[1];
                                  var rightPrimer2_tm = primerArray[14];
                                  var arr = rightPrimer2_tm.split(":");
                                  document.getElementById("rightPrimerTM2").innerHTML=arr[1];

                                  var leftPrimer3 = primerArray[15];
                                  var arr = leftPrimer3.split(":");
                                  document.getElementById("leftPrimer3").innerHTML=arr[1];
                                  var rightPrimer3 = primerArray[16];
                                  var arr = rightPrimer3.split(":");
                                  document.getElementById("rightPrimer3").innerHTML=arr[1];
                                  var leftPrimer3_gc = primerArray[17];
                                  var arr = leftPrimer3_gc.split(":");
                                  document.getElementById("leftPrimerMinGC3").innerHTML=arr[1];
                                  var rightPrimer3_gc = primerArray[18];
                                  var arr = rightPrimer3_gc.split(":");
                                  document.getElementById("rightPrimerMinGC3").innerHTML=arr[1];
                                  var leftPrimer3_tm = primerArray[19];
                                  var arr = leftPrimer3_tm.split(":");
                                  document.getElementById("leftPrimerTM3").innerHTML=arr[1];
                                  var rightPrimer3_tm = primerArray[20];
                                  var arr = rightPrimer3_tm.split(":");
                                  document.getElementById("rightPrimerTM3").innerHTML=arr[1];

                                  var leftPrimer4 = primerArray[21];
                                  var arr = leftPrimer4.split(":");
                                  document.getElementById("leftPrimer4").innerHTML=arr[1];
                                  var rightPrimer4 = primerArray[22];
                                  var arr = rightPrimer4.split(":");
                                  document.getElementById("rightPrimer4").innerHTML=arr[1];
                                  var leftPrimer4_gc = primerArray[23];
                                  var arr = leftPrimer4_gc.split(":");
                                  document.getElementById("leftPrimerMinGC4").innerHTML=arr[1];
                                  var rightPrimer4_gc = primerArray[24];
                                  var arr = rightPrimer4_gc.split(":");
                                  document.getElementById("rightPrimerMinGC4").innerHTML=arr[1];
                                  var leftPrimer4_tm = primerArray[25];
                                  var arr = leftPrimer4_tm.split(":");
                                  document.getElementById("leftPrimerTM4").innerHTML=arr[1];
                                  var rightPrimer4_tm = primerArray[26];
                                  var arr = rightPrimer4_tm.split(":");
                                  document.getElementById("rightPrimerTM4").innerHTML=arr[1];
                                  
                                  var leftPrimer5 = primerArray[27];
                                  var arr = leftPrimer5.split(":");
                                  document.getElementById("leftPrimer5").innerHTML=arr[1];
                                  var rightPrimer5 = primerArray[28];
                                  var arr = rightPrimer5.split(":");
                                  document.getElementById("rightPrimer5").innerHTML=arr[1];
                                  var leftPrimer5_gc = primerArray[29];
                                  var arr = leftPrimer5_gc.split(":");
                                  document.getElementById("leftPrimerMinGC5").innerHTML=arr[1];
                                  var rightPrimer5_gc = primerArray[30];
                                  var arr = rightPrimer5_gc.split(":");
                                  document.getElementById("rightPrimerMinGC5").innerHTML=arr[1];
                                  var leftPrimer5_tm = primerArray[31];
                                  var arr = leftPrimer5_tm.split(":");
                                  document.getElementById("leftPrimerTM5").innerHTML=arr[1];
                                  var rightPrimer5_tm = primerArray[32];
                                  var arr = rightPrimer5_tm.split(":");
                                  document.getElementById("rightPrimerTM5").innerHTML=arr[1];


                                //  document.getElementById("primers").innerHTML = primerResult
                            }
                          }
                        };
                    request.send(formdata); 

  }
                        
                 
    
   


  function getGeneDetails(element){
   var data = element.innerHTML
   var res = data.split("</td><td>");
   var res1 = res[0].split(">");
   var res2 =res[2].split("</td>");
   var id = res1[1];
   var start = res[1];
   var end = res2[0];
   console.log("IIIIIDDDDDDD "+id);
   
       var formdata = new FormData();

    var geneLocation = '<?php echo $geneLocation;?>';
    var tableName = '<?php echo $tableName;?>';   
    var filename = '<?php echo $filename;?>';   
    console.log("\n" + "NEWW" );
    formdata.append("id", id);
    formdata.append("start", start);
    formdata.append("end", end);
    formdata.append("geneLocation", geneLocation);
    formdata.append("tableName", tableName);
    formdata.append("filename", filename);
    
    var request = new XMLHttpRequest();
              request.open("POST", "fetchGeneDetails.php", true);
            
              request.onload = function () {
                
                        if (request.readyState === request.DONE) {
                            if (request.status === 200) {
                                  console.log(request.responseText);
                                  var res = request.responseText;
                                  res = res.split(";");
                                 
                                  if (geneLocation=="non_genic") {
                                  var leftGeneStart = res[0];
                                  document.getElementById("leftGeneStart").innerHTML = leftGeneStart;
                                  var leftGeneEnd = res[1];
                                  document.getElementById("leftGeneEnd").innerHTML = leftGeneEnd;
                                  var leftLocusName = res[4];
                                  document.getElementById("leftLocusName").innerHTML = leftLocusName;
                                  var rightGeneStart = res[2];
                                  document.getElementById("rightGeneStart").innerHTML = rightGeneStart;
                                  var rightGeneEnd = res[3];
                                  document.getElementById("rightGeneEnd").innerHTML = rightGeneEnd;
                                  var rightLocusName = res[5];  
                                  document.getElementById("rightLocusName").innerHTML = rightLocusName; 
                                  

                                  var leftPFam = res[6];
                                  document.getElementById("leftPFam").innerHTML = leftPFam;
                                  var leftPanther = res[7];
                                  document.getElementById("leftPanther").innerHTML = leftPanther;
                                  var leftEnzyme = res[8];
                                  document.getElementById("leftEnzyme").innerHTML = leftEnzyme;
                                  console.log("leftEnzyme "+leftEnzyme);
                                  var leftko = res[9];
                                  document.getElementById("leftko").innerHTML = leftko;
                                  console.log("leftko "+leftko);
                                  var leftgo = res[10];
                                  document.getElementById("leftgo").innerHTML = leftgo;
                                  console.log("leftgo "+leftgo);
                                  var leftDescription = res[11];
                                  document.getElementById("leftDescription").innerHTML = leftDescription;
                                  console.log("leftDescription "+leftDescription);
                                  var rightPFam = res[12];
                                  document.getElementById("rightPFam").innerHTML = rightPFam;
                                  console.log("rightPFam " + rightPFam);
                                  var rightPanther = res[13];
                                  document.getElementById("rightPanther").innerHTML = rightPanther;
                                  console.log("rightPanther "+ rightPanther);
                                  var rightEnzyme = res[14];
                                  document.getElementById("rightEnzyme").innerHTML = rightEnzyme;
                                  console.log("rightEnzyme "+rightEnzyme);
                                  var rightko = res[15];
                                  document.getElementById("rightko").innerHTML = rightko;
                                  console.log("rightko " +rightko);
                                  var rightgo = res[16];
                                  document.getElementById("rightgo").innerHTML = rightgo;
                                  console.log("rightgo " +rightgo);
                                  var rightDescription = res[17];
                                  document.getElementById("rightDescription").innerHTML = rightDescription;
                                  console.log("rightDescription "+rightDescription);
                                  }

                                  else if (geneLocation=="genic") {
                                  var geneStart = res[0];
                                  document.getElementById("geneStart").innerHTML = geneStart;
                                  var geneEnd = res[1];
                                  document.getElementById("geneEnd").innerHTML = geneEnd;
                                  var locusName = res[2];
                                  document.getElementById("locusName").innerHTML = locusName;
                                  var pFam = res[3];
                                  document.getElementById("pFam").innerHTML = pFam;
                                  console.log("pFam " + pFam);
                                  var panther = res[4];
                                  document.getElementById("panther").innerHTML = panther;
                                  console.log("panther "+ panther);
                                  var enzyme = res[5];
                                  document.getElementById("enzyme").innerHTML = enzyme;
                                  console.log("enzyme "+enzyme);
                                  var ko = res[6];
                                  document.getElementById("ko").innerHTML = ko;
                                  console.log("ko " +rightko);
                                  var go = res[7];
                                  document.getElementById("go").innerHTML = go;
                                  console.log("rightgo " +rightgo);
                                  var description = res[8];
                                  document.getElementById("description").innerHTML = description;
                                  console.log("rightDescription "+rightDescription);
                                 }
                            }
                             
                            
                          }
                    };     
                    request.send(formdata); 
    
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

  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
 
  <script src="../../js/dashboard.js"></script>
  <script src="../../js/owl-carousel.js"></script>
  <script src="../../js/tabs.js"></script>
  <script src="../../js/data-table.js"></script>
  <!-- <script src="../../js/no-ui-slider.js"></script> -->
  <!-- <script src="../../js/ion-range-slider.js"></script> -->
  



  <!-- End custom js for this page-->
</body>

</html>


<?php  
$genomeID = $_GET["g"];

// Load the genome information from the genomesMetadata file and save it in the JSON object which can be used
// later on for rendering the information on UI
$data = json_decode(file_get_contents("genomes/genomesMetadata.json"), true);
foreach ($data as &$obj) {
   if($obj['id'] == $genomeID) {
      $result = json_encode($obj);
      $gName = $obj['name'];
      $species = $obj['species'];
      $common_name = $obj['common_name'];
      $abbreviation = $obj['abbreviation'];
      $genus = $obj['genus'];
   }
}


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
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="stylesheet" href="extraStyle.css">
  <link rel="shortcut icon" href="../../images/favicon.png" />
 

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
      <div class="theme-setting-wrapper">
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
       <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
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
      <!-- partial -->
      
      <!-- main -->

      <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
               <div class="col-md-4"> 
              <div class="card">
                <div class="card-body">
                   <h4 id="genomeName" style="padding-bottom: 10px;">C. sinesis genome v1.1, JGI</h4>
                   <img id="genomeImage" src="assets/images/genomes/sinesis2.jpg" style="width: 430px; height: 250px; padding-bottom: 20px">
            <span id="genomeDescription">Citrus × sinensis, also known as the Citrus aurantium (Sweet Orange Group), includes the commonly cultivated sweet oranges, including blood oranges and navel oranges. The orange fruit is an important agricultural product, used for both the juicy fruit pulp and the aromatic peel (rind). Orange blossoms (the flowers) are used in several different ways, as are the leaves and wood of the tree.</span>
           
            
             <?php
             echo '<h4 class="card-title">'.$_GET["gname"].'</h4><br>';
             echo '<table class="table"style = "width=50%";>';
             echo '<tr>';
             echo '<td> Genus: </td>';
             echo '<td>'.$genus.'</td>';
             echo '</tr>';
             echo '<tr>';
             echo '<td>  Species: </td>';
             echo '<td>'.$species.'</td>';
             echo '</tr>';
             echo '<tr>';
             echo '<td> Common name: </td>';
             echo '<td>'.$common_name.'</td>';
             echo '</tr>';
             echo '<tr>';
             echo '<td> Abbreviation: </td>';
             echo '<td>'.$abbreviation.'</td>';
             echo '</tr>';
             echo '</table>';
             ?>
                </div>
              </div>
            </div>
              <div class="col-md-8">
                <div class="card">
                <div class="card-body">
                   <div class="row">
                    <div class="col-sm-12">
                      <label>Region</label>
                      <div class="col-md-12">
                      <div class="form-group">
                        <div class="row">
                        <div class="col-md-2">
                         <div class="form-check">
                               <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="region" id="optionsRadios1" value="genic" checked>
                                Genic
                                </label>


                            </div>
                          </div>
                          <div class="col-md-6">
                         <div class="form-check">
                               <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="region" id="optionsRadios1" value="non-genic" >
                                Non-genic
                                </label>


                            </div>
                          </div>
                        </div>


                            <div class="dropdown" id="chr">
                              
                              <?php
                               // Generate dropdown dynamically

                               $obj = json_decode($result);
                               $idsFile = $obj->ids;
                               $type = $obj->type;
                               $tableName = $obj->databaseName;
                               $blastDBPath = $obj->blastDBPath;
                               $cntIds = 0;
                               $allChr = [];

                               if ($type =="Chromosome") {

                                echo '<span id="typeName">Chromosomes (Multi select)</span>&nbsp';
                                echo '<br>';
                                echo '<br>';
                                echo '<div class="btn-group" role="group" aria-label="Basic example">';

                                $fn = fopen($idsFile, "r");
                                $cntIds = 0;
                                
                                while(! feof($fn))  {
                                  $line = fgets($fn);
                                  $line = trim($line);
                                  if($line != "") {
                                     $liID = "ch".$cntIds."Check";
                                     $inputID = "ch".$cntIds."Checkbox";
                                     array_push($allChr, $liID);
                                     echo '<button class="btn btn-primary" id='.$liID. ' onclick="chrFunction(this.id)">'.$cntIds.'</button>';
                                     $cntIds++;
                                  }
                                }
                                echo '</div>';
                                echo '<br>';
                                echo '<br>';
                                echo '<button type="submit" class="btn-sm btn-primary mr-2" onclick="clearChrButtons()">clear</button>';
                                echo '<button type="submit" id="selectAllButton" class="btn-sm btn-primary mr-2" onclick="selectAllChrButton()">select all</button>';
                               }
                               else
                               {
                               echo '<button class="btn btn-primary btn-lg dropdown-toggle" type="button" id="dropdownMenuSizeButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">';
                                
                              echo '<span id="typeName">Chromosomes (Multi select)</span>&nbsp';
                              echo '</button>';
                              echo '<div class="dropdown-menu" id="chTypeDropdown" aria-labelledby="dropdownMenuSizeButton1" style="overflow-y: scroll; max-height: 200px;">';
                              echo '<ul class="ch-dropdown" aria-lablledby="dropdownMenuSizeButton1" >';
                              echo '<ul class="ch-dropdown" aria-lablledby="dropdownMenuSizeButton1" >';
                                $fn = fopen($idsFile, "r");
                               $cntIds = 0;
                               while(! feof($fn))  {
                                  $line = fgets($fn);
                                  $line = trim($line);
                                  if($line != "") {
                                     $liID = "ch".$cntIds."Check";
                                     $inputID = "ch".$cntIds."Checkbox";
                                     echo "<li id=".$liID."class='dropdown-item'><label><input id=".$inputID." type='checkbox'>".$line."</label></li>";
                                     $cntIds++;
                                  }
                                }
                               }


                      
                               ?>
                            
                              </div>
                            </div>
                        </div><br>
                    </div>

                    <div class="col-sm-12">
                       <label>Microsatellite Characterstics <i>(select any one)</i></label>
                       <div class="form-group row">
                        <div class="col-md-3">
                       <div class="form-check">
                         <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="micro"  value="motifType" checked="true">
                          Motif Type
                          </label>
                       </div>
                       <div class="dropdown">
                      <button class="btn btn-primary btn-lg dropdown-toggle" type="button" id="motifTypeDropdownButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Select
                      </button>
                      <div class="dropdown-menu " aria-labelledby="dropdownMenuSizeButton1">
                      <ul class=motif-dropdown>
                     <li><a class="dropdown-item" href="#">Mono</a></li>
                     <li><a class="dropdown-item" href="#">Di</a></li>
                     <li><a class="dropdown-item" href="#">Tri</a></li>
                     <li><a class="dropdown-item" href="#">Tetra</a></li>
                     <li><a class="dropdown-item" href="#">Penta</a></li>
                     <li><a class="dropdown-item" href="#">Hexa</a></li>
                     <li><a class="dropdown-item" href="#">Simple</a></li>
                     <li><a class="dropdown-item" href="#">Complex</a></li>
                     <li><a class="dropdown-item" href="#">Compound</a></li>
                     <li><a class="dropdown-item" href="#">All</a></li>
                     </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-9">
                    <div class= "row">
                    <div class="form-check">
                         <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="micro" id="optionsRadios2" value="repeatMotif">
                          Repeat Motif Type
                          </label>
                       </div>
                        <input type="text" class="form-control mb-2 mr-sm-2" style="width: 90%" id="repeatMotifText" placeholder="enter text" disabled="true">
                      </div>
                       </div>


                    </div>
                    <div class="row">
                         <label class="col-sm-2 col-form-label">Frequency range:</label>
                          <div class="col-sm-10">
                            <div class="mt-5 pt-4 w-90 mx-auto">
                        <div id="soft-limit" class="ul-slider slider-primary mb-5"></div>
                      </div>
                          </div>
                          
                      </div>
                  </div>
                  </div>
                </div>
                <div class="card-body">
                   <div class="row">
                    <div class="col-sm-12">
                     <div class="form-check">
                     <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="optionsRadios" id="advancedSearchToggle" value="" checked="true">
                      Advanced Search
                    </label>
                    <br>
                    <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><span id="locationRangeText">Chromosome</span> Location range</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control" id="chLocationStart" style="width: 100%; height: 70%" placeholder="1" />
                          </div>
                          <div class="col-sm-2">
                            <input type="text" class="form-control" id="chLocationEnd" style="width: 100%; height: 70%" placeholder="10000"/>
                          </div>
                        </div>
                           <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Length of SSR:</label>
                          <div class="col-sm-2">
                            <input type="text" class="form-control" id="copyNumberStart" style="width: 100%; height: 70%" placeholder="1"/>
                          </div>
                          <div class="col-sm-2">
                            <input type="text" class="form-control" id="copyNumberEnd" style="width: 100%; height: 70%" placeholder="100000"/>
                          </div>
                        </div>
                      </div>
                      <button id="searchButton" type="submit" class="btn btn-primary mr-2">Search</button>
                      <button id="clearButton" type="submit" class="btn btn-primary mr-2">Clear</button>
                    </div>
                  </div>
                </div>
              </div> 
            </div>
            <!-- Pop Up Modal -->
   <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header" style="background-color: #44519e;">
               <h5 class="modal-title" id="exampleModalLabel"><strong>Error</strong></h5>
            </div>
            <div class="modal-body">
               <p id="errorText">Error...</p>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
         </div>
     </div>
   </div>

         
            </div>
          </div>
      </div>
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->


<script type="text/javascript">
  var chrArray = [];
  $(document).ready(function(){
    var genomeObjString = '<?php echo $result;?>';
    genomeObj = JSON.parse(genomeObjString);
    renderGenomeData(genomeObj);
    //loading the typeName for dropdown. Chromosome or Scaffold. 
    var typeName = '<?php echo $type;?>';
         $("#typeName").text(typeName+"s (Multi select)");
         $("#locationRangeText").text(typeName);
    
    var motifDropdownVal = null;
         // Assign dropdown value
         $(".motif-dropdown li a").click( function() {
            motifDropdownVal = $(this).text();
         });
    var chTypeDropdownVal = null;
         // Assign dropdown value
         $(".ch-dropdown li").click( function() {
            chTypeDropdownVal = $(this).text();
         });

         $(".ch-dropdown li").click( function() {
            chTypeDropdownVal = $(this).text();
         });


         $(".checkbox-menu").on("change", "input[type='checkbox']", function() {
            $(this).closest("li").toggleClass("active", this.checked);
         });

         $(".dropdown-menu li a").click(function(){
            $(this).parents(".dropdown").find('.btn').html($(this).text() + ' <span class="caret"></span>');
            $(this).parents(".dropdown").find('.btn').val($(this).data('value'));
         });

         $(".dropdown-menu ul li ").click(function(){
            $(this).parents(".dropdown").find('.btn').html($(this).text() + ' <span class="caret"></span>');
            $(this).parents(".dropdown").find('.btn').val($(this).data('value'));
         });

         $('.sev_check').click(function(e) {
            $('.sev_check').not(this).prop('checked', false);
         });

    // Enable/Disable - Motif type and repeat motif
         $('input[type=radio][name=micro]').change(function() {
            if($('input[name=micro]:checked').val() == "motifType") {
               $("#motifTypeDropdownButton").prop("disabled", false);
               $("#repeatMotifText").prop("disabled", true);
               $("#repeatMotifFrequency").prop("disabled", true);

            } else if($('input[name=micro]:checked').val() == "repeatMotif") {
               $("#motifTypeDropdownButton").prop("disabled", true);
               $("#repeatMotifText").prop("disabled", false);
               $("#repeatMotifFrequency").prop("disabled", false);
            }
         });


    //advance search toggle
         $("#advancedSearchToggle").change(function() {
            if(this.checked) {
               $("#chLocationStart").prop("disabled", false);
               $("#chLocationEnd").prop("disabled", false);
               $("#copyNumberStart").prop("disabled", false);
               $("#copyNumberEnd").prop("disabled", false);
            } else {
               $("#chLocationStart").prop("disabled", true);
               $("#chLocationEnd").prop("disabled", true);
               $("#copyNumberStart").prop("disabled", true);
               $("#copyNumberEnd").prop("disabled", true);
            }

         });

    // Clear button
         $("#clearButton").click(function() {
            $("#repeatMotifText").val("");
            $("#chLocationStart").val("");
            $("#chLocationEnd").val("");
            $("#copyNumberStart").val("");
            $("#copyNumberEnd").val("");
         });

   // Search button
   
        $("#searchButton").click(function(){

            var validFlag = false;
            var repeatMotifTextVal = $("#repeatMotifText").val();
            var chLocationStartVal = $("#chLocationStart").val();
            var chLocationEndVal = $("#chLocationEnd").val();
            var copyNumberStartVal = $("#copyNumberStart").val();
            var copyNumberEndVal = $("#copyNumberEnd").val();
            var motifTypeActive = false;
            var repeatMotifActive = false;
            var genicActive =true;
            var nonGenicActive = false;
            var advSearchToggleStatus = $("#advancedSearchToggle").is(':checked');
            //var motifMinFreq = "";
          //  var motifMaxFreq ="";

            var cntIds = '<?php echo $cntIds;?>';
            cntIds = parseInt(cntIds);
            var type = '<?php echo $type;?>';
            listIds = [];

            for (var i = 0; i <= cntIds; i++) {
            var elementName = "#ch"+i+"Check";
               if($(elementName).hasClass("active")){
                  listIds.push($(elementName).text());
               }
            }
            var tableName = '<?php echo $tableName;?>';
            console.log(tableName);

            var blastDBPath = '<?php echo $blastDBPath;?>';
            console.log(blastDBPath);

           /* var nouislider =document.getElementById('soft-limit');
            var frequSlider = nouislider.noUiSlider.get();
            motifMinFreq = frequSlider[0];
            motifMaxFreq = frequSlider[1];*/

             // Validations

            if(type == 'Scaffold'  && chTypeDropdownVal == null) {
               $("#errorText").text("Please select atleast one option!");
               $("#errorModal").modal("show");
            } else if($('input[name=region]:checked').val() == "non-genic"){
                nonGenicActive = true;
            } else if($('input[name=region]:checked').val() == "genic"){
                genicActive = true;  
            } else if(chrArray.length == 0){
               $("#errorText").text("Please select atleast one option!");
               $("#errorModal").modal("show");
            } else if($('input[name=micro]:checked').val() == "motifType" && motifDropdownVal == null) {
               $("#errorText").text("Please select Motif Type!");
               $("#errorModal").modal("show");
            } else if($('input[name=micro]:checked').val() == "repeatMotif" && !repeatMotifTextVal) {
               $("#errorText").text("Please enter Repeat Motif pattern!");
               $("#errorModal").modal("show");
            } else if(advSearchToggleStatus && (!chLocationStartVal || !chLocationEndVal)) {
               $("#errorText").text("Please enter Chromosome Location Range!");
               $("#errorModal").modal("show");
            } else if(advSearchToggleStatus && (!copyNumberStartVal || !copyNumberEndVal)) {
               $("#errorText").text("Please enter Copy Number Range!");
               $("#errorModal").modal("show");
            } else {
               if($('input[name=micro]:checked').val() == "motifType") {
                  motifTypeActive = true;
               } else if($('input[name=micro]:checked').val() == "repeatMotif") {
                  repeatMotifActive = true;
               }
               validFlag = true;
            }
            if(validFlag) {
              console.log("Validated!!!");
              console.log(motifDropdownVal);
              console.log(chLocationStartVal);
              console.log(chLocationEndVal);
              var date = new Date();
              var Name = <?php echo json_encode($gName) ?>;
              var result_timestamp = date.getTime();
              
              var formdata = new FormData();
              
              formdata.append("result_timestamp", result_timestamp);
              formdata.append("tableName", tableName);
              formdata.append("type", type);
              formdata.append("listIds", listIds);
              formdata.append("blastDBPath", blastDBPath);
              formdata.append("motifTypeActive", motifTypeActive);
              formdata.append("motifType", motifDropdownVal);
              formdata.append("repeatMotifActive", repeatMotifActive);
              formdata.append("repeatMotif", repeatMotifTextVal);
              formdata.append("advancedSearchActive", advSearchToggleStatus);
              formdata.append("chLocationStart", chLocationStartVal);
              formdata.append("chLocationEnd", chLocationEndVal);
              formdata.append("copyNumberStart", copyNumberStartVal);
              formdata.append("copyNumberEnd", copyNumberEndVal);
              formdata.append("chrsSelected" , chrArray);
              formdata.append("genicActive", genicActive);
              formdata.append("nonGenicActive", nonGenicActive);
             // formdata.append("motifMinFreq", motifMinFreq);
           //   formdata.append("motifMaxFreq" , motifMaxFreq);
              

  
              var request = new XMLHttpRequest();
              request.open("POST", "fetchGenomeInfo.php", true);
              request.onload = function () {
                        if (request.readyState === request.DONE) {
                            if (request.status === 200) {
                                var resultUrl = "results.php?f="+result_timestamp+"&chtype="+type+"&motifType="+motifDropdownVal+"&gname="+Name+"&chstart="+chLocationStartVal+"&chEnd="+chLocationEndVal+"&copyStart="+copyNumberStartVal+"&copyEnd="+copyNumberEndVal;
                                  console.log(request.responseText);
                                  window.location.href = resultUrl;                           
                            }
                        }
                    };        
              request.send(formdata); 
            }
          });

        });
 

  function renderGenomeData(genomeObj) {
         $("#genomeName").html(genomeObj.name);
         $("#genomeDescription").html(genomeObj.description);
         $("#genus").html(genomeObj.description);
         $("#species").html(genomeObj.description);
         $("#common_name").html(genomeObj.description);
         $("#abbreviation").html(genomeObj.description);
         $("#genomeImage").attr("src", genomeObj.image);
  }

  function selectAllChromosomes() {
         $("#ch1Check").addClass("active");
         $("#ch1Checkbox").prop("checked", true);
         $("#ch2Check").addClass("active");
         $("#ch2Checkbox").prop("checked", true);
         $("#ch3Check").addClass("active");
         $("#ch3Checkbox").prop("checked", true);
         $("#ch4Check").addClass("active");
         $("#ch4Checkbox").prop("checked", true);
         $("#ch5Check").addClass("active");
         $("#ch5Checkbox").prop("checked", true);
         $("#ch6Check").addClass("active");
         $("#ch6Checkbox").prop("checked", true);
         $("#ch7Check").addClass("active");
         $("#ch7Checkbox").prop("checked", true);
    }


  
  function chrFunction(click_id) {

    console.log(click_id);
    
    for(let i = 0; i < chrArray.length; i++){
      if(chrArray[i] === click_id)
      {
       document.getElementById(click_id).style.color = "white";
       return;
      }
    }
    document.getElementById(click_id).style.color = "green";
    chrArray.push(click_id);
}

function clearChrButtons() {
    
    for(let i = 0; i < chrArray.length; i++){
       document.getElementById(chrArray[i]).style.color = "white";
    } 
    chrArray = [];
    
}

function selectAllChrButton() {
    var chrs = '<?php echo(json_encode($allChr));?>';
    chrs = chrs.replace(/['"]+/g, '');
    chrs = (chrs.substr(1, chrs.length-2)).split(",");
    
    for(let i = 0; i < chrs.length; i++){
      console.log(chrs[i].trim());
        document.getElementById(chrs[i].trim()).style.color = "green";
        chrArray.push(chrs[i].trim());
      }   
    
}




</script>













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

   

<script type="text/javascript">
  

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
  <!-- End custom js for this page-->
  <script src="../../js/no-ui-slider.js"></script>
   <script src="../../js/ion-range-slider.js"></script>

</body>

</html>


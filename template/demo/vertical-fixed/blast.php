<?php  
$fileID = $_GET["f"];
$geneLocation = $_GET["geneLocation"];
echo $geneLocation;
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
  
  
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="stylesheet" href="extraStyle.css">
  <link rel="shortcut icon" href="../../images/favicon.png" />
  <link rel="stylesheet" type="text/css" href="../../node_modules/c3/c3.css">
   <link rel="stylesheet" type="text/css" href="../../node_modules/morris.js/morris.css">
   


  <script src="../../node_modules/d3/d3.js"></script>
  <script src="../../node_modules/c3/c3.js"></script>
  <script src="../../node_modules/flot/jquery.flot.js"></script>
  <script src="../../node_modules/raphael/raphael.min.js"></script>
  <script src="../../node_modules/morris.js/morris.min.js"></script>
  <script src="../../node_modules/flot/jquery.flot.resize.js"></script>
  <script src="../../node_modules/chartist/dist/chartist.min.js"></script>
  <!-- <script src="../../node_modules/jquery-file-upload/js/jquery.uploadfile.min.js"></script> -->
  <link href="http://hayageek.github.io/jQuery-Upload-File/4.0.11/uploadfile.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://hayageek.github.io/jQuery-Upload-File/4.0.11/jquery.uploadfile.min.js"></script>
 

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
         
           <div class="row">
               <div class="col-md-12"> 
              <div class="card">
                <div class="card-body">
                  <h4>Blast search</h4>
                  <div class="row">

                    <div class="col-md-3">
                      
                      <label for="exampleInputName1">Blast Variant</label>
                    
                      <div class="dropdown">
                        <button class="btn btn-primary btn-lg dropdown-toggle" type="button" id="motifTypeDropdownButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Select variant
                      </button>
                      <div class="dropdown-menu " aria-labelledby="dropdownMenuSizeButton1">
                      <ul class=motif-dropdown>
                     <a class="dropdown-item" href="#">Blastp</a>
                     <a class="dropdown-item" href="#">Blastx</a>
                     <a class="dropdown-item" href="#">Blastn</a>
                     <a class="dropdown-item" href="#">tBlastx</a>
                     <a class="dropdown-item" href="#">tBlastn</a>
                     <
                     </ul>
                      </div>
                      <br>
                      <br>
                   </div>

                    </div>

                    <div class="col-md-9">
                      
                      <label for="exampleInputName1">Database</label>
                    
                      <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
                          Select database
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                          
                          <a class="dropdown-item" href="#">UniProtKB/Swiss-Prot(SwissProt)</a>
                          <a class="dropdown-item" href="#">Non-reduntant Protein/Nucleotide sequences(NR/NT)</a>
                          
                          
                        </div>
                     
                   </div>
                   
                    </div>
                    <div class="col-md-6">
                   
                      <label for="exampleTextarea1">Enter the Fasta sequence or upload a fasta file</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="8" placeholder="Enter the sequence here"></textarea>
                   
                    </div>
                     <div class="col-md-6">
                   <div class="row">
                    
                  <div class="file-upload-wrapper">
                    <div id="fileuploader">Upload</div>
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
  </div>

<script>
  $(document).ready(function()
{
   $("#fileuploader").length
    $("#fileuploader").uploadFile({
      url: "/results",
      fileName: "myfile"
    });
  });
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
  <script src="../../js/file-upload.js"></script>
  <script src="../../js/iCheck.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
  <script src="../../js/formpickers.js"></script>
  <script src="../../js/form-addons.js"></script>
  <script src="../../js/x-editable.js"></script>
  <script src="../../js/dropify.js"></script>
  <script src="../../js/dropzone.js"></script>
  <!-- <script src="../../js/jquery-file-upload.js"></script> -->
  <script src="../../js/formpickers.js"></script>
  <script src="../../js/form-repeater.js"></script>
 <!--  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
 -->

 <!--  <script src="../../js/morris.js"></script> -->
 <!--  <script src="../../js/flot-chart.js"></script>
 -->  
  



  <!-- End custom js for this page-->
</body>

</html>


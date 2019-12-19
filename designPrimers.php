
<?php
$sid = $_GET["sid"];
$end = $_GET["end"];
$chr = $_GET["defaultchr"];
$filename = $_GET["fileName"];
$geneLocation = $_GET["geneLocation"];
$tableName = $_GET["tableName"];
$ssrArray = $_GET["ssrArray"];
echo "Hellopooooooooooo ".$sid."\n";

$data = json_decode(file_get_contents("genomes/genomesMetadata.json"), true);
foreach ($data as &$obj) {
  if ($obj['databaseName'] == $tableName){
    $species = $obj['name'];
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
  <link rel="stylesheet" href="vendors/iconfonts/mdi/font/css/materialdesignicons.min.css">
  
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
  <!-- <script src="https://requirejs.org/docs/release/2.3.5/minified/require.js" type="text/javascript"></script>
   -->
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="stylesheet" href="extraStyle.css">
  <link rel="shortcut icon" href="images/favicon.png" />
  <link rel="stylesheet" type="text/css" href="node_modules/c3/c3.css">
  

  <script src="node_modules/d3/d3.js"></script>
  <script src="node_modules/c3/c3.js"></script>
  <script src="node_modules/flot/jquery.flot.js"></script>
  <script src="node_modules/flot/jquery.flot.resize.js"></script>
 
  <script src="node_modules/ion-rangeslider/js/ion.rangeSlider.js"></script>
  <script src="node_modules/chartist/dist/chartist.min.js"></script>
  <script src="node_modules/nouislider/distribute/nouislider.min.js"></script>
  <script src="node_modules/chartist/dist/chartist.min.js"></script>
 
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
                 
                  <?php
                   echo '<div class="row">
                  <div class="col-md-9"><h4 class="card-title">SSRs selected to design custom primers:</h4></div>
                  <div class ="col-md-3"> <h5><i>'.$species.'</i></h5></div>
                </div>';
                  echo '<div class="table-responsive"  style="height: 700px; overflow: auto;">';
                    echo '<table class="table table-bordered" id="data">';
                     echo '<thead>';
                        echo '<tr>';
                          echo '<th>';
                            echo 'SSR ID';
                          echo '</th>';
                          echo '<th>';
                            echo 'Motif type';
                          echo '</th>';
                          echo '<th>';
                            echo 'Repeat motif';
                          echo '</th>';
                          echo '<th>';
                            echo 'size';
                          echo '</th>';
                          echo '<th>';
                            echo 'SSR Start';
                          echo '</th>';
                          echo '<th>';
                            echo 'SSR End';
                          echo '</th>';
                        echo '</tr>';
                      echo '</thead>';

                          $row = 1;
                          $filePath = "results/ssr_results/ssrPrimers_".$filename.".csv";
                          if (($handle = fopen($filePath, "r")) !== FALSE) {
                                echo '<tbody>';
                              while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                                  $num = count($data);
                                  
                                          if($row !=1){
                                              echo '<tr onclick="getSequence(this);">';
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
                                              echo '<td>';
                                              echo $data[5];
                                              echo '</td>';
                                              echo '</tr>';
                                               
                                         }
                                          $row++;
                                      }
                                      echo '</tbody>';
                    }
                    echo '</table>';
                  echo '</div>';
                  


                echo '</div>';//
              echo '</div>';
           
         echo '</div>';
         ?>
         <div class="col-md-7">
         <br>
         <div class="card">

             
             <div class="card-body">
                  <h4 class="card-title">Design custom Primers</h4>
                  <p class="card-description">
                      Select options to design custom primers                 
                   </p>
                  <div class="form-group row">
                    
                    <div class="template-demo col-lg-6">
                       <label>Melting point temperature range:</label>
                    <div id="skipstep-connect-3" class="ul-slider slider-danger"></div>
                    <div class="d-flex justify-content-between">
                      <p class="mt-3">Min TM: <span id="skip-value-lower-3"></span></p>
                      <p class="mt-3">Max TM: <span id="skip-value-upper-3"></span></p>
                    </div>
                  </div>
                  <div class="template-demo col-lg-6">
                     <label>GC content range:</label>
                    <div id="skipstep-connect-4" class="ul-slider slider-danger"></div>
                    <div class="d-flex justify-content-between">
                      <p class="mt-3">Min GC: <span id="skip-value-lower-4"></span></p>
                      <p class="mt-3">Max GC: <span id="skip-value-upper-4"></span></p>
                    </div>
                  </div>
                   <div class="template-demo col-lg-6">
                    <br>
                    <label>Size of the primer</label>
                      <input type="text" class="form-control" id="primerSize" placeholder="20 is optimal size">
                       <button id="searchButton" type="submit" class="btn btn-primary mr-2">Search</button>
                  </div>
                  </div>
                  </div>  
            </div>   
          </div>
       </div>
    </div>
</div>

<script type="text/javascript">
  var TMvals, GCmin, GCmax, TMmin, TMmax; 
 if ($("#skipstep-connect-3").length) {
    $(function() {
      var skipSlider = document.getElementById('skipstep-connect-3');
      noUiSlider.create(skipSlider, {
        connect: true,
        range: {
          'min': 0,
          '5%': 5,
          '10%': 10,
          '15%': 15,
          '20%': 20,
          '25%': 25,
          '30%': 30,
          '35%': 35,
          '40%': 40,
          '45%': 45,
          '50%': 50,
          '55%': 55,
          '60%': 60,
          '65%': 65,
          '70%': 70,
          '75%': 75,
          '80%': 80,
          '85%': 85,
          '90%': 90,
          '95%': 95,
          'max': 100
        },
        snap: true,
        start: [55, 65]
      });
      var skipValues = [
        document.getElementById('skip-value-lower-3'),
        document.getElementById('skip-value-upper-3')
      ];
      TMmin = document.getElementById('skip-value-lower-3').innerHTML;
      TMmax = document.getElementById('skip-value-upper-3').innerHTML;

      skipSlider.noUiSlider.on('update', function(values, handle) {
        skipValues[handle].innerHTML = values[handle];
       
        TMmin = document.getElementById('skip-value-lower-3').innerHTML;
        TMmax = document.getElementById('skip-value-upper-3').innerHTML;
        
      });
      console.log(TMmin + " " + TMmax);
    });
  }
  var GCvals;

 if ($("#skipstep-connect-4").length) {
    $(function() {
      var skipSlider = document.getElementById('skipstep-connect-4');
      noUiSlider.create(skipSlider, {
        connect: true,
        range: {
          'min': 0,
          '5%': 5,
          '10%': 10,
          '15%': 15,
          '20%': 20,
          '25%': 25,
          '30%': 30,
          '35%': 35,
          '40%': 40,
          '45%': 45,
          '50%': 50,
          '55%': 55,
          '60%': 60,
          '65%': 65,
          '70%': 70,
          '75%': 75,
          '80%': 80,
          '85%': 85,
          '90%': 90,
          '95%': 95,
          'max': 100
        },
        snap: true,
        start: [45, 60]
      });
      var skipValues = [
        document.getElementById('skip-value-lower-4'),
        document.getElementById('skip-value-upper-4')
      ];
        GCmin = document.getElementById('skip-value-lower-4').innerHTML;
        GCmax = document.getElementById('skip-value-upper-4').innerHTML;
      skipSlider.noUiSlider.on('update', function(values, handle) {
        skipValues[handle].innerHTML = values[handle];
        GCmin = document.getElementById('skip-value-lower-4').innerHTML;
        GCmax = document.getElementById('skip-value-upper-4').innerHTML;
      });
      console.log(GCmin + " " + GCmax);
    });
  }

  $("#searchButton").click(function(){
    var formdata = new FormData();
    var ssrArray = "<?php echo $ssrArray;?>";
    console.log("ssrArray: "+ssrArray);
    var primerSize = $("#primerSize").val();
    var geneLocation = '<?php echo $geneLocation;?>';
    var tableName = '<?php echo $tableName;?>';
    //var date = new Date();
    var filename = '<?php echo $filename;?>';
    var sid = '<?php echo $sid;?>';
    var chr = '<?php echo $chr;?>';
    console.log("Hello "+ filename);
    formdata.append("ssrArray", ssrArray);
    formdata.append("GCmin", GCmin);
    formdata.append("TMmin", TMmin);
    formdata.append("GCmax", GCmax);
    formdata.append("TMmax", TMmax);
    formdata.append("primerSize", primerSize);
    formdata.append("geneLocation", geneLocation);
    formdata.append("tableName", tableName);
    formdata.append("filename", filename);
    formdata.append("chr", chr);

    console.log("i'm here");
    console.log(primerSize);
    var request = new XMLHttpRequest();
              request.open("POST", "retrievePrimersInfo.php", true);
            
              request.onload = function () {
                
                        if (request.readyState === request.DONE) {
                            if (request.status === 200) {
                                  console.log(request.responseText);
                                  var resultUrl = "displayPrimerResults.php?filename="+filename+"&id="+sid;
                                  //console.log(request.responseText);
                                  window.location.href = resultUrl; 
                            }
                          }
                    };        
                    request.send(formdata); 
 });
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
  
  <!-- <script src="js/no-ui-slider.js"></script> -->
  <!-- <script src="js/ion-range-slider.js"></script> -->




  <!-- End custom js for this page-->
</body>

</html>


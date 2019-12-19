// This javascript file stores the basic information required by almost all the pages in the application.
// This file should be included in every HTML or PHP page

$(document).ready(function(){
	// Production Server
	localStorage.setItem("host", "http://rkbioinfo-lab5.biotec.usu.edu/ssrprime");
	var host = localStorage.getItem("host");  // This step is required in all HTML/PHP files

	// Loading header and footer
	$("#header").load("pages/header.html");
	$("#footer").load("pages/footer.html");

	// Menu - Dataset dropdown
   
	$("#datasetMenuButton").click(function(){
        $("#datasetList").show();
     });

    $("#datasetMenuButton").focusout(function(){
        var $elem = $(this);

	    // let the browser set focus on the newly clicked elem before check
	    setTimeout(function () {
	        if (!$elem.find(':focus').length) {
	            $("#datasetList").hide();
	        }
	    }, 0);
    });
    
    // Menu - Tools dropdown
	$("#toolMenuButton").click(function(){
        $("#toolList").show();
     });

    $("#toolMenuButton").focusout(function(){
        var $elem = $(this);

	    // let the browser set focus on the newly clicked elem before check
	    setTimeout(function () {
	        if (!$elem.find(':focus').length) {
	            $("#toolList").hide();
	        }
	    }, 0);
    });
	
});

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
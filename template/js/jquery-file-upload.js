(function($) {
  'use strict';
  if ($("#fileuploader").length) {
    $("#fileuploader").uploadFile({
      url: "/home/NKurivella/Documents/Artificial Intelligence 2.jpg",
      fileName: "myfile"
    });
  }
})(jQuery);
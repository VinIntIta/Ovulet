const $ = require("jquery");

$('#userDropdownLink').click(function(e){
  if( $("#userDropdown").is(':visible')){
    $("#userDropdown").hide();
  }
  else{
    $("#userDropdown").show();
  }
  });
$(document).on('click', function(e) {
  if ((!$(e.target).closest('#userDropdownLink').length) ) {
      $("#userDropdown").hide();
  }
});

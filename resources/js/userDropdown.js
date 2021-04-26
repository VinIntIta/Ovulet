const $ = require("jquery");

$('#userDropdown').click(function(){
  $(".user-dropdown").show();
  });
$(document).on('click', function(e) {
  if ((!$(e.target).closest('#userDropdown').length) ) {
      $(".user-dropdown").hide();
  }
});

const $ = require("jquery");
$(document).ready(()=>{
  $(".uploadWrapper button").on("click", ()=>{
    $(".uploadWrapper #upload").click();
  })
})

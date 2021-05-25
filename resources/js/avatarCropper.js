const Cropper = require("./cropper");
const $ = require("jquery");

let avatarCrop = {
  updateType: 'avatar',
  x: null,
  y: null,
  width: null,
  height: null,
  rotate: null,
  scaleX: null,
  scaleY: null
};

$(function(){
  $('#avatarUpdateForm').submit(function(e) {
    avatarCrop = JSON.stringify(avatarCrop);
    $('#profileAvatarCropp').attr('value', avatarCrop)
    })
  });

function readURL(input) {
  if (input.files && input.files[0]) {
    let reader = new FileReader();
    if(avatarCrop.width != null || avatarCrop.height != null) {cropper.destroy();console.log("ok");}

    reader.onload = function(e) {
      $('#avatarPrewiev').attr('src', e.target.result);

        let image = document.getElementById('avatarPrewiev');
        cropper = new Cropper(image, {
          aspectRatio: 9 / 9,
          viewMode:3,
          zoomable: false,
          crop(event) {
            avatarCrop.x = Math.round(event.detail.x);
            avatarCrop.y = Math.round(event.detail.y);
            avatarCrop.width = Math.round(event.detail.width);
            avatarCrop.height = Math.round(event.detail.height);
            avatarCrop.rotate = Math.round(event.detail.rotate);
            avatarCrop.scaleX = Math.round(event.detail.scaleX);
            avatarCrop.scaleY = Math.round(event.detail.scaleY);

          },
      });
    }
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}
$("#profileAvatarInput").change(function() {
  readURL(this);
});

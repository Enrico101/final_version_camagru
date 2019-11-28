(function () {
     var video = document.getElementById('video'),
         vendorUrl = window.URL || window.webkitURL,
         canvas = document.getElementById('canvas'),
         context = canvas.getContext('2d'),
         image = document.getElementById('image');
     var inp_img = document.getElementById('img_sub');
     navigator.getMedia = navigator.getUserMedia ||
         navigator.webkitGetUserMedia ||
         navigator.mozGetUserMedia ||
         navigator.msGetUserMedia;
     
     navigator.getMedia({
         video: true,
         audio: false
     }, function (stream) {
         video.srcObject = stream;
         video.play();
     }, function (error) {
         console.log('error');
     })
     //When buttomn is clicked, the image will be drawn onto a canvas and the value attrribute of img tag will be set
     document.getElementById('pic_button').addEventListener('click', function () {
        context.drawImage(video, 0, 0, 400, 300);
        image.setAttribute('src', canvas.toDataURL('image/png'));
     });
   //  inp_img.setAttribute('value', canvas.toDataURL('image/png'));
 }) ();

function upload_img()
{
    var image = document.getElementById("image");
    var results = image.getAttribute("src");
    if (results.length > 0)
    {
        var inp_img = document.getElementById('img_sub');
        var canvas = document.getElementById('canvas');
        inp_img.setAttribute('value', canvas.toDataURL('image/png'));
    }
}
function tmp_upload()
{
    var image = document.getElementById("image");
    var results = image.getAttribute("src");
    if (results.length > 0)
    {
        var inp_img = document.getElementById('tmp_img');
        var canvas = document.getElementById('canvas');
        inp_img.setAttribute('value', canvas.toDataURL('image/png'));
    }
}   
function tmp_u2()
{
    var image = document.getElementById("image");
    var results = image.getAttribute("src");
    if (results.length > 0)
    {
        var inp_img = document.getElementById('tmp_i2');
        var canvas = document.getElementById('canvas');
        inp_img.setAttribute('value', canvas.toDataURL('image/png'));
    }
}
function tmp_u3()
{
    var image = document.getElementById("image");
    var results = image.getAttribute("src");
    if (results.length > 0)
    {
        var inp_img = document.getElementById('tmp_i3');
        var canvas = document.getElementById('canvas');
        inp_img.setAttribute('value', canvas.toDataURL('image/png'));
    }
}
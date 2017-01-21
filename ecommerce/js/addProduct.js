var snapShot = document.getElementById('snapShot');
var context = snapShot.getContext('2d');
var video = document.getElementById('liveStream');
context.fillText("-N/a-", 10, 100);


if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia)
{
    navigator.getUserMedia({video: true},
            function (stream) //sucess callback
            {
                video.src = window.URL.createObjectURL(stream);
                video.play();
            },
            function ()//fail callback
            {
                context.fillText("Camera not available", 10, 50);
            });
}
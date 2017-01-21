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
///////////////////////////////////////////////////////////////////////////////
document.getElementById("snap").addEventListener("click", function ()
{
    context.clientHeight = video.clientHeight;
    context.clientWidth = video.clientWidth;
    context.drawImage(video, 0, 0,context.clientWidth,context.clientHeight); //320,240
});
var snapShot = document.getElementById('snapShot');
var context = snapShot.getContext('2d');
var video = document.getElementById('liveStream');
var URL;
context.fillText("-N/a-", 10, 100);
document.getElementById("fileToUpload").addEventListener("change", onFileSelected);
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
    context.drawImage(video, 0, 0, context.clientWidth, context.clientHeight);  //320,240
});
/////////////////////////////////////////////////////////////////////////////////
$(document).ready(function () {
    var options = {
        target: '#output', // target element(s) to be updated with server response 
        beforeSubmit: beforeSubmit, // pre-submit callback 
        success: afterSuccess, // post-submit callback 
        uploadProgress: OnProgress, //upload progress callback 
        error: function (exception) {
            alert('Exeption:' + exception);
        }
        ,
        resetForm: true        // reset the form after successful submit 
    };


    $(this).ajaxForm(options);



//function after succesful file upload (when server response)
    function afterSuccess()
    {
        $('#submit-btn').show(); //hide submit button
        $('#loading-img').hide(); //hide submit button
        $('#progressbox').delay(1000).fadeOut(); //hide progress bar
        // var canvas = document.getElementById('myCanvas');
        // var context = canvas.getContext('2d');
    }

//function to check file size before uploading.
    function beforeSubmit() {
        //check whether browser fully supports all File API
        if (window.File && window.FileReader && window.FileList && window.Blob)
        {

            if (!$('#fileToUpload').val()) //check empty input filed
            {
                $("#output").html("Empty file");
                return false;
            }
            for (i = 0; i < $('#fileToUpload')[0].files.length; i++)
            {
                var fsize = $('#fileToUpload')[0].files[i].size; //get file size
                var ftype = $('#fileToUpload')[0].files[i].type; // get file type


                //allow file types 
                switch (ftype)
                {
                    case 'image/png':
                    case 'image/jpeg':
                    case 'image/bmp':
                        break;
                    default:
                        $("#output").html("<b>" + ftype + "</b> Unsupported file type!");
                        return false;
                }

                //Allowed file size is less than 5 MB (1048576)
                if (fsize > 5242880)
                {
                    $("#output").html("<b>" + bytesToSize(fsize) + "</b> Too big file! <br />File is too big, it should be less than 5 MB.");
                    return false;
                }

                $('#submit-btn').hide(); //hide submit button
                $('#loading-img').show(); //hide submit button
                $("#output").html("");
            }
        } else
        {
            //Output error to older unsupported browsers that doesn't support HTML5 File API
            $("#output").html("Please upgrade your browser, because your current browser lacks some new features we need!");
            return false;
        }
    }

//progress bar function
    function OnProgress(event, position, total, percentComplete)
    {
        //Progress bar
        $('#progressbox').show();
        $('#progressbar').width(percentComplete + '%'); //update progressbar percent complete
        $('#statustxt').html(percentComplete + '%'); //update status text
        if (percentComplete > 50)
        {
            $('#statustxt').css('color', '#000'); //change status text to white after 50%
        }
    }
//////////////////////////////////////////////////////////////////////////////////////////
//function to format bites bit.ly/19yoIPO
    function bytesToSize(bytes) {
        var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
        if (bytes === 0)
            return '0 Bytes';
        var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
        return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////


});
function onFileSelected(e) {

    var img = new Image;
    context.drawImage(img, 0, 0);
    img.onload = function () {
        context.drawImage(img, 0, 0);
    };
    img.src = URL.createObjectURL(e.target.files[0]);
}

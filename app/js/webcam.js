const button = document.querySelector('button');
const video =  document.getElementById('video');
// Get Media Stream
navigator.mediaDevices.getUserMedia({video: true, audio: false})
    .then(function (stream) {
        // Link to the video source
        video.srcObject = stream ;
    })
    .catch(function (err) {
        console.log('Error: ${err}')
    });


function take() {
    var ctx = document.getElementById('canvas_montage');
    var ctx3 = document.getElementById('filter');
    var ctx4 = document.getElementById('bg');
    ctx.width = video.videoWidth;
    ctx.height = video.videoHeight;
    ctx.getContext('2d').drawImage(video, 0, 0, ctx.width, ctx.height);
    ctx.getContext('2d').drawImage(ctx4, 0, 0, ctx.width, ctx.height);
    ctx.getContext('2d').drawImage(ctx3, 0, 0, ctx.width, ctx.height);
    document.getElementById("save").disabled = false;
    document.getElementById("save").style.cursor = "pointer";
    document.getElementById("save").style.opacity = "1";
};

function draw1(filtername) {
    var img = new Image();
    img.src = filtername;
    img.onload = drawfilter;
}

function drawfilter() {
    var canvas = document.getElementById('filter');
    canvas.width = this.width;
    canvas.height = this.height;
    var ctx = canvas.getContext('2d');
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.drawImage(this, 0,0);
    document.getElementById("snap").disabled = false;
    document.getElementById("snap").style.cursor = "pointer";
    document.getElementById("snap").style.opacity = "1";
}


function UploadPic() {
    var canvas = document.getElementById('canvas_montage');
    var dataURL = canvas.toDataURL();
    document.getElementById('hidden_data').value = dataURL;
    var fd = new FormData(document.forms["form1"]);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', "../controllers/pictureCo.php");


    xhr.send(fd);

    alert('Image ajoutée avec succès :)');


    window.location.reload();
}

document.getElementById('upload').onchange = function(e) {
    if (this.files[0] && this.files[0].type.includes('image')) {
        var img = new Image();
        img.onload = draw;
        img.onerror = failed;
        img.src = URL.createObjectURL(this.files[0]);
    } else {
        alert('Fichiers autorisés: *.png - *.jpeg - *.gif');
    }
};
function draw() {
    var canvas = document.getElementById('bg');
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    var ctx = canvas.getContext('2d');
    ctx.drawImage(this, 0,0, canvas.width, canvas.height);
}
function failed() {
    console.error("The provided file couldn't be loaded as an Image media");
}

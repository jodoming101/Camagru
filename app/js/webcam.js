window.onload = function() {
    // Normalize the letious vendor prefixed versions of getUserMedia.
    let video = document.getElementById('video');
    let canvas = document.getElementById('image');
    let context = canvas.getContext('2d');
    let save_to_server = document.getElementById('snap');
    if (navigator.mediaDevices.getUserMedia) {
        // Request the camera.
        navigator.mediaDevices.getUserMedia({video: true})
            .then(function (stream) {
                video.srcObject = stream;
            })
            .catch(function () {
                console.log("Une erreur s'est produite.");
            });

    } else {
        alert('Votre navigateur ne supporte pas cette application');
    }
    document.getElementById('snap').addEventListener('click', function () {
        context.drawImage(video, 0, 0, 301, 170);
    });
    save_to_server.addEventListener('click', function (e) {
        var xhr = new XMLHttpRequest();
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    });
};
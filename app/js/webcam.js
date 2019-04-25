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

function addIcon(e) {
    let canvas = document.getElementById("image");
    let context = canvas.getContext('2d');
    let img = new Image();

    document.getElementById("video-div").appendChild(img);
    if (document.getElementById("selected_filter")) {
        document.getElementById("selected_filter").remove();
    }
    img.id = "selected_filter";
    img.src = e.src;
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    context.drawImage(img, 0, 0, img.width, img.height);
    img.src = canvas.toDataURL("image/png");
}

// function importImage() {
//     let file = document.getElementById("uploaded_file");
//     let input = file.files[0];
//     let reader = new FileReader();
//     let img = new Image();
//     let tmp = new Image();
//
//     if (input == null) {
//         alert("You must upload a picture before making a collage");
//         return;
//     }
//     reader.onload = function (e) {
//         tmp.src = e.target.result;
//         let canvas = document.createElement("canvas");
//         let context = canvas.getContext("2d");
//         canvas.width = 640;
//         canvas.height = 480;
//         context.fillRect(0, 0, 640, 480);
//         context.drawImage(tmp, 0, 0, 640, 480);
//         document.getElementById("output").src = canvas.toDataURL("image/png");
//     };
//     reader.readAsDataURL(input);
// }
//
// function takePicture() {
//     let div = document.createElement("div");
//     var aside = document.getElementById("aside");
//     let canvas = document.createElement("canvas");
//     let context = canvas.getContext('2d');
//     let cpy = document.getElementById("selected_icon");
//     let button = document.createElement("button");
//     let hide = document.createElement("input");
//     let src = document.getElementById("output");
//     let img = new Image();
//     let icon = new Image();
//
//     if (cpy == null) {
//         alert("You must choose a miniatures before taking a picture");
//         return;
//     }
//     aside.append(div);
//     div.append(canvas, hide, button);
//     hide.append(img, icon);
//     hide.setAttribute("type", "hidden");
//     icon.src = cpy.src;
//     div.className = "mini";
//     button.innerText = "upload picture";
//     button.id = "add_button";
//     canvas.width = 640;
//     canvas.height = 480;
//     context.fillRect(0, 0, 640, 480);
//     context.drawImage(src, 0, 0, 640, 480);
//     img.src = canvas.toDataURL("image/png");
//     context.drawImage(icon, 0, 0, icon.width, icon.height);
//     button.onclick = function () {
//         let request = "img=" + img.src + "\n&icon=" + icon.src;
//         var xhr = new XMLHttpRequest();
//         xhr.onreadystatechange = function () {
//             if (this.readyState === 4 && this.status === 200) {
//                 alert(this.responseText);
//             }
//         };
//         xhr.open("POST", "/add_picture");
//         xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//         xhr.send(request);
//     };
// }
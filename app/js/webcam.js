// Global Vars

let width = 640,
    height = 480,
    streaming = false;

// DOM Elements
const video =  document.getElementById('video');
const canvas =  document.getElementById('image');
const photos =  document.getElementById('photos');
let filters =  document.getElementsByClassName('cam_filters');
const snapbtn =  document.getElementById('snap');
const uploadbtn =  document.getElementById('upload');
const savebtn =  document.getElementById('save');

// Get Media Stream
navigator.mediaDevices.getUserMedia({video: true, audio: false})
    .then(function (stream) {
        // Link to the video source
        video.srcObject = stream ;
    })
    .catch(function (err) {
        console.log('Error: ${err}')
    });

// Play when ready
// video.addEventListener('canplay', function (e) {
//     if(!streaming) {
//     // Set video / canvas height
//     height = video.videoHeight / (video.videoWidth / width);
//
//     video.setAttribute('width', width);
//     // video.setAttribute('heigth', heigth);
//     canvas.setAttribute('width', width);
//     // canvas.setAttribute('heigth', heigth);
//
//     streaming = true;
//     }
// }, false);

// Photo button event
snapbtn.addEventListener('click', function (e) {
    takePicture();

    e.preventDefault();
}, false);

// Filter event

console.log(filters);

function addFilter(target) {
    let tag = document.getElementById("filter");
    let img = new Image(640, 480);

    img.src = target.src;
    if (tag.childNodes[0] !== undefined) {
        tag.removeChild(tag.childNodes[0]);
    }
    tag.appendChild(img);
}

Array.from(filters).forEach(filter => {
    filter.addEventListener('click', function (e) {
        e.preventDefault();

        console.log(filter);
        // Set filter to chosen element
        filters = e.target.value;

        // Set filter to video
        video.style.filter = filters;

        addFilter(filter);

    });
    }
);

function takePicture() {
    // Create canvas
    // const canvas = document.getElementById('canvas-vid');
    // const ctx = canvas.getContext('2d');
    // if(width && height) {
    //     // Set canvas proportions
    //     canvas.width = width;
    //     canvas.height = height;
    //
    //     // Draw img (snap)
    //     ctx.drawImage(video, 0, 0, width, height);
    //
    //     // Create image from canvas
    //     const imgUrl = canvas.toDataURL('image/png');
    //     console.log(imgUrl);
    //
    //     // Create img element
    //     const img = document.createElement('img');
    //
    //     // Set img src
    //     img.setAttribute('src', imgUrl);
    //
    //     // Add image to photos
    //     photos.appendChild(img);
    // }
    // const
    let canvas = document.createElement("canvas");
    let context = canvas.getContext('2d');
    let photos = document.getElementById("photos");
    let photo = new Image(640, 480);
    let montage = document.createElement("div");
    let filter = new Image(640, 480);

    montage.setAttribute('class', 'mont');
    photo.setAttribute('id', 'image');
    filter.setAttribute('id', 'image');
    filter.src = document.getElementById('filter').childNodes[0].src;
    canvas.width = 640;
    canvas.height = 480;
    context.drawImage(video, 0, 0, 640, 480);
    photo.src = canvas.toDataURL('image/png');


    montage.appendChild(photo);
    montage.appendChild(filter);

    photos.appendChild(montage);
}

// DOM Elements
const video =  document.getElementById('video');
const canvas =  document.getElementById('image');
// const photos =  document.getElementById('photos');
let filters =  document.getElementsByClassName('cam_filters');
const snapbtn =  document.getElementById('snap');
// const uploadbtn =  document.getElementById('upload');
// const savebtn =  document.getElementById('save');

// Get Media Stream
navigator.mediaDevices.getUserMedia({video: true, audio: false})
    .then(function (stream) {
        // Link to the video source
        video.srcObject = stream ;
    })
    .catch(function (err) {
        console.log('Error: ${err}')
    });

// Photo button event
snapbtn.addEventListener('click', function (e) {
    takePicture();

    e.preventDefault();
}, false);

// Filter event

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

        // Set filter to chosen element
        filters = e.target.value;

        // Set filter to video
        video.style.filter = filters;

        addFilter(filter);

    });
    }
);

function takePicture() {

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
    filter.width = 0.3 * canvas.width;
    filter.height = 0.3 * canvas.height;
    context.drawImage(video, 0, 0, 640, 480);
    photo.src = canvas.toDataURL('image/png');

    montage.appendChild(photo);
    montage.appendChild(filter);

    photos.appendChild(montage);
}
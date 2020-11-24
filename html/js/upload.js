

let file_input = document.getElementById('m-admin_img_upload_input');
let create_upload_input = document.getElementById('m-create_img_upload_input');
let inputs = document.querySelectorAll('.l-input-container');

let upload_input = document.querySelectorAll('.m-img_upload_label');

for (let i = 0; i < upload_input.length; i++) {
    upload_input[i].addEventListener('dragover',function(e){
        e.preventDefault();
        e.target.style.backgroundColor = '#222533';
    },false);

    upload_input[i].addEventListener('dragleave',function(e){
        e.preventDefault();
        console.log('dragleaved!');
        e.target.style.backgroundColor = '#1A1C27';
        e.target.style.color = '#676767';
    },false);

    upload_input[i].addEventListener('drop',function(e){
        e.preventDefault();
        let files = e.dataTransfer.files;
        file_input.files = files;
        e.target.style.backgroundColor = '#1A1C27';
        e.target.style.color = '#676767';
        previewFile(files[0],e.target);
    },false);
}

file_input.addEventListener('change',function(e){
    e.preventDefault();
    console.log(e.target.files[0]);
    previewFile(e.target.files[0],e.target.parentNode);
},false);

console.log(inputs);

for (let i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener('change', function(e){
        console.log(inputs[i].files);
        previewFile(e.target.files[0],e.target.parentNode);
    }, false);
}

function previewFile(file,area){
    let reader = new FileReader();
    reader.readAsDataURL(file);
    reader.addEventListener('load',function(){
        //console.log(area);
        area.style.backgroundImage = 'url('+reader.result+')';
        area.style.backgroundSize = 'cover';
        area.style.backgroundPosition = 'center';
        area.style.color = 'transparent';
    },false);
}
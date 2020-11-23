

let file_input = document.getElementById('m-admin_img_upload_input');
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
        previeFile(files[0],e.target);
    },false);

    file_input.addEventListener('change',function(e){
        e.preventDefault();
        console.log(e.target.files[0]);
        previeFile(e.target.files[0],upload_input[i])
    },false);
}


function previeFile(file,area){
    let reader = new FileReader();
    reader.readAsDataURL(file);
    reader.addEventListener('load',function(){
        area.style.backgroundImage = 'url('+reader.result+')';
        area.style.backgroundSize = 'cover';
        area.style.backgroundPosition = 'center';
        area.style.color = 'transparent';
    },false);
}
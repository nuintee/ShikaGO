let imgs = document.querySelectorAll('.pst-imgs-input');
    let objectUrls = [];

    for (let i = 0; i < imgs.length; i++) {
        imgs[i].addEventListener('change',function(){
            let file_list = this.files;
            for (let j = 0; j < file_list.length; j++) {
                objectUrl = URL.createObjectURL( file_list[i] );
                let newImg = document.createElement('img');
                //newImg.src = objectUrl;
                //document.body.appendChild(newImg);
                console.log(objectUrls);
           }
        },false);
    }
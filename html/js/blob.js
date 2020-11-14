
function send_to_php(x){
    let req = new XMLHttpRequest();
    req.onreadystatechange = function(){
        if (req.readyState == 4) { // 通信の完了時
            if (req.status == 200) { // 通信の成功時
              console.log(req.responseText);
            }
            else{
                console.log('通信中');
            }
        }
    }

    req.open('POST', '../includes/posting.inc.php', true);
    req.send('pst-img='+x);
}

let imgs = document.querySelectorAll('.pst-imgs-input');
    for (let i = 0; i < imgs.length; i++) {
        imgs[i].addEventListener('change',function(){
            let file_list = this.files;
            for (let j = 0; j < file_list.length; j++) {
                objectUrl = URL.createObjectURL( file_list[i] );
                send_to_php(objectUrl);
                //let newImg = document.createElement('img');
                //newImg.src = objectUrl;
                //document.body.appendChild(newImg);
                console.log(objectUrl);
           }
        },false);
    }

    

let pwd_btn = document.querySelectorAll('.m-pwd-toggle-button');

for (let i = 0; i < pwd_btn.length; i++) {
    pwd_btn[i].addEventListener('click',function(e){
        let pwd_state = e.target.parentNode.querySelector('input[type="password"]');
        let txt_state = e.target.parentNode.querySelector('input[type="text"]');
        if (pwd_state){
            pwd_state.setAttribute('type','text');
        }
        else if(txt_state){
            txt_state.setAttribute('type','password');
        }
        else{console.log('error');}
    },false);
}

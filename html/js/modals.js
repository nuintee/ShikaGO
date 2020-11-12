
let posts = document.querySelectorAll('.m-content-panel.post');
let modal_post = document.querySelector('.m-modal.post');
let modal_bg = document.querySelector('.m-modal-bg');
let member = document.querySelectorAll('.m-member');

for (let i = 0; i < member.length; i++) {
    member[i].addEventListener('click',function(e){
        console.log(e.target);
        modal_bg.classList.add('show');
        if (e.target.className == "m-member is-online"){
            modal_bg.children[0].querySelector('img').style.border = "greenyellow solid 0.3em";
        }
        else{
            modal_bg.children[0].querySelector('img').style.border = "none";
        }
    },false);
}

modal_bg.addEventListener('click',function(e){
    e.target.classList.remove('show');
});

/* post_modal
for (let i = 0; i < posts.length; i++) {
    posts[i].addEventListener('click',function(e){
        modal.classList.add('show');
        let parent = e.target.parentNode;
        let grand_p = parent.parentNode;
        let post_img = parent.querySelector('img');
        let post_title = "title : "+parent.querySelector('.post-title').innerHTML;
        let post_description = "description : "+parent.querySelector('.content-body.post').innerHTML;
        let post_date = "date : "+parent.querySelector('.post-footer').querySelector('.post-date').innerHTML;
        let post_author = "author: "+parent.querySelector('.post-footer').querySelector('.post-author').innerHTML;
        //modal elements
        modal.querySelector('.modal-img.post').src = post_img.src;
    },false);
}
*/

function hide_modal(x){
    x.parentNode.classList.remove('show');
}
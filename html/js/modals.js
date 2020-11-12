
let posts = document.querySelectorAll('.m-content-panel.post');
let modal = document.querySelector('.m-modal.post');

for (let i = 0; i < posts.length; i++) {
    posts[i].addEventListener('click',function(e){
        modal.classList.add('show');
        let parent = e.target.parentNode;
        let grand_p = parent.parentNode;
        let post_title = "title : "+parent.querySelector('.post-title').innerHTML;
        let post_description = "description : "+parent.querySelector('.content-body.post').innerHTML;
        let post_date = "date : "+parent.querySelector('.post-footer').querySelector('.post-date').innerHTML;
        let post_author = "author: "+parent.querySelector('.post-footer').querySelector('.post-author').innerHTML;
    },false);
}

function hide_modal(x){
    let modal_bg = x.parentNode.parentNode;
    modal_bg.classList.remove('show');
}
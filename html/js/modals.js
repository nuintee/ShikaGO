
let posts = document.querySelectorAll('.m-content-panel.post');
let modal = document.querySelector('.m-modal.post');

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

function hide_modal(x){
    x.parentNode.classList.remove('show');
}
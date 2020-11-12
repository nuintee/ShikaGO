
let posts = document.querySelectorAll('.m-content-panel.post');
let modal_post = document.querySelector('.m-modal-bg.post');
let modal_member = document.querySelector('.m-modal-bg.member');
let modal_bg = document.querySelector('.m-modal-bg');
let member = document.querySelectorAll('.m-member');

for (let i = 0; i < member.length; i++) {
    member[i].addEventListener('click',function(e){
        console.log(e.target);
        modal_member.classList.add('show');
        if (e.target.className == "m-member is-online"){
            modal_member.children[0].querySelector('img').style.border = "greenyellow solid 0.3em";
            modal_member.children[0].querySelector('.modal-top').querySelector('h4').style.color = "#FFF";
        }
        else{
            modal_member.children[0].querySelector('img').style.border = "none";
            modal_member.children[0].querySelector('.modal-top').querySelector('h4').style.color = "#8D8D8D";
        }
    },false);
}

modal_bg.addEventListener('click',function(e){
    e.target.classList.remove('show');
});

/* post_modal */
for (let i = 0; i < posts.length; i++) {
    posts[i].addEventListener('click',function(e){
        modal_post.classList.add('show');
        let parent = e.target.parentNode;
        let grand_p = parent.parentNode;
        let post_img = parent.querySelector('img');
        let post_title = parent.querySelector('.post-title').innerHTML;
        let post_description = parent.querySelector('.content-body.post').innerHTML;
        let post_date = parent.querySelector('.post-footer').querySelector('.post-date').innerHTML;
        let post_author = parent.querySelector('.post-footer').querySelector('.post-author').innerHTML;
        //modal elements
        let modal_parent = modal_post.querySelector('.m-content-panel.project.dis');
        let modal_child = modal_parent.querySelector('.content.project');
        console.log(modal_child);
        modal_parent.querySelector('img').src = post_img.src;
        modal_child.querySelector('.post-title').innerText = post_title;
        modal_child.querySelector('.content-body').innerText = post_description;
        modal_child.querySelector('.post-date').innerText = post_date;
        modal_child.querySelector('.post-author').innerText = post_author;
    },false);
}

modal_post.addEventListener('click',function(e){
    e.target.classList.remove('show');
});

function hide_modal(x){
    x.parentNode.classList.remove('show');
}
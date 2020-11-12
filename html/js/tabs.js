let category = document.querySelectorAll('.m-category-btn');
let pages = document.querySelectorAll('.m-post-panels');
document.querySelector('.is-active').children[0].style.color = "#3190FF";

console.log(category);

function page_hide(){
    for (let i = 0; i < pages.length; i++) {
        pages[i].style.display = "none";
    }
}

for (let i = 0; i < category.length; i++) {

    category[i].addEventListener('click',function(e){
        page_hide();
        document.querySelector('.is-active').children[0].style.color = "#676767";
        document.querySelector('.is-active').classList.remove('is-active');
        e.target.classList.add('is-active');
        let ind = e.target.dataset.index;
        console.log(ind);
            switch (ind) {
                case "1":
                    e.target.children[0].style.color = "#3190FF";
                    console.log(pages);
                    pages[0].style.display = "block";
                    break;
                case "2":
                    e.target.children[0].style.color = "#E4E4E4";
                    pages[1].style.display = "block";
                    break;
                case "3":
                    e.target.children[0].style.color = "#FFFF31";
                    pages[2].style.display = "block";
                    break;
                case "4":
                    e.target.children[0].style.color = "#31FFC8";
                    pages[3].style.display = "block";
                    break;
                case "admin":
                    e.target.children[0].style.color = "#F8D86C";
                    pages[4].style.display = "block";
                    break;
                default:
                    break;
            }
    },false);
}
let category = document.querySelectorAll('.m-category-btn');
let project_panels = document.querySelectorAll('.m-content-panel.project');
let pages = document.querySelectorAll('.m-post-panels');
document.querySelector('.is-active').children[0].style.color = "#3190FF";

function page_hide(){
    for (let i = 0; i < pages.length; i++) {
        pages[i].style.display = "none";
    }
}

function tab_detector(ind,e){
    switch (ind) {
        case "1":
            e.children[0].style.color = "#3190FF";
            pages[ind - 1].style.display = "block";
            break;
        case "2":
            e.children[0].style.color = "#E4E4E4";
            pages[ind - 1].style.display = "block";
            break;
        case "3":
            e.children[0].style.color = "#FFFF31";
            pages[ind - 1].style.display = "block";
            break;
        case "4":
            e.children[0].style.color = "#31FFC8";
            pages[ind - 1].style.display = "block";
            break;
        case "admin": //admin
            e.children[0].style.color = "#F8D86C";
            pages[pages.length - 1].style.display = "block";
            break;
        case "official_bot":
            //e.children[0].style.color = "#31FFC8";
            category[3].click();
            pages[pages.length - 2].style.display = "block";
            break;
        default:
            break;
    }
}


function open_official_bot(x){
    if (x.dataset.index == "official_bot"){
        tab_detector(x.dataset.index, x);
    }
    else{
        console.log("no");
    }
}

function tab_change(e){
    page_hide();
    document.querySelector('.is-active').children[0].style.color = "#676767";
    document.querySelector('.is-active').classList.remove('is-active');
    e.target.classList.add('is-active');
    let ind = e.target.dataset.index;
    tab_detector(ind,e.target);
}

for (let i = 0; i < category.length; i++) {
    category[i].addEventListener('click',tab_change,false);
}
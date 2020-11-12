let category = document.querySelectorAll('.m-category-btn');
document.querySelector('.is-active').children[0].style.color = "#3190FF";


console.log(category);

for (let i = 0; i < category.length; i++) {

    category[i].addEventListener('click',function(e){
        document.querySelector('.is-active').children[0].style.color = "#676767";
        document.querySelector('.is-active').classList.remove('is-active');
        e.target.classList.add('is-active');
            switch (e.target.dataset.index) {
                case "1":
                    e.target.children[0].style.color = "#3190FF";
                    break;
                case "2":
                    e.target.children[0].style.color = "#E4E4E4";
                    break;
                case "3":
                    e.target.children[0].style.color = "#FFFF31";
                    break;
                case "4":
                    e.target.children[0].style.color = "#31FFC8";
                    break;
                case "admin":
                    e.target.children[0].style.color = "#F8D86C";
                    break;
                default:
                    break;
            }
    },false);
}
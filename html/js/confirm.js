
function confirm_test(e){
    let member = e.querySelector('h4').innerHTML;
    let answer = confirm('このアカウント ('+member+') を削除してよろしいですか？');
    return answer;
}

//アカウント削除時のポップアップ
function confirm_test(e){
    let member = e.querySelector('h4').innerHTML;
    let answer = confirm('このアカウント ('+member+') を削除してよろしいですか？');
    return answer;
}

//投稿削除時のポップアップ
function confirm_post_del(){
    let answer　= confirm('この投稿を削除してよろしいですか？');
    return answer;
}

//ゲストアカウントで削除試行時
function cannot_post_del(){
    alert('削除権限がありません。');
}
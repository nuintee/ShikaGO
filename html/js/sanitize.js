
function sanitize(e){
    let target = e.value;
    let sanitized = target.replace(/&/g,'&amp;').
    replace(/"/g,'&quot;').
    replace(/</g,'&lt;').
    replace(/>/g,'&gt;');
    console.log(sanitized);
    return sanitized;
}
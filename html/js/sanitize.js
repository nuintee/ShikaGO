
function sanitize(e){
    let target = e.value;
    let sanitized = target.replace('<script>','');
    sanitized = sanitized.replace('</script>','');
    console.log(sanitized);
    return sanitized;
}
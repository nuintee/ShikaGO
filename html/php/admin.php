<form action="../includes/logout.inc.php" method = "post">
    <input type="submit" value = "logout">
</form>

<div class = "l-pages" id = "post_page">
    <form action = "../includes/posting.inc.php" method = "post">
        <input type="file" accept = "image/*" name = "pst-img" class = "pst-imgs-input">
        <input type="text" name = "pst-title">
        <textarea name="pst-description" id="" cols="30" rows="10"></textarea>
        <input type="submit" value="投稿" name = "pst-submit-btn">
    </form>
</div>
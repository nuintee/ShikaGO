
setInterval(function(){

$.ajax({
    url: "../php/ajax.php",
    dataType: "json"
})
.then(
    function (data){
        if (data.length >= 1){
            for (let i = 0; i < data.length; i++) {
                document.querySelector('.m-member-name').innerHTML = data[i]['admin_name'];
            }
        }
        else{
            document.querySelector('.m-member-name').innerHTML = "offline_member";
        }
        //console.log(admin_status);
        //document.querySelector(".m-member-name").innerHTML = admin_status;
    },
    function (e){
        console.log('failed connection with');
    }
)
},1000);

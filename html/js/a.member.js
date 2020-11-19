//Common Img
let img = document.createElement('img');

//Online Members
const l_online = document.querySelector('.l-online');
let t_div = document.createElement('div');
    t_div.className = "m-member is-online";
let t_h5 = document.createElement('h5');
    t_h5.className = "m-member-name";

//Offline Members
const l_offline = document.querySelector('.l-offline');
let f_div = document.createElement('div');
    f_div.className = "m-member";
let f_h5 = document.createElement('h5');
    f_h5.className = "m-member-name";
    f_h5.innerHTML = "Online-User";

setInterval(function(){

$.ajax({
    url: "../includes/a.member.inc.php",
    dataType: "json"
})
.then(
    function (data){
        if (data.length >= 1){
           for (let i = 0; i < data.length; i++) {
               /*
                console.log(data[i]['admin_name']+" : "+data[i]['admin_status']);
                t_div.appendChild(img);
                t_h5.innerHTML = data[i]['admin_name'];
                t_div.appendChild(t_h5);
                l_online.appendChild(t_div);
                */
           }
        }
        else{
           console.log('0 data');
        }
        //console.log(admin_status);
        //document.querySelector(".m-member-name").innerHTML = admin_status;
    },
    function (e){
        console.log('failed connection with');
    }
)
},1000);

//Fragments
let fragment_t = document.createDocumentFragment();
let fragment_f = document.createDocumentFragment();

//Online Members
const l_online = document.querySelector('.l-online');

//Offline Members
const l_offline = document.querySelector('.l-offline');

setInterval(function(){

$.ajax({
    url: "../includes/a.member.inc.php",
    dataType: "json"
})
.then(
    function (data){
        let member_counts = document.querySelectorAll('.m-member');
        console.log(member_counts.length);
        if (data.length >= 1){
           for (let i = 0; i < data.length; i++) {
               if (member_counts.length <= data.length){
                    if (data[i]['admin_status'] == 0){
                         let f_div = document.createElement('div');
                         f_div.className = "m-member";
                         let img_f = document.createElement('img');
                         let f_h5 = document.createElement('h5');
                         f_h5.className = "m-member-name";
                         //f_h5.innerHTML = "Online-User";
                         f_div.appendChild(img_f);
                         f_h5.innerHTML = data[i]['admin_name'];
                         f_div.appendChild(f_h5);
                         fragment_f.appendChild(f_div);
                         l_offline.appendChild(fragment_f)
                    }
                    else if (data[i]['admin_status'] == 1){
                         let t_div = document.createElement('div');
                         t_div.className = "m-member is-online";
                         let img_t = document.createElement('img');
                         let t_h5 = document.createElement('h5');
                         t_h5.className = "m-member-name";
                         //t_h5.innerHTML = "Online-User";
                         t_div.appendChild(img_t);
                         t_h5.innerHTML = data[i]['admin_name'];
                         t_div.appendChild(t_h5);
                         fragment_t.appendChild(t_div);
                         l_online.appendChild(fragment_t);
                    }
                    else{
                        console.log('Error Data!');
                    }
                }
                else{
                    console.log('Already Updated');
                    return;
                }
           }
        }
        else{
           console.log('0 Data');
        }
        //console.log(admin_status);
        //document.querySelector(".m-member-name").innerHTML = admin_status;
    },
    function (e){
        console.log('failed connection with');
    }
)
},1000);

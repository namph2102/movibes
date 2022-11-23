// lấy id phim
let movie_id = $$('#userphim').value;
let addbookmark = $$("#addbookmark");
let removebookmark = $$("#removebookmark");
let total_stars=Number($$(".rating__view").innerText)-1;
function checkAppearBookmarks() {

    let idfilm = $$("#binhluanID").value
    let addbookmark = $$("#addbookmark");
    let list_item = [];
    let check = false;
    let removebookmark = $$("#removebookmark");
    list_item = JSON.parse(localStorage.getItem('movibes__bookmarks'));
    for (let i = 0; i < list_item.length; i++) {
        if (list_item[i].id == idfilm) {
            check = true;
            index = i;
            break;
        }
    }
    if (check) {
        removebookmark.classList.remove("hidden");
        addbookmark.classList.add("hidden");
    } else {
        removebookmark.classList.add("hidden");
        addbookmark.classList.remove("hidden");
    }
}
if (UserID.value == 0) {
    let idfilm = $$("#binhluanID").value
    let bookmarks = $$('.bookmarks');
    let list_item = [];
    let check = false;
    let index = -2;
    if (!localStorage.getItem('movibes__bookmarks')) {
        localStorage.setItem('movibes__bookmarks', []);
    }
    else {
        checkAppearBookmarks();
    }


    $$("#bookmark__boxfilm").innerHTML = '<p>Chưa có phim nào được <code>Bookmarks</code></p>';
    addbookmark.onclick = function () {
        this.classList.remove("hidden");
        removebookmark.classList.add("hidden");
        if (check) return false;
        let id = $$('#userphim').value;
        let id_user = 0;
        let avata = $$("#movie-imfomation").src;
        let name = $$(".movie-title").innerText;
        let arr = { id, id_user, name, avata, ngaytao: getfullDate() };
        list_item.push(arr);
        localStorage.setItem("movibes__bookmarks", JSON.stringify(list_item));
        render__bookmarks();

    }
    removebookmark.onclick = function () {
        this.classList.remove("hidden");
        addbookmark.classList.add("hidden");
        list_item.splice(index, 1);

        localStorage.setItem("movibes__bookmarks", JSON.stringify(list_item));
        render__bookmarks();
    }

    render__bookmarks();
}


fimldetail();
function fimldetail() {
    // Tăng độ mở rộng
    let idcheckbox = $$('#idcheckbox');
    let isopen__idcheckbox = false;
    idcheckbox.addEventListener('change', function () {
        isopen__idcheckbox = !isopen__idcheckbox;
        $$('.idcheckbox').innerText = (isopen__idcheckbox) ? 'Thu gọn ...' : 'Mở rộng...';

    })
    let idcheckboxseo = $$('#idcheckboxseo');
    let isopen__idcheckboxseo = false;
    idcheckboxseo.addEventListener('change', function () {
        isopen__idcheckboxseo = !isopen__idcheckboxseo;
        $$('.idcheckboxseo').innerText = (isopen__idcheckboxseo) ? 'Thu gọn ...' : 'Mở rộng...';
    })
    // end độ mở rộng
    let search_input_esp = $$('#search_input_esp');
    let search_episode_container = $$('.search_episode-list__container');
    let box_message = $$('.filter-episode .box-message');

    // tìm kiếm tập phim
    search_input_esp.addEventListener('change', function (e) {
        let value = e.target.value;
        box_message.innerText = '';
        loadding__logo('.loadding__episode',1000);
        if (value) {
            let html = '';
            let namefilm = search_input_esp.getAttribute('data-name');
            let totalEpisode =Number(search_input_esp.getAttribute('data-esp'));
            for (let i = 1; i <= totalEpisode; i++) {
                if (String(i).indexOf(value) >= 0) {
                    html += `<a href="/xem-phim-${removeVietnameseTones(namefilm)}+tap-${i}+id-${makeid(6)}${movie_id}.html"  title="${namefilm} tập ${i}">${i}</a>`;
                }
            }
            '/xem-phim-${removeVietnameseTones(item.name)}+tap-${i}+id-${makeid(6)}${item.id}.html';
            if (!html) box_message.innerText = 'Không tìm thấy dữ liệu';

            setTimeout(() => {
                search_input_esp.value = '';
                search_episode_container.innerHTML = html;
            }, 1000);
        }
        else {
            box_message.innerText = 'Không tìm thấy dữ liệu';
        }


    })
}

let movie_star_list_stat = $$('.movie-star_list_stat');
let list_start = movie_star_list_stat.querySelectorAll('img');
let isdanhgia=true;
let Isstar = '';

function render(index = '') {
    let html = '';
    Isstar = index;
    movie_star_list_stat.innerHTML = '';
    if (index) {

        for (let i = 0; i < index; i++) {
            html += `<img width="20"  onmouseover=handMouse(${i + 1}) onmouseup=handMouseUp(${i + 1})  data-index="${i + 1}" height="20" src="/img/star.png" title="Bình chọn ${i + 1} sao" alt="star movibes">`;
        }
        for (let i = index; i < 5; i++) {
            html += `<img width="20"  onmouseover=handMouse(${i + 1}) onmouseup=handMouseUp(${i + 1})  data-index="${i + 1}" height="20" src="/img/starnone.png" title="Bình chọn ${i + 1} sao" alt="star movibes">`;
        }
    }
    else {
        for (let i = 0; i < 5; i++) {
            html += `<img width="20"  onmouseover=handMouse(${i + 1}) onmouseup=handMouseUp(${i + 1})  data-index="${i + 1}" height="20" src="/img/starnone.png" title="Bình chọn ${i + 1} sao" alt="star movibes">`;
        }
    }

    movie_star_list_stat.innerHTML = html;
    list_start = movie_star_list_stat.querySelectorAll('img');
}

// xử lý bình chọn start
let total_star = -1;
function handMouse(index) {
    render(index);
    Isstar = index;
}
$(document).ready(function(){
    var _token = $("input[name='_token']").val();
    $.get("/get-star.html",{id:movie_id,action:"needstar"},function(data){
       if(data){
    
        $('#number__start').text(`${data.total}`);
        total_star=data.total;
         render(data.star);
        render__star_chose(data.total,data.count);
       }
       else{
        render(5);
       }
    })
});

// if(getLocal('stars').length>0){
//     let star=getLocal('stars')[0]['star'];
//     render(star);
//     render__star_chose(star);
// }
// else render(5);;

function render_fullstar() {
    let star = getLocal('stars').find(film => {
        return film['id'] == movie_id;
    });
    if (star) {
        render(star.star);
    }
}
function render__star_chose(index = 5,view=0) {
    $$('.number__start--chose').innerText = index;
    $$(".rating__view").innerText=view;
   
}

function handMouseUp(index) {
    handmouseLeave(index)
    localStorage.setItem("stars",[]);
    liststat=getLocal('stars');
    setLocal('stars', { 'id': 2, 'star': index }, 'id');
    if(isdanhgia){
       
    }
    $(document).ready(function(){
        var _token = $("input[name='_token']").val();
        let esopide=$("#esopide").val();
        $.get("/get-star.html",{id:movie_id,star:index,esopide:esopide},function(data){
            render__star_chose(data.total,data.count+1);
        })
    });
    render(index);
    isdanhgia=false;
}
function handmouseLeave() {
    render_fullstar();

};


function OpenAllEsp(e) {
    let totalEpisode = Number(e.getAttribute('data-episode'));
    let html = '';
    let search_episode_container = $$('.search_episode-list__container');
    let namefilm = $$('.movie-imformation .movie-title').innerText;
    for (let i = 1; i <= totalEpisode; i++) {
        html += `<a href="/xem-phim-${removeVietnameseTones(namefilm)}+tap-${i}+id-${makeid(6)}${movie_id}.html"  title="${namefilm} tập ${i}">${i}</a>`;
    }
    if (!html) box_message.innerText = 'Không tìm thấy dữ liệu';
    loadding__logo('.loadding__episode', 1000);
    setTimeout(() => { search_episode_container.innerHTML = html; }, 500)

};


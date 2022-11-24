
// Đóng mở menu
menu();
// điều hướng hướng dẫn bình luận , chat
directionchat();
//render_film_rank 4 tham số : api, kind, sếp hang theo ngày ,độ dài
render_film_rank(api, '.list__film_ranking');


if ($$l('.rank__day__list--btn button')) {
    let list_btns_rank = $$l('.rank__day__list--btn button');
    Array.from(list_btns_rank).forEach(btn => {
        btn.onclick = function () {
            cleanClass(list_btns_rank, 'active');
            this.classList.add('active');
            fc_loadingfilm('.loading__film__rank');
            setTimeout(() => {
                let key = this.getAttribute('data-day');
                render_film_rank(api, '.list__film_ranking', '', key);
            }, 1000)
        }
    });
}
function menu() {
    let menu = $$('#menu');
    let btn_menu = $$('.menu__nav--bar');
    btn_menu.onclick = function (e) {
        e.stopPropagation();
        hide_all()
        menu.classList.toggle('hide_of_xl');
    }

    let btn_profile__notice = $$('.profile__notice');
    let bookmarks = $$('.bookmarks')
    btn_profile__notice.onclick = function (e) {
        e.stopPropagation();
        hide_all()

        bookmarks.classList.remove("hidden");
    }
    $$(".btn_close_profile").onclick = function (e) {
        e.stopPropagation();
        bookmarks.classList.add("hidden");

    }
    let profile__avata = $$('.profile__avata--image');
    let profile_avata_body = $$('.profile_information ');
    profile__avata.onclick = function (e) {
        e.stopPropagation();
        hide_all();
        profile_avata_body.classList.remove("hidden");
    }

    document.onclick = function () {
        hide_all();
    }
    function hide_all() {
        if (bookmarks.className.includes('show')) {
            bookmarks.classList.remove('show');
        }
        if (bookmarks.className.includes("hidden")) {
            bookmarks.classList.add("hidden");
        }
        if (!profile_avata_body.className.includes("hidden")) {
            profile_avata_body.classList.remove("hidden");
        }
    }
}

let arr__toast = {
    'notice': '/img/notification.png',
    'success': '/img/affection.png',
    'danger': '/img/danger.png'
};

// tạo toast   
function creat_toast(nametoast, title, message) {
    $$('#toast').classList.remove('hidden');
    $$('.modal_content-head h1').innerText = title;
    $$('#toast .toast__img').setAttribute('src', arr__toast[nametoast]);
    $$('#toast .modal_content-des').innerHTML = message;
    $$('.modal_content').onclick = e => {
        e.stopPropagation();
    }
    document.onclick = () => {
        closeToast();
    }
}
// Tạo modal__notice
function modal__notice(message, time = 2000) {
    if (message) {
        let modal__notice = $$('.modal__notice');
        let box__message = $$('.modal__notice--message');
        modal__notice.classList.remove('hidden');
        box__message.innerHTML = message;
        setTimeout(() => {
            modal__notice.classList.add('hidden');
        }, time);

        return true;
    }
    return false;
}
function closeToast() {
    $$('#toast').classList.add('hidden');
}
function render(banner) {
    if (!$$('.btn_banner--left')) return false;
    let index = 0;
    let btn_left = $$('.btn_banner--left');
    let btn_right = $$('.btn_banner--right');
    let linkBannker = $$('.show__link--banner');
    if (!btn_left) return false;
    function render(banner, index) {
        const main__banner = $$('.main__banner');
        const list__box__silde = Array.from($$l('.banner__index--slide .box__silde'));

        // hiện phim chi tiết tại đây
        let link__a = main__banner.querySelector('.show__link--banner');
        //end hiện phim chi tiết tại đây
        let image__banner = main__banner.querySelector('.main__banner--link');
        image__banner.src = banner[index]['image'];
        image__banner.alt = banner[index]['name'];
        linkBannker.href = `/thong-tin-chi-tiet/${removeVietnameseTones(banner[index]['name'])}/${makeid(6)}${banner[index]['id']}.html`;
        main__banner.querySelector('.name__film--banner').innerText = banner[index]['name'];
        main__banner.querySelector('.sologan__film--banner').innerText = banner[index]['sologan'];

        list__box__silde.forEach(function (banner) {
            banner.classList.remove('active');
        });
        list__box__silde[index].classList.add('active');
    };
    if (banner) {
        render(banner, index);
        setInterval(() => {
            index++;
            if (index == banner.length) index = 0;
            render(banner, index);
        }, 8000)
        btn_left.onclick = function () {
            index--;
            if (index < 0) index = banner.length - 1;
            render(banner, index);
        };
        btn_right.onclick = function () {
            index++;
            if (index == banner.length) index = 0;

            render(banner, index);
        };
    }
}
function entitiesDangerStyle(url) {
    if (!url) return false;
    url = url.replaceAll('javascript', "***");
    url = url.replaceAll("***", "\"");
    return url;
}
function hideofseach(e) {
    if (e) {
        e.stopPropagation();
        return false;
    }
    let search_container = $$('.result_search--container');
    search_container.classList.add('hidden');
    $$('#search_input').value = '';
    $$('.result_search--heading').classList.add('hidden');
}
document.onclick = function () {
    hideofseach(false);
}
$$('.result_search--heading').onclick = function (e) {
    hideofseach(e);
}
$$('.result_search--container').onclick = function (e) {
    hideofseach(e);
}
$$('#search_input').onclick = function (e) {
    hideofseach(e);
}
function searchFilm(api) {

    // tìm kiếm phim
    let result_search = $$('.result_search');
    let search = $$('#search_input');
    let search_title = $$('.result_search--heading code');
    let search_container = $$('.result_search--container');

    search.addEventListener('input', function (e) {
        search_container.classList.remove('hidden');
        // let value_search = e.target.value.toLowerCase().trim();
        let value_search = e.target.value.toLowerCase().trim();
        if (value_search) {
            result_search.classList.remove('hidden');
        }
        else {
            result_search.classList.add('hidden');
        }

        search_title.innerText = value_search;
        let apisearch = api.filter(function (item) {
            return (item.name).toLowerCase().trim().includes(value_search) || (item.sologan).toLowerCase().trim().includes(value_search) || (item.name_slug).trim().includes(value_search);
        });
        let html = apisearch.map(function (item) {
            return `
                <a href="/thong-tin-chi-tiet/${removeVietnameseTones(item.name)}/${makeid(6)}${item.id}.html">
                    <figure alt="${item.name}">
                        <img src="${item.image}" alt="${item.image}">
                        <figcaption>
                            <h2>${item.name}</h2>
                            <p>${item.sologan}</p>
                        </figcaption>
                    </figure>
                </a>
                `;
        }).join('');
        if (html) search_container.innerHTML = html;
        else search_container.innerHTML = `<div class="py-4 px-2">Không tìm thấy phim:  <code>${value_search}</code></div>`;

    });
    document.onclick = function () {
        result_search.classList.add('hidden');
        search.value = '';
    };
}
// điều hướng hướng dẫn bình luận , chat, trang home
function directionchat() {

    // các nút
    const btn_repeat = $$('.btn_repeat');
    const btn__conments = $$('.btn__conments');
    const btn_top = $$('.btn_top');
    const btn_guide = $$('.btn_guide');

    if (!btn_repeat) {
        return false;
    }
    function show_menu(index = 0) {
        // khung chứa
        const menu__conment = Array.from($$l('.menu__conment'));
        const conments__container__chat = $$('.conments__container__chat');
        loadding__logo('.products__loadding', 1000);
        conments__container__chat.classList.add('hidden');
        setTimeout(() => {
            menu__conment.forEach(menu => {
                menu.classList.add('hidden');
            });
            if (index == 0) {
                conments__container__chat.classList.remove('hidden');
            }
            menu__conment[index].classList.remove('hidden');
        }, 1000)

    }
    btn_repeat.onclick = function () {
        show_menu();
    }
    btn__conments.onclick = function () {
        show_menu(0);
    }
    btn_top.onclick = function () {
        show_menu(1);
    }
    btn_guide.onclick = function () {
        show_menu(2);
    }
}
// loading logo
function loadding__logo(container, time = 1000) {
    const products__loadding = $$(container);
    products__loadding.classList.remove('hidden');
    setTimeout(() => {
        products__loadding.classList.add('hidden');
    }, time)
}
// end loading logo
function render_stars(votes) {
    let division = votes.split('.');

    let head = Number(division[0]);
    let remains = Number(division[1]);
    let html = '';
    if (head) {
        for (let i = 0; i < head; i++) {
            html += ' <div class="box--star"></div>';
        }
    }
    if (remains) {
        if (remains >= 8) {
            html += ' <div class="box--star"></div>';
        }
        else if (remains > 3) {
            html += ' <div class="box--star haft"></div>';
        }
    }
    return html;

};
function render__kind(index,esopide,totalepisode){
    if(esopide<1) return "Đang cập nhập";
    if(esopide==1 && totalepisode==1){
        if(index==5){
            return `Phim Chiếu Rạp`;
        }else if(index==2){
            return `Trailer`;
        }
       return "Phim lẻ";
    }
    if(esopide>=2 && esopide==totalepisode) return `Hoàn tất ( ${esopide}/${totalepisode} )`;
    switch (Number(index)){
        case 0: return `Tập `+esopide;
        case 1: return `Hoàn tất ( ${esopide}/${totalepisode} )`;
        case 2: return `Trailer`;
        case 3: return `Phim Lẻ `;
        case 4: return `Tập `+esopide;
        case 5: return `Phim Chiếu Rạp`;
    }
    return  '';
}
function reder__theloai(kind){
    switch (Number(kind)){
     
        case 1: return `3D`;
        case 2: return `2D`;
        case 3: return `VIETSUB `;
        case 4: return `Thuyết Minh`;
        case 5: return `Lồng Tiếng`;
    }
    return  'VIETSUB';
}
function render_film_container(api, day = '', len = 12) {
    const container__film = $$('.container__film--list__menu');
    if (!container__film) return false;
    let dem = 0;
    let hidden = '';
    let html = '';
    let lenhidden = 0;


    html = api.map(function (item, index) {
        hidden = (item.openDay[0].includes(Number(day)) > 0 && (item.episode<item.totalepisode)) ? '' : 'hidden';
        if (!day) hidden = '';
        if (!hidden) dem++;
        if (dem > len) hidden = 'hidden';
        if (!hidden) lenhidden++;

        return `<div class="box__film--item col-md-4 col-xl-3 col-6 ${hidden}" title="Xem phim ${item.name}">
        <a href="thong-tin-chi-tiet/${removeVietnameseTones(item.name)}/${makeid(6)}${item.id}.html" class="box__avata--item" title="${item.name}">
            <img src="${item.image}"
                alt="${item.name}">
               
        </a>
        <div class="box__film--episode">
            ${render__kind(item.status,item.episode,item.totalepisode)}
          
        </div>
        <div class="box__film--kind">
        <span class="px-2">${reder__theloai(item.theloaiphim)}</span>
        </div>
        <div class="box__film--title">
            <h4 class="m-0 fs-6">${item.name}</h4>
            <p class="m-0">${item.sologan}</p>
        </div>
        <a  href="/thong-tin-chi-tiet/${removeVietnameseTones(item.name)}/${makeid(6)}${item.id}.html" class="item__overplay">
        </a>
    </div>`;
    }).join('');
    if (!lenhidden) {
        html = '<img title="Không tồn tại sản phẩm" src="/img/empty.jpg" class=w-100" alt="empty search">';
    }
    container__film.innerHTML = html;
}


function render_film_rank(api, container, kind = ['', list = []], key = 'day', len = 6) {
    let film_container = $$(container);
    if (!film_container) return false;
    if (!api) return '';
    let top_index=0;
    api = compareValues(api, key);
    let dem = 0;
    let html = '';
    if (kind[0] == 'phimhomnay') {

        api = kind[1];

        var date = new Date();
        // Lấy số thứ tự của ngày hiện tại
        var current_day = date.getDay();
        api = api.filter(item => {
            openDay = item.openDay.join('').replace('7', '0');
            return item.status == 0 && openDay.includes(String(current_day));
        });
    }
    api = api.filter(item => {
        return item.status < 3;
    })
    html = api.map((item) => {
        dem++;
        let hidden = dem > len ? 'hidden' : '';
        let html__stars = render_stars(item.votes);

        let views = item.views[0][key];
        views = (views >= 1000) ? `${new Intl.NumberFormat().format(Math.round(views / 1000))} K` : views;
        return ` <a href="/thong-tin-chi-tiet/${removeVietnameseTones(item.name)}/${makeid(6)}${item.id}.html" title="Xem Phim ${item.name}" class="${hidden}">
        <figure alt="${item.name}" class="d-flex">
            <div class="box__avata--rank">
                <img src="${item.image}"
                    alt="${item.name}">
                   
            </div>
            <figcaption>
                <h4 class="fs-6">${item.name}</h4>
                <div class="box__review-star">
                    ${html__stars}
                </div>
                <div class="box__review-detail">
                    <p class="text-secondary">${views} <i class="fa-solid fa-eye"></i> Lượt xem</p>
                </div>
            <div class="box__review-top">
                #${++top_index}
            </div>
            <div class="box__review-catelory">
                    ${reder__theloai(item.theloaiphim)}
            </div>
            </figcaption>
        </figure>
    </a>`;
    }).join('');
    film_container.innerHTML = html;
}

// loading fiml
function fc_loadingfilm(boxcontainer, time = 1000) {
    let index = 0;
    let loading__film_container = $$(boxcontainer);
    if (!loading__film_container) return false;
    loading__film_container.classList.remove('hidden');
    let loading__film = Array.from(loading__film_container.querySelectorAll('.box__loadding'));
    function active_loading(loading__film, index) {
        if (index == loading__film.length) {
            loading__film.forEach(function (item) {
                item.classList.remove('active');
            })
        }
        if (!loading__film[index]) return false;
        loading__film[index].classList.add('active');
    }
    let settime = setInterval(() => {
        index++; if (index > loading__film.length) { index = 0 };
        active_loading(loading__film, index);
    }, 100);
    setTimeout(() => {
        clearTimeout(settime);
        loading__film_container.classList.add('hidden');
    }, time);
    let box__loadding = $$l(`${boxcontainer} .box__loadding`);
    cleanClass(box__loadding, 'active');

}

// Sắp Xếp
function compareValues(a = [], key = 'day') {
    if (!api) return [];
    for (let i = 0; i < a.length - 1; i++) {
        for (let j = i + 1; j < a.length; j++) {
            if (a[i].views[0][key] < a[j].views[0][key]) {
                let tam = a[i];
                a[i] = a[j];
                a[j] = tam;
            }
        }
    }
    return api;
}

function cleanClass(nodes, classClearn) {
    if (nodes) {
        Array.from(nodes).forEach(item => {
            item.classList.remove(classClearn);
        });
    }
    return false;

}


let UserID = $$("#UserID");
if (UserID.value == 0) {
    render__bookmarks()
}
function render__bookmarks() {
    let container = $$('.bookmark__boxfilm');
    if (!localStorage.getItem('movibes__bookmarks')) return false;
    let bookmarks = JSON.parse(localStorage.getItem('movibes__bookmarks'));
    let lenbookmarks = 0;
    html = '';
    if (bookmarks[0]) {
        lenbookmarks = bookmarks.length;
        html = bookmarks.map(item => {
            return `<figure alt="${item.name}" class="bookmark__boxfilm_avata p-2 border  border-primary border-1 d-flex align-items-center">
            <img src="${item.avata}" alt="${item.name}">
            <figcaption class="bookmark__boxfilm_ifm ">
                <file-name class="text-capitalize">${item.name}</file-name>
                <film-time>${item.ngaytao}</film-time>
            </figcaption>
            <button onclick="removeBookmarks(${item.id})" class="btn btn-danger rounded-circle">X</button>
        </figure>`;
        }).join('');

    }
    if (!html) html = '<span>Chưa có phim nào được <code>Bookmarks</code></span>';
    $$('.profile__notice .profile__notice-number').innerText = lenbookmarks;
    container.innerHTML = html;
};
localStorage.setItem("remove", false);
function removeBookmarks(id) {
    localStorage.setItem("remove", true);
    let IDphimbinhluan = $$("#userphim");
    let bookmarks = getLocal('movibes__bookmarks');
    let index = 0;
    for (let i = 0; i < bookmarks.length; i++) {
        if (bookmarks[i].id == id) {
            index = i;
            break;
        }
    }
    bookmarks.splice(index, 1);
    localStorage.setItem('movibes__bookmarks', JSON.stringify(bookmarks));
    loadding__logo('.bookmarks__loadding', 1000);
    setTimeout(() => {
        render__bookmarks();
    }, 1000);

}

function getfullDate() {
    function coverdate(d) {
        d = Number(d);
        return d > 9 ? d : ('0' + d);
    }
    const date = new Date();
    let h = date.getHours();
    let i = date.getMinutes();
    let s = date.getSeconds();
    let y = date.getFullYear();
    let m = date.getMonth();
    let d = date.getDate();
    return `${coverdate(d)}/${coverdate(m)}/${coverdate(y)} ${coverdate(h)}:${coverdate(i)}:${coverdate(s)}`;
}
// lấy giá trị của local
function getLocal(keyLocal) {
    let arr = localStorage.getItem(keyLocal);
    if (arr) return JSON.parse(arr);
    return [];
}
// set giá trị local
function setLocal(KeyLocal = 'borkmarks', value, keycheck = '') {
    let arr = getLocal(KeyLocal);
    let checkValue = '';
    if (!arr) {
        localStorage.setItem(KeyLocal, []);
    }
    else if (keycheck) {
        index = arr.findIndex(item => {
            return item[keycheck] == value[keycheck];
        });
        if (index) {
            arr.splice(index, 1);
        }

        checkValue = true;

    }
    else {
        checkValue = arr.filter(item => {
            return item == value;
        });
    }
    // check gia tri có trong ko
    if (!checkValue) return 0;
    arr.push(value);
    arr = JSON.stringify(arr);
    localStorage.setItem(KeyLocal, arr);
    return true;
}

// Tạo id
function makeid(length) {
    var result = '';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for (var i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}
// hàm  đổi s ra thời gian 
function handleTiem(time = 72000) {
    handnumber = time => time > 9 ? time : `0${time}`;
    let h = i = s = 0;
    while (time >= 3600) {
        h = Math.floor(time / 3600);
        time -= h * 3600
    }
    while (time >= 60) {
        i = Math.floor(time / 60);
        time -= i * 60
    }
    return `${handnumber(h)}:${handnumber(i)}:${handnumber(time)}`
}
// hàm cover sang dấu ,
function coverNumberTocoin(number) {
    // cover sang dấu ,
    if (!Number(number)) return 0;
    let dollarUSLocale = Intl.NumberFormat('en-US');
    return dollarUSLocale.format(Number(number));
}
let loadingFist = getLocal('loadingFist');
if (loadingFist) {
    if ($$('.loading')) {
        $$('.loading').classList.remove('hidden');
        setTimeout(() => {
            $$('.loading').classList.add('hidden');
            localStorage.setItem('loadingFist', false);
        }, 4000);
    }
}

function openElement(element, boxelement) {
    $$(boxelement).classList.remove('hidden');

};
function closeElement(element, boxelement, show) {
    $$(boxelement).classList.add('hidden');


};
// chuyen huong thanh menu
let gotoHead = $$('.gotoHead');
let bookmarks = $$(".bookmarks ");

if (gotoHead) {
    let header = $$('#header');

    window.onscroll = function () {

        let profile_information = $$(".profile_information");
        if (!gotoHead || !header) return false;
        let react = header.getClientRects()[0];
        if (react.bottom <= 0) {
            gotoHead.classList.remove('hidden');
            profile_information.classList.remove("hide");
            hideofseach(false);
            if (window.innerWidth <= 1202) {
                $$("#menu").classList.add("hide_of_xl");
                $$(".bookmarks").classList.add("hidden");
            }
        }
        else {
            gotoHead.classList.add('hidden');
        }


    }
}
function entitiesDanger(url) {
    if (!url) return false;
    url = String(url).toLowerCase();
    url = url.replaceAll('javascript', "***");
    url = url.replaceAll("***", "\"");
    url = url.replaceAll('<', "&lt;");
    url = url.replaceAll('>', "&gt;");
    url = url.replaceAll('&', "&amp;");
    url = url.replaceAll('&lt;', "<");
    url = url.replaceAll('&amp;', "&");
    url = url.replaceAll('&gt;', ">");
    return url;
}
// fform báo cáo
function ValidateFormSuport(e) {
    if (!$$("#esopide")) return false;
    let staticNameSuport = entitiesDanger($$('#staticNameSuport').value);
    let staticContent = entitiesDanger($$('#staticContent').value);
    let UserID = $$("#UserID").value;
    let esopide = $$("#esopide").value;
    let userphim = $$("#userphim").value;

    if (!staticNameSuport) {
        modal__notice("Vui lòng điền họ tên!");
    }
    else if (!staticContent) {
        modal__notice("Vui lòng điền nội dung !");
    }
    else if (staticContent.length < 10 || staticContent.length > 100) {
        if (staticContent.toLowerCase().includes("javascript")) {
            modal__notice("Nội dung báo cáo không chuẩn");
        }

    }
    else {
        let staticContent = entitiesDanger($$('#staticContent').value);
        $.get("/add-report.html", { id_user: UserID, fullname: staticNameSuport, comments: staticContent, esopide: esopide, idfilm: userphim }, function (data) {
            modal__notice("Cảm ơn bạn đã báo cáo !");
            $$('#suport_erro').classList.add('hidden');
        })
        e.disabled = !e.disabled;
        $$('#staticContent').value = "";
        setTimeout(() => { e.disabled = !e.disabled; }, 10000)
    }

    return false;
};
function ValidateChangePass(e) {
    let profile_pass = $$("#profile_pass");
    let profile_rpass = $$("#profile_rpass");
    if (!profile_pass.value || !profile_rpass.value) {
        modal__notice("Vui lòng điền đầy đủ thông tin !");
    } else {

        let username = $$("#profille_user").value;
        let password = profile_pass.value;
        let passwordr = profile_rpass.value;
        $.get("/updatePasswork-profile.html", { username: username, password: password, passwordr: passwordr }, function (res) {
            if (res) {
                modal__notice("Thay đổi mật khẩu thành công !");
                profile_pass.value = "";
                profile_rpass.value = "";
                $$("#profile_changepasswork").classList.add("hidden");
            } else {
                modal__notice("Mật khẩu cũ không khớp !");
                profile_pass.value = "";
            }
        })
    }


}
let userLogin = $$('#author_email');
let formchating = $$('#form__chatting');
modal__notice(``, 0);
if (userLogin.value) {
    if (formchating) {
        formchating.querySelector('.chating').classList.remove('hidden');
        formchating.querySelector('button').classList.remove('hidden');
        formchating.querySelector('.warning_chatting').classList.add('hidden');
    }
} else {
    if (formchating) {
        formchating.querySelector('.chating').classList.add('hidden');
        formchating.querySelector('button').classList.add('hidden');
        formchating.querySelector('.warning_chatting').classList.remove('hidden');
    }

}
if ($$("#chatting")) {
    $$("#chatting").addEventListener('input', (e) => {
        if (e.target.value) {
            $$(".loading__chatting").classList.remove('hidden');
        } else {
            $$(".loading__chatting").classList.add('hidden');
        }
    })
}

// chating
function submitComment(e) {
    if (!formchating) return false;
    if (formchating.querySelector('.chating').value.length > 100) {
        return modal__notice('Lưu ý bình luận không vượt quá 100 ký tự');
    }
    if (formchating.querySelector('.chating').value) {
        let button_submit = formchating.querySelector('button');
        let html_button = button_submit.innerHTML;
        let timechat = Number(userLogin.getAttribute('data-timechat'));
        button_submit.disabled = true;
        setTimeout(() => {
            $$(".chating").value = '';
            $$(".chating").disabled = true;
            $$(".loading__chatting").classList.add('hidden');
        }, 1000)
        let idTime = setInterval(() => {
            button_submit.innerHTML = `${timechat}s`
            timechat--;

            if (timechat <= 1) {
                clearInterval(idTime);
                button_submit.innerHTML = html_button;
                button_submit.disabled = false;
                $$(".chating").disabled = false;
                $$(".chating").setAttribute('title', `Vui lòng chờ ${timechat} s`);
            }
        }, 1000)
    } else {
        modal__notice('Vui lòng điền nội dung !');
    }
}

function removeVietnameseTones(str) {
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/đ/g, "d");
    str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
    str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
    str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
    str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
    str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
    str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y");
    str = str.replace(/Đ/g, "D");
    // Some system encode vietnamese combining accent as individual utf-8 characters
    // Một vài bộ encode coi các dấu mũ, dấu chữ như một kí tự riêng biệt nên thêm hai dòng này
    str = str.replace(/\u0300|\u0301|\u0303|\u0309|\u0323/g, ""); // ̀ ́ ̃ ̉ ̣  huyền, sắc, ngã, hỏi, nặng
    str = str.replace(/\u02C6|\u0306|\u031B/g, ""); // ˆ ̆ ̛  Â, Ê, Ă, Ơ, Ư
    // Remove extra spaces
    // Bỏ các khoảng trắng liền nhau
    str = str.replace(/ + /g, " ");
    str = str.trim();
    // Remove punctuations
    // Bỏ dấu câu, kí tự đặc biệt
    str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g, " ");
    return str.toLowerCase().replaceAll(" ", '-');
}


// trang home
function render__FindFilm(api) {
    if (!$$l('.day__weekend .box__day').length) return false;
    let day__weekend = $$l('.day__weekend .box__day');
    if (day__weekend) {
        Array.from(day__weekend).forEach(btn => {
            btn.onclick = function () {
                cleanClass(day__weekend, 'active');
                this.classList.add('active');
                let key = this.getAttribute('data-day');
                fc_loadingfilm('.loading__film_fullday');
                setTimeout(() => {
                    render_film_container(api, String(key));
                }, 1000)
            }
        });
    }
}
$.get("/api/country-all",{},function(data){
    
    let html='';
    data.forEach(country=>{
        html+=`<li><a href="/country/${country.quocgia_slug.replace(" ","-")}.html">${country.name_quocgia}</a></li>`
    })
   $("#country").html(html);
})
 $.get("/api/catelogy-all",{},function(data){
    let html='';
    data.forEach(cate=>{
        html+=`<li><a href="/theloai/${removeVietnameseTones(cate.name_cate)}/id-${cate.id_cate}.html">${cate.name_cate}</a></li>`
    })
   $("#catelogy").html(html);
})


$(document).ready(function () {
    function entitiesDanger(url) {
        if (!url) return false;
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

    // form login
    $("#staticEmail").blur(function () {
        var value = $(this).val();
        var _token = $("input[name='_token']").val();
        $.ajax({
            url: "/dang-nhap.html",
            type: 'POST',
            data: { _token: _token, username: value },
            success: function (data) {
                if (data) {
                    $("#dbusernameMessage").empty();
                    $("#dbusernameMessage").css("color", "#f44336")
                    $("#dbusernameMessage").append("Tài khoản " + value + " không tồn tại !");
                }
                else {
                    $("#dbusernameMessage").empty();
                    $("#dbusernameMessage").append("Tài khoản " + value + " hợp lệ!");
                    $("#dbusernameMessage").css("color", "#ff9800");
                }
            }
        });
    });


    $("#btn_onsubmit").click(function () {
        var username = $("#staticEmail").val();
        var password = $("#passwordLogin").val();
        var _token = $("input[name='_token']").val();
        $.ajax({
            url: "/dang-nhap.html",
            type: 'POST',
            data: { _token: _token, username: username, password: password },
            success: function (data) {
                if (data == 'loginFail') {
                    $("#dbpassMessage").empty();
                    $("#dbpassMessage").css("color", "#f44336")
                    $("#dbpassMessage").append("Passwork không khớp !");
                }
                else if (data == 'loginSuccess') {
                    $("#dbpassMessage").empty();
                    $("#dbpassMessage").append("Password hợp lệ");
                    $("#dbpassMessage").css("color", "#ff9800");
                }
            }
        });
    });


    $("#logoutForm").click(function () {
        var _token = $("input[name='_token']").val();
        $.ajax({
            url: "/dang-xuat.html",
            type: 'POST',
            data: { _token: _token },
            success: function (data) {
                if (data) {
                    modal__notice('Đăng Xuất thành công !');

                    setTimeout(() => {
                        window.location.reload(true);
                    }, 200);
                }
            }
        });
    });

    let arr = [];

    var idFilm = $("#binhluanID").val();
    idFilm = (!idFilm) ? 0 : idFilm;
    $.get("/api/binh-luan-all", { id: idFilm }, function (res) {
        let _html = '';
        let subIcon = '';

        if (res.status_code == 200) {
            arr = res;
            let comments = res.data;
            let title = "Web phim hoạt hình Trung Quốc VietSub";
            comments.forEach(item => {
                let Danhhieu = '';
                let icon_subAvata = '';
                subIcon='';
                if ((item.listIcons).length > 0) {
                    subIcon = '';
                    item.listIcons.forEach(icon => {

                        subIcon += ` <li><img class="box__chat--icon"
                     src="${icon.link}"
                     alt="${icon.name_icon}">
                 <span class="box__chat--icon__des">${icon.name_icon}</span>
             </li>`
                    })
                }

                if (item.listHC.length >= 1) {
                    item.listHC.forEach(hc => {
                        icon_subAvata += `<li><img class="box__chat--icon" src="${hc.link}" alt="${hc.name_icon}">
                    <span class="box__chat--icon__des">${hc.name_icon}</span>
                </li>`;
                    })
                }
                _html += `  
                  <li>
                    <figure alt="${item.permission.toUpperCase()}">
                        <div class="box__chat--profile">
                            <img class="box__chat--image"
                                src="${item.avata}"
                                alt=" ${item.name}">
   
                            <img src="${(!item.vip_icon['link']) ? "" : item.vip_icon['link']}" class="box__chat--profile__vip ${(!item.vip_icon['link']) ? "hidden" : ""}"
                                title="${item.permission}">
                            <span class="box__chat--icon__des box__chat--icon__des_avata ${!(item.vip_icon['name_icon']) ? "hidden" : ""}"> ${item.vip_icon['name_icon']}</span>
                        </div>
                        <figcaption>
                            <h6 class="box__chat--nickname ${item.permission}"><a href="javascript:void(0)" class="${item.permission}">  ${item.name} (Tu vi: ${item.EXp["name_exp"]})</a></h6>
                            <ul class="d-flex box__chat--lists__icon">
                                ${icon_subAvata}
                                 ${subIcon}
                            </ul>
                            <time class="timed__chatting"> ${item.lasttime}</time>

                            <div class="w-100">
                                <p class="box__chat--conment ${item.permission}">
                                 ${(item.comment)}
                              
                               
                                </p>
                            </div>
                        </figcaption>
                    </figure>
                </li>
                  `;
            });
            if (!_html) _html = `<p id="conmentfirst" class="text-danger fs-6">Liệu bạn sẽ là người đầu tiên bình luận ....<p>`;
            $("#binhluan").html(_html);


        }
    })
    $.get("/api/binh-luan-all", { id: "all" }, function (res) {
        let _html = '';
        if (res.status_code == 200) {
            let data = res.data;
            let top = '';
            let i = 5;
            let icon_subAvata = '';
            let _html = '';
            let topUser = '';
            if (!userid) {
                message = `<p class="col-12 text-center fs-5 text-danger"><a href="dang-ky.html">Đăng ký ngay
                </a> để thăng hạng nào </p>`;
            }

            data.forEach(user => {
                let Danhhieu = '';
                let chientich = '';
                icon_subAvata = '';
                if (user.BXH['name_icon'].includes("6")) {
                    i++;
                    top = user.BXH['name_icon'].replace('6', i);
                }

                if (user.listHC.length >= 1) {
                    user.listHC.forEach(hc => {
                        Danhhieu += hc.name_icon;
                        icon_subAvata += `<li><img class="box__chat--icon" src="${hc.link}" alt="${hc.name_icon}">
                    <span class="box__chat--icon__des">${hc.name_icon}</span>
                </li>`;
                    })
                }
                if (user.listIcons.length >= 1) {
                    chientich='';
                    user.listIcons.forEach(icon => {
                        chientich += `<li><img class="box__chat--icon"
                        src="${icon.link}"
                        alt="${icon.name_icon}">
                    <span class="box__chat--icon__des">${icon.name_icon}</span>
                </li>`;
                    })
                }

                if (Number(user.id) == Number(userid)) {
                    topUser = `<li>
                    <figure>
                        <div class="bxh_rank">
                            <img src="${user.BXH['link']}" alt="Xếp hạng">
                            <span>${(!top) ? user.BXH['name_icon'] : top}</span>
                        </div>
                        <figcaption>
                            <div class="box__container_avata">
                                <img class="bxh__avata"
                                    src="${user.avata}" />
                                    ${(user.vip_icon.link) ? ` <img class="bxh__avata-IconVip" title="${user.vip_icon.name_icon}"
                                    src="${user.vip_icon.link}" />` : ""}
                                <figcaption class="bxh__avata--medal">
                                    <ul class="d-flex box__chat--lists__icon">
                                    ${icon_subAvata}
                                    </ul>
                                </figcaption>
                            </div>
        
                            <div class="bxh__des--profile" style="color:#ffe119">
                                <span class="rank-text name_vertical">Tên: ${user.name}</span>
                                <span class="rank-text">Lực Chiến: ${new Intl.NumberFormat("en-US").format(user.exps)}</span>
                                <span class="rank-text">Danh Hiệu: ${Danhhieu}</span>
                                <span class="rank-text">Cảnh Giới: ${user.EXp['name_exp']}</span>
                                <span class="rank-text d-flex">Chiến Tích: <ul
                                        class="d-flex box__chat--lists__icon">
                                        
                                       ${chientich}
                                    </ul>
                                </span>
                            </div>
                        </figcaption>
                    </figure>
                </li>`;
                    $("#bxhUser").html(topUser);
                    _html += topUser;
                }
                else _html += `<li>
                <figure>
                    <div class="bxh_rank">
                        <img src="${user.BXH['link']}" alt="Xếp hạng">
                        <span>${(!top) ? user.BXH['name_icon'] : top}</span>
                    </div>
                    <figcaption>
                        <div class="box__container_avata">
                            <img class="bxh__avata"
                                src="${user.avata}">
                                ${(user.vip_icon.link) ? ` <img class="bxh__avata-IconVip" title="${user.vip_icon.name_icon}"
                                src="${user.vip_icon.link}" alt="top2">` : ""}
                            <figcaption class="bxh__avata--medal">
                                <ul class="d-flex box__chat--lists__icon">
                                ${icon_subAvata}
                                </ul>
                            </figcaption>
                        </div>
    
                        <div class="bxh__des--profile" style="color:#ffe119">
                            <span class="rank-text name_vertical">Tên:   ${user.name}</span>
                            <span class="rank-text">Lực Chiến: ${new Intl.NumberFormat("en-US").format(user.exps)}</span>
                            <span class="rank-text">Danh Hiệu: ${Danhhieu}</span>
                            <span class="rank-text">Cảnh Giới: ${user.EXp['name_exp']}</span>
                            <span class="rank-text d-flex">Chiến Tích: <ul
                                    class="d-flex box__chat--lists__icon">
                                    
                                   ${chientich}
                                </ul>
                            </span>
                        </div>
                    </figcaption>
                </figure>
            </li>`;
        
            });
            $("#bxh").prepend(_html);
        }
    })
    var userid = $("#UserID").val();
    if (userid) {
        render__bookmark();
    }
    $("#btn_Binhluan").click(function () {
        var _token = $("input[name='_token']").val();
        var conment = entitiesDanger($("#chatting").val());
        var userid = $("#UserID").val();
        $("#conmentfirst").empty();
        $.ajax({
            url: "/add-binh-luan.html",
            type: 'POST',
            data: { _token: _token, conment: conment, userid: userid, idFilm: idFilm },
            success: function (data) {

                if (data) {
                    $("#chatting").html('');
                    $.ajax({
                        url: "/api/get-binh-luan-user",
                        type: 'GET',
                        data: { id: userid },
                        success: function (data) {
                            subIcon = '';

                            data.listicon.forEach(icon => {
                                subIcon += ` <li><img class="box__chat--icon" ${(!icon.link) ? "hidden" : ""}
                         src="${icon.link}"
                         alt="${icon.name_icon}">
                     <span class="box__chat--icon__des">${icon.name_icon}</span>
                 </li>`
                            })

                            let _html = `
                        <li>
                        <figure alt="${data.permission}" title="${data.permission}">
                            <div class="box__chat--profile">
                                <img class="box__chat--image"
                                    src="${data.avata}"
                                    alt=" ${data.name} ">
       
                                <img src="${data.vip_icon['link']}" class="box__chat--profile__vip ${(!data.vip_icon['link']) ? "hidden" : ""}" alt="member_vip"
                                    title="${data.permission}">
                                <span class="box__chat--icon__des box__chat--icon__des_avata ${(!data.vip_icon["name_icon"]) ? "hidden" : ""}"> ${data.vip_icon['name_icon']}</span>
                            </div>
                            <figcaption>
                                <h6 class="box__chat--nickname ${data.permission}"><a href="profile" class="${data.permission}">  ${data.name} (Tu vi: ${data.EXp})</a></h6>
                                <ul class="d-flex box__chat--lists__icon">
                                  ${subIcon}
                                </ul>
                                <time class="timed__chatting"> ${data.ngaycomment}</time>
    
                                <div class="w-100">
                                    <p class="box__chat--conment ${data.permission}">
                                    ${data.comment}
                                    </p>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                      `;

                            $("#binhluan").prepend(_html);
                        }
                    });
                }
            }
        });

    });
    var userid = $("#UserID").val();
    if (!userid) {
        userid = 1;
        message = `<p class="col-12 text-center fs-5 text-danger"><a href="/dang-ky.html">Đăng ký ngay
        </a> để thăng hạng nào </p>`;
    }
    $.ajax({
        url: "/api/get-binh-luan-user",
        type: 'GET',
        data: { id: userid },
        success: function (res) {
            if ($("#tuvi")) {
                $("#tuvi").html(`<code class="fs-6 text-warning"> Cảnh giới "${res.EXp}"</code>`);
            }
        }
    });
    // boormak

    nameBoormark = '';
    $("#addbookmark").click(function () {
        $(this).addClass("hidden");
        $("#removebookmark").removeClass("hidden");

        if (Number(userid) <= 0) return false;
        let fimldeltail = $("#movie-imfomation");
        let name = fimldeltail.attr('alt');
        let img = fimldeltail.attr('src');
        modal__notice(`Thêm thành công bookmark phim: "<code>${name}</code>"`);

        $.ajax({
            url: "/handle-book-mark.html",
            type: 'GET',
            data: { action: "add", idFilm: idFilm, userid: userid, name: name, img: img },
            success: function (res) {
                if (res) {
                    render__bookmark()
                }
            }
        });
    });

    $("#removebookmark").click(function () {
        $("#addbookmark").removeClass("hidden");
        $("#removebookmark").addClass("hidden");
        if (Number(userid) <= 0) return false;
        let fimldeltail = $("#movie-imfomation");
        let name = fimldeltail.attr('alt')
        modal__notice(`Xóa thành công bookmark  "<code>${name}</code>"`);
        $.ajax({
            url: "/handle-book-mark.html",
            type: 'GET',
            data: { action: "delete", idFilm: idFilm, userid: userid },
            success: function (res) {
                render__bookmark()
            }
        });
    });
});

function render__bookmark() {
    let lenght_book = 0;
    var userid = $("#UserID").val();
    var idFilm = $("#binhluanID").val();
    idFilm = (!idFilm) ? 0 : idFilm;
    if (Number(userid) <= 0) return false;
    let html = '';
    $.get("/handle-book-mark.html", { action: "show", userid: userid }, function (data) {
        if (data) {
            localStorage.setItem("borkmarks", JSON.stringify(data))
            data.forEach((item, index) => {
                if (item.id == idFilm) {
                    $("#addbookmark").addClass("hidden");
                    $("#removebookmark").removeClass("hidden");
                }
                lenght_book++;
                html += `<figure alt="${item.name}" id="boormark${item.id}" data-id="${item.id}"  class="bookmark__boxfilm_avata p-2 border  border-primary border-1 d-flex align-items-center">
        <img src="${item.avata}" alt="${item.name}">
       <figcaption class="bookmark__boxfilm_ifm ">
           <a href="/thong-tin-chi-tiet/${removeVietnameseTones(item.name)}/${makeid(6)}${item.id}.html"> <file-name class="text-capitalize">${item.name}</file-name>
            <film-time>${item.ngaytao}</film-time></a>
        </figcaption>
        <button onclick="myfunction(${item.id},this)" class="btn btn-danger rounded-circle">X</button>
    </figure>`;
            })

            if (!html) {
                html = `<p>Chưa có phim nào được <code>Bookmarks</code></p>`

            }
            $("#bookmark__boxfilm").html(html)
            $("#profile__notice-number").html(lenght_book);
            localStorage.setItem('movibes__bookmarks', JSON.stringify(data));
        }
    })

    return html;
}

function myfunction(id) {
    data = JSON.parse(localStorage.getItem('movibes__bookmarks'));
    let bookmark__boxfilm_avata = Array.from(document.querySelectorAll('.bookmark__boxfilm_avata'));
    let indexs = 0;
    data.find((item, index) => {
        indexs++;
        return item.id == id && index;
    })
    loadding__logo('.bookmarks__loadding', 1000);
    setTimeout(() => {
        bookmark__boxfilm_avata.forEach((item) => {
            if (item.getAttribute("data-id") == id) {
                item.classList.add('hidden');
                $(document).ready(function () {
                    var userid = $("#UserID").val();
                    $.ajax({
                        url: "/handle-book-mark.html",
                        type: 'GET',
                        data: { action: "delete", idFilm: id, userid: userid },
                        success: function (res) {
                            render__bookmark()
                        }
                    });
                })
            }
        })
    }, 1000)
}
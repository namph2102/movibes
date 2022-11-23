
let userID = $$("#UserID").value;
if(!userID) {
    modal__notice("Vui lòng đăng nhập để thực hiện chức năng này");
  setTimeout(()=>{ $$("#form__login").classList.remove("hidden");},2000);
}
topup();

// ẩn menu trang nap the
function hideBox() {
    $$('.paywin_sub').classList.add('hidden');
    // tên Đặt theo này 
    // off box
    let box_container = ['paywin', 'paycode', 'paybank', 'paycard', 'paywallet', 'viewhistory'];
    box_container.forEach(box => {
        if ($$l(`.${box}`)) {
            $$l(`.${box}`).forEach(box => {
                box.classList.add('hidden');
                box.classList.remove('active');
            })
        }
    })

    // remove active
    let btn_menu_topup = $$l('.btn__menu--topup');
    btn_menu_topup.forEach(btn => { btn.classList.remove('active') });
}
function topup() {
    let btn_menu_topup = $$l('.btn__menu--topup');
    Array.from(btn_menu_topup).forEach(pay => {
        pay.onclick = function () {
            hideBox();
            loadding__logo('.topUp__loadding', 500);
            this.classList.add('active');
            let nameclass = `.${this.getAttribute('data-name')}`;
            let box_content = $$l(nameclass);
            if (box_content) {
                Array.from(box_content).forEach(box => {
                    box.classList.remove('hidden');

                })
            }
        }
    });
}

function copyText(e) {
    // Get the text field
    // Select the text field
    box__copy = e.closest('.box__copy');
    if (!box__copy) return 0;

    let value = box__copy.querySelector('.copy').innerText;
    modal__notice(`Copy thành công  : <code>${value}</code>`);
    navigator.clipboard.writeText(value);
}

let btn__creatCode = $$('.btn__creatCode');

function create_code(e) {
    let times = 600;
    e.classList.toggle('hidden')
    let create__container = e.closest('.create__container');
    let box__copy = create__container.querySelector('.box__copy')
    box__copy.classList.remove('hidden');
    let time = create__container.querySelector('time');
    time.innerText = 'Chờ xíu .....';
    let id_ck = makeid(6);
    let ptChuyenkhoang = create__container.getAttribute('data-pt');
    // console.log('Mã thanh toán :' + id_ck, 'Phương thức chuyển khoản: ' + ptChuyenkhoang,"iduser"+userID);

    $.post("/api/check_codepay", { coin: 0, magiaodich: id_ck, pt: ptChuyenkhoang, userid: userID }, function (res) {
        if (res.notice) {
            setTimeout(() => { modal__notice(res.notice, 2000); }, 2000)
        }
    })

    create__container.querySelector('.copy').innerText = id_ck;
    modal__notice(`Phương Thức "${ptChuyenkhoang}" - Mã: <code>${id_ck}</code>`);
    let idInterval = setInterval(() => {
        times--;
        if (times == 0) {
            box__copy.classList.add('hidden');
            e.classList.toggle('hidden');
            modal__notice(`Mã: <code>${id_ck}</code> đã hết hạn vui lòng tạo mã mới !`);
            clearInterval(idInterval);
        }
        time.innerText = handleTiem(times);

    }, 1000)
}
let valueOld = 0;


function formatnumber(e) {
    let dollarUSLocale = Intl.NumberFormat('en-US');
    let value = e.value.replaceAll(',', '');
    if (Number(value)) {
        valueOld = value;
        e.value = dollarUSLocale.format(value);
    }
    else {
        e.value = dollarUSLocale.format(valueOld);
    }

}
function closeModal(element) {
    // đóng overlay
    $$(element).classList.add('hidden');

}

// xử lý thay đổi ảnh Nạp card paycard;
function clean_hover_image() {
    let paycard__providers = $$l('.paycard__provider');
    Array.from(paycard__providers).forEach(item => {
        let get_link = item.getAttribute('src');
        if (!get_link.includes('h.png')) {
            let new_link = get_link.replace('.png', 'h.png');
            item.setAttribute('src', new_link);
        }


    })
}
let Arr_loadthe = ['Viettel', 'Vina', 'Mobifone', 'Vietnammobi']
let Arr_menhgia = [10, 20, 30, 50, 100, 200, 500, 1000];
let Arr_coin = [...Arr_menhgia];
let paycard_value = $$('.paycard_value');
let container_chagne = $$('.paycard__value--list__item');
render__menhgia(0);
function render__menhgia(loaithe = 0) {
    if (paycard_value) {
        loaithe = Arr_loadthe[loaithe];
        let ld = `<option id="paycard_kind" data-kind="${loaithe}" value="0">CHỌN MỆNH GIÁ</option>`;
        let html = Arr_menhgia.map(item => {
            return `<option value="${item * 1000}">${loaithe} ${coverNumberTocoin(item * 1000)}</option>`
        }).join('');
        paycard_value.innerHTML = ld + html;
    }
    // output mệnh giá quy đổi
    let chietkhau = 5;

    if (loaithe == 'Vietnammobi') chietkhau = 1;
    else if (loaithe == 'Mobifone' || loaithe == 'Vina') chietkhau = 3;
    else chietkhau = 0;
    if (container_chagne) {
        let html_ck = Arr_coin.map(coin => {
            coin_ck = coverNumberTocoin(Math.round((1 - (chietkhau / 100)) * coin * 200));
            return `<div class="paycard__value__item py-2">
            <div class="paycard__price">${coverNumberTocoin(coin * 1000)} VNĐ</div>
            <figure>
                <img src="/icon/coin.png" alt="Coin ${coin}" class="paycard_coin">
                <figcaption class="">${coin_ck}</figcaption>
            </figure>
        </div>`;
        }).join('');

        container_chagne.innerHTML = html_ck;
    }

}

function changeImgae(e, loaithe) {
    clean_hover_image();
    let get_link = e.getAttribute('src');
    let new_link = get_link.replace('h.png', '.png');
    e.setAttribute('src', new_link);
    render__menhgia(loaithe);

}

// lưu giá tri select bank
let selectBank_paywin = {
    namebank: '',
    money: 0
};
//  paywinsub
function open_paysub() {
    modal__notice('Hệ thống chưa cập nhập :( ', 2000);
    return 0;
    selectBank_paywin.namebank = $$('#selectBank_paywin').value;
    if (!$$('#id_topup').value) {
        modal__notice('Vui lòng nhập số tiền!', 2000);
        return false;
    };
    loadding__logo('.topUp__loadding', 800);
    selectBank_paywin.money = $$('#id_topup').value;
    $$('.paywin_sub').classList.remove('hidden');
    $$('#paywin_main').classList.add('hidden');
    $$('.paywin_sub--name_bank').innerText = selectBank_paywin.namebank;

}

// đóng paysub
function pre_paywin() {
    $$('.paywin_sub').classList.add('hidden');
    $$('#paywin_main').classList.remove('hidden');
    selectBank_paywin = [{ namebank: '' }, { money: 0 }];

}
function paywin_sub() {
    let id_password_sub = $$('#id_password_sub').value;
    let id_username_sub = $$('#id_username_sub').value;
    let namebank = selectBank_paywin.namebank;
    let money = selectBank_paywin.money;
    modal__notice('Hệ thống Banking đang xử lý ...! ', 2000);
    // console.log('Username Baking:' + id_username_sub, "Passwork: " + id_password_sub, 'nameBank:' + namebank, 'money:' + money);
}
// end paywinsub

//pay bank

function form_paybank() {
    let paybank_form = $$('#form_paybank');
    let select_paybank = paybank_form.querySelector('#paybank').value;
    let id_coin = paybank_form.querySelector('#id_coin').value;
    let id_user = paybank_form.querySelector('#id_user').value;
    if (!id_coin || !id_user || !$$('#form_paybank #id_code').value) {
        modal__notice('Vui lòng nhập đầy đủ thông tin !', 2000);
        return false;
    }
    id_coin = id_coin.replaceAll(",", "");
    id_code = id_code.value
    // console.log("Coin"+id_coin,"UserID"+userID," ma giao dich "+id_code,"PT "+select_paybank)
    $.post("/api/check_paybank", { coin: id_coin, magiaodich: id_code, pt: select_paybank, userid: userID }, function (res) {
        if (res.notice) {
            setTimeout(() => { modal__notice(res.notice, 2000); }, 1500);
            randomAgain();
        }
    })
    modal__notice('Hệ thống đã xủ lý ...!', 1000);
    paybank_form.querySelector('#id_coin').value='';
    paybank_form.querySelector('#id_user').value='';
    paybank_form.querySelector('#id_code').value='';
}  
// end paybank

// thẻ càooooooooooooooooooooooooo
submitPaycard = () => false;
function handpaycard() {
    let id_paycard = $$('#id_paycard').value;
    let id_code_value = $$('#id_code_value').value;
    let paycard_kind = $$("#paycard_kind").getAttribute("data-kind")
    if (paycard_value.value == '0') {
        modal__notice('Vui lòng chọn mệnh giá !', 2000);
        return false;
    }
    if (!id_paycard) {
        modal__notice('Vui điền mã Seri !', 2000);
        return false;
    }
    if (!id_code_value) {
        modal__notice('Vui điền mã thẻ!', 2000);
        return false;
    }
    id_paycard = Number(id_paycard.replaceAll(',', ''));
    id_code_value = Number(id_code_value.replaceAll(',', ''));

    // $mathe=$request->mathe;
    // $seri=$request->seri;
    // $loaithe=$request->loaithe;
    // $menhgia=$request->menhgia;


    let menhgia = paycard_value.value
    $$(".menhgia").value = menhgia;
    $$(".loaithe").value = paycard_kind;
    $$(".seri").value = id_paycard;
    $$(".mathe").value = id_code_value;
    $$(".userid_napthe").value = userID;
    // $$("#formpaycard").submit()=true;
    // console.log("userID"+userID,"Mệnh giá: "+menhgia,"Loại thẻ "+paycard_kind,"Mã seri:"+id_paycard,"Mã thẻ :"+id_code_value);
    $.post("/api/check_card", { mathe: id_code_value, seri: id_paycard, loaithe: paycard_kind, menhgia: menhgia, userid: userID }, function (res) {
        if (res.status == 404) {
            modal__notice(res.notice, 1000);
        } else if (res.status == 100) {
            modal__notice("Thẻ đang được xử lý tại hệ thống ....");
            $$(".lienhePayCard").classList.remove("hidden");
            randomAgain();
        }
    })
    $$('#id_paycard').value='';
     $$('#id_code_value').value='';
}
function randomAgain(){
    $.post("/api/gethistorypay", { userid: userID }, function (res) {
        if (res.status == 200) {
            renderHistory(res.data)
        }
    })
}
$.post("/api/gethistorypay", { userid: userID }, function (res) {
    if (res.status == 200) {
        renderHistory(res.data)
    }
})
function renderHistory(list) {
    let boxcontainer = $$(".viewhistory__content-list");
    let html = '';
    for (let i = 0; i < list.length; i++) {
        ngaytao = list[i].ngaytao.split(' ');
        day = ngaytao[0];
        time = ngaytao[1];
        html += `<tr>
    <td>${day} <div>${time}</div>
    </td>
    <td>${list[i].nameBank}</td>
    <td class="text-warning">${new Intl.NumberFormat().format(list[i].coin)}</td>
    <td>Nạp Coin</td>
    <td>#${list[i].maThanhToan}</td>
    <td class="text-warning">${list[i].status}</td>
</tr>`
    }
    boxcontainer.innerHTML = html;
}

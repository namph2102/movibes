

let listInput = $$l('.box__login input.form-control');

let patternEmail = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
let patternFullname = /^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i;
let ValidateFormLoginClick=false;

ValidateFormLogin();
function ValidateFormLogin() {
    let message = $$l('.box__login .box_message');
    Array.from(listInput).forEach((input, index) => {
        let box_input = input.closest('.box_input.box__login');
        let nameInput = input.getAttribute('data-name');

        input.addEventListener('input', function () {
            if (input.value) {
                input.classList.remove('error');
                message[index].innerHTML = `Trường ${nameInput} đang được cập nhập.`;
            }
            else {
                input.classList.add('error');
                message[index].innerHTML = `Trường ${nameInput} không được để trống !`;
            }
        });
        input.addEventListener('blur', function () {
            if (!input.value) {
                input.classList.add('error');
                message[index].innerHTML = `Trường ${nameInput} không được để trống !`;
            }
            else {
                input.classList.remove('error');
                message[index].innerHTML = `Trường ${nameInput} đã được cập nhập !`;
            }
        }); 
        if (!input.value) {
            if(ValidateFormLoginClick){
                input.classList.add('error');
            }
           $$('#btn_onsubmit').onclick=function(){
            setTimeout(()=>{
                if($$("#dbpassMessage").innerHTML=="Password hợp lệ"){
                    $$('#form__login').classList.add('hidden');
                    modal__notice('Đăng nhập thành công !');
                    setTimeout(() => {
                        window.location.reload(true);
                    }, 200);
                   };
                
            },1000)
            ValidateFormLoginClick=true;
            ValidateFormLogin();
           }
            message[index].innerHTML = `Trường ${nameInput} không được để trống !`;
        }
        else {
            input.classList.add('error');
            message[index].innerHTML = `${nameInput} không hợp lệ!`;

            if (input.getAttribute('data-type') == 'email') {
                let result = input.value.match(patternEmail);
                if (result) {
                    input.classList.remove('error');
                    message[index].classList.add('hidden');
                }
            }

            if (input.getAttribute('data-type') == 'password') {
                input.classList.remove('error');
                message[index].classList.add('hidden');

            }

        }
    });
    let passwordLogin = $$('#passwordLogin');
    let total_result = Array.from(listInput).find(input => {
        return input.className.includes('error');
    })
    if (!total_result) {
      
      
    }
    return false;
}
function closeForm(element) {
    $$(element).classList.add('hidden');
}

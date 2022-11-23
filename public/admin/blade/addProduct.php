<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
</head>
<style>
    /*
    
      <div class="content_upload_img">
        <label for="mypicture">Click here! 
       <i class="fa-solid fa-cloud-arrow-up image_icon"></i>

        </label>
        <input type="file" id="mypicture">
    </div>  
    */
    .content_upload_img{
        position: relative;
    }
    .content_upload_img:hover{
        opacity: 0.8;
       
    }
    .content_upload_img img{
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    }
    .content_upload_img label{
        width: 100%;
        height: 140px;
        border: 2px dashed rgb(78, 215, 138);
        font-size: 16px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        cursor: pointer;
    }
    .content_upload_img .image_icon{
        font-size: 40px;
    }
  .form_create_table textarea{
        background-color: var(--bg-input);
        border: 2px solid #2196f3;
        margin-top: 16px;
    }
    body .container_footer{
        margin-top: 20px;
    }
    :root {
    --bg: #1E1B3A;
    --text-color: rgba(255, 255, 255, 0.70);
    --head-bg: #303259;
    --bg-input: #221d52;

}

body {
    background-color: var(--bg);
}

.container_content-comback i {
    font-size: 36px;
    color: white;
    border-radius: 50px;
    margin-top: 12px;
}

.container_content-comback i:hover {
    color: #f5c85e;
}

.container_content-des {
    font-size: 16px;
    margin: 8px 0;

}

.container_home {
    height: 52px;
    padding: 0 32px;

}

.home_content .home {
    color: var(--text-color);
    padding: 0 32px;
}

.forn_create_head {
    font-size: 14px;
    text-align: right;
    padding-right: 32px;
}

.form_create_profile input {
    width: 320px;
    padding: 8px 12px;
    font-size: 14px;
    border: none;
    background-color: var(--bg-input);
    border-radius: 4px;
    color: rgba(255, 255, 255, 0.97);
    box-shadow: 1px 1px 4px #211d42;
}

.form_create_profile input:focus {
    outline: 1px solid rgb(197, 60, 128);
}

.form_create_profile section {
    padding: 4px 12px;
    width: 300px;
}

.container_footer {
    margin-top: 40px;
    padding: 0px 24px;
    border: 2px solid #ad7a7a;
    box-shadow: 1px 0px 4px 3px #a59a5e;
    padding-left: 4px;
    display: flex;
    align-items: center;
}

.container_footer button {
    padding: 8px 16px;
    border: none;
    outline: none;
    background-color: #dbae43;
    color: var(--text-color);
    font-size: 16px;
    font-weight: bold;
    border-radius: 4px;
    cursor: pointer;
    margin: 12px;


}

.container_footer button:hover {
    opacity: 0.9;
}
   
  
</style>
<body>
    <div class="container_content">
        <h3 class="container_content-products">Add Products</h3>

        <form class="form_create_profile">

            <table class="form_create_table">
                <tr>
                    <td class="forn_create_head">Name Product *</td>
                    <td><input type="text" name="nameProduct" placeholder="Tên sản phẩm" id="nameProduct">
                    </td>
                </tr>

                <tr>
                    <td class="forn_create_head">Link Product *</td>
                    <td><input type="text" name="linkImgProduct" id="linkImgProduct"
                            placeholder="Link ảnh theo đường dẫn"></td>
                </tr>
                <tr>
                    <td class="forn_create_head">Description Product *</td>
                    <td> <textarea name="desProduct" id="" cols="39" rows="3"
                            placeholder="Mô tả sản phẩm"></textarea></td>

                </tr>


                <tr>
                    <td class="forn_create_head">Price Product *</td>
                    <td><input type="text" name="pridceProduct" id="pridceProduct"
                            placeholder="Giá sản phẩm"></td>
                </tr>
                <tr>
                    <td class="forn_create_head">Amountion Product *</td>
                    <td><input type="text" name="ammountProduct" id="ammountProduct"
                            placeholder="Số lượng sản phẩm"></td>
                </tr>
                <tr>
                    <td class="forn_create_head">File Product *</td>
                    <td>
                        <div class="content_upload_img">
                            <label for="mypicture">
                                <i class="fa-solid fa-cloud-arrow-up image_icon"></i>
                                <h4>Upload Product Preview</h4>
                                <img class="uploadimg" src="" alt="" hidden>
                            </label>
                            <input type="file" hidden id="mypicture" name="fileImage">
                        </div>
                    </td>
                </tr>
            </table>
            <div class="container_footer ">
                <button type="submit" name="create_form">Create Product</button>
            </div>
        </form>
    </div>
</body>

<script>
    var upload = document.querySelector('#mypicture');
    let content_upload_img = document.querySelector('.content_upload_img .uploadimg');
    let form_products = document.querySelector('.form_create_profile');
    upload.addEventListener('change', function (event) {
        uploadedFile = URL.createObjectURL(this.files[0]);
        if (content_upload_img.src == "") {
            content_upload_img.hidden = false;
            content_upload_img.src = uploadedFile;
        }
        else {
            content_upload_img.hidden = false;
            content_upload_img.src = "";
            content_upload_img.src = uploadedFile;
        }
    })
</script>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>

.form_create_table tr{
    height: 42px;
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
    color: var(--text-color);
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
            <h2 class="container_content-name">Create Profile</h2>
            <h4 class="container_content-des">
                Email & password    
            </h4>
            <form class="form_create_profile" action="./xulyform.php" >

                <table class="form_create_table" >
                    <tr>
                        <td class="forn_create_head">Image President *</td>
                        <td><input type="text" name="image" id="image"></td>
                    </tr>
                    <tr>
                        <td class="forn_create_head">UserName *</td>
                        <td><input type="text" name="username" id="username"></td>
                    </tr>
                    <tr>
                        <td class="forn_create_head">Phone *</td>
                        <td><input type="text" name="phone" id="phone"></td>
                    </tr>
                    <tr>
                        <td class="forn_create_head">Email *</td>
                        <td><input type="email" name="email" id="email"></td>
                    </tr>
                    <tr>
                        <td class="forn_create_head">Password *</td>
                        <td><input type="password" name="password" id="password"></td>
                    </tr>
                    <tr>
                        <td class="forn_create_head">Confirm Password *</td>
                        <td><input type="password" name="rpassword" id="rpassword"></td>
                    </tr>
                    <tr>
                        <td class="forn_create_head">Type</td>
                        <td>
                            <select name="" id="">
                                <option value="Individual">Individual</option>
                                <option value="Individual">Group </option>
                                <option value="Individual">City Land</option>
                                <option value="Individual">Admin</option>
                            </select>
                        </td>
                    </tr>       

                </table>
                <div class="container_footer">
                    <button type="submit" name="create_form" value="2">Create Account</button>
                    <button type="submit" name="back_user" value="2">Come Back</button>
                </div>
               
            </form>
        </div>

</body>
      <script>
        //   document.querySelector('form').onclick = function(e){
        //       e.preventDefault();
        //   }
      </script>
</html>
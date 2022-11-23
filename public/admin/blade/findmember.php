<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>
    table{
        width: 100%;
        text-align: center;
    }
   table th,table tr{
  font-size: 1.2rem;
} 

.major h5{
    text-align: center;

}
table h5{
    text-align: center;
}
.form_create_table tr:hover {
    background-color: transparent;
}
</style>
<body>
    <div class="container_content">
        <h2 class="container_content-name">Find Imformation User</h2>
        <h4 class="container_content-des">
            Email & password </h4>
            <form class="form_create_table form_create_profile">
               <table class="form_create_table">
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
                    <td class="forn_create_head">Major *</td>
                    <td><input type="email" name="email" id="email"></td>
                </tr>
               </table>

   
            <!-- <table class="form_create_table">
             <tr>
                    <th>Image</th>
                    <th>User Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th colspan="2">Operation</th>
                    <th>Action</th>
                </tr>
                 <tr>
                    <td><img src="https://phunugioi.com/wp-content/uploads/2022/03/Avatar-Gau.jpg" alt=""></td>
                    <td>Phạm Hoài Nam</td>
                    <td>+877669990</td>
                    <td>namanhthao59@gmail.com</td>
                    <td>
                        <h5>Active</h5>
                    </td>
                    <td><a href=""><i class="fa-solid fa-pen-to-square"></i></a></td>
                    <td><a href=""><i class="fa-solid fa-trash-can"></i></a></td>
                    <td>
                        <h5><a href="">Login</a></h5>
                    </td>
                </tr> 
               

            </table> -->

            <table>
    
                <tr>
                    <th>Image</th>
                    <th>User Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Major</th>
                    <th colspan="2">Operation</th>
                    <th>Action</th>
                </tr>
          
                <tr>
                    <td><img src="https://phunugioi.com/wp-content/uploads/2022/03/Avatar-Gau.jpg" alt=""></td>
                    <td>Phạm Hoài Nam</td>
                    <td>+877669990</td>
                    <td>namanhthao59@gmail.com</td>
                    <td class="major">
                        <h5 class="admin">Admin</h5>
                    </td>
                    <td><a href="{{route('admin.changemember',['id'=>1])}}"><i
                                class="fa-solid fa-pen-to-square"></i></a></td>
                    <td><a href="{{route('admin.account')}}"><i class="fa-solid fa-trash-can"></i></a></td>
                    <td>
                        <h5><a href="">Login</a></h5>
                    </td>
                </tr>
            </table>
            <div class="container_footer">
                <button type="submit" name="find_user" value="2">Find User</button>
                <button type="submit" name="back_user" value="2">Come Back</button>
            </div>
        </form>


    </div>

</body>


</html>
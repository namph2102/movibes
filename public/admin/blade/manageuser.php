<div class="manager_member">
    <div class="manager_member-head" action="">
        <div>
            <button name="members" class="members" value="2">Members</button>
            <button name="admin" class="admins" value="2">Admin</button>
            <button name="admin" class="allmembers" value="2">All Members</button>
        </div>
        <div>
            <h4>Total member: <span>120</span></h4>
            <h4>Curent used: <span>15</span></h4>
        </div>
    </div>
    <form class="manager_member-content">
        <span>Members</span>
        <button name="newaccount" value="2"><a href="{{route('admin.addmember')}}">Add new</a></button>
        <button name="findmember" value="2"><a href="{{route('admin.member')}}">Find Members</a></button>
        <button name="export" value="2"><a href="#">Export members(Excel)</a></button>
    </form>

    <form class="form_member" action="./xulyform.php">
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>User Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Major</th>
                    <th colspan="2">Operation</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
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
                <tr>
                    <td><img src="https://phunugioi.com/wp-content/uploads/2022/03/Avatar-Gau.jpg" alt=""></td>
                    <td>Phạm Hoài Nam</td>
                    <td>+877669990</td>
                    <td>namanhthao59@gmail.com</td>
                    <td class="major">
                        <h5>Member</h5>
                    </td>
                    <td><a href="{{route('admin.changemember',['id'=>2])}}"><i
                                class="fa-solid fa-pen-to-square"></i></a></td>
                    <td><a href="{{route('admin.account')}}"><i class="fa-solid fa-trash-can"></i></a></td>
                    <td>
                        <h5><a href="">Login</a></h5>
                    </td>
                </tr>
                <tr>
                    <td><img src="https://phunugioi.com/wp-content/uploads/2022/03/Avatar-Gau.jpg" alt=""></td>
                    <td>Phạm Hoài Nam</td>
                    <td>+877669990</td>
                    <td>namanhthao59@gmail.com</td>
                    <td class="major">
                        <h5>Member</h5>
                    </td>
                    <td><a href="{{route('admin.changemember',['id'=>3])}}"><i
                                class="fa-solid fa-pen-to-square"></i></a></td>
                    <td><a href="{{route('admin.account')}}"><i class="fa-solid fa-trash-can"></i></a></td>
                    <td>
                        <h5><a href="">Login</a></h5>
                    </td>
                </tr>
                <tr>
                    <td><img src="https://phunugioi.com/wp-content/uploads/2022/03/Avatar-Gau.jpg" alt=""></td>
                    <td>Phạm Hoài Nam</td>
                    <td>+877669990</td>
                    <td>namanhthao59@gmail.com</td>
                    <td class="major">
                        <h5>Mangager</h5>
                    </td>
                    <td><a href="{{route('admin.changemember',['id'=>3])}}"><i
                                class="fa-solid fa-pen-to-square"></i></a></td>
                    <td><a href="{{route('admin.account')}}"><i class="fa-solid fa-trash-can"></i></a></td>
                    <td>
                        <h5><a href="">Login</a></h5>
                    </td>
                </tr>
                <tr>
                    <td><img src="https://phunugioi.com/wp-content/uploads/2022/03/Avatar-Gau.jpg" alt=""></td>
                    <td>Phạm Hoài Nam</td>
                    <td>+877669990</td>
                    <td>namanhthao59@gmail.com</td>
                    <td class="major">
                        <h5>Member</h5>
                    </td>
                    <td><a href="{{route('admin.changemember',['id'=>3])}}"><i
                                class="fa-solid fa-pen-to-square"></i></a></td>
                    <td><a href="{{route('admin.account')}}"><i class="fa-solid fa-trash-can"></i></a></td>
                    <td>
                        <h5><a href="">Login</a></h5>
                    </td>
                </tr>
                <tr>
                    <td><img src="https://phunugioi.com/wp-content/uploads/2022/03/Avatar-Gau.jpg" alt=""></td>
                    <td>Phạm Hoài Nam</td>
                    <td>+877669990</td>
                    <td>namanhthao59@gmail.com</td>
                    <td class="major">
                        <h5 class="admin">Admin</h5>
                    </td>
                    <td><a href="{{route('admin.changemember',['id'=>3])}}"><i
                                class="fa-solid fa-pen-to-square"></i></a></td>
                    <td><a href="{{route('admin.account')}}"><i class="fa-solid fa-trash-can"></i></a></td>
                    <td>
                        <h5><a href="">Login</a></h5>
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>
<script>
    (function () {
        let list_acount = document.querySelectorAll('.major');
        if (list_acount) {
            let btn_members = document.querySelector('.members');
            let btn_admin = document.querySelector('.admins');
            let btn_allmember = document.querySelector('.allmembers');
            btn_members.onclick = function () {
                allactive();
                for (let mem of list_acount) {
                    let major = String(mem.innerText).toLowerCase();
                    if (major!='member') {
                        mem.closest('tr').classList.add('hiden');
                    }
                    else {
                        mem.closest('tr').classList.remove('hiden');
                    }
                }
            }
            btn_admin.onclick = function () {
                allactive();
                for (let mem of list_acount) {
                    let major = String(mem.innerText).toLowerCase();
                    if (major!='admin') {
                        mem.closest('tr').classList.add('hiden');
                    }
                    else {
                        mem.closest('tr').classList.remove('hiden');
                    }
                }
            }
            function allactive(){
                for (let mem of list_acount) {
                    mem.closest('tr').classList.remove('hiden');
                }
            }
            btn_allmember.onclick = function () {
                allactive();
            }
        }

    })()
</script>
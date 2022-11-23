
var api = [
    {
        id: 1,
        name: ' Đấu Phá Thương Khung Phần 5 ',
        sologan: 'Thánh nhân thiên dạ',
        name_slug:"dau pha thuong khung",
        image: 'https://hoathinh3d.com/wp-content/uploads/2022/09/dau-pha-thuong-khung-phan-5-gia-nam-hoc-vien-1321-300x450.jpg',
        des: "Sau hẹn ước 3 năm, Tiêu Viêm cuối cùng cũng gặp được Huân Nhi ở học viện Già Nam, sau đó hắn kết giao nhiều bạn bè, thành lập Bàn Môn; vì tiếp tục nâng cao thực lực để lên Vân Lam Tông lần 3 báo thù cho cha, hắn mạo hiểm đi vào Thiên Phần luyện Khí Tháp thôn phệ Vẫn Lạc Tâm Viêm…",
        views: [
            {
                'day': 18700,
                'week': 18511,
                'month': 295011,
                'all': 235400,
            }
        ],
        votes: 4.6,
        episode:1102,
        kind:['3D','Trùng Sinh','Huyền Nhuyễn'],
        openDay:[2,3],
        
    },
]
let banner = [
    {
        id: '1',
        name: 'Nhất niệm vĩnh hằng',
        image: 'https://hoathinh3d.com/wp-content/uploads/2022/06/nhat-niem-vinh-hang-phan-2.jpg',
        sologan: 'Trảm yêu trừ ma',
    },
    {
        id: '2',
        name: 'Thế Giới hoàn mỹ',
        image: 'https://hoathinh3d.com/wp-content/uploads/2021/04/the-gioi-hoan-my-2.jpg',
        sologan: 'Vô địch tiên nhân',
    },
    {
        id: '3',
        name: 'Đấu la đại lục',
        image: 'https://hoathinh3d.com/wp-content/uploads/2021/02/dau-la-dai-luc-poster.jpg',
        sologan: 'Thánh nhân thiên dạ',
    },
    {
        id: '4',
        name: 'phàm nhân tu tiên',
        image: 'https://hoathinh3d.com/wp-content/uploads/2021/10/pham-nhan-tu-tien-phan-2.jpg',
        sologan: 'Nhất nhân thành thần',
    },
    {
        id: '5',
        name: 'Đấu phá thương khung',
        image: 'https://hoathinh3d.com/wp-content/uploads/2022/06/dau-pha-thuong-khung-phan-5-gia-nam-hoc-vien-poster.jpg',
        sologan: 'Đệ nhất vương gia',
    },
    
];


$.get("/api/get-all-film",{amout:"12"},function(res){
  if(res.status=200){
     localStorage.setItem("mablamsndjajd2323movibes",JSON.stringify(res.data))

  }
});

$.get("/api/get-all-film",{amout:"all"},function(res){
    if(res.status=200){
      // serach phim    
      searchFilm(res.data);
      render__FindFilm(res.data);
      render_film_rank(res.data, '.list__film_ranking'); // Render__film  hôm any
       // phim theo ngày
        render_film_rank(res.data, '.aside__rank--container__course', ['phimhomnay',res.data]);
    }
  });
$.get("/api/get-all-film",{page:"home"},function(res){
    if(res.status=200){
        render__FindFilm(res.data);
    }
})
api=JSON.parse(localStorage.getItem("mablamsndjajd2323movibes"));


$.get("/api/get-all-film",{action:'banner'},function(res){
    render(res);
  });


let video = $$("#video");
let isplayvideo = false;
let list_esopide_epx = [];
let loadding_video = $$(".loadding_video ")
let video_background = $$(".video_background")
let box_controllervideo = $$('.box_controllervideo');
let esopide__curent = $$("#esopide").value;
let fiml_listEsp = [];
localStorage.setItem("movibes__spend",1);
localStorage.setItem("fluidVolume","0.99");
id_film = $$("#userphim").value;
setTimeout(() => {
  fiml_listEsp = JSON.parse(localStorage.getItem('listesopide'));
  render_fiml();

  setEsopideActive(esopide__curent-1);
  renderServer(esopide__curent - 1, 1);
}, 2000)
loadding__logo('.loadding_video', 2000);
$$("#fullimrfomation").value = Number($$("#fullimrfomation").value) - 1;

video.addEventListener("mouseover", function (e) {
  if (isplayvideo) {
    box_controllervideo.classList.remove("hidden");
  }
  if (!video.played) {
    box_controllervideo.classList.add("hidden");
  }
  isplayvideo = true;
})

$$("#video_container").addEventListener("mouseout", function () {
  isplayvideo = true;
  box_controllervideo.classList.add("hidden");
})
box_controllervideo.addEventListener("mouseover", (e) => {
  e.preventDefault()
  box_controllervideo.classList.remove("hidden");
})

video.addEventListener("loadeddata", function () {
  $$('.video_durring').innerHTML = `${coverTime(video.duration)}`;
  $$(".video_rank").value=0;
});


function video_pauplay() {
  if (video.paused) {
    playvideo();
    video.play();
  }
  else {
    pausevideo();
  }
}
$$('.video_background').addEventListener("click", function () {
  this.classList.add("hidden");
  playvideo();
  video.play();
})
function playvideo() {

  box_controllervideo.classList.remove("hidden");
 
  $$("#playvideo").classList.add("hidden");
  $$("#pausevideo").classList.remove("hidden");
  $$('.pause_or_play').innerHTML = "Dừng";
  $$('.video_background').classList.remove('hidden');
  setTimeout(() => {
    $$('.video_background').innerHTML = ` <i class="fa-solid fa-play"></i>`
    $$('.video_background').classList.add('hidden');
  }, 200)
  $$('.video_current').innerHTML = `${coverTime(0)}`;
  $$('.video_durring').innerHTML = `${coverTime(0)}`;
  if (!video.src.includes('blob')) {
    video.addEventListener("loadeddata", function () {
      $$('.video_durring').innerHTML = `${coverTime(video.duration)}`;
      video.play();
   
    });
  } else {
    video.play();
  
  }

}
function pausevideo() {
  box_controllervideo.classList.add("hidden");
  video.pause();
  $$("#playvideo").classList.remove("hidden");
  $$("#pausevideo").classList.add("hidden");
  $$('.pause_or_play').innerHTML = "Phát"
  $$('.video_background').classList.remove('hidden');
}

$$("#rank_volumn").addEventListener("mousemove", function (e) {
  video.volume = e.target.value;
  localStorage.setItem("fluidVolume", e.target.value);
})
$$("#rank_volumn").addEventListener("mouseleave", function (e) {
  setSounceShow();
})
$$("#rank_volumn").addEventListener("click", function (e) {
  setSounceShow();
})
function makeNumber(number) {
  number = Number(number);
  return (number > 9) ? number : "0" + number;
}
function coverTime(times = 0) {
  times = Math.floor(times);
  if (times >= 3600) {
    h = Math.floor(times / 3600);
    times -= h * 3600;
    m = Math.floor(times / 60);
    times -= m * 60;
    return `${makeNumber(h)}:${makeNumber(m)}:${makeNumber(times)}`;
  }
  m = Math.floor(times / 60);
  times -= 60 * m;
  return `${makeNumber(m)}:${makeNumber(times)}`;
}
const currentTime = () => {
  $$('.video_durring').innerHTML = "00:00"
  $$('.video_current').innerHTML = `${coverTime(video.currentTime)}`;
  $$('.video_durring').innerHTML = `${coverTime(video.duration)}`;
}
video.addEventListener("timeupdate", function (e) {
  currentTime();
  if(video.currentTime>0 || video.currentTime){
    $$('.loadding_video').classList.add("hidden");
  }
})
video.addEventListener("timeupdate", (e) => {
  const perperage = (video.currentTime / video.duration) * 100;
  $$(".video_rank").value = `${perperage}`;
  $$(".sub_process_side").style.width = `${perperage}%`;
})
video.addEventListener("ended", (e) => {
  next_fiml(true);
})
let video_slider = $$(".video_rank");
video_slider.addEventListener('mousemove', function (e) {
let x_current = video_slider.getClientRects()[0].width;
let x_du = video_slider.getClientRects()[0].x;
  let perperage = ((e.x - video_slider.getClientRects()[0].x) / (video_slider.getClientRects()[0].width)) * 100;
  const times = video.duration * (perperage / 100);
  $$(".video_box_rank").style.left = `${perperage - 4}%`;
  let currentTimeMinute = Math.floor(times / 60);
  let currentTimeSeconds = Math.floor(times - currentTimeMinute * 60);
  if(isNaN(currentTimeSeconds)) {
    currentTimeSeconds=0;
    currentTimeMinute=0;
    $$(".video_rank").value=0;
    modal__notice("Video đang lỗi Sorry bạn !");
  }
  $$('.video_box_rank').innerHTML = `${makeNumber(currentTimeMinute)}:${makeNumber(currentTimeSeconds)}`;

})



function setSounceShow() {
  let value_rank_volumn = localStorage.getItem("fluidVolume");
  if (Number(value_rank_volumn) > 0.5) {
    $$(".btn_changemute").innerHTML = `<i class="fa-solid fa-volume-high"></i>`;
  }
  else if (Number(value_rank_volumn) > 0.001) {
    $$(".btn_changemute").innerHTML = `<i class="fa-solid fa-volume-low"></i>`;
  }
  if (Number(value_rank_volumn) == 0) {
    $$("#rank_volumn").value=0;
    video.muted=0;
    $$(".btn_changemute").innerHTML = `<i class="fa-solid fa-volume-xmark"></i>`;
  }
}
function changemute() {
  let value_rank_volumn = localStorage.getItem("fluidVolume");
  video.muted = !video.muted;
  if (!video.muted) {
    setSounceShow();

  } else {
    $$("#rank_volumn").value=0;
    $$(".btn_changemute").innerHTML = `<i class="fa-solid fa-volume-xmark"></i>`;
  }
  $$("#rank_volumn").value = value_rank_volumn;
}
video.ondblclick = () => {
  $$('.video_background').innerHTML = '';
  video.classList.toggle('video_fullscreen');

}
function openFullscreen(elem) {
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.webkitRequestFullscreen) { /* Safari */
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) { /* IE11 */
    elem.msRequestFullscreen();
  }
}
video.addEventListener('click', function () {
  $$('.video_background').classList.remove('hidden');
  video_pauplay();
})
function fullwidth(e) {
  if ($$(".message__screen").innerText == "Thu nhỏ") {
    $$(".message__screen").innerText = "Toàn màn hình";
    $$(e).classList.remove('video_fullscreen');
    return false;
  }
  else {
    openFullscreen(video);
  }
  if ($$(e).className.includes('video_fullscreen')) {
    $$(".message__screen").innerText = "Toàn màn hình";
    $$(e).classList.remove('video_fullscreen');
  }
  else {
    $$(e).classList.add('video_fullscreen');
    $$(".message__screen").innerText = "Thu nhỏ";
  }
}

$$(".video_rank").addEventListener('click', (e) => {
  let video_durian = video.duration;
  let current_change = Number($$(".video_rank").value);
  let perage = (video_durian / 100) * current_change;
  video.currentTime = perage;
  currentTime();
})

$$(".video_rank").addEventListener('touchend', (e) => {
  let video_durian = video.duration;
  let current_change = Number($$(".video_rank").value);
  let perage = (video_durian / 100) * current_change;
  video.currentTime = perage;
  currentTime();
})
function next10minute(time = 10) {
  if (video.currentTime + time <= video.duration) {
    video.currentTime += time;
    currentTime();
  }
}
function back10minute(time = 10) {
  if (video.currentTime >= time) {
    video.currentTime -= time;
    currentTime();
  }
  else {
    video.currentTime = 0;
  }
}

function changeSpeend(e, value) {
  Array.from($$l(".video__speend li")).forEach(element => {
    element.classList.remove("active")
  });
  e.classList.add('active')
  video.playbackRate = value;
  localStorage.setItem("movibes__spend", value);
}

document.addEventListener('keydown', (e) => {
  switch (e.which) {
    case 27:
      video.classList.toggle("video_fullscreen");
      break;
    case 32:
      video_pauplay();
      break;
    case 39:
      next10minute(5);
      break;
    case 37:
      back10minute(5);
      break;
    default:
      break;
  }
})
function closeSpeend(e) {
  $$(e).style = "display:none";
}

/// style phim 
function render_fiml() {
  let html = '';
  let i = 0;
  for (let index = fiml_listEsp.length; index > 0; index--) {
    html += `<li><a href="#header" onclick="change_esopice(${index-1})" >Tập ${index}</a> </li>`;
  }
  $$("#list__movie-eps").innerHTML = html;
  list_esopide_epx = Array.from($$l("#list__movie-eps li a"));
}
function change_esopice(index) {
   $$('.loadding_video').classList.add("hidden");
  let id_film = $$("#userphim").value;
  let id__username = UserID.value;
  if (!id__username) id__username = 0;

  $.get("update-view-film", { id: id_film, esopide: (index + 1), id_user: id__username }, function (data) {
    if (data) {
      $("#view_fiml").text(`${new Intl.NumberFormat("en-US").format(data[0].views)}`);
    }
  });
  setEsopideActive(index);
  renderServer(index, 1);
  $$("#fullimrfomation").value = index;
  playvideo();
}

let fiml_id = $$("#fullimrfomation").value;
function serveplayer(server) {
  let fullimrfomation =$$("#fullimrfomation").value;

  if (server) {
    server = "HHD không bản quền";
    renderServer(fullimrfomation, 1);

  }
  else {
    server = "MBS có bảng quyền";
    renderServer(fullimrfomation, 2);
 

  }
  $$(".video_current").innerHTML = `00:00`;
  $$(".video_durring").innerHTML = `00:00`;
  playvideo();
}

function renderServer(index, server = 1) {
  $$('.loadding_video').classList.remove("hidden");
  if(index<0) index=0;
  if(index>=fiml_listEsp.length) index=fiml_listEsp.length-1;
  $$('#esopide_bookmard').innerText=Number(index)+1;
  if (server == 1) {
    if (!fiml_listEsp[index].vip || String(fiml_listEsp[index].vip).toUpperCase() == "NULL") {
      if (!fiml_listEsp[index].hhd) {
        $$('.video__notworking').classList.remove("hidden");
      }
      else {
        // video.src = fiml_listEsp[index].hhd;
        choseVideoplay(false,fiml_listEsp[index].hhd);
      }
    } else {
      videoSrc = fiml_listEsp[index].vip;
      choseVideoplay(true,videoSrc);
      if(String(videoSrc).includes(".m3u8")){
        if (Hls.isSupported()) {
          var hls = new Hls();
          hls.loadSource(videoSrc);
          hls.attachMedia(video);
        } else if (video.canPlayType('application/vnd.apple.mpegurl')) {
          choseVideoplay(true,videoSrc);
        }
      }else{
        choseVideoplay(true,videoSrc);
      }
      
    }
  } else if (server == 2) {
    // serve hhd
    if (!fiml_listEsp[index].hhd || String(fiml_listEsp[index].hhd).toUpperCase() == "NULL") {
      videoSrc = fiml_listEsp[index].vip;
      if(String(videoSrc).includes(".m3u8")){
        if (Hls.isSupported()) {
          var hls = new Hls();
          hls.loadSource(videoSrc);
          hls.attachMedia(video);
        } else if (video.canPlayType('application/vnd.apple.mpegurl')) {
          choseVideoplay(true,videoSrc);
        }
      }else{
        choseVideoplay(true,videoSrc);
      }
    }
    else {
      choseVideoplay(false,fiml_listEsp[index].hhd);
    }
  }
  if(location.href.includes("tap")){
    
      let title =document.title;
      let list_title=document.title.split("Tập");
    let url=location.href;
    let listArr=url.split('+');
    let esopidechange=listArr[1].split("-");
    esopidechange=`+tap-${index+1}+`;
    let fullimrfomation=$$("#fullimrfomation").getAttribute("data-name");
    document.title= fullimrfomation+` Tập ${index+1}`
    url=listArr[0]+esopidechange+listArr[2];
    history.replaceState("", '', url);
  }
  $$(".video_rank").value=0;
  setSounceShow();
  $$("#rank_volumn").value =localStorage.getItem("fluidVolume");
   video.playbackRate = localStorage.getItem("movibes__spend");
}
function choseVideoplay(blood,link){
  if(blood){
    $$("#video_embed").src='';
    $$("#video_embed").classList.add("hidden");
    $$("#video_container").classList.remove("hidden");
    video.src=link;
  }else{
    video.src="";
    $$("#video_container").classList.add("hidden");
    $$("#video_embed").classList.remove("hidden");
    $$("#video_embed").src=link;

    
  }
}
function next_fiml(check) {
  let fullimrfomation = $$("#fullimrfomation").value;
  let id_film = $$("#userphim").value;
  let index = fullimrfomation;
  let id__username = UserID.value;
  if (!id__username) id__username = 0;
  $.get("update-view-film", { id: id_film, esopide: (index + 1), id_user: id__username }, function (data) {
    if (data) {
      $("#view_fiml").text(`${new Intl.NumberFormat("en-US").format(data[0].views)}`);
    }
  });
  if (check) {
    index++;
    if (index >= fiml_listEsp.length) {
      index = fiml_listEsp.length - 1;
    }
    renderServer(index, 1);
  }
  else {
    --index;
    if (index <= 0) index = 0;
    renderServer(index, 1);
  }
  $$("#fullimrfomation").value = index;
  setEsopideActive(index);
  playvideo();
}

function setEsopideActive(esopice_current) {
  if (!list_esopide_epx.length) return 0;
  esopice_current = fiml_listEsp.length - esopice_current-1;
  $$("#esopide").value = esopice_current
  list_esopide_epx.forEach(item => {
    item.classList.remove('active');
  })
  list_esopide_epx[esopice_current].classList.add("active");
}
box_controllervideo.classList.add("hidden")
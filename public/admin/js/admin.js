const $$ = document.querySelector.bind(document);
    const $$l = document.querySelectorAll.bind(document);
    let btn = $$("#btn");
    let sidebar = $$(".sidebar");
    let searchBtn = $$(".bx-search");
    let icon_Btn = $$(".container_content-comback i");
    let settings = $$(".settings");
    let settings_controller = $$(".settings_controller")
    let setting_light_more = $$(".setting_light_more");
    let setting_dark_more = $$(".setting_dark_more");
    let color_pink = $$(".color.pink");
    let color_blue = $$(".color.blue");
    let color_green = $$(".color.green");
    let sidebar_vip = $$(".sidebar_vip");
    let bg_menu_vip=$$('.bg_menu_vip');
    let text_menu_vip=$$('.text_menu_vip');
    var rootStyle = document.documentElement.style;
    if(!localStorage.getItem('bg_menu')){
        localStorage.setItem('bg_menu',"#ead4b7");
         localStorage.setItem('text_sidebar',"#ae369c");
        localStorage.setItem('bg_content','#1E1B3A');
        localStorage.setItem('text_color','rgba(255,255,255,0.97)');
    }
    
    let is_Icons_push=localStorage.getItem('is_Icons_push');
    if(is_Icons_push=='true'){
        sidebar.classList.add("active");
        icon_Btn.classList.toggle("fa-circle-right");
    }
    let bg_menu=localStorage.getItem('bg_menu');
    let text_sidebar=localStorage.getItem('text_sidebar');
    let bg_content=localStorage.getItem('bg_content');
    let text_color=localStorage.getItem('text_color');
    rootStyle.setProperty('--bg-sidebar', bg_menu);
    rootStyle.setProperty('--text-sidebar', text_sidebar);
    rootStyle.setProperty('--bg', bg_content);
    rootStyle.setProperty('--text-color', text_color);

    rootStyle.setProperty('--color', "#222831");
    function local_color_nav(bg_menu,text_sidebar){
        rootStyle.setProperty('--bg-sidebar', bg_menu);
        rootStyle.setProperty('--text-sidebar', text_sidebar);
        localStorage.setItem('bg_menu', bg_menu);
        localStorage.setItem('text_sidebar', text_sidebar);
    }
    color_pink.onclick = function() {
        bg_menu="rgba(255,255,255,0.8";
        text_sidebar="#5e4040";
        local_color_nav(bg_menu,text_sidebar);
    }
    color_blue.onclick = function() {
        bg_menu= "#26275e";
        text_sidebar= "#a3bb1c";
        local_color_nav(bg_menu,text_sidebar);
    }
    color_green.onclick = function() {
        bg_menu="#0f6e6d";
        text_sidebar= "#d07558";
        local_color_nav(bg_menu,text_sidebar);
    }
    setting_light_more.onclick = function() {
        bg_content="#fff";
        text_color="rgba(0,0,0,0.9)";
        rootStyle.setProperty('--bg', bg_content);
        rootStyle.setProperty('--text-color', text_color);
        localStorage.setItem('bg_content', bg_content);
        localStorage.setItem('text_color', text_color);
    }
    setting_dark_more.onclick = function() {
        bg_content="#1E1B3A";
        text_color="rgba(255,255,255,0.97)";
        rootStyle.setProperty('--bg', bg_content);
        rootStyle.setProperty('--text-color', text_color);
        localStorage.setItem('bg_content', bg_content);
        localStorage.setItem('text_color', text_color);
    }


    settings.onclick = function(e) {
        settings_controller.classList.toggle("hide");
        e.stopPropagation();
        
    }
    settings_controller.onclick = function(e) {
        e.stopPropagation();
    }
    document.onclick = function () {
       if(!settings_controller.classList.contains("hide")){
        settings_controller.classList.add('hide');
       }
    }
    change_color_vip();
    function change_color_vip(){
        bg_menu_vip.value=localStorage.getItem('bg_menu');
        text_menu_vip.value=localStorage.getItem('text_sidebar');
        bg_menu_vip.addEventListener('input',function(e){
        rootStyle.setProperty('--bg-sidebar', e.target.value);     
        })
        bg_menu_vip.addEventListener('change',function(e){
        localStorage.setItem('bg_menu', bg_menu);
        })
        text_menu_vip.addEventListener('input',function(e){
        rootStyle.setProperty('--text-sidebar', e.target.value);
        })
        text_menu_vip.addEventListener('change',function(e){
        localStorage.setItem('text_sidebar',  e.target.value);
        })
    }
    function local_icon_push(element){
        let isS=element.classList.contains('active');
        localStorage.setItem('is_Icons_push',isS);
    }
    sidebar_vip.onclick = function() {
        sidebar.classList.toggle("active");
        icon_Btn.classList.toggle("fa-circle-right");
        local_icon_push(sidebar);
    }
    btn.onclick = function() {
        sidebar.classList.toggle("active");
        icon_Btn.classList.toggle("fa-circle-right");
         local_icon_push(sidebar);
    }
    searchBtn.onclick = function() {
        sidebar.classList.toggle("active");
        icon_Btn.classList.toggle("fa-circle-right");
         local_icon_push(sidebar);
    }
    icon_Btn.onclick = function() {
        sidebar.classList.toggle("active");
        this.classList.toggle("fa-circle-right");
         local_icon_push(sidebar);
    }
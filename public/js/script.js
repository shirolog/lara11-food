(()=>{

    //ヘッダーナビゲーション設定
    const $menuBtn = document.querySelector('#menu-btn');
    const $navBar = document.querySelector('.header .flex .navbar');
    const $userBtn = document.querySelector('#user-btn');
    const $profile = document.querySelector('.header .flex .profile');


    $menuBtn.addEventListener('click', ()=>{
        $navBar.classList.toggle('active');
        $menuBtn.classList.toggle('fa-times');
        $profile.classList.remove('active');
    });

    $userBtn.addEventListener('click', ()=>{
        $profile.classList.toggle('active');
        $navBar.classList.remove('active');
        $menuBtn.classList.remove('fa-times');

    });
    
    
    window.addEventListener('scroll', ()=>{
        $navBar.classList.remove('active');
        $menuBtn.classList.remove('fa-times');
        $profile.classList.remove('active');
    });



    //ページのloadingに関する記述

    document.addEventListener('DOMContentLoaded', ()=>{
      const $loader = document.querySelector('.loader');

      if($loader){
        setTimeout(()=>{
          $loader.style.display = 'none';
        }, 1750);
      }
    });



    //swiper side 設定
    var swiper = new Swiper(".hero-slider", {
      loop: true, 
      grabCursor: true, 
      effect: "flip",
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });

    var swiper = new Swiper(".revies-slider", {
      loop: true, 
      grabCursor: true, 
      spaceBetween: 20,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
        },
        700: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
      },
    });
})();
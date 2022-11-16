var swiper = new Swiper(".mySwiper", {
  pagination: {
    el: ".quest__slider_bar_wrapper",
    type: "bullets",
    currentClass: "quest__slider_dot",
    progressbarFillClass: ".swiper-pagination-bullet-active",
  },

  navigation: {
    nextEl: ".quest__next",
    prevEl: ".quest__prev",
  },
  effect: "fade",
  allowTouchMove: false,
});




const bar = document.querySelector(".quest__slider_bar_wrapper");
if (bar) {

  
const bullets = bar.children;


bullets[1].classList.add("bullet_next_next");

function findActiveBullet(collection) {
  for (var i = 0; i < collection.length; i++) {
    if (collection[i].classList.contains("swiper-pagination-bullet-active")) {
      return i;
    }
  }
  return false;
}

function removeAdditionClasses(collection) {
  for (var i = 0; i < collection.length; i++) {

     if (collection[i].classList.contains("bullet_next_next")) {
      collection[i].classList.remove("bullet_next_next");
    } else if (collection[i].classList.contains("bullet_checked")) {
      collection[i].classList.remove("bullet_checked");
    }
  }
}

function findChecked(collection, currentBullet) {
  for (var i = 0; i < currentBullet; i++) {
    collection[i].classList.add("bullet_checked");
  }
}

const target = document.querySelector(".quest__slider_bar_wrapper");


const observer = new MutationObserver(function (mutations) {
  mutations.forEach(function (mutation) {
    let currentBullet = findActiveBullet(bullets);
    removeAdditionClasses(bullets);
    findChecked(bullets, currentBullet);
    if (bullets[currentBullet + 1] !== undefined) {
    bullets[currentBullet + 1].classList.add("bullet_next_next");
    }
  });
});

const config = { attributes: true, childList: true, characterData: true };

observer.observe(target, config);

const successMessage = document.querySelector('.quest .success');

function send(event) {
  event.preventDefault()
  successMessage.classList.add('active');
}
}



var swiper = new Swiper(".manufSwiper", {
  spaceBetween: 10,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  slidesPerView: 1.2,
  freeMode: true,
  watchSlidesProgress: true,
  breakpoints: {

    // when window width is >= 640px
    640: {
      slidesPerView: 5,
      spaceBetween: 10,
    },
  }
});

var swiper2 = new Swiper(".manufSwiperTop", {
  spaceBetween: 10,

  thumbs: {
    swiper: swiper,
  },
});

var swiper3 = new Swiper(".projects__top_Swiper", {
  spaceBetween: 30,
  navigation: {
    nextEl: ".projects__top_next",
    prevEl: ".projects__top_prev",
  },
  slidesPerView: 1.5,
  freeMode: true,
  watchSlidesProgress: true,
  breakpoints: {

    // when window width is >= 640px
    640: {
      slidesPerView: 3,
      
    },
    900: {
      slidesPerView: 4,
      
    },
  }
});

var swiper4 = new Swiper(".projects__bot_Swiper", {
  pagination: {
    el: ".projects__bot_slider_paginate",
    type: "bullets",
    // currentClass: "quest__slider_dot",
    // progressbarFillClass: ".swiper-pagination-bullet-active",
  },
  spaceBetween: 15,
  navigation: {
    nextEl: ".projects__bot_next",
    prevEl: ".projects__bot_prev",
  },
  slidesPerView: 1.5,
  freeMode: true,
  watchSlidesProgress: true,
  breakpoints: {

    // when window width is >= 640px
    640: {
      slidesPerView: 3,
      spaceBetween: 0,
      
    },
    900: {
      slidesPerView: 4,
      spaceBetween: 20,
      
    },
    // 1150: {
    //   slidesPerView: 5,
    //   spaceBetween: 30,
    // },
  }
});

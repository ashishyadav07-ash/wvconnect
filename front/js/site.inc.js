$(document).ready(function () {
  var hamburgers = document.querySelectorAll(".hamburger"),
    $menuWrap = $(".menu-wrap");
  {
    $(hamburgers).on("click", function () {
      this.classList.toggle("is-active");
      $menuWrap.toggleClass("menu-show");
      $("body").toggleClass("no-scroll");
      $("body").toggleClass("overlay-body");
    });
  }

  $(window).scroll(function () {
    $(this).scrollTop() > 50
      ? $(".np-header").addClass("sticky")
      : $(".np-header").removeClass("sticky");
  });

  $(".dropbtn").click(function () {
    var dropdownContent = $(this).next(".dropdown-content");
    $(".dropdown-content").not(dropdownContent).slideUp();
    dropdownContent.slideToggle();
  });

  $(document).click(function (event) {
    var target = $(event.target);
    if (!target.closest(".dropdown").length) {
      $(".dropdown-content").slideUp();
    }
  });

  $(".np-slider-bn__list").slick({
    dots: true,
    infinite: false,
    speed: 300,
    arrows: false,
    slidesToShow: 1,
    slidesToScroll: 1,
  });
  // $(".np-slider-fr__cards").slick({
  //   dots: false,
  //   infinite: false,
  //   speed: 300,
  //   arrows: true,
  //   slidesToShow: 4,
  //   slidesToScroll: 1,
  //   prevArrow: $(".prev-btn"),
  //   nextArrow: $(".next-btn"),
  // });

  $(".np-memories__slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: false,
    speed: 300,
    infinite: true,
    autoplaySpeed: 5000,
    autoplay: false,
  });

  $(".np-community-imgs1").slick({
    speed: 7000,
    autoplay: true,
    autoplaySpeed: 0,
    centerMode: false,
    cssEase: "linear",
    slidesToShow: 1,
    draggable: false,
    focusOnSelect: false,
    pauseOnFocus: false,
    pauseOnHover: false,
    slidesToScroll: 1,
    variableWidth: true,
    infinite: true,
    initialSlide: 1,
    arrows: false,
    buttons: false,
  });

  $(".np-community-imgs3").slick({
    speed: 7000,
    autoplay: true,
    autoplaySpeed: 0,
    centerMode: false,
    cssEase: "linear",
    slidesToShow: 1,
    draggable: false,
    focusOnSelect: false,
    pauseOnFocus: false,
    pauseOnHover: false,
    slidesToScroll: 1,
    variableWidth: true,
    infinite: true,
    initialSlide: 1,
    arrows: false,
    buttons: false,
  });
  $(".np-community-imgs2").slick({
    speed: 7000,
    autoplay: true,
    autoplaySpeed: 0,
    centerMode: false,
    cssEase: "linear",
    draggable: false,
    focusOnSelect: false,
    pauseOnFocus: false,
    pauseOnHover: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    variableWidth: true,
    infinite: true,
    initialSlide: 1,
    arrows: false,
    buttons: false,
  });

  // $('.np-contributor__imgs1').slick({
  //   speed: 7000,
  //   autoplay: true,
  //   autoplaySpeed: 0,
  //   centerMode: false,
  //   cssEase: 'linear',
  //   slidesToShow: 1,
  //   draggable:false,
  //   focusOnSelect:false,
  //   pauseOnFocus:false,
  //   pauseOnHover:false,
  //   slidesToScroll: 1,
  //   variableWidth: true,
  //   infinite: true,
  //   initialSlide: 1,
  //   arrows: false,
  //   buttons: false
  // });
  // $('.np-contributor__imgs2').slick({
  //   speed: 7000,
  //   autoplay: true,
  //   autoplaySpeed: 0,
  //   centerMode: false,
  //   cssEase: 'linear',
  //   slidesToShow: 1,
  //   draggable:false,
  //   focusOnSelect:false,
  //   pauseOnFocus:false,
  //   pauseOnHover:false,
  //   slidesToScroll: 1,
  //   variableWidth: true,
  //   infinite: true,
  //   initialSlide: 1,
  //   arrows: false,
  //   buttons: false,
  // });

  $(".memory-popup").magnificPopup({
    type: "iframe",
  });

  $(".fr-artical__imgSlideTo").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    fade: false,
    infinite: false,
    speed: 1000,
    asNavFor: ".fr-artical__imgSlideFor",
    arrows: false,
  });
  $(".fr-artical__imgSlideFor").slick({
    slidesToShow: 4,
    slidesToScroll: 4,
    asNavFor: ".fr-artical__imgSlideTo",
    dots: false,
    arrows: false,
    infinite: false,
    centerMode: false,
    focusOnSelect: true,
  });

  // $('.np-contributor__imgs1').marquee({
  //   duration: 10000,
  //   pauseOnHover: true,
  //   gap: 50,
  //   delayBeforeStart: 0,
  //   direction: 'left',
  //   duplicated: true
  // });


  $(".np-fundBtn > a").magnificPopup({
    // type: 'inline',
    // preloader: false,
    // focus: '#name',
    items: {
      src: "#registerPop",
      type: "inline",
      midClick: true,
    },
    closeOnBgClick: false,
    enableEscapeKey: false,
    showCloseBtn: false,
  });
  $(".btnClose").on("click", function () {
    $.magnificPopup.close();
  });


  $(".np-datesSec__Tsecbtn > a").magnificPopup({
    // type: 'inline',
    // preloader: false,
    // focus: '#name',
    items: {
      src: "#registerPop",
      type: "inline",
      midClick: true,
    },
    closeOnBgClick: false,
    enableEscapeKey: false,
    showCloseBtn: false,
  });
  $(".btnClose").on("click", function () {
    $.magnificPopup.close();
  });
  
  $(".np-slider-fr__sh > a").magnificPopup({
    // type: 'inline',
    // preloader: false,
    // focus: '#name',
    items: {
      src: "#registerPop",
      type: "inline",
      midClick: true,
    },
    closeOnBgClick: false,
    enableEscapeKey: false,
    showCloseBtn: false,
  });
  $(".btnClose").on("click", function () {
    $.magnificPopup.close();
  });


});

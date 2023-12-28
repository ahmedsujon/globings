$(document).ready(function () {
  //Hide Scroll bar
  function hideScrollbar() {
    $("html,body").css("overflow", "hidden");
  }

  //Show Scroll bar
  function showScrollbar() {
    $("html,body").css("overflow-y", "auto");
  }

  //Nice Select
  $(".niceSelect").niceSelect();

  //Gallery
  // $(".recent_photos_img").magnificPopup({
  //   type: "image",
  //   gallery: {
  //     enabled: true,
  //   },
  // });

  //Header category filter
  // $("#categoryFilterArea .main_form_check").click(function (e) {
  //   e.preventDefault();

  //   //Hide previous radio
  //   $("#categoryFilterArea .main_form_check .main_form_check_input").prop(
  //     "checked",
  //     false
  //   );
  //   $("#categoryFilterArea .main_form_check")
  //     .parent()
  //     .find(".accordion")
  //     .slideUp();
  //   $("#categoryFilterArea .main_form_check")
  //     .parent()
  //     .find(".accordion .accordion-button")
  //     .addClass("collapsed");
  //   $("#categoryFilterArea .main_form_check")
  //     .parent()
  //     .find(".accordion .accordion-collapse")
  //     .removeClass("show");

  //   //Reset inner uncheck select
  //   $("#categoryFilterArea .main_form_check")
  //     .parent()
  //     .find(".accordion .form-check-input")
  //     .prop("checked", false);

  //   //Find target input
  //   const mainInputFind = $(this).children(".main_form_check_input");
  //   const findAccordionLabel = $(this).parent().find(".accordion");

  //   if (mainInputFind.prop("checked")) {
  //     mainInputFind.prop("checked", false);
  //     findAccordionLabel.slideUp();
  //   } else {
  //     mainInputFind.prop("checked", true);
  //     findAccordionLabel.slideDown();
  //   }
  // });

  //Accordion reset
  // $("#categoryFilterArea .accordion-button").click(function (e) {
  //   e.preventDefault();
  //   $(this)
  //     .parent()
  //     .parent()
  //     .parent()
  //     .find(".form-check-input")
  //     .prop("checked", false);
  // });

  //Preview Slider
  $("#previewSecondPage").hide();
  setTimeout(() => {
    $("#previewFirstPage").slideUp();
    $("#previewSecondPage").show();
  }, 3000);

  //Counter
  // $(".count-num").rCounter({
  //   duration: 30,
  // });
  // <span class="count-num">2575</span> if decimal 2,5.6
  //Select 2
  function selectTwo(selectID, placeholder) {
    $(selectID).select2({
      placeholder: placeholder,
    });
  }
  if (document.querySelector("#citySelect")) {
    selectTwo("#citySelect", "Select City");
  }
  if (document.querySelector("#locationSearchSelect")) {
    selectTwo("#locationSearchSelect", "Select City");
  }

  //Header Category Active
  // $("#headerCategorySlider .category_item").click(function (e) {
  //   e.preventDefault();
  //   $(this).parent().siblings().children().removeClass("active_category");
  //   $(this).addClass("active_category");
  // });

  //Add Remove Class
  function toggleClassElement(selector, className) {
    $(selector).toggleClass(className);
  }
  function removeClassElement(selector, className) {
    $(selector).addClass(className);
  }

  //Sing Up Modal
  $("#createAccountBtn").click(function (e) {
    e.preventDefault();
    toggleClassElement("#signUpSidebarArea", "sing_modal_active");
  });
  $("#singUpBackBtn").click(function (e) {
    e.preventDefault();
    toggleClassElement("#signUpSidebarArea", "sing_modal_active");
  });

  //Forget Modal
  $("#forgetModalOpenBtn").click(function (e) {
    e.preventDefault();
    toggleClassElement("#forgetSidebarArea", "sing_modal_active");
  });
  $("#forgetBackBtn").click(function (e) {
    e.preventDefault();
    toggleClassElement("#forgetSidebarArea", "sing_modal_active");
  });

  $("#verifyBackBtn").click(function (e) {
    e.preventDefault();
    toggleClassElement("#verifySidebarArea", "sing_modal_active");
  });

  //Post Profile User Modal
  $(".postUserBtn").click(function (e) {
    e.preventDefault();
    toggleClassElement("#profileModalArea", "sing_modal_active");
    $("#mobileMenuWrapper").hide("slow");
  });

  $("#profileHideModal").click(function (e) {
    e.preventDefault();
    toggleClassElement("#profileModalArea", "sing_modal_active");
    $("#mobileMenuWrapper").show("slow");
  });

  //Post Create Modal
  $("#openPostCreateBtn,#closeModalBtn").click(function (e) {
    e.preventDefault();
    toggleClassElement("#postCreateModalArea", "sing_modal_active");
  });

  //Post Create Success
  $("#postCreateFormSubmit").submit(function (e) {
    e.preventDefault();
    $("#successModalArea").show("slow");
    $("#successOverlay").show("slow");
  });
  $("#successOverlay").click(function (e) {
    e.preventDefault();
    $("#successModalArea").hide("slow");
    $("#successOverlay").hide("slow");
  });
  $("#topListArea").hide();
  //Mobile Menu
  $("#homeMenuBtn").click(() => {
    if ($("#topListArea").css("display") == "none") {
      hideScrollbar();
    } else {
      showScrollbar();
    }
    $("#topListArea").slideToggle();
    if ($("#mobileMenuWrapper").hasClass("mobile_new_active")) {
      $("#mobileMenuOverlay").hide("slow");
      $("#mobileMenuClose").hide("slow");
    } else {
      $("#mobileMenuOverlay").show("slow");
      $("#mobileMenuClose").show("slow");
    }
    $("#mobileMenuWrapper").toggleClass("mobile_new_active");
  });
  $("#mobileMenuClose").click(() => {
    $("#mobileMenuOverlay").hide("slow");
    $("#mobileMenuClose").hide("slow");
    $("#mobileMenuWrapper").removeClass("mobile_new_active");
  });

  //Header Icon
  $(".heart_icon").click(function (e) {
    e.preventDefault();
    $(this).toggleClass("selected_heart");
  });

  //Ratting start
  // $(".rattingStar").starRating({
  //   // initialRating: 4,
  //   totalStars: 5,
  //   strokeColor: "#D9D9D9",
  //   emptyColor: "#D9D9D9",
  //   activeColor: "cornflowerblue",
  //   ratedColor: "#1872F6",
  //   strokeWidth: 10,
  //   starSize: 25,
  //   disableAfterRate: false,
  //   useGradient: false,
  //   // callback: function(currentRating){
  //   //     alert('rated ', currentRating);
  //   // }
  // });

  //Comment Modal
  $(".postCommentBtn,#commentModalClose").click(function (e) {
    e.preventDefault();

    $("#commentModalArea").toggleClass("comment_modal_active");
    if ($("#commentModalArea").hasClass("comment_modal_active")) {
      hideScrollbar();
    } else {
      showScrollbar();
    }
  });

  //Total React Modal
  $(".totalReactBtn,#closeReactModalBtn").click(function (e) {
    e.preventDefault();
    console.log("Test");

    toggleClassElement("#reactModalArea", "sing_modal_active");
    if ($("#reactModalArea").hasClass("sing_modal_active")) {
      hideScrollbar();
      $("#reactModalArea").css("overflow", "hidden");
    } else {
      showScrollbar();
      $("#reactModalArea").css("overflow", "auto");
    }
  });

  //Dealer Profile Modal
  $("#dealerProfileBtn,#dealerCloseBtn").click(function (e) {
    e.preventDefault();

    $("#dealerProfileModalArea").toggleClass("sing_modal_active");

    if ($("#dealerProfileModalArea").hasClass("sing_modal_active")) {
      hideScrollbar();
    } else {
      showScrollbar();
    }
  });

  //Scan Modal
  $("#scanStartBtn,#scancloseModal,#scanOverlay").click(function (e) {
    e.preventDefault();

    $("#scanModalArea").toggleClass("comment_modal_active");
    $("#scanOverlay").show();
    if ($("#scanModalArea").hasClass("comment_modal_active")) {
      hideScrollbar();
    } else {
      showScrollbar();
      $("#scanOverlay").hide();
    }
  });

  //Scan Result Modal
  $("#scanResultModal,#resultCloseBtn").click(function (e) {
    e.preventDefault();

    $("#scanResultModalArea").toggleClass("sing_modal_active");

    if ($("#scanResultModalArea").hasClass("sing_modal_active")) {
      hideScrollbar();
    } else {
      showScrollbar();
    }
  });

  //Congratulation Result Modal
  $("#congratulationResultModal,#congratulationCloseBtn").click(function (e) {
    e.preventDefault();

    $("#congratulationModalArea").toggleClass("sing_modal_active");

    if ($("#congratulationModalArea").hasClass("sing_modal_active")) {
      hideScrollbar();
    } else {
      showScrollbar();
    }
  });

  //Coin Result Modal
  $("#coinModalBtn,#coainCloseBtn").click(function (e) {
    e.preventDefault();

    $("#coinModalArea").toggleClass("sing_modal_active");

    if ($("#coinModalArea").hasClass("sing_modal_active")) {
      hideScrollbar();
    } else {
      showScrollbar();
    }
  });

  //Bidges Modal
  $("#localModalBtn,#badgesCloseBtn").click(function (e) {
    e.preventDefault();

    $("#loalModalArea").toggleClass("sing_modal_active");

    if ($("#loalModalArea").hasClass("sing_modal_active")) {
      hideScrollbar();
    } else {
      showScrollbar();
    }
  });

  //Invite Modal
  $("#inviteModalBtn,#inviteCloseBtn").click(function (e) {
    e.preventDefault();

    $("#inviteModalArea").toggleClass("sing_modal_active");

    if ($("#inviteModalArea").hasClass("sing_modal_active")) {
      hideScrollbar();
    } else {
      showScrollbar();
    }
  });

  //QR Code Modal
  $("#qrCodeModalBtn,#qrCloseBtn").click(function (e) {
    e.preventDefault();

    $("#qrCodeModalArea").toggleClass("sing_modal_active");

    if ($("#qrCodeModalArea").hasClass("sing_modal_active")) {
      hideScrollbar();
    } else {
      showScrollbar();
    }
  });

  // Change Password Modal
  $("#passwordChangeModalBtn,#passwordEditCloseBtn").click(function (e) {
    e.preventDefault();

    $("#passwordEditModalArea").toggleClass("sing_modal_active");

    if ($("#passwordEditModalArea").hasClass("sing_modal_active")) {
      hideScrollbar();
    } else {
      showScrollbar();
    }
  });

  //Terms Modal
  $("#termsModalBtn,#termsCloseBtn").click(function (e) {
    e.preventDefault();

    $("#termsModalArea").toggleClass("sing_modal_active");

    if ($("#termsModalArea").hasClass("sing_modal_active")) {
      hideScrollbar();
    } else {
      showScrollbar();
    }
  });

  //Recent Post Modal
  $("#recentPostModalBtn,#recentPostCloseBtn").click(function (e) {
    e.preventDefault();

    $("#recentPostModalArea").toggleClass("sing_modal_active");

    if ($("#recentPostModalArea").hasClass("sing_modal_active")) {
      hideScrollbar();
    } else {
      showScrollbar();
    }
  });

  //Recent Photos Modal
  $("#recentPhotosModalBtn,#recentPhotosCloseBtn").click(function (e) {
    e.preventDefault();

    $("#recentPhotosModalArea").toggleClass("sing_modal_active");

    if ($("#recentPhotosModalArea").hasClass("sing_modal_active")) {
      hideScrollbar();
    } else {
      showScrollbar();
    }
  });

  //Recent Photos Details Modal
  $(".recentPhotoBtn,#photoDetailsCloseBtn").click(function (e) {
    e.preventDefault();

    $("#photsDetailsModalArea").toggleClass("sing_modal_active");

    if ($("#photsDetailsModalArea").hasClass("sing_modal_active")) {
      hideScrollbar();
    } else {
      showScrollbar();
    }
  });

  //Setting Bio Modal
  $("#settingBioModalBtn,#settingBioCloseBtn").click(function (e) {
    e.preventDefault();

    $("#settingBioModalArea").toggleClass("sing_modal_active");

    if ($("#settingBioModalArea").hasClass("sing_modal_active")) {
      hideScrollbar();
    } else {
      showScrollbar();
    }
  });

  //Place Modal
  $("#placeModalBtn,#placeCloseBtn").click(function (e) {
    e.preventDefault();

    $("#placeModalArea").toggleClass("sing_modal_active");

    if ($("#placeModalArea").hasClass("sing_modal_active")) {
      hideScrollbar();
    } else {
      showScrollbar();
    }
  });

  //Setting Profile Modal
  $("#settingProfileBtn,#settingProfileCloseBtn").click(function (e) {
    e.preventDefault();

    $("#settingProfileModalArea").toggleClass("sing_modal_active");

    if ($("#settingProfileModalArea").hasClass("sing_modal_active")) {
      hideScrollbar();
    } else {
      showScrollbar();
    }
  });

  //Setting Profile Edit Modal
  $("#profileEditModalBtn,#profileEditCloseBtn").click(function (e) {
    e.preventDefault();

    $("#profileEditModalArea").toggleClass("sing_modal_active");

    if ($("#profileEditModalArea").hasClass("sing_modal_active")) {
      hideScrollbar();
    } else {
      showScrollbar();
    }
  });

  //Setting Phone Edit Modal
  $("#phoneModalBtn,#profilePhoneCloseBtn").click(function (e) {
    e.preventDefault();

    $("#profilePhoneModalArea").toggleClass("sing_modal_active");

    if ($("#profilePhoneModalArea").hasClass("sing_modal_active")) {
      hideScrollbar();
    } else {
      showScrollbar();
    }
  });

  //Header Search Modal
  $("#headerSearchBtn,#searchHeaderOverlay,#headerSearchCloseBtn").click(() => {
    if ($("#headerSearchModalArea").hasClass("filter_active")) {
      $("#searchHeaderOverlay").hide("slow");
      showScrollbar();
    } else {
      $("#searchHeaderOverlay").show("slow");
      hideScrollbar();
    }
    $("#headerSearchModalArea").toggleClass("filter_active");
  });

  //Sorting change button
  $("#sortingBtn").click(function (e) {
    e.preventDefault();
    $(this).toggleClass("sorting_active");
  });

  //Filter Modal
  $("#filterBtn,#filterOverlay,#filterCloseBtn").click(() => {
    // $("#subInnerFilterArea").hide();
    // $("#subFilterArea").hide();
    // $("#topFilterArea").show();
    $("#searchFilterArea").toggleClass("filter_active");
    // showScrollbar();
    //Reset check input
    // $("#subInnerCategoryFilterArea .form-check-input").prop("checked", false);
  });

  //Filter Sub Modal
  // $(
  //   "#searchFilterArea .main_form_check,#subFilterOverlay,#subFilterCloseBtn"
  // ).click(() => {
  //   $("#topFilterArea").hide();
  //   $("#subFilterArea").show();
  //   $("#subFilterArea").toggleClass("filter_active");
  // });
  //close sub content
  // $("#subBackBtn").click(function (e) {
  //   e.preventDefault();
  //   $("#subFilterArea").hide();
  //   $("#topFilterArea").show();
  // });

  //Filter Sub Inner Modal
  // $(
  //   "#subFilterArea .main_form_check,#subInnerFilterOverlay,#subInnerFilterCloseBtn"
  // ).click(() => {
  //   $("#topFilterArea").hide();
  //   $("#subFilterArea").hide();
  //   $("#subInnerFilterArea").show();
  //   $("#subInnerFilterArea").toggleClass("filter_active");
  //   $("#subFilterArea").addClass("filter_active");
  // });

  //close sub inner content
  // $("#subInnerBackBtn").click(function (e) {
  //   e.preventDefault();
  //   $("#subInnerFilterArea").hide();
  //   $("#subFilterArea").show();

  //   //Reset check input
  //   $("#subInnerCategoryFilterArea .form-check-input").prop("checked", false);
  // });

  //Result Share Modal
  $("#shareModalBtn,#resultScanCloseBtn").click(() => {
    if ($("#resultScanModalArea").hasClass("result_scan_active")) {
      $("#resultScanOverlay").hide("slow");
    } else {
      $("#resultScanOverlay").show("slow");
    }
    $("#resultScanModalArea").toggleClass("result_scan_active");
  });

  //Badge Circle
  $(".circle_area .small").percircle({
    percent: 27,
  });

  //Book Marks
  $(".bookmarkIcon").click(function (e) {
    e.preventDefault();
    $(this).toggleClass("active_bookmark");
  });

  //Map Location Category
  $("#locationCategorySlider .category_item").click(function (e) {
    e.preventDefault();
    // if($(this).hasClass("location_active"))
    $(this).hasClass("location_active")
      ? $(this).removeClass("location_active")
      : $(this).addClass("location_active");
  });

  //Map Details Modal
  $("#mapSliderArea .slider_item,#mapDetailsOverlay").click(() => {
    if ($("#mapDetailsModalArea").hasClass("bottom_active")) {
      $("#mapDetailsOverlay").hide("slow");
      showScrollbar();
    } else {
      $("#mapDetailsOverlay").show("slow");
      hideScrollbar();
    }
    $("#mapDetailsModalArea").toggleClass("bottom_active");
  });

  //Header Category Filter
  $("#locationFilterArea button").click(function (e) {
    e.preventDefault();
    if ($(this).hasClass("active")) {
      $(this).removeClass("active");
    } else {
      $(this).addClass("active");
    }
  });

  //Toast Open
  $(".toastOpen").click(function (e) {
    e.preventDefault();
    $.toast({
      heading: "Success",
      // text: "And these were just the basic demos! Scroll down to check further details on how to customize the output.",
      showHideTransition: "slide", //plain,fade
      icon: "success", //success,warning,error,info
      position: "bottom-center",
      hideAfter: 3000,
      loader: true,
      //   position: {
      //     left: 120,
      //     top: 120
      // },
      // bgColor: '#FF1356',
      // textColor: 'white'
      // loaderBg: '#9EC600'
    });
  });

  //Copy Button
  $("#referCopyBtn").click(function () {
    var textToCopy = $("#textToCopy").text().trim();
    // var textToCopy = "Demo string text".trim();
    var tempTextarea = $("<input>");
    $("body").append(tempTextarea);
    tempTextarea.val(textToCopy).select();
    document.execCommand("copy");
    tempTextarea.remove();
    $(this).addClass("tooltip_active");
    setTimeout(() => {
      $(this).removeClass("tooltip_active");
    }, 1500);
  });

  //Map fixed list area
  $("#mapFilterListArea button,#mapFilterListArea a").click(function (e) {
    e.preventDefault();
    $(this).parent().children().removeClass("active_map_list");
    $(this).addClass("active_map_list");
  });

  //Map search area
  $("#mapSearchBtn").click(function (e) {
    e.preventDefault();
    $("#mapSearchArea").show(700);
    setTimeout(() => {
      $(this).hide();
    }, 400);
  });
  $("#mapCloseSearchBtn").click(function (e) {
    e.preventDefault();
    $("#mapSearchArea").hide(700);
    setTimeout(() => {
      $("#mapSearchBtn").show();
    }, 400);
  });

  //Read more less
  $(".post_description").expander({
    slicePoint: 100,
    expandEffect: "fadeIn",
    collapseEffect: "fadeOut",
    expandText: "read more",
    lessLinkClass: "read less",
  });
});

//Add Class
function displayItem(addID, addClass, ovlerlayID) {
  let addDiv = document.querySelector(`#${addID}`);
  let ovlerlayDiv = document.querySelector(`#${ovlerlayID}`);
  addDiv.classList.toggle(addClass);
  ovlerlayDiv.style.cssText = "  display: block;";
}
//Remove Class
function removeDisplayItem(removeID, removeClass, ovlerlayID) {
  let addDiv = document.querySelector(`#${removeID}`);
  let ovlerlayDiv = document.querySelector(`#${ovlerlayID}`);
  addDiv.classList.toggle(removeClass);
  ovlerlayDiv.style.cssText = "  display: none;";
}

//OutSide Scroll Hidden
function scrollOutsideHidden() {
  let htmlTag = document.querySelector("html");
  htmlTag.style.cssText = "overflow:hidden;";
}
//OutSide Scroll Scroll
function scrollOutsideScroll() {
  let htmlTag = document.querySelector("html");
  htmlTag.style.cssText = "overflow-y:auto;";
}

//Sticky Navbar
//Sticky Navbar
function stickyHeader(stickyTag, stickyClass, scrollHeight = 0) {
  let stickyWrapper = document.querySelector(`#${stickyTag}`);
  stickyWrapper.classList.toggle(stickyClass, scrollY > scrollHeight);
}
let headerWrapper = document.querySelector("#headerWrapper");
if (headerWrapper) {
  window.addEventListener("scroll", () => {
    stickyHeader("headerWrapper", "navbar_fixed");
  });
}

// Mobile Menu
let navbarIcon = document.querySelector("#menuToggleBtn");
let navbarCloseIcon = document.querySelector(".close_icon");
let navbarOverlay = document.querySelector(".mobile_menu_overlay");
let mobileMenuArea = document.querySelector(".mobile_menu_area");
if (navbarIcon) {
  navbarIcon.addEventListener("click", () => {
    mobileMenuArea.classList.add("navbar_active");
    scrollOutsideHidden();
  });
}
if (navbarIcon) {
  navbarCloseIcon.addEventListener("click", () => {
    hideNavbar();
  });
}

if (navbarIcon) {
  navbarOverlay.addEventListener("click", () => {
    hideNavbar();
  });
}

function hideNavbar() {
  mobileMenuArea.classList.remove("navbar_active");
  scrollOutsideScroll();
}

//Slider Single
function swiperSlider(
  sliderID,
  sliderNextArrow,
  sliderPrevArrow,
  paginationSelector,
  breakPoints = {},
  defaultPerView = 1,
  defaultPerGroup = 1,
  defaultSpaceBetween = 10,
  effect = ""
) {
  var swiperHero = new Swiper(`${sliderID} .swiper`, {
    slidesPerView: defaultPerView,
    slidesPerGroup: defaultPerGroup,
    spaceBetween: defaultSpaceBetween,
    speed: 1150,
    effect: effect,
    keyboard: {
      enabled: true,
    },
    navigation: {
      nextEl: sliderNextArrow,
      prevEl: sliderPrevArrow,
    },
    pagination: {
      el: paginationSelector,
      clickable: true,
    },
    // Responsive breakpoints
    breakpoints: breakPoints,
  });
}

//Free Mood Slider
const swiperAutoSlider = (id, space = 24) => {
  const swipeSocialSlider = new Swiper(`${id} .swiper`, {
    slidesPerView: "auto",
    speed: 1150,
    spaceBetween: space,
    freeMode: true,
  });
};

//Category slider
const swiperPreview = new Swiper(`#previewSlider .swiper`, {
  slidesPerView: 1,
  slidesPerGroup: 1,
  spaceBetween: 10,
  speed: 1150,
  keyboard: {
    enabled: true,
  },

  pagination: {
    el: "#previewSlider .swiper-pagination",
    clickable: true,
  },
});

//Category slider
const swiperCategory = new Swiper("#headerCategorySlider .swiper", {
  slidesPerView: "auto",
  speed: 1150,
  spaceBetween: 23,
  freeMode: true,
});

//Upload Media slider
const swipeUploadMedia = new Swiper("#uploadSlider .swiper", {
  slidesPerView: "auto",
  speed: 1150,
  spaceBetween: 10,
  freeMode: true,
});

//Post Slider 1
const swiperPost1 = new Swiper("#homePostArea .post_slider1", {
  speed: 1150,
  effect: "cards",
  keyboard: {
    enabled: true,
  },
  pagination: {
    el: ".swiper-pagination",
    type: "fraction",
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

//Post Slider 2
const swiperPost2 = new Swiper("#homePostArea .post_slider2", {
  speed: 1150,
  effect: "cards",
  keyboard: {
    enabled: true,
  },
  pagination: {
    el: ".swiper-pagination",
    type: "fraction",
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

//Company Slider
const companySlider = new Swiper("#companySliderArea .swiper", {
  speed: 1150,
  spaceBetween: 5,
  keyboard: {
    enabled: true,
  },
  pagination: {
    el: "#companySliderArea .swiper-pagination",
    type: "fraction",
  },
});

//Company Map Slider
const companyMapSlider = new Swiper("#companyMapDetailsSlider .swiper", {
  speed: 1150,
  spaceBetween: 5,
  keyboard: {
    enabled: true,
  },
  pagination: {
    el: "#companyMapDetailsSlider .swiper-pagination",
    type: "fraction",
  },
});

//Upload Media slider
swiperAutoSlider("#mapSliderArea", 11);
// const swipeMapSlider = new Swiper("#mapSliderArea .swiper", {
//   slidesPerView: "auto",
//   speed: 1150,
//   spaceBetween: 11,
//   freeMode: true,
//   centeredSlides: true,
// });

//User Share slider
swiperAutoSlider("#userShareSlider");
// const swipeUserSocialSlider = new Swiper("#userShareSlider .swiper", {
//   slidesPerView: "auto",
//   speed: 1150,
//   spaceBetween: 24,
//   freeMode: true,
// });

//User Share slider
swiperAutoSlider("#socialShareSlider");
// const swipeSocialSlider = new Swiper("#socialShareSlider .swiper", {
//   slidesPerView: "auto",
//   speed: 1150,
//   spaceBetween: 24,
//   freeMode: true,
// });

//Location Category slider
swiperAutoSlider("#locationCategorySlider", 5);

//Recent Location Slider
swiperAutoSlider("#recentSearchSlider", 15);

//Country Input
var input = document.querySelector("#telephone");
if (input) {
  window.intlTelInput(input, {
    // options here
    utilsScript: "/assets/plugins/js/utils.js",
  });
}

//Quotation  Increment Decrement
let qtyPlusButton = document.querySelector("#qtyPlusButton");
let qtyMinusButton = document.querySelector("#qtyMinusButton");
let qtyProductValue = document.querySelector("#qtyProductValue");

if (qtyProductValue) {
  qtyProductValue.value = 0;
}

if (qtyPlusButton) {
  qtyPlusButton.addEventListener("click", () => {
    qtyProductValue.value = parseInt(qtyProductValue.value) + 1;
  });
}
if (qtyMinusButton) {
  qtyMinusButton.addEventListener("click", () => {
    if (qtyProductValue.value > 0) {
      qtyProductValue.value = parseInt(qtyProductValue.value) - 1;
    }
  });
}

//Password Visibility
//01.Login
let inputPassword1 = document.querySelector("#passwordInput");
if (inputPassword1) {
  inputPassword1.addEventListener("click", () => {
    passwordVisibility(
      "passwordInput",
      "passwordArea",
      "eyeOpenIcon",
      "eyeCloseIcon"
    );
  });
}

//Sign Up
let inputPassword2 = document.querySelector("#passwordInput2");
if (inputPassword2) {
  inputPassword2.addEventListener("click", () => {
    passwordVisibility(
      "passwordInput2",
      "passwordArea2",
      "eyeOpenIcon2",
      "eyeCloseIcon2"
    );
  });
}
let inputPassword3 = document.querySelector("#passwordInput3");
if (inputPassword3) {
  inputPassword3.addEventListener("click", () => {
    passwordVisibility(
      "passwordInput3",
      "passwordArea3",
      "eyeOpenIcon3",
      "eyeCloseIcon3"
    );
  });
}
let inputPassword4 = document.querySelector("#passwordInput4");
if (inputPassword4) {
  inputPassword4.addEventListener("click", () => {
    passwordVisibility(
      "passwordInput4",
      "passwordArea4",
      "eyeOpenIcon4",
      "eyeCloseIcon4"
    );
  });
}
let inputPassword5 = document.querySelector("#passwordInput5");
if (inputPassword5) {
  inputPassword5.addEventListener("click", () => {
    passwordVisibility(
      "passwordInput5",
      "passwordArea5",
      "eyeOpenIcon5",
      "eyeCloseIcon5"
    );
  });
}

function passwordVisibility(inputId, eyeIconArea, eyeOpen, eyeClose) {
  let passwordInput = document.getElementById(inputId);
  let passwordIconArea = document.getElementById(eyeIconArea);
  let eyeOpenIcon = document.getElementById(eyeOpen);
  let eyeCloseIcon = document.getElementById(eyeClose);
  passwordIconArea.style.cssText = "display:inline";
  eyeOpenIcon.addEventListener("click", () => {
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
    }
    eyeOpenIcon.style.cssText = "display:none";
    eyeCloseIcon.style.cssText = "display:inline";
  });
  eyeCloseIcon.addEventListener("click", () => {
    if (passwordInput.type === "text") {
      passwordInput.type = "password";
    }
    eyeCloseIcon.style.cssText = "display:none";
    eyeOpenIcon.style.cssText = "display:inline";
  });
}

// ScrollToUp
let scroll = document.querySelector("#scrollTop");
function scrollUp() {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
}
if (scroll) {
  window.addEventListener("scroll", function () {
    scroll.classList.toggle("scroll_active", window.scrollY > 500);
  });
  scroll.addEventListener("click", () => {
    scrollUp();
  });
}

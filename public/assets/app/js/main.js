$(document).ready(function () {
  //Nice Select
  // $(".niceSelect").niceSelect();

  //Gallery
  // $(".gallery_popup").magnificPopup({
  //   type: "image",
  //   gallery: {
  //     enabled: true,
  //   },
  // });

  //Video Popup
  $(".modal_video_btn").modalVideo({
    youtube: {
      controls: 1,
      nocookie: true,
    },
  });
  //Counter
  $(".count-num").rCounter({
    duration: 30,
  });
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

  //Pin verification
  $("#verifyPin").segmentedInput({
    // options
  });

  //Forget Password submit
  $("#resetPasswordForm").submit(function (e) {
    e.preventDefault();
    toggleClassElement("#forgetSidebarArea", "sing_modal_active");
    toggleClassElement("#verifySidebarArea", "sing_modal_active");
  });

  $("#verifyBackBtn").click(function (e) {
    e.preventDefault();
    toggleClassElement("#verifySidebarArea", "sing_modal_active");
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
  htmlTag.style.cssText = "overflow:auto;";
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

// Form Validation Methods Using Bootstrap 5
(function () {
  "use strict";

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll(".needs-validation");

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener(
      "submit",
      function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add("was-validated");
      },
      false
    );
  });
})();

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

//Preview slider
swiperSlider(
  "#previewSlider",
  "#previewSlider .swiper-button-next",
  "#previewSlider .swiper-button-prev",
  "#previewSlider .swiper-pagination",
  {},
  1,
  1,
  10,
  "coverflow"
);

//Country Input
var input = document.querySelector("#telephone");
console.log("input:", input);
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
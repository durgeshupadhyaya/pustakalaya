// window.addEventListener("resize", function () {
//   "use strict";
//   window.location.reload();
// });

document.addEventListener("DOMContentLoaded", function () {
  if (window.innerWidth < 1024) {
    document.querySelectorAll(".sidebar .nav-link").forEach(function (element) {
      element.addEventListener("click", function (e) {
        let nextEl = element.nextElementSibling;
        let parentEl = element.parentElement;
        let allSubmenus_array = parentEl.querySelectorAll(".submenu");

        if (nextEl && nextEl.classList.contains("submenu")) {
          e.preventDefault();
          if (nextEl.style.display == "block") {
            nextEl.style.display = "none";
          } else {
            nextEl.style.display = "block";
          }
        }
      });
    });
  }
});
document.addEventListener("DOMContentLoaded", function () {
  if (window.innerWidth < 1024) {
    document.querySelectorAll(".aside .nav-link").forEach(function (element) {
      element.addEventListener("click", function (e) {
        let nextEl = element.nextElementSibling;
        let parentEl = element.parentElement;
        let allSubmenus_array = parentEl.querySelectorAll(".submenu");

        if (nextEl && nextEl.classList.contains("submenu")) {
          e.preventDefault();
          if (nextEl.style.display == "block") {
            nextEl.style.display = "none";
          } else {
            nextEl.style.display = "block";
          }
        }
      });
    });
  }
});

document.addEventListener("DOMContentLoaded", function () {
  // make it as accordion for smaller screens
  if (window.innerWidth > 992) {
    document
      .querySelectorAll(".navbar .nav-item")
      .forEach(function (everyitem) {
        everyitem.addEventListener("mouseover", function (e) {
          let el_link = this.querySelector("a[data-bs-toggle]");

          if (el_link != null) {
            let nextEl = el_link.nextElementSibling;
            el_link.classList.add("show");
            nextEl.classList.add("show");
          }
        });
        everyitem.addEventListener("mouseleave", function (e) {
          let el_link = this.querySelector("a[data-bs-toggle]");

          if (el_link != null) {
            let nextEl = el_link.nextElementSibling;
            el_link.classList.remove("show");
            nextEl.classList.remove("show");
          }
        });
      });
  }
  // end if innerWidth
});

const primary = document.querySelector(".primaryschool");
Object.assign(primary, {
  slidesPerView: 2,
  spaceBetween: 10,
  breakpoints: {
    640: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 4,
      spaceBetween: 20,
    },
    1024: {
      slidesPerView: 6,
      spaceBetween: 30,
    },
  },
});
primary.initialize();

const secondary = document.querySelector(".schoolbooks");
Object.assign(secondary, {
  slidesPerView: 2,
  spaceBetween: 10,
  breakpoints: {
    640: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 4,
      spaceBetween: 20,
    },
    1024: {
      slidesPerView: 6,
      spaceBetween: 30,
    },
  },
});
secondary.initialize();

window.confirmFormModal = function (route, title='Confirmation',  message = 'Are you sure?',  confirm_label = 'Confirm', cancel_label = 'Cancel')
{
    const csrf_token = $("meta[name='csrf-token']").attr("content");
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success btn-sm',
            cancelButton: 'btn btn-danger me-3 btn-sm',
            container : 'custom-swal-container'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: title,
        text: message,
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: confirm_label,
        cancelButtonText: cancel_label,
        reverseButtons: true,
    }).then((result) => {
        if (result.value) {
            $('<form method="POST" action="' + route + '"><input type="hidden" name="_token" value="' + csrf_token + '"></form>')
                .appendTo('body')
                .submit();
        }
    })
}

window.notify = function (message, type = 'success', callback = null) {
  Swal.fire({
      position: 'center',
      icon: type,
      text: message,
      showConfirmButton: false,
      timer: 5000,
      timerProgressBar: true,
      willClose: () => {
          if(typeof callback === 'function')
          {
              callback();
          }
      }
  });
}
document.addEventListener('DOMContentLoaded', () => {
    "use strict";

    /**
     * Preloader
     */
    const preloader = document.querySelector('#preloader');
    if (preloader) {
      window.addEventListener('load', () => {
        preloader.remove();
      });
    }

    /**
     * Sticky Header on Scroll
     */
    const selectHeader = document.querySelector('#header');
    if (selectHeader) {
      let headerOffset = selectHeader.offsetTop;
      let nextElement = selectHeader.nextElementSibling;

      const headerFixed = () => {
        if ((headerOffset - window.scrollY) <= 0) {
          selectHeader.classList.add('sticked');
          if (nextElement) nextElement.classList.add('sticked-header-offset');
        } else {
          selectHeader.classList.remove('sticked');
          if (nextElement) nextElement.classList.remove('sticked-header-offset');
        }
      }
      window.addEventListener('load', headerFixed);
      document.addEventListener('scroll', headerFixed);
    }

    /**
     * Navbar links active state on scroll
     */
    let navbarlinks = document.querySelectorAll('#navbar a');

    function navbarlinksActive() {
      navbarlinks.forEach(navbarlink => {

        if (!navbarlink.hash) return;

        let section = document.querySelector(navbarlink.hash);
        if (!section) return;

        let position = window.scrollY + 200;

        if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
          navbarlink.classList.add('active');
        } else {
          navbarlink.classList.remove('active');
        }
      })
    }
    window.addEventListener('load', navbarlinksActive);
    document.addEventListener('scroll', navbarlinksActive);

    /**
     * Mobile nav toggle
     */
    const mobileNavShow = document.querySelector('.mobile-nav-show');
    const mobileNavHide = document.querySelector('.mobile-nav-hide');

    document.querySelectorAll('.mobile-nav-toggle').forEach(el => {
      el.addEventListener('click', function (event) {
        event.preventDefault();
        mobileNavToogle();
      })
    });

    function mobileNavToogle() {
      document.querySelector('body').classList.toggle('mobile-nav-active');
      mobileNavShow.classList.toggle('d-none');
      mobileNavHide.classList.toggle('d-none');
    }

    /**
     * Hide mobile nav on same-page/hash links
     */
    document.querySelectorAll('#navbar a').forEach(navbarlink => {

      if (!navbarlink.hash) return;

      let section = document.querySelector(navbarlink.hash);
      if (!section) return;

      navbarlink.addEventListener('click', () => {
        if (document.querySelector('.mobile-nav-active')) {
          mobileNavToogle();
        }
      });

    });

    /**
     * Toggle mobile nav dropdowns
     */
    const navDropdowns = document.querySelectorAll('.navbar .dropdown > a');

    navDropdowns.forEach(el => {
      el.addEventListener('click', function (event) {
        if (document.querySelector('.mobile-nav-active')) {
          event.preventDefault();
          this.classList.toggle('active');
          this.nextElementSibling.classList.toggle('dropdown-active');

          let dropDownIndicator = this.querySelector('.dropdown-indicator');
          dropDownIndicator.classList.toggle('bi-chevron-up');
          dropDownIndicator.classList.toggle('bi-chevron-down');
        }
      })
    });

    /**
     * Initiate glightbox
     */
    const glightbox = GLightbox({
      selector: '.glightbox'
    });

    /**
     * Scroll top button
     */
    const scrollTop = document.querySelector('.scroll-top');
    if (scrollTop) {
      const togglescrollTop = function () {
        window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
      }
      window.addEventListener('load', togglescrollTop);
      document.addEventListener('scroll', togglescrollTop);
      scrollTop.addEventListener('click', window.scrollTo({
        top: 0,
        behavior: 'smooth'
      }));
    }

    /**
     * Initiate Pure Counter
     */
    new PureCounter();

    /**
      * Tournaments Slider
    */

    let page = window.innerWidth;

    let swiper = new Swiper(".mySwiper", {
      slidesPerView: page > 1280 ? 4 : page > 993 ? 3 : page > 768 ? 2 : 1,
      spaceBetween: 30,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      }
    });

    /**
     * Clients Slider
     */
    new Swiper('.clients-slider', {
      speed: 400,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false
      },
      slidesPerView: 'auto',
      pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true
      },
      breakpoints: {
        320: {
          slidesPerView: 2,
          spaceBetween: 40
        },
        480: {
          slidesPerView: 3,
          spaceBetween: 60
        },
        640: {
          slidesPerView: 4,
          spaceBetween: 80
        },
        992: {
          slidesPerView: 6,
          spaceBetween: 120
        }
      }
    });

    /**
   * History Slider
   */
 new Swiper('.history-slider', {
  slidesPerView: 1,
  spaceBetween: 0,
  speed: 400,
  loop: true,
  autoplay: {
    delay: 4000,
    disableOnInteraction: false
  },
  pagination: {
    el: '.swiper-pagination',
    type: 'bullets',
    clickable: true
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  }
});

 /**
   * Product details slider
   */
 new Swiper('.productSwiper', {
  slidesPerView: 4,
  spaceBetween: 0,
  speed: 400,
  loop: true,
  pagination: {
    el: '.swiper-pagination',
    type: 'bullets',
    clickable: true
  },
  navigation: {
    nextEl: '.product-button-next',
    prevEl: '.product-button-prev',
  },
  breakpoints: {
    320: {
      slidesPerView: 3,
      spaceBetween: 0,
    },
    768: {
      slidesPerView: 4,
      spaceBetween: 0,
    }
  }
});


const deals = new Swiper('.deals', {
  slidesPerView: 3, 
  loop: true, 
  speed: 1000,
  autoplay: {
      delay: 3000,
      disableOnInteraction: false,
  },
  centeredSlides: true,
  spaceBetween: 20,
  on: {
      slideChangeTransitionStart: function () {
          const slides = document.querySelectorAll('.deals .swiper-slide');
          slides.forEach(slide => {
              slide.style.transform = 'scale(0.8)';
          });

          const activeSlide = document.querySelector('.deals .swiper-slide-active');
          activeSlide.style.transform = 'scale(1)';
          activeSlide.style.filter = 'none';
      }
  }
});


 /**
   * Night Club Slider
   */
 new Swiper('.nightClub-slider', {
  slidesPerView: 1,
  spaceBetween: 0,
  speed: 400,
  loop: true,
  autoplay: {
    delay: 4000,
    disableOnInteraction: false
  },
  pagination: {
    el: '.swiper-pagination',
    type: 'bullets',
    clickable: true
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  }
});

    /**
     * Init swiper slider with 1 slide at once in desktop view
     */
    new Swiper('.slides-1', {
      speed: 600,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false
      },
      slidesPerView: 'auto',
      pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      }
    });

    /**
     * Init swiper slider with 3 slides at once in desktop view
     */
    new Swiper('.slides-3', {
      speed: 600,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false
      },
      slidesPerView: 'auto',
      pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
          spaceBetween: 40
        },

        1200: {
          slidesPerView: 3,
        }
      }
    });

    window.loading = function (c)
 {
    if(c == 'show' || c == 'hide')
    {
        $.LoadingOverlay(c);
    }
 }

    /**
     * Porfolio isotope and filter
     */
    let portfolionIsotope = document.querySelector('.portfolio-isotope');

    if (portfolionIsotope) {

      let portfolioFilter = portfolionIsotope.getAttribute('data-portfolio-filter') ? portfolionIsotope.getAttribute('data-portfolio-filter') : '*';
      let portfolioLayout = portfolionIsotope.getAttribute('data-portfolio-layout') ? portfolionIsotope.getAttribute('data-portfolio-layout') : 'masonry';
      let portfolioSort = portfolionIsotope.getAttribute('data-portfolio-sort') ? portfolionIsotope.getAttribute('data-portfolio-sort') : 'original-order';

      window.addEventListener('load', () => {
        let portfolioIsotope = new Isotope(document.querySelector('.portfolio-container'), {
          itemSelector: '.portfolio-item',
          layoutMode: portfolioLayout,
          filter: portfolioFilter,
          sortBy: portfolioSort
        });

        let menuFilters = document.querySelectorAll('.portfolio-isotope .portfolio-flters li');
        menuFilters.forEach(function (el) {
          el.addEventListener('click', function () {
            document.querySelector('.portfolio-isotope .portfolio-flters .filter-active').classList.remove('filter-active');
            this.classList.add('filter-active');
            portfolioIsotope.arrange({
              filter: this.getAttribute('data-filter')
            });
            if (typeof aos_init === 'function') {
              aos_init();
            }
          }, false);
        });

      });

    }

    /**
     * Animation on scroll function and init
     */
    function aos_init() {
      AOS.init({
        duration: 1000,
        easing: 'ease-in-out',
        once: true,
        mirror: false
      });
    }
    window.addEventListener('load', () => {
      aos_init();
    });

  });

// File Upload Section JS

function fileBrowse(event, parent_element)
{
    const allowed_extensions = parent_element.find("input[type='file']").attr('allowed');
    const allowed_extensions_array = allowed_extensions != '*' ? parent_element.find("input[type='file']").attr('allowed').split(',') : [];
    const image_extensions = ['jpg', 'jpeg', 'gif', 'png'];
    let reader = new FileReader();
    reader.onload = function()
    {
        const result = reader.result;
        const file = event.target.files[0];
        const type = file.type;
        const ext = type.split('/')[1];
        if(allowed_extensions == '*' || allowed_extensions_array.indexOf(ext) >= 0){
            parent_element.find("input.file-upload-info").val(file.name);
            if(image_extensions.indexOf(ext) >= 0){
                parent_element.find(".display-input-image").removeClass('d-none')
                parent_element.find("img").attr('src', result);
            }
            else{
                parent_element.find(".display-input-image").addClass('d-none')
            }
        }
        else{
            parent_element.find("input.file-upload-info").val('')
            parent_element.find(".display-input-image").addClass('d-none')
            parent_element.find("input[type='file']").val('');
            alert('Unsupported. Try with valid files.');
        }
    }
    reader.readAsDataURL(event.target.files[0]);
}

const fus_class = '.file-upload-section';
$(fus_class).on("click", ".file-upload-browse", function () {
    $(this).parents(fus_class).eq(0).find("input[type='file']").click();
});

$(fus_class).on("change", "input[type='file']", function (event) {
    const parent_element = $(this).parents(fus_class).eq(0);
    fileBrowse(event, parent_element);
});

$(fus_class).on("click", ".file-upload-remove", function () {
    const parent_element = $(this).parents(fus_class).eq(0);
    parent_element.find("input.file-upload-info").val('');
    parent_element.find(".display-input-image").addClass('d-none')
    parent_element.find("input[type='file']").val('');
})

// End File Upload Section JS

$(document).ready(function () {
  $('.button-item').on("click", function () {
      $('.item-section').addClass("active");
  });

  $('.close-button').on("click", function () {
      $('.item-section').removeClass("active");
  });

  $('.btn-cart').on("click", function () {
      setTimeout(function () {
          $('.item-section').addClass("active")
      }, 1500);
      setTimeout(function () {
          $('.item-section').removeClass('active');
      }, 5000);
  });
});

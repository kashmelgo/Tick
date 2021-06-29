/**
* Template Name: Arsha - v4.1.0
* Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/
(function() {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all)
    if (selectEl) {
      if (all) {
        selectEl.forEach(e => e.addEventListener(type, listener))
      } else {
        selectEl.addEventListener(type, listener)
      }
    }
  }

  /**
   * Easy on scroll event listener 
   */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }

  /**
   * Navbar links active state on scroll
   */
  let navbarlinks = select('#navbar .scrollto', true)
  const navbarlinksActive = () => {
    let position = window.scrollY + 200
    navbarlinks.forEach(navbarlink => {
      if (!navbarlink.hash) return
      let section = select(navbarlink.hash)
      if (!section) return
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        navbarlink.classList.add('active')
      } else {
        navbarlink.classList.remove('active')
      }
    })
  }
  window.addEventListener('load', navbarlinksActive)
  onscroll(document, navbarlinksActive)

  /**
   * Scrolls to an element with header offset
   */
  const scrollto = (el) => {
    let header = select('#header')
    let offset = header.offsetHeight

    let elementPos = select(el).offsetTop
    window.scrollTo({
      top: elementPos - offset,
      behavior: 'smooth'
    })
  }

  /**
   * Toggle .header-scrolled class to #header when page is scrolled
   */
  let selectHeader = select('#header')
  if (selectHeader) {
    const headerScrolled = () => {
      if (window.scrollY > 100) {
        selectHeader.classList.add('header-scrolled')
      } else {
        selectHeader.classList.remove('header-scrolled')
      }
    }
    window.addEventListener('load', headerScrolled)
    onscroll(document, headerScrolled)
  }

  /**
   * Back to top button
   */
  let backtotop = select('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
  }

  /**
   * Mobile nav toggle
   */
  on('click', '.mobile-nav-toggle', function(e) {
    select('#navbar').classList.toggle('navbar-mobile')
    this.classList.toggle('bi-list')
    this.classList.toggle('bi-x')
  })

  /**
   * Mobile nav dropdowns activate
   */
  on('click', '.navbar .dropdown > a', function(e) {
    if (select('#navbar').classList.contains('navbar-mobile')) {
      e.preventDefault()
      this.nextElementSibling.classList.toggle('dropdown-active')
    }
  }, true)

  /**
   * Scrool with ofset on links with a class name .scrollto
   */
  on('click', '.scrollto', function(e) {
    if (select(this.hash)) {
      e.preventDefault()

      let navbar = select('#navbar')
      if (navbar.classList.contains('navbar-mobile')) {
        navbar.classList.remove('navbar-mobile')
        let navbarToggle = select('.mobile-nav-toggle')
        navbarToggle.classList.toggle('bi-list')
        navbarToggle.classList.toggle('bi-x')
      }
      scrollto(this.hash)
    }
  }, true)

  /**
   * Scroll with ofset on page load with hash links in the url
   */
  window.addEventListener('load', () => {
    if (window.location.hash) {
      if (select(window.location.hash)) {
        scrollto(window.location.hash)
      }
    }
  });

  /**
   * Preloader
   */
  let preloader = select('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove()
    });
  }

  /**
   * Initiate  glightbox 
   */
  const glightbox = GLightbox({
    selector: '.glightbox'
  });

  /**
   * Skills animation
   */
  let skilsContent = select('.skills-content');
  if (skilsContent) {
    new Waypoint({
      element: skilsContent,
      offset: '80%',
      handler: function(direction) {
        let progress = select('.progress .progress-bar', true);
        progress.forEach((el) => {
          el.style.width = el.getAttribute('aria-valuenow') + '%'
        });
      }
    })
  }

  /**
   * Porfolio isotope and filter
   */
  window.addEventListener('load', () => {
    let portfolioContainer = select('.portfolio-container');
    if (portfolioContainer) {
      let portfolioIsotope = new Isotope(portfolioContainer, {
        itemSelector: '.portfolio-item'
      });

      let portfolioFilters = select('#portfolio-flters li', true);

      on('click', '#portfolio-flters li', function(e) {
        e.preventDefault();
        portfolioFilters.forEach(function(el) {
          el.classList.remove('filter-active');
        });
        this.classList.add('filter-active');

        portfolioIsotope.arrange({
          filter: this.getAttribute('data-filter')
        });
        portfolioIsotope.on('arrangeComplete', function() {
          AOS.refresh()
        });
      }, true);
    }

  });

  /**
   * Initiate portfolio lightbox 
   */
  const portfolioLightbox = GLightbox({
    selector: '.portfolio-lightbox'
  });

  /**
   * Portfolio details slider
   */
  new Swiper('.portfolio-details-slider', {
    speed: 400,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    }
  });

  /**
   * Animation on scroll
   */
  window.addEventListener('load', () => {
    AOS.init({
      duration: 1000,
      easing: "ease-in-out",
      once: true,
      mirror: false
    });
  });
})()

function test(name) {
  var nodisplay = document.querySelectorAll(".list-side-upper .task-info");
  for (let i = 0; i < nodisplay.length; i++) {
    nodisplay[i].style.display = "none";
  }
  document.querySelector("."+name).style.display = "block";
}

function clearTask() {
  var innerRemove = document.querySelectorAll(".new-task-class");
  document.querySelector(".new-task-class-radio1").checked = false;
  document.querySelector(".new-task-class-radio2").checked = false;
  for (let i = 0; i < innerRemove.length; i++) {
    innerRemove[i].value = "";
  }
}

function showUpdateInfo(num) {
  var p = document.querySelectorAll('.user-details-info p');
  var form = document.querySelectorAll('.user-details-info form');
  var input = document.querySelectorAll('.user-details-info form input');
  var editbtn = document.querySelectorAll('.editBtn');
  var buttons = document.querySelectorAll('.user-details-edit-onhover');
  
  for (let i = 0; i < editbtn.length; i++) {
    p[i].style.display = "block";
    form[i].style.display = "none";
    editbtn[i].style.display = "block";
    buttons[i].style.display = "none";
    if(i==num){
      p[num].style.display = "none";
      form[num].style.display = "block";
      input[num].value = "";
      editbtn[num].style.display = "none";
      buttons[num].style.display = "block";
    }
  }
}

function closeUpdateInfo() {
  var p = document.querySelectorAll('.user-details-info p');
  var form = document.querySelectorAll('.user-details-info form');
  var input = document.querySelectorAll('.user-details-info form input');
  var editbtn = document.querySelectorAll('.editBtn');
  var buttons = document.querySelectorAll('.user-details-edit-onhover');
  
  for (let i = 0; i < editbtn.length; i++) {
    p[i].style.display = "block";
    form[i].style.display = "none";
    editbtn[i].style.display = "block";
    buttons[i].style.display = "none";
  }
}

function loadTheme(theme_id) {
  if(theme_id == 1){
    //background
    document.documentElement.style.setProperty('--selected-tab-background-color','#47b2e4');
    document.documentElement.style.setProperty('--unselected-tab-background-color','#9bdfff');
    document.documentElement.style.setProperty('--main-background-color','#fff');
    document.documentElement.style.setProperty('--sub-background-color','#ebebeb');
    document.documentElement.style.setProperty('--tab-heading-background-color','#fff');
    document.documentElement.style.setProperty('--tab-body-background-color','#f3f3f3');
    document.documentElement.style.setProperty('--tab-button-background-color','#47b2e4');
    document.documentElement.style.setProperty('--main-button-background-color','#47b2e4');
    document.documentElement.style.setProperty('--sub-button-background-color','#fff');
    document.documentElement.style.setProperty('--progress-background-color','#f3f3f3');
    document.documentElement.style.setProperty('--experience-background-color','#47b2e4');
    document.documentElement.style.setProperty('--button-hover-background-color','169bcc');
    document.documentElement.style.setProperty('--side-background-color','#47b2e4');
    //text
    document.documentElement.style.setProperty('--page-heading-text','#202020');
    document.documentElement.style.setProperty('--tab-heading-text','#202020');
    document.documentElement.style.setProperty('--tab-sub-heading-text','#202020');
    document.documentElement.style.setProperty('--task-not-done-text','#626262');
    document.documentElement.style.setProperty('--task-done-text','#9c9c9c');
    document.documentElement.style.setProperty('--empty-text','#626262');
    document.documentElement.style.setProperty('--form-input-text','#626262');
    document.documentElement.style.setProperty('--form-label-text','#626262');
    document.documentElement.style.setProperty('--hover-text','#202020');
    document.documentElement.style.setProperty('--other-text','#202020');
  }
  if(theme_id == 2){
    //background
    document.documentElement.style.setProperty('--selected-tab-background-color','#47b2e4');
    document.documentElement.style.setProperty('--unselected-tab-background-color','#9bdfff');
    document.documentElement.style.setProperty('--main-background-color','#202020');
    document.documentElement.style.setProperty('--sub-background-color','#2c2c2c');
    document.documentElement.style.setProperty('--tab-heading-background-color','#181818');
    document.documentElement.style.setProperty('--tab-body-background-color','#353535');
    document.documentElement.style.setProperty('--tab-button-background-color','#47b2e4');
    document.documentElement.style.setProperty('--main-button-background-color','#47b2e4');
    document.documentElement.style.setProperty('--sub-button-background-color','#5f5f5f');
    document.documentElement.style.setProperty('--progress-background-color','#353535');
    document.documentElement.style.setProperty('--experience-background-color','#47b2e4');
    document.documentElement.style.setProperty('--button-hover-background-color','#169bcc');
    document.documentElement.style.setProperty('--side-background-color','#3d3d3d');
    //text
    document.documentElement.style.setProperty('--page-heading-text','#fff');
    document.documentElement.style.setProperty('--tab-heading-text','#fff');
    document.documentElement.style.setProperty('--tab-sub-heading-text','#626262');
    document.documentElement.style.setProperty('--task-not-done-text','#f3f3f3');
    document.documentElement.style.setProperty('--task-done-text','#9c9c9c');
    document.documentElement.style.setProperty('--empty-text','#626262');
    document.documentElement.style.setProperty('--form-input-text','#626262');
    document.documentElement.style.setProperty('--form-label-text','#fff');
    document.documentElement.style.setProperty('--hover-text','#666666');
    document.documentElement.style.setProperty('--other-text','#fff');
  }
  if(theme_id == 3){
    //background
    document.documentElement.style.setProperty('--selected-tab-background-color','#7ac9e6');
    document.documentElement.style.setProperty('--unselected-tab-background-color','#e6f8ff');
    document.documentElement.style.setProperty('--main-background-color','#7ac9e6');
    document.documentElement.style.setProperty('--sub-background-color','#add8e6');
    document.documentElement.style.setProperty('--tab-heading-background-color','#54d1ff');
    document.documentElement.style.setProperty('--tab-body-background-color','#cff3ff');
    document.documentElement.style.setProperty('--tab-button-background-color','#47b2e4');
    document.documentElement.style.setProperty('--main-button-background-color','#54d1ff');
    document.documentElement.style.setProperty('--sub-button-background-color','#e0f7ff');
    document.documentElement.style.setProperty('--progress-background-color','#9fe3fc');
    document.documentElement.style.setProperty('--experience-background-color','#00baff');
    document.documentElement.style.setProperty('--button-hover-background-color','#169bcc');
    document.documentElement.style.setProperty('--side-background-color','#54d1ff');
    //text
    document.documentElement.style.setProperty('--page-heading-text','#fff');
    document.documentElement.style.setProperty('--tab-heading-text','#fff');
    document.documentElement.style.setProperty('--tab-sub-heading-text','#626262');
    document.documentElement.style.setProperty('--task-not-done-text','#626262');
    document.documentElement.style.setProperty('--task-done-text','#9c9c9c');
    document.documentElement.style.setProperty('--empty-text','#626262');
    document.documentElement.style.setProperty('--form-input-text','#626262');
    document.documentElement.style.setProperty('--form-label-text','#54d1ff');
    document.documentElement.style.setProperty('--hover-text','#54d1ff');
    document.documentElement.style.setProperty('--other-text','#fff');
  }
  if(theme_id == 4){
    //background
    document.documentElement.style.setProperty('--selected-tab-background-color','#ff5972');
    document.documentElement.style.setProperty('--unselected-tab-background-color','#ffd2d9');
    document.documentElement.style.setProperty('--main-background-color','#ff98a7');
    document.documentElement.style.setProperty('--sub-background-color','#FFB6C1');
    document.documentElement.style.setProperty('--tab-heading-background-color','#ff5972');
    document.documentElement.style.setProperty('--tab-body-background-color','#ffd2d9');
    document.documentElement.style.setProperty('--tab-button-background-color','#ff405d');
    document.documentElement.style.setProperty('--main-button-background-color','#ff5972');
    document.documentElement.style.setProperty('--sub-button-background-color','#ffd2d9');
    document.documentElement.style.setProperty('--progress-background-color','#ffd2d9');
    document.documentElement.style.setProperty('--experience-background-color','#ff5972');
    document.documentElement.style.setProperty('--button-hover-background-color','#ff3855');
    document.documentElement.style.setProperty('--side-background-color','#ff5972');
    //text
    document.documentElement.style.setProperty('--page-heading-text','#fff');
    document.documentElement.style.setProperty('--tab-heading-text','#fff');
    document.documentElement.style.setProperty('--tab-sub-heading-text','#626262');
    document.documentElement.style.setProperty('--task-not-done-text','#626262');
    document.documentElement.style.setProperty('--task-done-text','#9c9c9c');
    document.documentElement.style.setProperty('--empty-text','#626262');
    document.documentElement.style.setProperty('--form-input-text','#626262');
    document.documentElement.style.setProperty('--form-label-text','#ff405d');
    document.documentElement.style.setProperty('--hover-text','#ff5972');
    document.documentElement.style.setProperty('--other-text','#fff');
  }
} 



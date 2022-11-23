/*jshint unused:false*/
/*global fetch */
/*global console */



// $(function () {

// /**** NAV SCROLL ****/
//     $(".side-nav a, .header-intro a, .footer-content a").click(function(e){
//         e.preventDefault();
//         // Hide nav
//         // Scroll to location
//         $("html, body").animate({ 
//             scrollTop: $( $(this).attr('href') ).position().top+50
//         }, 600);
//     });

// });

//object fit fix for ie11
var userAgent, ieReg, ie;
userAgent = window.navigator.userAgent;
ieReg = /msie|Trident.*rv[ :]*11\./gi;
ie = ieReg.test(userAgent);


if(ie) {
  var imgContainer = document.querySelectorAll(".img-container");

  for(var i=0; i<imgContainer.length; i++){
    var imgCtr = imgContainer[i];
    var imgUrl = imgCtr.getElementsByTagName("img")[0].src;
    if (imgUrl) {
      imgCtr.setAttribute("style", "background-image:url('" + imgUrl + "')");
      imgCtr.classList.add("custom-object-fit");
    }
  }
}


// Price switch 
function priceswitch(event) {
    event.preventDefault();
    document.getElementById('switch-price-type').value = this.value;
    document.getElementById('price-switch').submit();
}
var price_buttons = document.querySelectorAll("#price-switch button");
for(var i=0; i<price_buttons.length; i++){
  price_buttons[i].addEventListener('click', priceswitch, false);
}


//Nav Toggle
function toggleNav(el) {
    var element = el;
    var menu = document.getElementById("site-menu");
    var header = document.querySelectorAll(".site-header")[0];
    menu.classList.toggle("active");
    header.classList.toggle("active");

    if(element.querySelector("span").classList.contains("more")){
      element.innerHTML = "<span class='close'></span> Close";
    } else {
      element.innerHTML = "<span class='more'></span> Menu";
    }
}

//Accordion active
var showAccordion = function(){
    var dropdown = this.parentNode;
    dropdown.classList.toggle("active");
}

var accordionButton = document.querySelectorAll(".accordion > button");

for(var i=0; i<accordionButton.length; i++){
  accordionButton[i].addEventListener('click', showAccordion, false);
}

// // Mobile Dropdown
// var mobileDropdown = function(){
//     var dropdown = this.parentNode;
//     dropdown.classList.toggle("active");
// }

// var mobile_dropdown = document.querySelectorAll(".breadcrumb-menu");

// for(var i=0; i<mobile_dropdown.length; i++){
//   mobile_dropdown[i].addEventListener('click', mobileDropdown, false);
// }

var modalMobileNav = new tingle.modal({
  closeMethods: [],
  cssClass: ['mobile-nav','reversed']
});


const navContainer = document.querySelector('.nav-container');
const hamburger = document.querySelector('.hamburger');
const handleToggle = () => {
  hamburger.classList.toggle('is-active');
  navContainer.classList.toggle('is-active');

  
  if(hamburger.classList.contains("is-active")) {
    modalMobileNav.open();
  } else{
    modalMobileNav.close();
  }
}

hamburger.onclick = () => handleToggle();
hamburger.addEventListener('keyup', (event) => {
  if(event.keyCode === 13 || event.keyCode === 32) {
    handleToggle();
  }
});

modalMobileNav.setContent(document.querySelector('.site-menu').innerHTML);


// Search Bar
var searchDropdown = function(){
    var searchRow = this.closest('.search-bar');
    searchRow.classList.toggle("active");
}

var searchBar = document.querySelectorAll(".search-bar .legend");

for(var i=0; i<searchBar.length; i++){
  searchBar[i].addEventListener('click', searchDropdown, false);
}


if(document.getElementsByClassName('toggle-search').length>0){
    document.getElementsByClassName('toggle-search')[0].addEventListener('click', function(e){
      e.preventDefault();
      if(document.querySelector('#popout-form')===null){
        window.location.href='/search?show-search-bar=true';
        return false;
      }
      if(document.querySelector('#popout-form').classList.contains('hidden')){
        document.querySelector('#popout-form').classList.remove('hidden');
      } else {
        document.querySelector('#popout-form').classList.add('hidden');
      }
    });
}



//Menu Dropdown Toggle
// var menuDropdown = function(){
//     var dropdown = this;
//     dropdown.classList.toggle("active");
// }

// var menuTrigger = document.querySelectorAll(".menu-dropdown");

// for(var i=0; i<menuTrigger.length; i++){
//   menuTrigger[i].addEventListener('click', menuDropdown, false);
// }

// //Dropdown Button
// var showDropdown = function(){
//     var dropdown = this.parentNode;
//     dropdown.classList.toggle("active");
// }

// var dropdownButton = document.querySelectorAll(".dropdown > button");

// for(var i=0; i<dropdownButton.length; i++){
//   dropdownButton[i].addEventListener('click', showDropdown, false);
// }

// //Dropdown Toggle
// var showDropdown = function(){
//     var dropdown = this.querySelector('div');
//     dropdown.classList.toggle("active");
// }

// var has_dropdown = document.querySelectorAll(".has-dropdown");

// for(var i=0; i<has_dropdown.length; i++){
//   has_dropdown[i].addEventListener('click', showDropdown, false);
// }

// // Mobile Dropdown
// var mobileDropdown = function(){
//     var dropdown = this.parentNode;
//     dropdown.classList.toggle("active");
// }

// var mobile_dropdown = document.querySelectorAll(".breadcrumb-menu");

// for(var i=0; i<mobile_dropdown.length; i++){
//   mobile_dropdown[i].addEventListener('click', mobileDropdown, false);
// }


// Site Search Toggle
// var searchToggle = function(){
//   search_container = document.querySelector(".popout-form");
//   if(search_container){
//     search_container.classList.toggle("active");
//   } else {
//     var elmnt = document.querySelector(".full-header-search");
//     elmnt.scrollIntoView();
//   }
// }

// var search_toggle = document.getElementById('search-toggle');
// search_toggle.addEventListener('click', searchToggle , false);



//Site Menu Dropdown Toggle
var menuDropdown = function(){
    //div inside element contains dropdown menu
    var dropdown = this.parentNode;

    //if it's already active set it not to be
    if(dropdown.classList.contains("active")){
        dropdown.classList.toggle("active");
        return;
    }
    //get current active class
    var activeClass = document.querySelectorAll(".menu-dropdown.active");
    // make it not active
    if(activeClass!=null){
        for(var i=0; i<activeClass.length; i++){
          activeClass[i].classList.toggle("active");
        }
    }
    
    //apply active to the div inside element that contains dropdown menu
    dropdown.classList.toggle("active");
}

var dropdownTrigger = document.querySelectorAll(".menu-dropdown > a");

for(var i=0; i<dropdownTrigger.length; i++){
  dropdownTrigger[i].addEventListener('click', menuDropdown, false);
}


// //Menu Dropdown Toggle
// var menuDropdown = function(){
//     //div inside element contains dropdown menu
//     var dropdown = this.parentNode.querySelector(".menu-dropdown");

//     //if it's already active set it not to be
//     if(dropdown.classList.contains("active")){
//         dropdown.classList.toggle("active");
//         return;
//     }
//     // //get current active class
//     // var activeClass = document.querySelectorAll(".menu-dropdown.active");
//     // // make it not active
//     // if(activeClass!=null){
//     //     for(var i=0; i<activeClass.length; i++){
//     //       activeClass[i].classList.toggle("active");
//     //     }
//     // }
    
//     //apply active to the div inside element that contains dropdown menu
//     dropdown.classList.toggle("active");
// }

// var menuTrigger = document.querySelectorAll(".menu-dropdown > a");

// for(var i=0; i<menuTrigger.length; i++){
//   menuTrigger[i].addEventListener('click', menuDropdown, false);
// }


//Dropdown Menu Toggle
var showMenu = function(){
    //div inside element contains dropdown menu
    var dropdown = this.parentNode.querySelector('div');
    var menuToggle = this;

    //if it's already active set it not to be
    if(dropdown.classList.contains("active")){
        dropdown.classList.toggle("active");
        menuToggle.classList.toggle("active");
        return;
    }
    //get current active class
    var activeClass = document.querySelectorAll(".dropdown-menu .active");
    // make it not active
    if(activeClass!=null){
        for(var i=0; i<activeClass.length; i++){
          activeClass[i].classList.toggle("active");
        }
    }
    
    //apply active to the div inside element that contains dropdown menu
    dropdown.classList.toggle("active");
    menuToggle.classList.toggle("active");
}

var menuDropdown = document.querySelectorAll(".dropdown-menu > a");

for(var i=0; i<menuDropdown.length; i++){
  menuDropdown[i].addEventListener('click', showMenu, false);
}



//Dropdown Menu Toggle
// var mobileDropdown = function(){
//   //div inside element contains dropdown menu
//   var dropdown = this.parentNode.querySelector('div');


//   //if it's already active set it not to be
//     if(dropdown.classList.contains("active")){
//         dropdown.classList.toggle("active");
//         return;
//     }
//     //get current active class
//     var activeClass = document.querySelectorAll(".mobile-dropdown .active");
//     // make it not active
//     if(activeClass!=null){
//         for(var i=0; i<activeClass.length; i++){
//           activeClass[i].classList.toggle("active");
//         }
//     }

  
//   //apply active to the div inside element that contains dropdown menu
//   dropdown.classList.toggle("active");
// }

// var mobileMenu = document.querySelectorAll(".mobile-dropdown > a");

// for(var i=0; i<mobileMenu.length; i++){
//   mobileMenu[i].addEventListener('click', mobileDropdown, false);
// }



//faqs
var faqSearch = document.querySelector('.faq-search input');

if(faqSearch !== null){
  faqSearch.addEventListener('keyup', function(e){
    var results = document.getElementById('faq-results');
    if(this.value.length != 0){
      results.classList.add("active");
    } else {
      results.classList.remove("active");
    }
  });
}


//More Options Toggle
var classname = document.querySelectorAll(".more-options");

var moreOptions = function(e) {
	e.preventDefault();
  var element = document.getElementById("vehicle-search");
  element.classList.toggle("active");
  if(element.classList.contains('active')){
    this.innerHTML = 'Hide additional options';
  } else {
    this.innerHTML = 'Show me more options';
  }
};

for (var i = 0; i < classname.length; i++) {
    classname[i].addEventListener('click', moreOptions, false);
}

//Tab Content
function openTab(e, tabName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tab-content");
  tablinks = document.getElementsByClassName("tab");

  //remove active tab
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].className = tabcontent[i].className.replace(" active", "");
  }

  //remove active from button tabs
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  //add active to tab
  document.getElementById(tabName).className += " active";

  //add active to button tabs
  e.currentTarget.className += " active";
}

//Search for Cars or Vans
function showDesc(el){
  el.style.display = 'none';
  el.parentNode.querySelector('.extra').classList.remove('visuallyhidden');
}






/** 
  * SEARCH
  */
function searchType(elem, searchType) {
  var hiddenField, searchTab;

  //set hidden field value
  hiddenField = document.getElementById("search-type");
  hiddenField.setAttribute('value', searchType);
  
  //remove active class
  searchTab = document.getElementsByClassName("search-tab");
  for (i = 0; i < searchTab.length; i++) {
    searchTab[i].className = searchTab[i].className.replace(" active", "");
  }

  //add active class to clicked
  elem.classList.toggle("active");

  loadManufacturers((document.getElementById('search-type').classList.contains('search-type-van')?'van':'car'));
  loadBodyTypes((document.getElementById('search-type').classList.contains('search-type-van')?'van':'car'));

  var dropdown = document.getElementsByName('model')[0];
  dropdown.length = 0;

  var defaultOption = document.createElement('option');
  defaultOption.text = 'Any Model';
  defaultOption.value = '';

  dropdown.add(defaultOption);
  dropdown.selectedIndex = 0;

}


function loadManufacturers($type)
{

  var make_dropdowns = document.getElementsByName("make");
  for (i = 0; i < make_dropdowns.length; i++) {
    
    var dropdown = make_dropdowns[0];
    dropdown.length = 0;

    var defaultOption = document.createElement('option');
    defaultOption.text = 'Any Make';
    defaultOption.value = '';

    dropdown.add(defaultOption);
    dropdown.selectedIndex = 0;

    var url = '/api/'+$type+'/manufacturers/ev';

    fetch(url).then(function(response) {  
      if (response.status !== 200) {  
        console.warn('Looks like there was a problem. Status Code: ' + 
          response.status);  
        return;  
      }
      return response.json();
    }).then(function(data) {
      let keysSorted = Object.keys(data).sort(function(a, b) {
        return data[a].localeCompare(data[b])
      });
      for (let x in keysSorted) {
        let option = document.createElement('option');
        option.text = data[keysSorted[x]];
        option.value = keysSorted[x];
        dropdown.add(option);
      }
    }).catch(function(err) {  
        console.error('Fetch Error -', err);  
    });

  }

}



function loadModels($type, $manufacturer)
{

  var model_dropdowns = document.getElementsByName("model");
  for (i = 0; i < model_dropdowns.length; i++) {
    var dropdown = model_dropdowns[i];
    dropdown.length = 0;

    var defaultOption = document.createElement('option');
    defaultOption.text = 'Any Model';
    defaultOption.value = '';

    dropdown.add(defaultOption);
    dropdown.selectedIndex = 0;

    if($manufacturer) {
      var url = '/api/' + $type + '/models/' + $manufacturer + '/ev';

      fetch(url).then(function (response) {
        if (response.status !== 200) {
          console.warn('Looks like there was a problem. Status Code: ' +
            response.status);
          return;
        }
        return response.json();
      }).then(function (data) {
        let keysSorted = Object.keys(data).sort(function (a, b) {
          return data[a].localeCompare(data[b])
        });
        for (let x in keysSorted) {
          let option = document.createElement('option');
          option.text = data[keysSorted[x]];
          option.value = keysSorted[x];
          dropdown.add(option);
        }
      }).catch(function (err) {
        console.error('Fetch Error -', err);
      });
    }
  }

}


function loadSpecs($type, $model)
{

  var dropdown = document.getElementsByName('spec')[0];
  dropdown.length = 0;

  var defaultOption = document.createElement('option');
  defaultOption.text = 'Any Spec';
  defaultOption.value = '';

  dropdown.add(defaultOption);
  dropdown.selectedIndex = 0;

  if($model) {
    var url = '/api/' + $type + '/specs/' + $model;

    fetch(url).then(function (response) {
      if (response.status !== 200) {
        console.warn('Looks like there was a problem. Status Code: ' +
          response.status);
        return;
      }
      return response.json();
    }).then(function (data) {
      for (var x in data) {
        var option = document.createElement('option');
        option.text = data[x];
        option.value = x;
        dropdown.add(option);
      }
    }).catch(function (err) {
      console.error('Fetch Error -', err);
    });
  }
}


function loadBodyTypes($type)
{

  var dropdown = document.getElementsByName('body_type')[0];

  if(typeof dropdown == 'undefined'){
    return false;
  }

  dropdown.length = 0;

  var defaultOption = document.createElement('option');
  defaultOption.text = 'Any Bodytype';
  defaultOption.value = '';

  dropdown.add(defaultOption);
  dropdown.selectedIndex = 0;

  var url = '/api/'+$type+'/types';

  fetch(url).then(function(response) {  
    if (response.status !== 200) {  
      console.warn('Looks like there was a problem. Status Code: ' + 
        response.status);  
      return;  
    }
    return response.json();
  }).then(function(data) {  
    for (var x in data) {
        var option = document.createElement('option');
        option.text = data[x];
        option.value = x;
        dropdown.add(option);
    }    
  }).catch(function(err) {  
      console.error('Fetch Error -', err);  
  });


}




// document.getElementById('email-signup').addEventListener("click", function(e) {
//   e.preventDefault();
    
//   var url = '/newsletter';
//   var email = document.getElementById('newsletter-email').value;
//   var name = document.getElementById('newsletter-name').value;
//   var token = document.getElementsByName('_token')[0].value;

//   fetch(url, {
//     method: 'POST', // or 'PUT'
//     body: JSON.stringify({ 'name': name, 'email': email, '_token': token }), // data can be `string` or {object}!
//     headers:{
//       'Content-Type': 'application/json'
//     }}).then(function(response) {  
//     if (response.status !== 200) {  
//       console.warn('Looks like there was a problem. Status Code: ' + 
//         response.status);
//       return;  
//     }
//     return response.json();
//   }).then(function(data) {  
//       if(data.status!='ok'){
//         $errors = '';
//         for (var i in data.errors) {
//              $errors += data.errors[i][0]+'\n';
//         }
//         return alert('There was a problem with your sign up details\n\n'+$errors);
//       }

//       document.getElementsByClassName('newsletter-form')[0].reset();
//       // Trigger event tracking
//       window.dataLayer = window.dataLayer || [];
//       window.dataLayer.push({
//         'event': 'Newsletter Form Submit'
//       });
//       return alert('Thank you!');

//   }).catch(function(err) {  
//       console.error('Fetch Error -', err);  
//   });


// });



//Lazy Load Images
document.addEventListener("DOMContentLoaded", function() {
  let lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));
  let active = false;

  const lazyLoad = function() {
    if (active === false) {
      active = true;


      lazyImages.forEach(function(lazyImage) {
        if ((lazyImage.getBoundingClientRect().top <= window.innerHeight && lazyImage.getBoundingClientRect().bottom >= 0) && getComputedStyle(lazyImage).display !== "none") {
          lazyImage.src = lazyImage.dataset.src;
          // lazyImage.srcset = lazyImage.dataset.srcset;
          lazyImage.classList.remove("lazy");

          lazyImages = lazyImages.filter(function(image) {
            return image !== lazyImage;
          });

          if (lazyImages.length === 0) {
            document.removeEventListener("scroll", lazyLoad);
            window.removeEventListener("resize", lazyLoad);
            window.removeEventListener("orientationchange", lazyLoad);
          }
        }
      });

      active = false;
    }
  };

  document.addEventListener("scroll", lazyLoad);
  window.addEventListener("resize", lazyLoad);
  window.addEventListener("orientationchange", lazyLoad);
  lazyLoad();
});




window.onload = (function(){

  //preloader
  var root = document.getElementsByTagName( 'html' )[0];
  root.classList.add("site-loaded");

  document.body.classList.add("loaded");


  // Load Search Form
  if(document.getElementsByClassName('search-form').length>0){
    // Search
    if(document.querySelectorAll('.search-form [name=make] option').length<=1){
      loadManufacturers((document.getElementById('search-type').classList.contains('search-type-van')?'van':'car'));
      loadBodyTypes((document.getElementById('search-type').classList.contains('search-type-van')?'van':'car'));
    }

    var make_dropdowns = document.getElementsByName("make");
    for (i = 0; i < make_dropdowns.length; i++) {
      make_dropdowns[i].addEventListener("change", function(e){
        loadModels((document.getElementById('search-type').classList.contains('search-type-van')?'van':'car'), e.target.value);
      });
    }

    var model_dropdowns = document.getElementsByName("model");
    for (i = 0; i < model_dropdowns.length; i++) {
      model_dropdowns[i].addEventListener("change", function(e){
        loadSpecs((document.getElementById('search-type').classList.contains('search-type-van')?'van':'car'), e.target.value);
      });
    }
  }

  
});



// efficient debounce resize https://ehsangazar.com/optimizing-javascript-event-listeners-for-performance-e28406ad406c
var myEfficientFn = debounce(function() {
  if(window.innerWidth <= 1024){
    mobileDerrivative();
    window.responsive = 'touch';
  } else {
    desktopDerrivative();
    window.responsive = 'desktop';
  }
}, 250);
function debounce(func, wait, immediate) {
  var timeout;
  return function() {
    var context = this, args = arguments;
    var later = function() {
      timeout = null;
      if (!immediate) func.apply(context, args);
    };
    var callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
    if (callNow) func.apply(context, args);
  };
};
window.addEventListener('resize', myEfficientFn);
myEfficientFn();





function mobileDerrivative(){
  let tabcontent, tablinks;
  if(window.responsive !== 'touch' && document.querySelector(".deal-gallery")){
    //tabs
    document.querySelectorAll(".tab")[0].after(document.getElementById("optional-extras"));
    document.querySelectorAll(".tab")[1].after(document.getElementById("standard-equipment"));
    document.querySelectorAll(".tab")[2].after(document.getElementById("technical-data"));

    document.querySelector(".deal-gallery").after(document.querySelector(".deal-aside"));

    tabcontent = document.querySelectorAll(".tab");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].className = tabcontent[i].className.replace(" active", "");
    }
    tablinks = document.querySelectorAll(".tab-content");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
  }
}

function desktopDerrivative(){
  if(window.responsive !== 'desktop' &&  document.querySelector(".deal-gallery")){
    //tabs
    document.querySelector(".tab-list").after(document.getElementById("technical-data"));
    document.querySelector(".tab-list").after(document.getElementById("standard-equipment"));
    document.querySelector(".tab-list").after(document.getElementById("optional-extras"));

    document.querySelector(".deal-main").after(document.querySelector(".deal-aside"));
    
    document.querySelectorAll(".tab")[0].classList.add("active");
    document.querySelectorAll(".tab-content")[0].classList.add("active");
  }
}





// gallery slider

function slideThumbnail(track, numSlides, offset, slideWidth, numShowing, autoPlay, timeout) {

    var newOffset = offset;
    var newSlideWidth = slideWidth;
    var currentSlide=0; //set initial slide to the first
    var autoPlay = autoPlay;
    var timeout = timeout;
    var newNumShowing = numShowing;

    function setSizes(){
        //alert('setsizes');
        track.style.transform = 'translate('+newOffset+'%, 0)'; //add offset
        track.style.width = newSlideWidth*numSlides+'%';
    }
    function setMobileSizes(){
        track.style.transform = 'translate(0, 0)'; //remove offset
        track.style.width = newSlideWidth*numSlides+'%';
    }

    var thumbs = document.querySelectorAll(".thumbnail a");

    for(var i = 0; i < thumbs.length; i++){
        thumbs[i].addEventListener('click', function(event){
            var li = this.parentNode;
            var ul = this.closest('ul');
            var nodes = Array.from(ul.children);
            var index = nodes.indexOf(li);
            updateSlide(index);
            event.preventDefault();
        }, false);
    }

    function updateSlide(i){
      var slideNum, url, translateAmount;
        console.log('updateSlide '+i);
        slideNum = i;

        //update image
        url = document.querySelector('.thumbnail:nth-child('+(slideNum+1)+') img').src;
        document.getElementById("main-img").src = url; 

        //slide to right spot on thumbnails
        console.log(slideNum+' of '+numSlides);
        if((slideNum<(numSlides-2)) && (slideNum>1)){
            translateAmount = (slideNum-2) * -(100/numSlides)+newOffset+'%';
            console.log('slide')
        } else if(slideNum < 2){
            console.log('<2');
            translateAmount = 0+newOffset+'%';
        } else{
            translateAmount = (numSlides-newNumShowing) * -(100/numSlides)+newOffset+'%';
            console.log('dont slide');
        }
        track.style.transform = 'translate('+translateAmount+', 0)';

        //add active class


        currentSlide = slideNum;
    };

    function nextSlide(){
        if(currentSlide < numSlides-newNumShowing){
            updateSlide(currentSlide+1);
        } else {
            updateSlide(0)
        }
    }

    function prevSlide(){
        if(currentSlide > 0){
            updateSlide(currentSlide-1);
        }
    }

    function nextSlideClick(){
        autoPlay = false;
        nextSlide();
    }

    function prevSlideClick(){
        autoPlay = false;
        prevSlide();
    }

    track.parentElement.parentElement.querySelector('a.next').addEventListener('click', nextSlideClick, false);
    track.parentElement.parentElement.querySelector('a.prev').addEventListener('click', prevSlideClick, false);

    function autoSlide() {
        var int = setInterval((function() {
            
            // if all characters were used
            if (autoPlay === false) {
                clearInterval(int);
                return;
            }
            nextSlide()
        }), timeout);
    }

    if(autoPlay == true){
       autoSlide(); 
    }

    setSizes();
    window.dispatchEvent(new Event('resize'));
}
/* END SLIDER */
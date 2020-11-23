
// for profile page
var profile_nav_menu = document.getElementById("profile_menu");
// to hide or show the profile menu
function open_profile_menue() {
    if (profile_nav_menu.style.display == 'none') {
        profile_nav_menu.style.display = 'block';
    } else {
        profile_nav_menu.style.display = 'none';
    }
}

// to hide or show the main navigation
function open_main_nav(){
  var main_nav_bar_links = document.getElementById('main_nav_links');
  if (main_nav_bar_links.className == 'w3-hide-small') {
      main_nav_bar_links.className = 'w3-show';
  } else {
      main_nav_bar_links.className = 'w3-hide-small';
  }
}


// User Avatar Dropdown Menu
function user_avatar_menu() {
  var profile_menu = document.getElementById("drop_content_profile");
  if (profile_menu.style.display === 'block') {
      profile_menu.style.display = 'none';
  } else {
      profile_menu.style.display = 'block';
  }
}


function statusToggle(evt) {
    let item = evt.currentTarget;
    if (item.className.indexOf("w3-text-green") == -1) {
        item.className += " w3-text-green";

    } else {
        item.className = item.className.replace(" w3-text-green", "");
    }
}


// Department Slider
$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 2000,
    autoplayHoverPause: true,
    nav: false,
    dots: true,
    smartSpeed: 1000,
    responsiveClass: true,
    responsive: {
        0: {
            items: 1
        },
        576: {
            items: 2
        },
        768: {
            items: 2
        },
        992: {
            items: 3
        }
    }
});

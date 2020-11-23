// for profile page tabs
function openLink(evt, linkName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("myLink");
  for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" #f98f9b", "");
  }
  document.getElementById(linkName).style.display = "block";
  evt.currentTarget.className += " #f98f9b";
} 
// Click on the first tablink on load
document.getElementsByClassName("tablink")[0].click();

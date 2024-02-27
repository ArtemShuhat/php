//reload site
document.addEventListener("DOMContentLoaded", function () {
  let blogLink = document.getElementById("blogLink");
  blogLink.addEventListener("click", function () {
    location.reload();
  });
});
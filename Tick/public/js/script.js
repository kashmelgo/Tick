const slider = document.querySelector('.wrapper');
let mouseDown = false;
let startX, scrollLeft;

let startDragging = function (e) {
  mouseDown = true;
  startX = e.pageX - slider.offsetLeft;
  scrollLeft = slider.scrollLeft;
};
let stopDragging = function (event) {
  mouseDown = false;
};

slider.addEventListener('mousemove', (e) => {
  e.preventDefault();
  if(!mouseDown) { return; }
  const x = e.pageX - slider.offsetLeft;
  const scroll = x - startX;
  slider.scrollLeft = scrollLeft - scroll;
});

// Add the event listeners
slider.addEventListener('mousedown', startDragging, false);
slider.addEventListener('mouseup', stopDragging, false);
slider.addEventListener('mouseleave', stopDragging, false);

function openPreview() {
  document.getElementById("preview").style.display = "block";
  var addcol = document.getElementById("main-menu");
  addcol.classList.remove("col-12");
  addcol.classList.add("col-8");
}

function closePreview() {
  document.getElementById("preview").style.display = "none";
  var addcol = document.getElementById("main-menu");
  addcol.classList.remove("col-8");
  addcol.classList.add("col-12");
}

function redirect(id){
  window.location.href = ""; //change the route
}
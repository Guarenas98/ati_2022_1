// drag to scroll 
const slider = document.querySelector('.scrolling-wrapper');
let isDown = false;
let startX;
let scrollLeft;
let btn_strength = 750;

slider.addEventListener('mousedown', (e) => {
  isDown = true;
  slider.classList.add('active');
  startX = e.pageX - slider.offsetLeft;
  scrollLeft = slider.scrollLeft;
});
slider.addEventListener('mouseleave', () => {
  isDown = false;
  slider.classList.remove('active');
});
slider.addEventListener('mouseup', () => {
  isDown = false;
  slider.classList.remove('active');
});
slider.addEventListener('mousemove', (e) => {
  if(!isDown) return;
  e.preventDefault();
  const x = e.pageX - slider.offsetLeft;
  const walk = (x - startX); //scroll-fast
  slider.scrollLeft = scrollLeft - walk;
});

$("#btn-scroller-right")[0].addEventListener('click', e => {
  slider.scrollLeft += btn_strength;
});

$("#btn-scroller-left")[0].addEventListener('click', e => {
  slider.scrollLeft -= btn_strength;
});
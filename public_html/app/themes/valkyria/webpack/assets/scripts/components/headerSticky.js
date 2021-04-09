const header = document.querySelector('.header--float');

if (header) {
  const sticky = header.offsetTop;
  document.addEventListener('scroll', () => {
    if (window.pageYOffset > 600) {
      header.classList.add('header--fixed');
      header.classList.remove('header--color-section');
      header.classList.add('fade');
    } else {
      header.classList.remove('header--fixed');
      header.classList.add('header--color-section');
      header.classList.remove('fade');
    }
  });
}

function toggleHeader(scroll) {
  const headerTransparent = document.querySelector('.header_transparent');
  if (headerTransparent){
    if (scroll > 2) {
      headerTransparent.classList.add('header_bg_white');
    } else {
      headerTransparent.classList.remove('header_bg_white');
    }
  }
}

document.addEventListener('DOMContentLoaded', ()=>{
  window.addEventListener('scroll', () => {
    toggleHeader(window.pageYOffset);
  });
})


const switchers = document.querySelectorAll('.switcher');
const list = jQuery('.language-chooser');

switchers.forEach((switcher) => {
  switcher.addEventListener('click', (event) => {
    event.currentTarget.classList.toggle('switcher--active');
  });
  document.addEventListener('mouseup', (event) => {
    if (!switcher.contains(event.target)) {
      switcher.classList.remove('switcher--active');
    }
  });
});

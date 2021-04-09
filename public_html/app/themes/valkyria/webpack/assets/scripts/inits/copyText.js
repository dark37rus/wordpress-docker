import copyText from '../components/copyText';

const coupon = document.querySelector('.coupon');

if (coupon) {
  coupon.addEventListener('click', (event) => {
    if (event.target !== event.target.closest('.coupon')) {
      copyText('.coupon__output');
    }
  });
}

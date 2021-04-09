import getCookie from './getCookie';

const couponInput = document.querySelectorAll('.input--coupon');
if (couponInput && getCookie('coupon')) {
  couponInput.forEach((item) => {
    console.log(getCookie('coupon'));

    item.value = getCookie('coupon');
  });
}

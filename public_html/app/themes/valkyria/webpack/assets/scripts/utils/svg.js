function requireAll(r) {
  r.keys().forEach(r);
}

requireAll(require.context('../ico_sprite/', true, /\.svg$/));

const host = window.location.origin;

fetch(`${host}/wp-content/themes/valkyria/assets/sprite.svg`)

  .then((res) => res.text())
  .then((data) => {
    if (document.querySelector('#svg-icons')) {
      // console.log(data)
    }
    document.querySelector('#svg-icons').innerHTML = data;
  })
  .then(
    () => {
      const svg = document.querySelectorAll('.icon .icon__svg use');

      // svg.forEach(element => {
      //   if (element.dataset.gradient) {
      //     const idGradient = element.dataset.gradient
      //     const gradient = document.querySelector(`#${idGradient}`)

      //     const defs = document.createElement("defs");
      //     const lineGradient = document.createElement("linearGradient");

      //     defs.innerHTML = gradient.outerHTML
      //     element.append(defs);
      //     element.setAttribute('style', `fill: url(#${idGradient})`)
      //     console.log(element)
      //   }
      // })
    },
  );
// import moveGradiends from 'svg-baker-runtime/src/utils/move-gradients-outside-symbol';
//
// document.addEventListener('DOMContentLoaded', () => {
// 	moveGradiends(document.querySelector('body'));
// });

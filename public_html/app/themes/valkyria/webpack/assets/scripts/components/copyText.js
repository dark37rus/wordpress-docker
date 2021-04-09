export default function copyText(item) {
  const itemCopy = document.querySelector(`${item}`);
  itemCopy.select();
  document.execCommand('copy');
}

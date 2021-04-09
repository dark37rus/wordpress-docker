document.addEventListener('DOMContentLoaded', () => {
  const videos = document.querySelectorAll("[id^='video_']");

  videos.forEach((item) => {
    item.addEventListener('loadedmetadata', (e) => {
      item.setAttribute('width', item.videoWidth);
      item.setAttribute('height', item.videoHeight);
    }, false);
  });
});

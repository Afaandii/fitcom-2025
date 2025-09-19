// title browser bergerak
document.addEventListener("DOMContentLoaded", function() {
      let text = " 🌱 AmoerFarm - Toko Pertanian Modern ";
      let i = 0;

      function scrollTitle() {
        document.title = text.substring(i) + text.substring(0, i);
        i = (i + 1) % text.length;
      }

      setInterval(scrollTitle, 250); // ganti kecepatan geser (ms)
    });
<?php
$title = "Agrikalcer"; // judul utamanya
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($title) ?></title>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      let text = " 🌱 <?= addslashes($title) ?> - Solusi Pertanian Modern ";
      let i = 0;

      function scrollTitle() {
        document.title = text.substring(i) + text.substring(0, i);
        i = (i + 1) % text.length;
      }

      setInterval(scrollTitle, 250); // ganti kecepatan geser (ms)
    });
  </script>
</head>
<body>
  <h1>Halo, ini halaman <?= htmlspecialchars($title) ?></h1>
  <p>Lihat judul di tab browser, sekarang bergerak 😊</p>
</body>
</html>

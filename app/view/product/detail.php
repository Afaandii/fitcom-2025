<?php if ($data['product']): ?>
  <div class="container py-5">
    <div class="card shadow-sm p-4">
      <img src="<?= $data['product']['image']; ?>" class="img-fluid mb-3" alt="<?= $data['product']['name']; ?>">
      <h2><?= $data['product']['name']; ?></h2>
      <p class="text-primary fs-4"><?= $data['product']['price']; ?></p>
    </div>
  </div>
<?php else: ?>
  <p class="text-center text-danger">Produk tidak ditemukan.</p>
<?php endif; ?>
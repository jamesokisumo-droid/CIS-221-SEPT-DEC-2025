<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Fashion Store</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <nav>
    <h1>Fashion Store</h1>
    <ul>
      <li><a href="#products">Products</a></li>
      <li><a href="#inventory">Inventory</a></li>
      <li><a href="#sales">Sales</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
  </nav>

  <header class="hero">
    <h2>✨ Discover Your Style ✨</h2>
    <p>Trendy fashion, unbeatable prices, and exclusive deals just for you.</p>
  </header>

  <section id="products" class="products">
    <h2>Our Latest Collections</h2>
    <div class="product-grid">

      <?php
      $result = $conn->query("SELECT * FROM inventory");
      while ($row = $result->fetch_assoc()):
      ?>
      <div class="product-card">
        <img src="<?php
          switch($row['item_name']) {
            case 'Elegant Dress': echo 'https://images.unsplash.com/photo-1503342217505-b0a15ec3261c?auto=format&fit=crop&w=500&q=80'; break;
            case 'Stylish Shoes': echo 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=500&q=80'; break;
            case 'Luxury Bag': echo 'https://images.unsplash.com/photo-1584917865442-de89df76afd3?auto=format&fit=crop&w=500&q=80'; break;
            case 'Classic Jacket': echo 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=500&q=80'; break;
            case 'Designer Watch': echo 'https://images.unsplash.com/photo-1522312346375-d1a52e2b99b3?auto=format&fit=crop&w=500&q=80'; break;
            case 'Trendy Sunglasses': echo 'https://images.unsplash.com/photo-1503341455253-b2e723bb3dbb?auto=format&fit=crop&w=500&q=80'; break;
          }
        ?>" alt="<?= $row['item_name']; ?>">
        <h3><?= $row['item_name']; ?></h3>
        <p>KSh <?= number_format($row['price']); ?></p>
      </div>
      <?php endwhile; ?>
    </div>
  </section>

  <section id="inventory" class="sales">
    <h2>📊 Inventory Tracking</h2>
    <table>
      <tr>
        <th>Item</th>
        <th>Price (KSh)</th>
        <th>Total Stock</th>
        <th>Sold</th>
        <th>Remaining</th>
        <th>Revenue (KSh)</th>
      </tr>

      <?php
      $result = $conn->query("SELECT * FROM inventory");
      $totalRevenue = 0;
      while ($row = $result->fetch_assoc()):
        $remaining = $row['total_stock'] - $row['sold'];
        $revenue = $row['sold'] * $row['price'];
        $totalRevenue += $revenue;
      ?>
      <tr>
        <td><?= $row['item_name']; ?></td>
        <td><?= number_format($row['price']); ?></td>
        <td><?= $row['total_stock']; ?></td>
        <td><?= $row['sold']; ?></td>
        <td><?= $remaining; ?></td>
        <td><?= number_format($revenue); ?></td>
      </tr>
      <?php endwhile; ?>
    </table>

    <h3 style="margin-top: 1rem;">💰 Total Store Revenue: KSh <?= number_format($totalRevenue); ?></h3>
  </section>

  <section id="contact" class="contact">
    <h2>Contact Us</h2>
    <p>Email: support@fashionstore.com</p>
    <p>Phone: +123 456 789</p>
  </section>

  <footer>
    <p>&copy; 2025 Fashion Store. All Rights Reserved.</p>
  </footer>
</body>
</html>

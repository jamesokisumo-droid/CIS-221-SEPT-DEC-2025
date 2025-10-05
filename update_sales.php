<?php
include 'db.php';

if (isset($_POST['item_id']) && isset($_POST['quantity'])) {
  $id = $_POST['item_id'];
  $qty = $_POST['quantity'];

  $conn->query("UPDATE inventory SET sold = sold + $qty WHERE id = $id");
  echo "<p style='color:green; text-align:center;'>✅ Sale recorded successfully!</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Record Sale | Fashion Store</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <nav>
    <h1>Record New Sale</h1>
    <ul>
      <li><a href="index.php">Back to Store</a></li>
    </ul>
  </nav>

  <section class="contact">
    <h2>Update Item Sales</h2>
    <form method="POST" action="">
      <label>Select Item:</label><br>
      <select name="item_id" required>
        <?php
        $items = $conn->query("SELECT id, item_name FROM inventory");
        while ($row = $items->fetch_assoc()) {
          echo "<option value='{$row['id']}'>{$row['item_name']}</option>";
        }
        ?>
      </select><br><br>

      <label>Quantity Sold:</label><br>
      <input type="number" name="quantity" min="1" required><br><br>

      <button type="submit">Update Sale</button>
    </form>
  </section>
</body>
</html>

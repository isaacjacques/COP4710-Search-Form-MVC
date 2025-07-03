<!doctype html>
<html>
<head><meta charset="utf-8"><title>Results</title></head>
<body>
  <h1>Results for <?= htmlspecialchars($table) ?></h1>
  <a href="index.php">← New Search</a>
  <?php if(empty($results)): ?>
    <p>No records found.</p>
  <?php else: ?>
    <table border="1" cellpadding="4">
      <thead>
        <tr><?php foreach(array_keys($results[0]) as $col): ?>
          <th><?= htmlspecialchars($col) ?></th>
        <?php endforeach; ?></tr>
      </thead>
      <tbody>
        <?php foreach($results as $row): ?>
          <tr><?php foreach($row as $val): ?>
            <td><?= htmlspecialchars($val) ?></td>
          <?php endforeach; ?></tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</body>
</html>
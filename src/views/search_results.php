<?php
$pageTitle = "Results — $table";
require __DIR__ . '/partials/header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Results for <?= htmlspecialchars($table) ?></h2>
  <a href="index.php" class="btn btn-secondary">New Search</a>
</div>

<?php if (empty($results)): ?>
  <div class="alert alert-warning">No records found.</div>
<?php else: ?>
  <div class="table-responsive">
    <table class="table table-striped table-hover align-middle">
      <thead class="table-light">
        <tr>
          <?php foreach (array_keys($results[0]) as $col): ?>
            <th scope="col"><?= htmlspecialchars($col) ?></th>
          <?php endforeach; ?>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($results as $row): ?>
          <tr>
            <?php foreach ($row as $val): ?>
              <td><?= htmlspecialchars($val) ?></td>
            <?php endforeach; ?>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php endif; ?>

<?php require __DIR__ . '/partials/footer.php'; ?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Search</title></head>
<body>
  <h1>Search</h1>
  <form method="get" action="index.php">
    <input type="hidden" name="action" value="search">
    <label>
      Table:
      <select name="table" id="table-select">
        <option value="">-- choose --</option>
        <?php foreach($tables as $name => $fields): ?>
          <option value="<?= htmlspecialchars($name) ?>"><?= htmlspecialchars($name) ?></option>
        <?php endforeach; ?>
      </select>
    </label>
    <div id="criteria-container">
      <!-- JavaScript will inject up to 3+ field inputs here -->
    </div>
    <button type="submit">Search</button>
  </form>

  <script>
    const tables = <?= json_encode($tables) ?>;
    const container = document.getElementById('criteria-container');
    document.getElementById('table-select').addEventListener('change', e => {
      container.innerHTML = '';
      let fields = tables[e.target.value] || [];
      // render first 3 fields; you could allow user to add more
      fields.slice(0,5).forEach(col => {
        let div = document.createElement('div');
        div.innerHTML = `
          <label>${col}: 
            <input name="criteria[${col}]" type="text" />
          </label>`;
        container.appendChild(div);
      });
    });
  </script>
</body>
</html>
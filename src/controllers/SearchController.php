<?php
namespace Src\Controllers;

use Src\Models\ProductModel;
use PDO;

class SearchController
{
    private PDO $pdo;
    /** Map table names to model classes */
    private array $models = [
        'Product' => ProductModel::class,
        // future: 'Customer' => CustomerModel::class, etc.
    ];

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /** Show form */
    public function index(): void
    {
        // Pass available tables and their searchable fields
        $tables = [];
        foreach ($this->models as $name => $class) {
            /** @var \Src\Models\BaseModel $m */
            $m = new $class($this->pdo);
            $tables[$name] = $m->getSearchable();
        }
        require __DIR__ . '/../views/search_form.php';
    }

    /** Handle search submission */
    public function search(): void
    {
        $table = $_GET['table'] ?? '';
        $criteria = $_GET['criteria'] ?? [];
        if (!isset($this->models[$table])) {
            die('Unknown table');
        }
        $class = $this->models[$table];
        /** @var \Src\Models\BaseModel $model */
        $model = new $class($this->pdo);
        $results = $model->search($criteria);
        require __DIR__ . '/../views/search_results.php';
    }
}
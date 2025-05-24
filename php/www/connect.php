<?php
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$driver = $_ENV['DB_CONNECTION'] ?? 'mysql';
$host = $_ENV['DB_HOST'] ?? 'localhost';
$port = $_ENV['DB_PORT'] ?? ($driver === 'pgsql' ? '5432' : '3306');
$dbname = $_ENV['DB_DATABASE'] ?? 'gestion_produits';
$username = $_ENV['DB_USERNAME'] ?? 'root';
$password = $_ENV['DB_PASSWORD'] ?? 'root';

$dsn = "";
if ($driver === 'mysql') {
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname";
} elseif ($driver === 'pgsql') {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
} else {
    throw new Exception("Unsupported DB_CONNECTION: $driver");
}

$db = new PDO($dsn, $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

?>

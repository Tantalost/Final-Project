<?php
// Database connection config
$dsn = 'mysql:host=localhost;dbname=scriptorium;charset=utf8mb4';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    echo "✅ Connected to database.\n";
} catch (PDOException $e) {
    die("❌ Connection failed: " . $e->getMessage());
}

// Load JSON file
$books = json_decode(file_get_contents('real_books_highres.json'), true);

// Prepare insert statement
$sql = "INSERT INTO books (
    title, authors, isbn, edition, genre, publisher,
    published_date, stock, status, description, image_url
) VALUES (
    :title, :authors, :isbn, :edition, :genre, :publisher,
    :published_date, :stock, :status, :description, :image_url
)";

$stmt = $pdo->prepare($sql);

// Format date helper
function formatDate($date) {
    if (!$date) return null;
    $timestamp = strtotime($date);
    return $timestamp ? date('Y-m-d', $timestamp) : null;
}

$inserted = 0;
foreach ($books as $book) {
    $publishedDate = formatDate($book['published_date']);

    // Convert local Windows path to web path
    $filename = basename($book['image_url']);
    $webImagePath = '/images/books/' . $filename;

    try {
        $stmt->execute([
            ':title' => $book['title'],
            ':authors' => is_array($book['authors']) ? implode(', ', $book['authors']) : $book['authors'],
            ':isbn' => $book['isbn'],
            ':edition' => $book['edition'],
            ':genre' => $book['genre'],
            ':publisher' => $book['publisher'],
            ':published_date' => $publishedDate,
            ':stock' => $book['stock'],
            ':status' => in_array($book['status'], ['available', 'borrowed', 'overdue']) ? $book['status'] : 'available',
            ':description' => $book['description'],
            ':image_url' => $webImagePath,
        ]);
        $inserted++;
    } catch (PDOException $e) {
        echo "⚠️ Skipped ISBN " . $book['isbn'] . ": " . $e->getMessage() . "\n";
    }
}

echo "✅ Inserted $inserted books into the database.\n";
?>
<?php
require_once "user_operations.php";
require_once "book_operations.php";
session_start();

header('Content-Type: application/json');

if (!isset($_SESSION['member_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in.']);
    exit();
}

$memberId = $_SESSION['member_id'];
$bookOps = new BookOperations($pdo);
$memberOps = new MemberOperations($pdo);

$data = json_decode(file_get_contents("php://input"), true);
$selectedBooks = $data['selected_books'] ?? [];
$borrowDuration = (int)($data['borrow_duration'] ?? 14);

// Debug: log incoming selectedBooks
error_log('Received data: ' . print_r($data, true));
error_log('Selected books: ' . print_r($selectedBooks, true));

$response = ['success' => true, 'borrowed_books' => [], 'debug' => []];

if (!empty($selectedBooks)) {
    $dueDate = date('Y-m-d', strtotime("+{$borrowDuration} days"));
    $notBorrowed = [];
    foreach ($selectedBooks as $bookId) {
        try {
            // Check if book is available
            $stmt = $pdo->prepare("SELECT stock FROM books WHERE book_id = ?");
            $stmt->execute([$bookId]);
            $book = $stmt->fetch(PDO::FETCH_ASSOC);
            // Debug: log book info
            error_log("Book ID $bookId info: " . print_r($book, true));
            if ($book && $book['stock'] > 0) {
                // Insert transaction
                $stmt = $pdo->prepare("
                    INSERT INTO transactions (user_id, book_id, transaction_type, due_date, return_date)
                    VALUES (?, ?, 'borrow', ?, NULL)
                ");
                $stmt->execute([$memberId, $bookId, $dueDate]);
                // Update stock
                $stmt = $pdo->prepare("
                    UPDATE books 
                    SET stock = stock - 1,
                        status = CASE WHEN stock - 1 = 0 THEN 'borrowed' ELSE status END
                    WHERE book_id = ?
                ");
                $stmt->execute([$bookId]);
                // Remove from shelves
                $stmt = $pdo->prepare("DELETE FROM shelves WHERE user_id = ? AND book_id = ?");
                $stmt->execute([$memberId, $bookId]);
                // Add notification
                $bookInfo = $bookOps->getBookById($bookId);
                if ($bookInfo) {
                    $memberOps->addNotification(
                        $memberId,
                        'Book Borrowed',
                        "You've borrowed '{$bookInfo['title']}'. Due date: " . date('M d, Y', strtotime($dueDate))
                    );
                }
                $response['borrowed_books'][] = $bookId;
            } else {
                $notBorrowed[] = ['book_id' => $bookId, 'stock' => $book['stock'] ?? null];
            }
        } catch (Exception $e) {
            $response['success'] = false;
            $response['message'] = $e->getMessage();
            echo json_encode($response);
            exit();
        }
    }
    if (!empty($notBorrowed)) {
        $response['debug']['not_borrowed'] = $notBorrowed;
    }
} else {
    $response['success'] = false;
    $response['message'] = 'No books selected.';
}

if (empty($response['borrowed_books'])) {
    $response['success'] = false;
    $response['message'] = 'No books were borrowed. They may be out of stock or already borrowed.';
}

echo json_encode($response);
exit();

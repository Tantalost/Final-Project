<?php
require_once "book_operations.php";
header('Content-Type: application/json');

// Get the action from the request
$action = $_POST['action'] ?? $_GET['action'] ?? '';

// Handle different actions
switch ($action) {
    case 'add':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $response = $bookOps->addBook($_POST);
            echo json_encode($response);
        }
        break;

    case 'update':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bookId = $_POST['book_id'] ?? null;
            if (!$bookId) {
                echo json_encode(['status' => 'error', 'message' => 'Book ID is required']);
                break;
            }
            $response = $bookOps->updateBook($bookId, $_POST);
            echo json_encode($response);
        }
        break;

    case 'delete':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bookId = $_POST['book_id'] ?? null;
            if (!$bookId) {
                echo json_encode(['status' => 'error', 'message' => 'Book ID is required']);
                break;
            }
            $response = $bookOps->deleteBook($bookId);
            echo json_encode($response);
        }
        break;

    case 'get':
        $bookId = $_GET['book_id'] ?? null;
        if ($bookId) {
            $response = $bookOps->getBookById($bookId);
        } else {
            $filters = [
                'title' => $_GET['title'] ?? null,
                'author' => $_GET['author'] ?? null,
                'isbn' => $_GET['isbn'] ?? null,
                'status' => $_GET['status'] ?? null
            ];
            $response = $bookOps->getBooks($filters);
        }
        echo json_encode($response);
        break;

    default:
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
        break;
}
?> 
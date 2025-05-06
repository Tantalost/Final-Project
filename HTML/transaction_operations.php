<?php
require_once __DIR__ . '/../db_connect.php';

class TransactionOperations {
    private $conn;

    public function __construct($pdo) {
        $this->conn = $pdo;
    }

    /**
     * Borrow a book
     * @param int $userId User ID
     * @param int $bookId Book ID
     * @param string $dueDate Due date for the book
     * @return array Response with status and message
     */
    public function borrowBook($userId, $bookId, $dueDate) {
        try {
            $this->conn->beginTransaction();

            // Check if book is available
            $stmt = $this->conn->prepare("SELECT stock, status FROM books WHERE book_id = ?");
            $stmt->execute([$bookId]);
            $book = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$book || $book['stock'] <= 0 || $book['status'] !== 'available') {
                $this->conn->rollBack();
                return ['status' => 'error', 'message' => 'Book is not available for borrowing'];
            }

            // Check if user has any overdue books
            $stmt = $this->conn->prepare("SELECT COUNT(*) FROM transactions 
                                        WHERE user_id = ? AND due_date < CURDATE() 
                                        AND return_date IS NULL");
            $stmt->execute([$userId]);
            if ($stmt->fetchColumn() > 0) {
                $this->conn->rollBack();
                return ['status' => 'error', 'message' => 'User has overdue books'];
            }

            // Create transaction record
            $stmt = $this->conn->prepare("INSERT INTO transactions 
                                        (user_id, book_id, transaction_type, due_date) 
                                        VALUES (?, ?, 'borrow', ?)");
            $stmt->execute([$userId, $bookId, $dueDate]);

            // Update book status
            $stmt = $this->conn->prepare("UPDATE books SET stock = stock - 1, 
                                        status = CASE WHEN stock - 1 = 0 THEN 'borrowed' ELSE status END 
                                        WHERE book_id = ?");
            $stmt->execute([$bookId]);

            $this->conn->commit();
            return ['status' => 'success', 'message' => 'Book borrowed successfully'];
        } catch (PDOException $e) {
            $this->conn->rollBack();
            return ['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()];
        }
    }

    /**
     * Return a book
     * @param int $userId User ID
     * @param int $bookId Book ID
     * @return array Response with status and message
     */
    public function returnBook($userId, $bookId) {
        try {
            $this->conn->beginTransaction();

            // Check if book is borrowed by this user
            $stmt = $this->conn->prepare("SELECT transaction_id, due_date FROM transactions 
                                        WHERE user_id = ? AND book_id = ? 
                                        AND transaction_type = 'borrow' 
                                        AND return_date IS NULL");
            $stmt->execute([$userId, $bookId]);
            $transaction = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$transaction) {
                $this->conn->rollBack();
                return ['status' => 'error', 'message' => 'No active borrowing found for this book'];
            }

            // Calculate fine if overdue
            $fineAmount = 0;
            if (strtotime($transaction['due_date']) < time()) {
                $daysOverdue = ceil((time() - strtotime($transaction['due_date'])) / (60 * 60 * 24));
                $fineAmount = $daysOverdue * 1.00; // $1 per day fine
            }

            // Update transaction
            $stmt = $this->conn->prepare("UPDATE transactions 
                                        SET return_date = CURDATE(), 
                                            fine_amount = ? 
                                        WHERE transaction_id = ?");
            $stmt->execute([$fineAmount, $transaction['transaction_id']]);

            // Update book status
            $stmt = $this->conn->prepare("UPDATE books 
                                        SET stock = stock + 1, 
                                            status = 'available' 
                                        WHERE book_id = ?");
            $stmt->execute([$bookId]);

            // If there's a fine, create a fine record
            if ($fineAmount > 0) {
                $stmt = $this->conn->prepare("INSERT INTO fines 
                                            (user_id, book_id, amount, reason, paid_status) 
                                            VALUES (?, ?, ?, 'overdue', 'unpaid')");
                $stmt->execute([$userId, $bookId, $fineAmount]);
            }

            $this->conn->commit();
            return [
                'status' => 'success', 
                'message' => 'Book returned successfully',
                'fine_amount' => $fineAmount
            ];
        } catch (PDOException $e) {
            $this->conn->rollBack();
            return ['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()];
        }
    }

    /**
     * Get user's active transactions
     * @param int $userId User ID
     * @return array Array of active transactions
     */
    public function getUserActiveTransactions($userId) {
        try {
            $stmt = $this->conn->prepare("SELECT t.*, b.title, b.authors 
                                        FROM transactions t 
                                        JOIN books b ON t.book_id = b.book_id 
                                        WHERE t.user_id = ? 
                                        AND t.return_date IS NULL 
                                        ORDER BY t.transaction_date DESC");
            $stmt->execute([$userId]);
            return ['status' => 'success', 'data' => $stmt->fetchAll(PDO::FETCH_ASSOC)];
        } catch (PDOException $e) {
            return ['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()];
        }
    }

    /**
     * Get user's transaction history
     * @param int $userId User ID
     * @return array Array of all transactions
     */
    public function getUserTransactionHistory($userId) {
        try {
            $stmt = $this->conn->prepare("SELECT t.*, b.title, b.authors 
                                        FROM transactions t 
                                        JOIN books b ON t.book_id = b.book_id 
                                        WHERE t.user_id = ? 
                                        ORDER BY t.transaction_date DESC");
            $stmt->execute([$userId]);
            return ['status' => 'success', 'data' => $stmt->fetchAll(PDO::FETCH_ASSOC)];
        } catch (PDOException $e) {
            return ['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()];
        }
    }

    /**
     * Get all active transactions
     * @return array Array of all active transactions
     */
    public function getAllActiveTransactions() {
        try {
            $stmt = $this->conn->prepare("SELECT t.*, b.title, b.authors, u.username 
                                        FROM transactions t 
                                        JOIN books b ON t.book_id = b.book_id 
                                        JOIN users u ON t.user_id = u.user_id 
                                        WHERE t.return_date IS NULL 
                                        ORDER BY t.transaction_date DESC");
            $stmt->execute();
            return ['status' => 'success', 'data' => $stmt->fetchAll(PDO::FETCH_ASSOC)];
        } catch (PDOException $e) {
            return ['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()];
        }
    }

    /**
     * Get overdue books
     * @return array Array of overdue books
     */
    public function getOverdueBooks() {
        try {
            $stmt = $this->conn->prepare("SELECT t.*, b.title, b.authors, u.username 
                                        FROM transactions t 
                                        JOIN books b ON t.book_id = b.book_id 
                                        JOIN users u ON t.user_id = u.user_id 
                                        WHERE t.return_date IS NULL 
                                        AND t.due_date < CURDATE() 
                                        ORDER BY t.due_date ASC");
            $stmt->execute();
            return ['status' => 'success', 'data' => $stmt->fetchAll(PDO::FETCH_ASSOC)];
        } catch (PDOException $e) {
            return ['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()];
        }
    }
}

// Initialize the class with database connection
$transactionOps = new TransactionOperations($pdo);
?> 
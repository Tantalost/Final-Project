<?php
require_once __DIR__ . '/../db_connect.php';

class MemberOperations {
    private $conn;

    public function __construct($pdo) {
        $this->conn = $pdo;
    }

    /**
     * Authenticate member by name or email and password
     * @param string $identifier Name or Email
     * @param string $password Password
     * @return array Response with status and member data
     */
    public function authenticateMember($identifier, $password) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM members WHERE name = ? OR email = ?");
            $stmt->execute([$identifier, $identifier]);
            $member = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($member && password_verify($password, $member['password'])) {
                // Set session variables
                $_SESSION['member_id'] = $member['member_id'];
                $_SESSION['name'] = $member['name'];
                $_SESSION['email'] = $member['email'];
                return [
                    'status' => 'success',
                    'data' => [
                        'member_id' => $member['member_id'],
                        'name' => $member['name'],
                        'email' => $member['email']
                    ]
                ];
            }
            return ['status' => 'error', 'message' => 'Invalid name/email or password'];
        } catch (PDOException $e) {
            return ['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()];
        }
    }

    /**
     * Get user profile information
     * @param int $userId User ID
     * @return array User profile data
     */
    public function getUserProfile($userId) {
        try {
            $stmt = $this->conn->prepare("
                SELECT u.*, 
                       COUNT(DISTINCT t.transaction_id) as total_borrows,
                       COUNT(DISTINCT CASE WHEN t.due_date < CURDATE() AND t.return_date IS NULL THEN t.transaction_id END) as overdue_books,
                       SUM(CASE WHEN f.paid_status = 'unpaid' THEN f.amount ELSE 0 END) as unpaid_fines
                FROM users u
                LEFT JOIN transactions t ON u.user_id = t.user_id
                LEFT JOIN fines f ON u.user_id = f.user_id
                WHERE u.user_id = ?
                GROUP BY u.user_id
            ");
            $stmt->execute([$userId]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return ['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()];
        }
    }

    /**
     * Get user's borrowed books
     * @param int $userId User ID
     * @return array List of borrowed books
     */
    public function getBorrowedBooks($userId) {
        try {
            $stmt = $this->conn->prepare("
                SELECT b.*, t.due_date, t.transaction_date as borrow_date,
                       CASE 
                           WHEN t.due_date < CURDATE() AND t.return_date IS NULL THEN 'overdue'
                           WHEN t.due_date <= DATE_ADD(CURDATE(), INTERVAL 3 DAY) AND t.return_date IS NULL THEN 'due_soon'
                           ELSE 'on_time'
                       END as status
                FROM transactions t
                JOIN books b ON t.book_id = b.book_id
                WHERE t.user_id = ? 
                AND t.transaction_type = 'borrow'
                AND t.return_date IS NULL
                ORDER BY t.due_date ASC
            ");
            $stmt->execute([$userId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return ['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()];
        }
    }

    /**
     * Get user's notifications
     * @param int $userId User ID
     * @return array List of notifications
     */
    public function getNotifications($userId) {
        try {
            $stmt = $this->conn->prepare("
                SELECT * FROM notifactions 
                WHERE user_id = ? 
                ORDER BY created_at DESC
            ");
            $stmt->execute([$userId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return ['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()];
        }
    }

    /**
     * Add a notification for a user
     * @param int $userId User ID
     * @param string $title Notification title
     * @param string $message Notification message
     * @return array Response with status
     */
    public function addNotification($userId, $title, $message) {
        try {
            $stmt = $this->conn->prepare("
                INSERT INTO notifactions (user_id, title, message)
                VALUES (?, ?, ?)
            ");
            $stmt->execute([$userId, $title, $message]);
            return ['status' => 'success'];
        } catch (PDOException $e) {
            return ['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()];
        }
    }
}

$memberOps = new MemberOperations($pdo);
?> 
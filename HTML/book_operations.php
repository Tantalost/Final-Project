<?php
require_once __DIR__ . '/../PHP/config.php';

class BookOperations {
    private $conn;

    public function __construct($pdo) {
        $this->conn = $pdo;
    }

    /**
     * Add a new book to the database
     * @param array $bookData Array containing book information
     * @return array Response with status and message
     */
    public function addBook($bookData) {
        try {
            // Validate required fields
            $requiredFields = ['title', 'authors', 'isbn'];
            foreach ($requiredFields as $field) {
                if (empty($bookData[$field])) {
                    return ['status' => 'error', 'message' => "Missing required field: $field"];
                }
            }

            // Check if ISBN already exists
            $stmt = $this->conn->prepare("SELECT book_id FROM books WHERE isbn = ?");
            $stmt->execute([$bookData['isbn']]);
            if ($stmt->rowCount() > 0) {
                return ['status' => 'error', 'message' => 'Book with this ISBN already exists'];
            }

            // Prepare SQL statement
            $sql = "INSERT INTO books (title, authors, isbn, edition, genre, publisher, 
                    published_date, stock, status, description, image_url) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            $stmt = $this->conn->prepare($sql);
            
            // Execute with parameters
            $result = $stmt->execute([
                $bookData['title'],
                $bookData['authors'],
                $bookData['isbn'],
                $bookData['edition'] ?? null,
                $bookData['genre'] ?? null,
                $bookData['publisher'] ?? null,
                $bookData['published_date'] ?? null,
                $bookData['stock'] ?? 0,
                $bookData['status'] ?? 'available',
                $bookData['description'] ?? null,
                $bookData['image_url'] ?? null
            ]);

            if ($result) {
                return ['status' => 'success', 'message' => 'Book added successfully', 'book_id' => $this->conn->lastInsertId()];
            } else {
                return ['status' => 'error', 'message' => 'Failed to add book'];
            }
        } catch (PDOException $e) {
            return ['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()];
        }
    }

    /**
     * Update an existing book
     * @param int $bookId Book ID to update
     * @param array $bookData Array containing updated book information
     * @return array Response with status and message
     */
    public function updateBook($bookId, $bookData) {
        try {
            // Validate book exists
            $stmt = $this->conn->prepare("SELECT book_id FROM books WHERE book_id = ?");
            $stmt->execute([$bookId]);
            if ($stmt->rowCount() === 0) {
                return ['status' => 'error', 'message' => 'Book not found'];
            }

            // Check ISBN uniqueness if being updated
            if (isset($bookData['isbn'])) {
                $stmt = $this->conn->prepare("SELECT book_id FROM books WHERE isbn = ? AND book_id != ?");
                $stmt->execute([$bookData['isbn'], $bookId]);
                if ($stmt->rowCount() > 0) {
                    return ['status' => 'error', 'message' => 'ISBN already exists for another book'];
                }
            }

            // Build update query dynamically based on provided fields
            $updateFields = [];
            $params = [];
            
            $allowedFields = [
                'title', 'authors', 'isbn', 'edition', 'genre', 'publisher',
                'published_date', 'stock', 'status', 'description', 'image_url'
            ];

            foreach ($allowedFields as $field) {
                if (isset($bookData[$field])) {
                    $updateFields[] = "$field = ?";
                    $params[] = $bookData[$field];
                }
            }

            if (empty($updateFields)) {
                return ['status' => 'error', 'message' => 'No fields to update'];
            }

            $params[] = $bookId; // Add book_id for WHERE clause
            $sql = "UPDATE books SET " . implode(', ', $updateFields) . " WHERE book_id = ?";
            
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute($params);

            if ($result) {
                return ['status' => 'success', 'message' => 'Book updated successfully'];
            } else {
                return ['status' => 'error', 'message' => 'Failed to update book'];
            }
        } catch (PDOException $e) {
            return ['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()];
        }
    }

    /**
     * Delete a book from the database
     * @param int $bookId Book ID to delete
     * @return array Response with status and message
     */
    public function deleteBook($bookId) {
        try {
            // Check if book exists
            $stmt = $this->conn->prepare("SELECT book_id FROM books WHERE book_id = ?");
            $stmt->execute([$bookId]);
            if ($stmt->rowCount() === 0) {
                return ['status' => 'error', 'message' => 'Book not found'];
            }

            // Check if book is currently borrowed
            $stmt = $this->conn->prepare("SELECT COUNT(*) FROM transactions WHERE book_id = ? AND transaction_type = 'borrow' AND return_date IS NULL");
            $stmt->execute([$bookId]);
            if ($stmt->fetchColumn() > 0) {
                return ['status' => 'error', 'message' => 'Cannot delete book that is currently borrowed'];
            }

            // Delete the book
            $stmt = $this->conn->prepare("DELETE FROM books WHERE book_id = ?");
            $result = $stmt->execute([$bookId]);

            if ($result) {
                return ['status' => 'success', 'message' => 'Book deleted successfully'];
            } else {
                return ['status' => 'error', 'message' => 'Failed to delete book'];
            }
        } catch (PDOException $e) {
            return ['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()];
        }
    }

    /**
     * Get all books with optional filtering
     * @param array $filters Optional filters for the query
     * @return array Array of books
     */
    public function getBooks($filters = []) {
        try {
            $sql = "SELECT * FROM books WHERE 1=1";
            $params = [];

            // Apply filters if provided
            if (!empty($filters['title'])) {
                $sql .= " AND title LIKE ?";
                $params[] = "%{$filters['title']}%";
            }
            if (!empty($filters['author'])) {
                $sql .= " AND authors LIKE ?";
                $params[] = "%{$filters['author']}%";
            }
            if (!empty($filters['isbn'])) {
                $sql .= " AND isbn LIKE ?";
                $params[] = "%{$filters['isbn']}%";
            }
            if (!empty($filters['status'])) {
                $sql .= " AND status = ?";
                $params[] = $filters['status'];
            }

            // Add sorting
            $sql .= " ORDER BY title ASC";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            
            return ['status' => 'success', 'data' => $stmt->fetchAll(PDO::FETCH_ASSOC)];
        } catch (PDOException $e) {
            return ['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()];
        }
    }

    /**
     * Get a single book by ID
     * @param int $bookId Book ID to retrieve
     * @return array Book data or error message
     */
    public function getBookById($bookId) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM books WHERE book_id = ?");
            $stmt->execute([$bookId]);
            $book = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($book) {
                return ['status' => 'success', 'data' => $book];
            } else {
                return ['status' => 'error', 'message' => 'Book not found'];
            }
        } catch (PDOException $e) {
            return ['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()];
        }
    }

    /**
     * Get the number of borrowed copies for a book
     * @param int $bookId Book ID to check
     * @return int Number of borrowed copies
     */
    public function getBorrowedCount($bookId) {
        try {
            $stmt = $this->conn->prepare("
                SELECT COUNT(*) 
                FROM transactions 
                WHERE book_id = ? 
                AND transaction_type = 'borrow' 
                AND return_date IS NULL
            ");
            $stmt->execute([$bookId]);
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            return 0;
        }
    }

    /**
     * Get the number of reports for a book
     * @param int $bookId Book ID to check
     * @return int Number of reports
     */
    public function getReportCount($bookId) {
        try {
            $stmt = $this->conn->prepare("
                SELECT COUNT(*) 
                FROM transactions 
                WHERE book_id = ? 
                AND transaction_type IN ('lost', 'damaged')
            ");
            $stmt->execute([$bookId]);
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            return 0;
        }
    }
}

// Initialize the class with database connection
$bookOps = new BookOperations($pdo);
?> 
<?php
require_once "book_operations.php";

// Sample books data
$sampleBooks = [
    [
        'title' => 'Harry Potter and the Philosopher\'s Stone',
        'authors' => 'J.K. Rowling',
        'isbn' => '9780747532743',
        'edition' => '1st Edition',
        'genre' => 'Fantasy',
        'publisher' => 'Bloomsbury',
        'published_date' => '1997-06-26',
        'stock' => 10,
        'status' => 'available',
        'description' => 'The first book in the Harry Potter series, following the adventures of a young wizard and his friends at Hogwarts School of Witchcraft and Wizardry.',
        'image_url' => '/images/image 1.svg'
    ],
    [
        'title' => 'A Brief History of Time',
        'authors' => 'Stephen Hawking',
        'isbn' => '9780553380163',
        'edition' => '10th Anniversary Edition',
        'genre' => 'Science',
        'publisher' => 'Bantam Books',
        'published_date' => '1998-09-01',
        'stock' => 5,
        'status' => 'available',
        'description' => 'A landmark volume in science writing by one of the great minds of our time, Stephen Hawking\'s book explores such profound questions as: How did the universe begin?',
        'image_url' => '/images/image 4.svg'
    ],
    [
        'title' => 'Thinking, Fast and Slow',
        'authors' => 'Daniel Kahneman',
        'isbn' => '9780374533557',
        'edition' => '1st Edition',
        'genre' => 'Psychology',
        'publisher' => 'Farrar, Straus and Giroux',
        'published_date' => '2011-10-25',
        'stock' => 8,
        'status' => 'available',
        'description' => 'Major New York Times bestseller by the Nobel Prize-winning author of Thinking, Fast and Slow.',
        'image_url' => '/images/image 10.svg'
    ],
    [
        'title' => 'The Republic',
        'authors' => 'Plato',
        'isbn' => '9780140455113',
        'edition' => 'Penguin Classics Edition',
        'genre' => 'Philosophy',
        'publisher' => 'Penguin Classics',
        'published_date' => '2007-05-29',
        'stock' => 15,
        'status' => 'available',
        'description' => 'Plato\'s masterwork of philosophy, exploring the nature of justice and the ideal society.',
        'image_url' => '/images/image 9.svg'
    ],
    [
        'title' => 'The History of the Ancient World',
        'authors' => 'Susan Wise Bauer',
        'isbn' => '9780393059748',
        'edition' => '1st Edition',
        'genre' => 'History',
        'publisher' => 'W. W. Norton & Company',
        'published_date' => '2007-03-26',
        'stock' => 7,
        'status' => 'available',
        'description' => 'A sweeping narrative of the ancient world, from the earliest civilizations to the fall of Rome.',
        'image_url' => '/images/image 25.svg'
    ],
    [
        'title' => 'The Hobbit',
        'authors' => 'J.R.R. Tolkien',
        'isbn' => '9780547928227',
        'edition' => '75th Anniversary Edition',
        'genre' => 'Fantasy',
        'publisher' => 'Mariner Books',
        'published_date' => '2012-09-18',
        'stock' => 12,
        'status' => 'available',
        'description' => 'Bilbo Baggins is a hobbit who enjoys a comfortable, unambitious life, rarely traveling any farther than his pantry or cellar.',
        'image_url' => '/images/image 19.svg'
    ],
    [
        'title' => 'Harry Potter and the Deathly Hallows',
        'authors' => 'J.K. Rowling',
        'isbn' => '9780545010221',
        'edition' => '1st Edition',
        'genre' => 'Fantasy',
        'publisher' => 'Arthur A. Levine Books',
        'published_date' => '2007-07-21',
        'stock' => 9,
        'status' => 'available',
        'description' => 'The final book in the Harry Potter series, where Harry faces his ultimate destiny.',
        'image_url' => '/images/image 28.svg'
    ],
    [
        'title' => 'Beginner\'s Step-by-Step Coding Course',
        'authors' => 'DK',
        'isbn' => '9780241358733',
        'edition' => '1st Edition',
        'genre' => 'Computer Science',
        'publisher' => 'DK',
        'published_date' => '2020-01-07',
        'stock' => 6,
        'status' => 'available',
        'description' => 'A comprehensive guide to learning coding for beginners, covering multiple programming languages and concepts.',
        'image_url' => '/images/image 54.svg'
    ]
];

// Insert each book
$successCount = 0;
$errorCount = 0;

foreach ($sampleBooks as $book) {
    $result = $bookOps->addBook($book);
    if ($result['status'] === 'success') {
        $successCount++;
    } else {
        $errorCount++;
        echo "Error adding book {$book['title']}: {$result['message']}\n";
    }
}

echo "Book insertion complete.\n";
echo "Successfully added: $successCount books\n";
echo "Failed to add: $errorCount books\n";
?> 
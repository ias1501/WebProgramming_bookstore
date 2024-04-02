<?php
session_start();
if (empty($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

$conn = mysqli_connect('localhost', 'root', 'Da4k@choco^80', 'bookstore');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$books_query = "SELECT * FROM books";
$books_result = mysqli_query($conn, $books_query);
?>

<div class="books">
<?php include 'navbar.php'; ?>
    <?php
    if (mysqli_num_rows($books_result) > 0) {
        while ($book = mysqli_fetch_assoc($books_result)) {
            echo "<div class='book'>";
            echo "<h2>{$book['title']}</h2>";
            echo "<img src='{$book['image_path']}' alt='{$book['title']}'>";
            echo "<p>Author: {$book['author']}</p>";
            echo "<p>Price: $ {$book['price']}</p>";
            echo "<form action='cart.php' method='post'>";
            echo "<input type='hidden' name='title' value='{$book['title']}'>";
            echo "<input type='hidden' name='price' value='{$book['price']}'>";
            echo "<input type='submit' value='Add to Cart'>";
            echo "</form>";
            echo "</div>";
        }
    } else {
        echo "No books found.";
    }
    ?>
</div>

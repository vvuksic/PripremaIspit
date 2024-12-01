<?php 
include_once 'functions.php'; 

session_start();
session_regenerate_id();

var_dump($_COOKIE["username"]);

if($_SESSION["username"] !== "admin"){
    header("Location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Manager</title>
</head>
<body>
    <table border="1" cellspacing="5" cellpadding="15">
        <tr>
            <td width="50%" valign="top">
                <h1>Books</h1>
                <?php
                    $books = loadBooks();
                    if($books): 
                ?>
                <table width="100%">
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Year</th>
                    </tr>
                    <?php foreach($books as $book): ?>
                        <tr>
                            <td>
                                <?php 
                                    echo "<a href=\"".$_SERVER['PHP_SELF']."?id=".$book['id']."\">".$book['title']."</a>" 
                                ?>
                            </td>
                            <td><?php echo $book['author'] ?></td>
                            <td><?php echo $book['year'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </table>
                <?php else: ?>
                    <p>No books!</p>
                <?php endif ?>

            </td>
            <td width="50%" valign="top">
                <h1>Add Book</h1>
                <form action="" method="post" novalidate enctype="multipart/form-data">
                    <p>
                        <label for="title">Title:</label>
                        <input type="text" name="title" id="title" required>
                    </p>
                    <p>
                        <label for="author">Author:</label>
                        <input type="text" name="author" id="author" required>
                    </p>
                    <p>
                        <label for="year">Year:</label>
                        <input type="number" name="year" id="year" required>
                    </p>
                    <p>
                        <label for="cover">Book Cover:</label>
                        <input type="file" name="cover" id="cover" required>
                    </p>
                    <p>
                        <button type="submit">Add Book</button>
                    </p>
                </form>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] === "POST") {
                        $title = htmlentities($_POST["title"]);
                        $author = htmlentities($_POST["author"]);
                        $year = htmlentities($_POST["year"]);

                        $cover = $_FILES["cover"];

                        if ($cover["error"] === UPLOAD_ERR_OK) {
                            $targetDir = "uploads/";
                            $targetFile = $targetDir . time() . "_" . basename($cover["name"]);

                            if(move_uploaded_file($cover["tmp_name"], $targetFile)){
                                $id = addBook($title, $author, $year, $targetFile);
                                echo "<p>Book added with id: $id</p>";
                                header("Location: ".$_SERVER['PHP_SELF']);
                            } else {
                                echo "<p>Failed to add new book!</p>";
                            }
                        } else {
                            echo "<p>Failed to upload file!</p>";
                        }
                    }
                ?>
            </td>
        </tr>
    </table>

    <?php
        
        if (isset($_GET["id"])):
            $id = htmlentities($_GET["id"]);
            $book = getBookById($id);

            if ($book):
    ?>
        <table width="100%">
            <tr>
                <td width="50%">
                    <img src="<?php echo $book['image'] ?>" width="50%">
                </td>
                <td width="50%">
                    <?php
                        echo "
                            <p>Title: ".$book['title']." </p>
                            <p>Author: ".$book['author']." </p>
                            <p>Year: ".$book['year']." </p>
                        ";
                    ?>
                </td>
            </tr>
        </table>
    <?php endif; endif; ?>
</body>
</html>
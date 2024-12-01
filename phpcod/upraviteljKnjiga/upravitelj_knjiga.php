<?php

const BOOKS_FILE = "books.json";

// Učitavanje knjiga iz json datoteke.
function loadBooks(string $path = BOOKS_FILE): array {
    if (!file_exists($path)) {
        return [];
    }
    $books = file_get_contents($path);

    return json_decode($books, true);
}

// Spremanje knjiga u json datoteku.
function saveBooks(array $books, string $path = BOOKS_FILE): void {
    $jsonBooks = json_encode($books, JSON_PRETTY_PRINT);
    file_put_contents($path, $jsonBooks);
}

// Dodavanje nove knjige.
function addBook(string $title, string $author, int $year): int {
    $books = loadBooks();
    $newId = empty($books) ? 1 : max(array_column($books, "id")) + 1;
    $books[] = [
        "id" => $newId,
        "title" => $title,
        "author" => $author,
        "year" => $year
    ];
    saveBooks($books);

    return $newId;
}

// Ažuriranje postojeće knjige.
function updateBook(int $id, ?string $title = null, ?string $author = null, ?int $year = null): bool{
    $books = loadBooks();

    foreach($books as &$book){
        if($book["id"] === $id){
            $book["title"] = $title ?? $book["title"];
            $book["author"] = $author ?? $book["author"];
            $book["year"] = $year ?? $book["year"];
            saveBooks($books);
            return true;
        }
    }

    // foreach($books as $key => $book){
    //     if($book["id"] === $id){
    //         $books[$key]["title"] = $title ?? $book["title"];
    //         $books[$key]["author"] = $author ?? $book["author"];
    //         $books[$key]["year"] = $year ?? $book["year"];
    //         saveBooks($books);
    //         return true;
    //     }
    // }

    return false;
}

// Dohvati knjigu po id-u.
function getBookById(int $id): ?array{
    $books = loadBooks();

    foreach ($books as $book) {
        if ($book["id"] === $id) {
            return $book;
        }
    }

    return null;
}

// Brisanje knjige po id-u.
function deleteBook(int $id): bool{
    $books = loadBooks();
    $newBooks = array_filter($books, function($book) use ($id){
        return $book["id"] !== $id;
    });

    if(count($books) === count($newBooks)){
        return false;
    }

    saveBooks($newBooks);

    return true;
}

var_dump(deleteBook(3));

<?php
include_once 'books.php';

$search_query = $_GET['search_query'] ?? '';
$sort_param = $_GET['sort'] ?? '';
$show_all = isset($_GET['show_all']) && $_GET['show_all'] === 'true';

function filter($books, $query) {
    $query = mb_strtolower($query, 'UTF-8');
    $result = [];
    foreach($books as $book){
        $title = mb_strtolower($book['title'], 'UTF-8');
        $author = mb_strtolower($book['author'], 'UTF-8');
        if (mb_substr($title, 0, 1, 'UTF-8') === $query || mb_substr($author, 0, 1, 'UTF-8') === $query) {
            $result[] = $book;
        }
    }
    return $result;
}

$filtered_books = $books;

if (!$show_all) {
    $filtered_books = filter($books, $search_query);
}

if ($sort_param === 'year') {
    usort($filtered_books, function($a, $b) {
        return $a['year'] - $b['year'];
    });
} elseif ($sort_param === 'author') {
    usort($filtered_books, function($a, $b) {
        return strcmp($a['author'], $b['author']);
    });
} elseif ($sort_param === 'title') {
    usort($filtered_books, function($a, $b) {
        return strcmp($a['title'], $b['title']);
    });
}

if (!empty($filtered_books)) {
    echo '<table border="1">';
    echo '<tr><th>Название</th><th>Автор</th><th>Год</th></tr>';
    foreach ($filtered_books as $book) {
        echo '<tr>';
        echo '<td>' . $book['title'] . '</td>';
        echo '<td>' . $book['author'] . '</td>';
        echo '<td>' . $book['year'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo 'Книги не найдено';
}
?>

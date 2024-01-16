<?php
$file = fopen('db.txt', 'r');
$sData = fread($file, filesize('db.txt'));
fclose($file);

$library = unserialize($sData);

echo '<html>
<head>
    <title>Library</title>
    <style>
        table {
            border-collapse: collapse;
            width: 40%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
			text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Library</h2>
    <table>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Year</th>
        </tr>';

foreach ($library as $book) {
	echo '<tr>';
	echo '<td>' . $book['title'] . '</td>';
	echo '<td>' . $book['author'] . '</td>';
	echo '<td>' . $book['year'] . '</td>';
	echo '</tr>';
}

echo '</table>
</body>
</html>';
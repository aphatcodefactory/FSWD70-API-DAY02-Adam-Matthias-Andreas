<?php

require_once 'dbconnect.php';

$sql = 'SELECT isbn, name, surname, title, discription, type, img_link FROM media
		LEFT JOIN author ON media.fk_authorID = author.authorID WHERE status = 0 LIMIT 1;';

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$isbn = $row['isbn'];
$title = $row['title'];

mysqli_close($conn);
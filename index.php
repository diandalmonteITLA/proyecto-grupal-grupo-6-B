<?php
declare(strict_types = 1);

//Loading de las clases 
require_once 'src/Entities/Comment.php';
require_once 'src/Persistence/CommentJsonRepo.php';
require_once 'src/Services/CommentService.php';

use src\Services\CommentService;

$service = new CommentService();

// Maneja el envio del form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $service->post_form_data($_POST['author'] ?? '', $_POST['content'] ?? '');
    header('Location: index.php');
    exit;
}

$comments = $service->get_comments();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Deja tu comentario</title>
    <link rel="stylesheet" href="css/styles.css"
</head>
<body>
    <h1>Libro de Visitas</h1>
    <?php include 'views/formView.php'; ?>
    <hr>
    <?php include 'views/commentsView.php'; ?>
</body>
</html>
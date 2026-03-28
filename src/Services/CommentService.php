<?php

declare(strict_types=1);

namespace src\Services;

use src\Entities\Comment;
use src\Persistence\CommentJsonRepo;
use DateTime;

class CommentService
{
    private CommentJsonRepo $repo;

    public function __construct()
    {
        // Obtiene la ruta relativa
        $this->repo = new CommentJsonRepo(__DIR__ . '/../../data/comments.json');
    }

    //Devuelve todos los comentarios registrados
    public function get_comments(): array
    {
        $data = $this->repo->getComments();
        $comments = [];
        foreach ($data as $item) {
            $comments[] = new Comment(
                $item['author'],
                $item['content'],
                new DateTime($item['date'])
            );
        }
        return $comments;
    }

    //Guarda un nuevo comentario
    public function post_form_data(string $author, string $content): void
    {
        if (empty($author) || empty($content)) {
            return;
        }

        $newComment = [
            'author' => $author,
            'content' => $content,
            'date' => (new DateTime())->format('Y-m-d H:i:s')
        ];
        $this->repo->addComment($newComment);
    }
}
<ul>
    <?php //Dinamicamente se muestra el contenido dependiendo de los comentarios que hayan en la variable $comments (proviene del json)
    if (empty($comments)): ?>
        <p id="commentsEmptyText">No hay comentarios aún.</p>
    <?php else: ?>
        <?php foreach ($comments as $comment): ?>
            <div class="comment-card" style="border: 1px solid #ccc; margin-bottom: 10px; padding: 10px;">
                <strong><?= htmlspecialchars($comment->author) ?></strong>
                <small><?= $comment->date->format('d/m/Y H:i') ?></small>
                <p class="comment-content"><?= htmlspecialchars($comment->content) ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>
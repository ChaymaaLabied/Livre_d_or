<main>
    <h2>Livre d'Or</h2>

    <?php if (isset($_SESSION['user'])): ?>
        <p><a href="comment_controller.php">Ajouter un commentaire</a></p>
    <?php endif; ?>

    <?php if (!empty($commentaires)): ?>
        <?php foreach ($commentaires as $c): ?>
            <div class="commentaire">
                <p><strong><?= htmlspecialchars($c['login']) ?></strong> le <?= date("d/m/Y H:i", strtotime($c['date'])) ?></p>
                <p><?= nl2br(htmlspecialchars($c['commentaire'])) ?></p>
                <hr>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucun commentaire pour l'instant.</p>
    <?php endif; ?>
</main>
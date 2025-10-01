<main>
    <h2>Ajouter un commentaire</h2>

    <?php if (!empty($message)): ?>
        <p style="color:red;"><?= $message ?></p>
    <?php endif; ?>

    <form action="comment_controller.php" method="POST">
        <textarea name="commentaire" rows="5" required></textarea>
        <br>
        <button type="submit">Poster</button>
    </form>
</main>
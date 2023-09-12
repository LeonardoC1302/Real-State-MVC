<main class="container section">
    <h1>Update Property</h1>

    <?php
        foreach($errors as $error) : ?>
            <div class="alert error">
                <?php echo $error; ?>
            </div>
    <?php endforeach; ?>

    <a href="/admin" class="button green-button">Go Back</a>

    <form class="form" method='POST' enctype="multipart/form-data">
        <?php include __DIR__ . '/form.php'; ?>
        <input type="submit" value="Update Property" class="button green-button">
    </form>
</main>
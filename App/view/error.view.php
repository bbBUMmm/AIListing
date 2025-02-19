<?= loadPartial('head') ?>

<?= loadPartial('navbar') ?>
    <section>
    <div class="container mx-auto p-4 mt-4">
        <div class=""><?= $status ?> </div> <p class="">
            <?= $message ?>
        </p>
    </div>
    </section>
<?= loadPartial('footer') ?>
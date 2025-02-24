<?php if (isset($_SESSION['success_message'])) :?>
    <div class="flash-message-wrapper">
        <div class="flash-message">
            <?= $_SESSION['success_message'] ?>
        </div>
    </div>
    <?php unset($_SESSION['success_message']) ?>
<?php endif; ?>

<?php if (isset($_SESSION['error_message'])) :?>
    <div class="flash-message-wrapper">
        <?php foreach ($_SESSION['error_message'] as $error) : ?>
            <div class="flash-message-error">
                <?= $error ?>
            </div>
        <?php endforeach; ?>
    </div>
    <?php unset($_SESSION['error_message']) ?>
<?php endif; ?>

<?php loadPartial('head');?>

<div class="full-width-container">
    <div class="info-wrapper">
        <div class="info-header">
            <h2>AI Profile Overview</h2>
            <?php if (isset($listing->aitags)) : ?>
                <div class="tags">
                    <span><?= $listing->aitags ?></span>
                </div>
            <?php endif; ?>
            <form method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <button class="deleteButton" type="submit">Delete</button>
            </form>

        </div>

        <div class="info-section">
            <h3><?= $listing->ainame ?></h3>
        </div>

        <div class="info-section">
            <h3>How did you learn about it?</h3>
            <p><?= $listing->how_learned?></p>
        </div>

        <div class="info-section">
            <h3>Where have you used it?</h3>
            <p><?= $listing->usage?></p>
        </div>

        <div class="info-section">
            <h3>Projects where you plan to use it</h3>
            <p><?= $listing->future_projects?></p>
        </div>

        <div class="info-section">
            <h3>Notes</h3>
            <p><?= $listing->notes ?></p>
        </div>
    </div>
</div>

<div class="card-wrapper">
    <?php foreach ($listings as $listing) :?>
        <div class="card">
            <a href="/listings">
                <div class="card-info">
                    <p class="title">
                        <?php echo $listing->ainame ?>
                    </p>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>
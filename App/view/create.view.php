<?php loadPartial("head");
loadPartial("navbar");?>
<div class="container">
    <div class="form-wrapper">
        <div class="form">
            <form action="/listings" method="POST">
                <?php if (isset($errors)) : ?>
                    <?php foreach ($errors as $error): ?>
                        <div style="color: red">
                            <?= $error ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif;?>
                <label for="ai-name">AI Name</label>
                <input id="ai-name" type="text" name="ainame" value="<?= $data['ai_name'] ?? '' ?>">

                <label for="how-learned">How did you learn about it?</label>
                <input id="how-learned" type="text" name="how_learned" value="<?= $data['how_learned'] ?? ''?>">

                <label for="usage">Where have you used it?</label>
                <input id="usage" type="text" name="usage" value="<?= $data['usage'] ?? ''?> ">

                <label for="future-projects">Projects where you plan to use it</label>
                <textarea id="future-projects" name="future_projects"><?= $data['future_projects'] ?? '' ?></textarea>

                <label for="notes">Notes</label>
                <textarea id="notes" name="notes"></textarea>

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php loadPartial("footer"); ?>
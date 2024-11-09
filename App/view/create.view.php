<?php loadPartial("head");
loadPartial("navbar");?>
<div class="container">
    <div class="form-wrapper">
        <div class="form">
            <form action="" method="POST">
                <label for="ai-name">AI Name</label>
                <input id="ai-name" type="text" name="ai_name" required>

                <label for="how-learned">How did you learn about it?</label>
                <input id="how-learned" type="text" name="how_learned" required>

                <label for="usage">Where have you used it?</label>
                <input id="usage" type="text" name="usage" required>

                <label for="future-projects">Projects where you plan to use it</label>
                <textarea id="future-projects" name="future_projects" required></textarea>

                <label for="notes">Notes</label>
                <textarea id="notes" name="notes"></textarea>

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php loadPartial("footer"); ?>
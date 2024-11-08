<?php loadPartial('head');?>

<?php loadPartial("navbar");?>

<!--ignore the error, the variable is accessible here-->
<?php //inspect($listings[0]['ainame'], false); ?>

<div id="hero" class="bg-img-wrapper">
    <?php loadPartial("hero");?>
</div>
<div id="showcase" class="body2">
    <?php loadPartial("showcase", [
            "listings" => $listings,
    ]); ?>
</div>
<?php loadPartial("footer");?>
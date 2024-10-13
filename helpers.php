<?php
/**
 * Get the base(absolute) path
 * @param string $path
 * @return string
 */
function getBasePath(string $path = ''): string
{
    return __DIR__ . '/' . $path;
}

/**
 * Load view
 * @param string $name
 * @return void
 */
function loadView(string $name):void
{
    $viewPath = getBasePath("view/$name.view.php");
    if (file_exists($viewPath)) {
        require $viewPath;
    }
    else echo "View $name does not exist";
}



/**
 * Load partial
 * @param string $name
 * @return void
 */
function loadPartial(string $name):void
{
    $partialPath = getBasePath("view/partials/$name.php");
    if (file_exists($partialPath)) {
        require $partialPath;
    }
    else echo "Partial $name does not exist";
}


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
 * @param array $data
 * @return void
 */
function loadView(string $name, array $data = []):void
{
    $viewPath = getBasePath("App/view/$name.view.php");

    if (file_exists($viewPath)) {
        //    convert data from the db into the php variable
        //    so now we can use variable from the home controller
        //    call listings in our home.view.php
        extract($data);
        require $viewPath;
    }
    else echo "View $name does not exist";
}



/**
 * Load partial
 * @param string $name
 * @return void
 */
function loadPartial(string $name, array $data = []):void
{
    $partialPath = getBasePath("App/view/partials/$name.php");
    if (file_exists($partialPath)) {

        extract($data);
        require $partialPath;
    }
    else echo "Partial $name does not exist";
}

/**
 * Inspect values if $die = true
 * end the script
 *
 * @param mixed $value
 * @param bool $die
 * @return void
 *
 */
function inspect(mixed $value, bool $die):void
{
    if ($die){
        die(var_dump($value));
    } else {
        echo '<pre>';
        var_dump($value);
        echo '</pre>';
    }
}

function sanitize(string $dirtyValue):string
{
    return filter_var(trim($dirtyValue), FILTER_SANITIZE_SPECIAL_CHARS);
}

function redirect(string $url):void
{
    header("Location: $url");
    exit;
}


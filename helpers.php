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
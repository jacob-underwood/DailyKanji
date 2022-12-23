<?php

/**
 * Gets previously posted value of a field name and echoes it.
 * @param string $field
 * @return void
 */
function getPreviousValue($field)
{
    if (isset($_POST[$field])) {
        echo $_POST[$field];
    }
}

/**
 * Returns the path of a random image from imagesDir.
 * @param string $imagesDir Path of directory of images.
 * @return string Path of image.
 */
function getRandomImage($imagesDir) {
    $images = glob($imagesDir . '*.{jpg,jpeg,png}', GLOB_BRACE);
    $randomImage = $images[array_rand($images)];
    echo $randomImage;
    return $randomImage;
}

?>
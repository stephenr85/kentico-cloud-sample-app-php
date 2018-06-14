<?php 
/**
 * When serving KenticoCloud PHP Sample Application using `php artisan serve`
 * command, the combination of Laravel (5.3+) and of a package
 * sunra/php-simple-html-dom-parser exhibits an issue where laravel gets stuck
 * in an infinite loop of calls 
 */
define("PACKAGE_TO_FIX" , "sunra/php-simple-html-dom-parser");
define("MINIMUM_REQUIRED_LINES_IN_FILE", 1000);

/**
 * Recursively retrieves nested files with .php extension from given directory.
 */
function getAllPhpFiles($dir, &$results = array())
{
    $files = scandir($dir);

    foreach ($files as $key => $value)
    {
        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
        if (!is_dir($path))
        {
            $fileInfo = pathinfo($path);
            if ($fileInfo['extension'] == 'php')
            {
                $results[] = $path;
            }
        }
        elseif ($value != "." && $value != "..")
        {
            getAllPhpFiles($path, $results);
        }
    }

    return $results;
}


/**
 * Counts how many actual lines of code there are in the specified file.
 */
function countFileLines($file)
{
    $fileAPI = new \SplFileObject($file, 'r');
    $fileAPI->seek(PHP_INT_MAX);
    return $fileAPI->key() + 1; 
}


/**
 * Searches file for occurrence of 'function __destruct' and replaces it with 
 * improbably manually selectable name. This prevents combination of Laravel
 * and sunra/php-simple-html-dom-parser-package to become stuck in an endless
 * loop of __destruct calls by renaming __destruct function. 
 */
function removeDestructorFunction($file)
{
    try {
        $fc = file_get_contents($file);
        if (empty($fc)){
            showErrorFixingMessage();
            return;
        }
        $fc = str_replace('function __destruct', 'function __m3TlMNSgdA__CS2yxVRIAO_destructor_removed', $fc);
        file_put_contents($file, $fc);
    } catch (Exception $e) {
        showErrorFixingMessage();
    }
}


function showErrorFixingMessage()
{
    echo "=====================================================================";
    echo "ERROR: Fixing sunra/php-simple-html-dom-parser package. " . PHP_EOL;
    echo "Please manually modify file: " . PHP_EOL;
    echo "$file" . PHP_EOL ; 
    echo "And rename all occurences of __destruct() function." . PHP_EOL;
    echo "=====================================================================";
}


echo "Installer will now remove destructors from sunra/php-simple-html-dom-parser package." . PHP_EOL;
foreach (getAllPhpFiles('vendor' . DIRECTORY_SEPARATOR . PACKAGE_TO_FIX) as $file)
{
    // Lets base this on reasonable thought that HTML parser will never fit 
    // into less than 1000 lines of code and ignore all files that contain
    // less lines of code. Note that this approach assumes very specific
    // sunra/php-simple-html-dom-parser package structure and will not work
    // out of the box for other packages.
    if (countFileLines($file) > MINIMUM_REQUIRED_LINES_IN_FILE)
    {
        echo "Updating: " . basename($file) . PHP_EOL;
        removeDestructorFunction($file);
    }
}
echo "Done."
?>
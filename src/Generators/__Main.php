<?php declare(strict_types=1);
namespace Eiko\Cli\Generators;

abstract class __Main
{
    private function __construct() {}
    private function __clone() {}

    protected static function filesExists(string $dir, string $file): bool
    {
        if (!\file_exists($dir) || !\is_dir($dir)) {
            echo <<<TXT
            |-------------
            | WARNING: dir [$dir] not exists!
            |-------------
            TXT;
            return false;
        }

        if (\file_exists($file)) {
            echo <<<TXT
            |--------------
            | WARNING: file [$file] already exists! Run `rm $file` or set another name;
            |--------------
            TXT;
            return false;
        }

        return true;
    }
}

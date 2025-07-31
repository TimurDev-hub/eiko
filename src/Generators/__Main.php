<?php declare(strict_types=1);
namespace Eiko\Cli\Generators;

abstract class __Main
{
    private function __construct() {}
    private function __clone() {}

    protected static function fileExists(string $dir, string $file): bool
    {
        if (!\file_exists($dir) || !\is_dir($dir)) {
            echo
            '|-------->>>' . \PHP_EOL .
            "| WARNING: dir [$dir] not exists!" . \PHP_EOL .
            '|-------->>>' .\PHP_EOL;
            return false;
        }

        if (\file_exists($file)) {
            echo
            '|-------->>>' . \PHP_EOL .
            "| WARNING: file [$file] already exists! Run `rm $file` or set another name;" . \PHP_EOL .
            '|-------->>>' . \PHP_EOL;
            return false;
        }

        return true;
    }
}

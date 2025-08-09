<?php declare(strict_types=1);
namespace Eiko\Cli\Commands;

use Eiko\Cli\Templates\Files;

final class Init
{
    private static array $dirs = [
        'logs/',
        'public/',
        'src/core/Config/',
        'src/core/Routes/',
        'src/modules/Controllers/',
        'src/modules/Middleware/',
        'src/modules/Models/',
        'src/modules/Utils/'
    ];

    private static array $files = [
        'logs/app.log' => '',
        'public/index.php' => Files::index->value,
        '.env' => Files::env->value,
        '.env.example' => Files::env->value,
        '.gitignore' => Files::gitignore->value,
        'composer.json' => Files::composer->value,
        'project.eiko.md' => '',
        'README.md' => ''
    ];

    private function __construct() {}
    private function __clone() {}

    public static function runCommand(string $rootDir): void
    {
        echo <<<TXT
        -------------------------
        Creating dir structure...
        -------------------------
        TXT . \PHP_EOL;

        if (!\preg_match('/^[a-z0-9_\-]+$/si', $rootDir)) {
            echo "WARNING: [$rootDir] has non-valid name!" . \PHP_EOL;
            exit(1);
        }

        if (\file_exists($rootDir)) {
            echo "WARNING: [$rootDir] dir already exists!" . \PHP_EOL;
            exit(1);
        }

        $rootDir = './' . \trim($rootDir, '/') . '/';

        foreach (self::$dirs as $dir) {
            echo "Created dir: [{$rootDir}{$dir}]" . \PHP_EOL;
            \mkdir(directory: $rootDir . $dir, recursive: true);
        }

        echo <<<TXT
        --------------------------
        Creating file structure...
        --------------------------
        TXT . \PHP_EOL;

        foreach (self::$files as $file => $content) {
            echo "Created file: [{$rootDir}{$file}]" . \PHP_EOL;
            \file_put_contents($rootDir . $file, $content);
        }

        echo <<<TXT
        ---------------------
        Done! Run `cd $rootDir`
        ---------------------
        TXT . \PHP_EOL;
    }
}

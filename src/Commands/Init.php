<?php declare(strict_types=1);
namespace Eiko\Cli\Commands;

use Eiko\Cli\Templates\Files;

final class Init
{
    private static array $dirs = [
        './server/logs/',
        './server/public/',
        './server/src/core/Config/',
        './server/src/core/Routes/',
        './server/src/modules/Controllers/',
        './server/src/modules/Middleware/',
        './server/src/modules/Models/',
        './server/src/modules/Utils/'
    ];

    private static array $files = [
        './server/logs/app.log' => '',
        './server/public/index.php' => Files::index->value,
        './server/.env' => Files::env->value,
        './server/.env.example' => Files::env->value,
        './server/.gitignore' => Files::gitignore->value,
        './server/composer.json' => Files::composer->value,
        './server/README.md' => ''
    ];

    private function __construct() {}
    private function __clone() {}

    public static function runCommand(): void
    {
        echo
        '-------------------------' . \PHP_EOL .
        'Creating dir structure...' . \PHP_EOL .
        '-------------------------' . \PHP_EOL;

        if (\file_exists('./server')) {
            echo 'WARNING: [./server/] dir already exists!' . \PHP_EOL;
            exit(1);
        }

        foreach (self::$dirs as $dir) {
            echo "Created dir: [$dir]" . \PHP_EOL;
            \mkdir(directory: $dir, recursive: true);
        }

        echo
        '--------------------------' . \PHP_EOL .
        'Creating file structure...' . \PHP_EOL .
        '--------------------------' . \PHP_EOL;

        foreach (self::$files as $file => $content) {
            echo "Created file: [$file]" . \PHP_EOL;
            \file_put_contents($file, $content);
        }

        echo
        '---------------------' . \PHP_EOL .
        'Done! Run `cd server`' . \PHP_EOL .
        '---------------------' . \PHP_EOL;
    }
}

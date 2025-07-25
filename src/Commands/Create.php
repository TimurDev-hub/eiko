<?php declare(strict_types=1);
namespace Eiko\Cli\Commands;

use Eiko\Cli\Generators\{Controller, Middleware, Model, Route};

final class Create
{
    private function __construct() {}
    private function __clone() {}

    public static function runCommand(array $args): void
    {
        $path = \realpath('./src');

        if (!$path) {
            echo
            '----------------------------------------------------' . \PHP_EOL .
            'WARNING: run `cd server` before creating components!' . \PHP_EOL .
            '----------------------------------------------------' . \PHP_EOL;
            exit(1);
        }

        $dir = \dirname($path);

        if (\basename($dir) !== 'server') {
            echo
            '-----------------------------------------' . \PHP_EOL .
            'WARNING: [../src] dir not a [server/src]!' . \PHP_EOL .
            '-----------------------------------------' . \PHP_EOL;
            exit(1);
        }

        [$file, $name] = [$args[2] ?? '', $args[3] ?? ''];

        switch ($file) {
            case 'controller':
                echo
                '----------------------' . \PHP_EOL .
                'Creating controller...' . \PHP_EOL;
                Controller::generate(name: $name);
                break;
            case 'model':
                echo
                '-----------------' . \PHP_EOL .
                'Creating model...' . \PHP_EOL;
                Model::generate(name: $name);
                break;
            case 'middleware':
                echo
                '----------------------' . \PHP_EOL .
                'Creating middleware...' . \PHP_EOL;
                Middleware::generate(name: $name);
                break;
            case 'route':
                echo
                '-----------------' . \PHP_EOL .
                'Creating route...' . \PHP_EOL;
                Route::generate(name: $name);
                break;
            default:
                echo
                '---------------------------------------------------------' . \PHP_EOL .
                'Undefined file name;' . \PHP_EOL .
                '--------------------' . \PHP_EOL .
                'eiko create <controller, middleware, model, route> <name>' . \PHP_EOL .
                '---------------------------------------------------------' . \PHP_EOL;
        }
    }
}

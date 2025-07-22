<?php declare(strict_types=1);
namespace Eiko\Cli\Commands;

require_once __DIR__ . '/../Generators/Controller.php';
require_once __DIR__ . '/../Generators/Model.php';
require_once __DIR__ . '/../Generators/Route.php';

use Eiko\Cli\Generators\{Controller, Model, Route};

final class Create
{
    private function __construct() {}
    private function __clone() {}

    public static function runCommand(array $args): void
    {
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
            case 'route':
                echo
                '-----------------' . \PHP_EOL .
                'Creating route...' . \PHP_EOL;
                Route::generate(name: $name);
                break;
            default:
                echo
                '----------------------------------------------' . \PHP_EOL .
                'Undefined file name;' . \PHP_EOL .
                '--------------------' . \PHP_EOL .
                'eiko create <route, controller, model> <name>' . \PHP_EOL .
                '----------------------------------------------' . \PHP_EOL;
        }
    }
}

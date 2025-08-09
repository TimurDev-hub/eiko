<?php declare(strict_types=1);
namespace Eiko\Cli\Commands;

use Eiko\Cli\Generators\{Controller, Middleware, Model, Route};

final class Create
{
    private function __construct() {}
    private function __clone() {}

    public static function runCommand(string $file, string $name): void
    {
        if (\strlen($file) < 1 || \strlen($name) < 1) throw new \Exception();

        $path = \realpath('./src');

        if (!$path) {
            echo <<<TXT
            --------------------------------------------------------------'
            WARNING: run `cd your_prodect_dir` before creating components!'
            --------------------------------------------------------------'
            TXT;
            exit(1);
        }

        if (!\file_exists('./project.eiko.md')) {
            echo <<<TXT
            ----------------------------------------------
            WARNING: You are not in project dir or
                     dir haven't `./project.eiko.md` file,
                     run `cd your_prodect_dir`
                     or `touch ./project.eiko.md`;
            ----------------------------------------------
            TXT;
            exit(1);
        }

        switch ($file) {
            case 'controller':
                echo <<<TXT
                ----------------------
                Creating controller...
                TXT;
                Controller::generate(name: $name);
                break;

            case 'model':
                echo <<<TXT
                -----------------
                Creating model...
                TXT;
                Model::generate(name: $name);
                break;

            case 'middleware':
                echo <<<TXT
                ----------------------
                Creating middleware...
                TXT;
                Middleware::generate(name: $name);
                break;

            case 'route':
                echo <<<TXT
                -----------------
                Creating route...
                TXT;
                Route::generate(name: $name);
                break;

            default:
                echo <<<TXT
                |----------------------------------------------------------
                | Undefined file type: $file
                |------------------->
                | eiko create <controller, middleware, model, route> <name>
                |----------------------------------------------------------
                TXT;
                exit(1);
        }
    }
}

<?php declare(strict_types=1);
namespace Eiko\Cli\Generators;

final class Controller extends __Main
{
    private function __construct() {}
    private function __clone() {}

    public static function generate(string $name): void
    {
        $content = <<<PHP
        <?php declare(strict_types=1);
        namespace Modules\Controllers;

        final class $name
        {
            private function __construct() {}
            private function __clone() {}

            public static function index(): void {}
            public static function create(): void {}
            public static function update(): void {}
            public static function delete(): void {}
        }

        PHP;

        if (!self::fileExists(
            dir: './src/modules/Controllers/',
            file: "./src/modules/Controllers/$name.php"
        )) exit(1);

        \file_put_contents("./src/modules/Controllers/{$name}.php", $content);
        echo
        '----------------------------------------------------------------------' . \PHP_EOL .
        "Controller [$name] created in [./src/modules/Controllers/{$name}.php]!" . \PHP_EOL .
        '----------------------------------------------------------------------' .\PHP_EOL;
    }
}

<?php declare(strict_types=1);
namespace Eiko\Cli\Generators;

final class Controller
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

            public static function store(): void {}
            public static function update(): void {}
            public static function destroy(): void {}
        }

        PHP;

        \file_put_contents("./src/modules/Controllers/{$name}.php", $content);
        echo
        '----------------------------------------------------------------------' . \PHP_EOL .
        "Controller [$name] created in [./src/modules/Controllers/{$name}.php]!" . \PHP_EOL .
        '----------------------------------------------------------------------' .\PHP_EOL;
    }
}

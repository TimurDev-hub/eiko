<?php declare(strict_types=1);
namespace Eiko\Cli\Generators;

final class Middleware extends __Main
{
    private function __construct() {}
    private function __clone() {}

    public static function generate(string $name): void
    {
        $content = <<<PHP
        <?php declare(strict_types=1);
        namespace Modules\Middleware;

        final class $name
        {
            private function __construct() {}
            private function __clone() {}

            public static function validate(): void {}
        }

        PHP;

        if (!self::fileExists(
            dir: './src/modules/Middleware/',
            file: "./src/modules/Middleware/$name.php"
        )) exit(1);

        \file_put_contents("./src/modules/Middleware/{$name}.php", $content);
        echo
        '--------------------------------------------------------------------' . \PHP_EOL .
        "Middleware [$name] created in [./src/modules/Middleware/{$name}.php]!" . \PHP_EOL .
        '--------------------------------------------------------------------' .\PHP_EOL;
    }
}

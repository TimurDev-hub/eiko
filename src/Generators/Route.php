<?php declare(strict_types=1);
namespace Eiko\Cli\Generators;

final class Route extends __Main
{
    private function __construct() {}
    private function __clone() {}

    public static function generate(string $name): void
    {
        $content = <<<PHP
        <?php declare(strict_types=1);
        namespace Core\Routes;

        final class $name
        {
            private function __construct() {}
            private function __clone() {}

            public static function defineRoutes(): void {}
        }

        PHP;

        if (!self::filesExists(
            dir: './src/core/Routes/',
            file: "./src/core/Routes/$name.php"
        )) exit(1);

        \file_put_contents("./src/core/Routes/{$name}.php", $content);

        echo <<<TXT
        ---------------------------------------------------------
        Route [$name] created in [./src/core/Routes/{$name}.php]!
        ---------------------------------------------------------
        TXT . \PHP_EOL;
    }
}

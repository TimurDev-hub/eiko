<?php declare(strict_types=1);
namespace Eiko\Cli\Generators;

final class Model extends __Main
{
    private function __construct() {}
    private function __clone() {}

    public static function generate(string $name): void
    {
        $content = <<<PHP
        <?php declare(strict_types=1);
        namespace Modules\Models;

        final class $name
        {
            private function __construct() {}
            private function __clone() {}

            public static function get(): void {}
            public static function create(): void {}
            public static function update(): void {}
            public static function delete(): void {}
        }

        PHP;

        if (!self::filesExists(
            dir: './src/modules/Models/',
            file: "./src/modules/Models/$name.php"
        )) exit(1);

        \file_put_contents("./src/modules/Models/{$name}.php", $content);

        echo <<<TXT
        ------------------------------------------------------------
        Model [$name] created in [./src/modules/Models/{$name}.php]!
        ------------------------------------------------------------
        TXT . \PHP_EOL;
    }
}

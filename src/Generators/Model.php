<?php declare(strict_types=1);
namespace Eiko\Cli\Generators;

final class Model
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

            public static function create(): void {}
            public static function update(): void {}
            public static function delete(): void {}
        }

        PHP;

        \file_put_contents("./src/modules/Models/{$name}.php", $content);
        echo
        '------------------------------------------------------------' . \PHP_EOL .
        "Model [$name] created in [./src/modules/Models/{$name}.php]!" . \PHP_EOL .
        '------------------------------------------------------------' .\PHP_EOL;
    }
}

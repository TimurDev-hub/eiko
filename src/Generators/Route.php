<?php declare(strict_types=1);
namespace Eiko\Cli\Generators;

final class Route
{
    private function __construct() {}
    private function __clone() {}

    public static function generate(string $name): void
    {
        $content = <<<PHP
        <?php declare(strict_types=1);
        namespace Core\Routes;

        use Leaf\App;

        final class $name
        {
            private function __construct() {}
            private function __clone() {}

            public static function defineRoutes(App \$app): void
            {
                \$app->group(path: '/path', handler: function () use (\$app): void {

                    \$app->get(pattern: '/get', handler: function (): void {
                        /** */
                    });

                    \$app->post(pattern: '/create', handler: function (): void {
                        /** */
                    });

                    \$app->put(pattern: '/update', handler: function (): void {
                        /** */
                    });

                    \$app->delete(pattern: '/delete', handler: function (): void {
                        /** */
                    });
                });
            }
        }

        PHP;

        if (!\file_exists('./src/core/Routes')) {
            echo
            '-----------------------------------------------' . \PHP_EOL .
            'WARNING: dir [./src/core/Routes] not exists!' . \PHP_EOL .
            '-----------------------------------------------' .\PHP_EOL;
            exit(1);
        }

        \file_put_contents("./src/core/Routes/{$name}.php", $content);
        echo
        '---------------------------------------------------------' . \PHP_EOL .
        "Route [$name] created in [./src/core/Routes/{$name}.php]!" . \PHP_EOL .
        '---------------------------------------------------------' .\PHP_EOL;
    }
}

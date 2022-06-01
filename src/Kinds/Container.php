<?php
namespace App\Kinds;

use App\Kinds\Container\Game;
use ReflectionClass;
use ReflectionParameter;
use RuntimeException;

class Container
{
    protected array $providers = [];
    protected array $actions = [];

    public function __construct()
    {
        $this->providers = [
            Game::class => new Container\Game(),
        ];
    }

    private static ?Container $instance = null;

    public static function getInstance(): Container
    {
        if (self::$instance === null) {
            self::$instance = new Container();
        }

        return  self::$instance;
    }

    public function addActions(string $name, object|callable $value): void
    {
        $this->actions[$name] = $value;
    }

    /**
     * @throws \Exception
     */
    public function runAction(string $name): mixed
    {
        if (! isset($this->actions[$name])) {
            throw new RuntimeException("Action {$name} not found");
        }

        return $this->call($this->actions[$name]);
    }

    /**
     * @throws \ReflectionException
     */
    protected function call(object|callable $action): mixed
    {
        $reflector = new ReflectionClass($action);

        if ($reflector->hasMethod('__invoke')) {
            $method = $reflector->getMethod('__invoke');

            $parameters = collect($method->getParameters())
                ->map(fn (ReflectionParameter $parameter) => $this->resolve($parameter->getType()?->getName()))
                ->toArray();

            return $action(...$parameters);
        }

        return null;
    }

    protected function resolve(string $className): mixed
    {
        if (array_key_exists($className, $this->providers)) {
            return $this->providers[$className];
        }

        if (class_exists($className)) {
            return new $className();
        }

        return null;
    }
}

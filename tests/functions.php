<?php

/**
 * Make a class with the provided parameters.
 *
 * @param string $class
 * @param array  $attributes
 * @param int    $count
 *
 * @return Model
 */
function make($class, array $attributes = [], $count = null)
{
    return factory($class, $count)->make($attributes);
}

/**
 * Get the array of the provided model's attributes.
 *
 * @param string $class
 * @param array $attributes
 * @param int $count
 *
 * @return array
 */
function raw($class, array $attributes = [], $count = null)
{
    return factory($class, $count)->raw($attributes);
}

/**
 * Create a class with the provided params.
 *
 * @param string $class
 * @param array  $attributes
 * @param null   $count
 *
 * @return \Illuminate\Database\Eloquent\Collection|Model
 */
function create($class, array $attributes = [], $count = null)
{
    return factory($class, $count)->create($attributes);
}

/**
 * Improved dump and die.
 *
 * Able to truncate long strings to the specified length,
 * or limit the number of items that get displayed past
 * the first nesting level.
 *
 * @param mixed $variable
 * @param int $depth
 * @param int $stringLength
 *
 * @return void
 */
function ddd($variable, $depth = -1, $stringLength = 100)
{
    $cloner = new \Symfony\Component\VarDumper\Cloner\VarCloner();
    $cloner->setMaxString($stringLength);

    $dumper = 'cli' === PHP_SAPI
        ? new \Symfony\Component\VarDumper\Dumper\CliDumper()
        : new \Illuminate\Support\Debug\HtmlDumper();

    $dumper->dump($cloner->cloneVar($variable)->withMaxDepth($depth));

    die(1);
}

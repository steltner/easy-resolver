<?php declare(strict_types=1);

namespace Easy;

use InvalidArgumentException;

use function array_map;
use function is_object;

class Resolver
{
    public function resolveList(array $items): array
    {
        return array_map([$this, 'resolve'], $items);
    }

    /**
     * @param string|object $item
     * @return object
     * @throws InvalidArgumentException
     */
    public function resolve($item)
    {
        if (is_object($item)) {
            return $item;
        } elseif (class_exists($item)) {
            return new $item();
        } else {
            throw new InvalidArgumentException();
        }
    }
}

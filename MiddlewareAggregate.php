<?php

namespace Symfony\Component\Messenger;

/**
 * Class MiddlewareAggregate
 * @package Symfony\Component\Messenger
 */
class MiddlewareAggregate implements \IteratorAggregate {
    private $middlewareHandlers;
    private $cachedIterator;

    /**
     * constructor.
     * @param \Traversable|iterable $middlewareHandlers
     */
    public function __construct(\Traversable $middlewareHandlers)
    {
        $this->middlewareHandlers = $middlewareHandlers;
    }

    /**
     * @return \ArrayObject
     */
    public function getIterator()
    {
        if (null === $this->cachedIterator) {
            $this->cachedIterator = new \ArrayObject(iterator_to_array($this->middlewareHandlers, false));
        }

        return $this->cachedIterator;
    }
};
<?php

namespace DroxyDemo;

class AssertionExtension extends \Twig_Extension
{
    /**
     * Simple data loader implementation.
     */
    public function getLoader()
    {
        // anonymous class (require php >= 7.0)
        return new class() {
            // load will return data passed to node
            public function load($metaType, $parameters = [])
            {
                return [
                    'metaType' => $metaType,
                    'parameters' => $parameters,
                ];
            }
        };
    }
    /**
     * Register token parser
     *
     * @return array
     */
    public function getTokenParsers()
    {
        return [new AssertionTokenParser()];
    }
    /**
     * @return string
     */
    public function getName()
    {
        return self::class;
    }
}
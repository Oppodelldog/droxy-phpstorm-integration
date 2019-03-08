<?php

namespace DroxyDemo;


use Twig\Extension\AbstractExtension;
use Twig_Function;

class TwigExtension extends AbstractExtension
{
    /**
     * @return array|Twig_Function[]
     */
    public function getFunctions()
    {
        return [
            new \Twig\TwigFunction('lipsum', array($this, 'generate_lipsum')),
        ];
    }

    public function generate_lipsum(): string
    {
        return "JUHU";
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: nils
 * Date: 08.03.19
 * Time: 00:12
 */

namespace DroxyDemo;


class ViewModel
{

    private $text="View Model Field Text";

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

}
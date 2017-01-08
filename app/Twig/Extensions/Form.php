<?php

namespace App\Twig\Extensions;


use Twig_Extension;
use Twig_SimpleFunction;

class Form extends Twig_Extension
{
    public function getName(): string
    {
        return 'Twig_Extensions_Form';
    }

    public function getFunctions(): array
    {
        return [
            new Twig_SimpleFunction('form', 'form', [
                'is_safe' => [
                    'html',
                ],
            ]),
        ];
    }
}
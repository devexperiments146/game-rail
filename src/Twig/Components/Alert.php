<?php

// src/Twig/Components/Alert.php
namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(template: 'my/custom/template.html.twig')]
class Alert
{
    public string $message;
    public string $type = 'success';
}

?>
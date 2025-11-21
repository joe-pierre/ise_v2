<?php

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
final class ApplicationFile
{
    public bool $bachelor = false;
    public bool $master = false;
}

<?php

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
final class RegistrationProcess
{
    public bool $foreignStudent = false;
    public bool $formerStudent = false;

    public function getStudentLabel()
    {
        return match (true) {
            $this->foreignStudent => "étudiants de nationalité étrangère",
            $this->formerStudent => "anciens étudiants de l'UCAD",
            default => "Étudiant",
        };
    }
}

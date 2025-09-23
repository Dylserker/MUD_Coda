<?php

namespace App\Map\Tutorial;

use Jugid\Staurie\Component\Map\Blueprint;
use Jugid\Staurie\Game\Position\Position;
use App\Npc\Tutorial\Julien_Gi;
use App\Monster\Tutorial\Green_Piou;

class Tuto extends Blueprint
{
    private Position $position;

    public function __construct()
    {
        $this->position = new Position(0, 0);
    }

    public function name(): string
    {
        return 'Tutoriel d\'Incarnam';
    }

    public function description(): string
    {
        return 'Une petite île dans le ciel pour apprendre les bases.';
    }

    public function position(): Position
    {
        return $this->position;
    }

    public function npcs(): array
    {
        return [new Julien_Gi()];
    }

    public function items(): array
    {
        return [];
    }

    public function monsters(): array
    {
        return [new Green_Piou()];
    }
}
<?php

namespace App\Map\Incarnam;

use Jugid\Staurie\Component\Map\Blueprint;
use Jugid\Staurie\Game\Position\Position;
use App\Monster\Tutorial\Green_Piou;
use App\Monster\Tutorial\Red_Piou;

class Piou_Field extends Blueprint
{
    private Position $position;

    public function __construct()
    {
        $this->position = new Position(0, 0);
    }

    public function name(): string { return 'Incarnam - Champ des Piou'; }
    public function description(): string { return 'Un champ où gambadent les Piou.'; }
    public function position(): Position { return $this->position; }

    public function npcs(): array { return []; }
    public function items(): array { return []; }
    public function monsters(): array { return [new Green_Piou(), new Red_Piou()]; }
}

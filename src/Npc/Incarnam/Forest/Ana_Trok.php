<?php

namespace App\Npc\Incarnam\Forest;

use Jugid\Staurie\Game\Npc;

class Ana_Trok extends Npc {
    public function name() : string { return 'Ana Trok'; }
    public function description() : string { return 'Gardienne des sentiers de la forêt.'; }
    public function speak() : string|array {
        return [
            'La forêt protège ceux qui la respectent.',
            'Observe les préspics, ils surprennent par l\'ombre.'
        ];
    }
}
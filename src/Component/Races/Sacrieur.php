<?php

namespace App\Component\Races;

use Jugid\Staurie\Component\Race\AbstractRace;

class Sacrieur extends AbstractRace {
    public function name() : string { return 'Sacrieur'; }
    public function description() : string { return 'Guerrier du sacrifice: robuste et tenace.'; }
    public function statistics() : array { return ['defense'=>2, 'ability'=>1]; }
}

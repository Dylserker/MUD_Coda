<?php

namespace App\Component\Races;

use Jugid\Staurie\Component\Race\AbstractRace;

class Feca extends AbstractRace {
    public function name() : string { return 'Feca'; }
    public function description() : string { return 'Protecteur aux boucliers magiques.'; }
    public function statistics() : array { return ['defense'=>3]; }
}

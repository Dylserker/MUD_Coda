<?php

namespace App\Component\Races;

use App\Staurie\Component\Race\AbstractRace;

class Eniripsa extends AbstractRace {
    public function name() : string { return 'Eniripsa'; }
    public function description() : string { return 'Maître du soin: sage et empathique.'; }
    public function statistics() : array { return ['wisdom'=>2, 'chance'=>1]; }
}

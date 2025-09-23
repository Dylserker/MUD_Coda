<?php

namespace App\Npc\Incarnam\Graveyard;

use Jugid\Staurie\Game\Npc;

class Master_Donge extends Npc {
    public function name() : string { return 'Master Donge'; }
    public function description() : string { return 'Maître du cimetière, gardien des âmes.'; }
    public function speak() : string|array {
        return [
            'Les chafers ne dorment jamais.',
            'Si tu persistes, le courage te guidera.'
        ];
    }
}
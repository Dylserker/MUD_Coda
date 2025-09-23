<?php

namespace App\Npc\Incarnam\Field;

use Jugid\Staurie\Game\Npc;

class Tripin extends Npc {
    public function name() : string { return 'Tripin'; }
    public function description() : string { return 'Un paysan amical des champs d\'Incarnam.'; }
    public function speak() : string|array {
        return [
            'Bonjour voyageur ! Les champs sont calmes aujourd\'hui.',
            'Méfie-toi toutefois des tofu et tournesols sauvages.'
        ];
    }
}
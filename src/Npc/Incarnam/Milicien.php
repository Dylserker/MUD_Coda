<?php

namespace App\Npc\Incarnam;

use App\Staurie\Game\Npc;

class Milicien extends Npc {
    public function name(): string {
        return 'Milicien';
    }
    public function description(): string {
        return "Un soldat vigilant, garant de la sécurité d'Incarnam.";
    }
    public function speak(string $classe = null): string {
        return "Halte ! Je suis Milicien, surveillant de ces terres.";
    }
}

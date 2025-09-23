<?php

namespace App\Npc\Incarnam;

use Jugid\Staurie\Game\Npc;

class Marylork extends Npc {
    public function name(): string {
        return 'Marylork';
    }
    public function description(): string {
        return "Une aventurière pleine de sagesse et de mystère.";
    }
    public function speak(string $classe = null): string {
        return "Bonjour, je suis Marylork. Que cherches-tu dans ce monde?";
    }
}

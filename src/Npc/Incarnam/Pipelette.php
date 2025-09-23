<?php

namespace App\Npc\Incarnam;

use Jugid\Staurie\Game\Npc;

class Pipelette extends Npc {
    public function name(): string {
        return 'Pipelette';
    }
    public function description(): string {
        return "Toujours prête à discuter, elle connaît tous les ragots.";
    }
    public function speak(string $classe = null): string {
        return "Coucou, je suis Pipelette ! Tu veux entendre une histoire?";
    }
}

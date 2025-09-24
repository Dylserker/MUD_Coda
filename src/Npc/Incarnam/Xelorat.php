<?php

namespace App\Npc\Incarnam;

use App\Staurie\Game\Npc;

class Xelorat extends Npc {
    public function name(): string {
        return 'Xelorat';
    }
    public function description(): string {
        return "Un manipulateur du temps, mystérieux et distant.";
    }
    public function speak(string $classe = null): string {
        return "Je suis Xelorat, gardien du temps. Attention à tes choix.";
    }
}

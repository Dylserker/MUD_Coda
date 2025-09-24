<?php

namespace App\Npc\Incarnam;

use App\Staurie\Game\Npc;

class Grobid extends Npc {
    public function name(): string {
        return 'Grobid';
    }
    public function description(): string {
        return "Un guerrier imposant, protecteur des faibles.";
    }
    public function speak(string $classe = null): string {
        return "Je suis Grobid, défenseur d'Incarnam. Besoin d'aide?";
    }
}

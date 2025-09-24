<?php

namespace App\Npc\Incarnam;

use App\Staurie\Game\Npc;

class Klasmor extends Npc {
    public function name(): string {
        return 'Klasmor';
    }
    public function description(): string {
        return "Un mage énigmatique, gardien des secrets d'Incarnam.";
    }
    public function speak(string $classe = null): string {
        return "Je suis Klasmor, maître des arcanes. Que veux-tu savoir?";
    }
}

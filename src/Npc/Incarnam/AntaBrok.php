<?php

namespace App\Npc\Incarnam;

use Jugid\Staurie\Game\Npc;

class AntaBrok extends Npc {
    public function name(): string {
        return 'AntaBrok';
    }
    public function description(): string {
        return "Un marchand rusé, toujours prêt à négocier.";
    }
    public function speak(string $classe = null): string {
        return "Salut, je suis AntaBrok. Tu veux faire affaire?";
    }
}

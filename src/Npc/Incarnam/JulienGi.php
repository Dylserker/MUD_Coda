<?php

namespace App\Npc\Incarnam;

use App\Staurie\Game\Npc;

class JulienGi extends Npc {
    public function speak(string $classe = null): string {
        return $this->getDialogue($classe);
    }
    public function name(): string {
        return 'JulienGi';
    }
    public function description(): string {
        return "Un instructeur sympathique prêt à t'aider et à te glisser quelques secrets d'Incarnam.";
    }
    protected \App\Staurie\Container $container;

    public function getDialogue(string $classe = null): string {
        $dialogue = "Bienvenue à Incarnam ! Je suis Julien, ton instructeur.\n\nSi tu veux progresser, retiens ceci :\n- Explore chaque recoin, parle aux PNJ, fouille les coffres.\n- N'hésite pas à tester toutes les commandes, même les plus farfelues !\n- Et surtout, amuse-toi, c'est le plus important.\n\nSi tu as besoin d'aide, tape 'aide' ou demande-moi directement.";
        if ($classe === 'Sacrieur') {
            $dialogue .= "\n\n(Easter Egg) Julien te lance un clin d'œil : 'Sacrieur... Tu sais, j'ai longtemps saigné sur ces terres. Les vrais savent !'";
        }
        return $dialogue;
    }
}

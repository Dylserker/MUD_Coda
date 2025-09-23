<?php

namespace App\Npc\Tutorial;

use Jugid\Staurie\Game\Npc;

class Julien_Gi extends Npc {

    public function name() : string {
        return 'Julien Gi';
    }

    public function description() : string {
        return 'Un mentor d\'Incarnam qui donne des conseils aux nouveaux.';
    }

    public function speak() : string|array {
        if($this->playerHasItem('Sword')) {
            return [
                'Oh ! Une épée ? N\'oublie pas de vérifier tes statistiques (commande: stats).',
                'Explore la carte avec la boussole et affronte quelques piou pour gagner de l\'expérience.'
            ];
        }
        return [
            'Bienvenue ! Utilise les flèches (ou commandes) pour te déplacer.',
            'Parle aux habitants et découvre les monstres autour de toi.'
        ];
    }
}
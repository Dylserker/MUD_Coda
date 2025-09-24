<?php

namespace App\Component\ConsoleFr\Functions;

use App\Staurie\Component\Console\AbstractConsoleFunction;

class AideFunction extends AbstractConsoleFunction {
    public function action(array $args) : void { echo "Commandes FR: voir, boussole, carte, aller <dir>, moi, parler <PNJ>, inventaire (voir|taille), prendre <item>, poser <item>, argent, sauver, charger, quitter\n"; }
    public function name() : string { return 'aide'; }
    public function description() : string { return 'Afficher l\'aide des commandes françaises'; }
    public function getArgs() : int|array { return 0; }
}

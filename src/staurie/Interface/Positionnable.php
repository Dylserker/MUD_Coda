<?php

namespace App\Staurie\Interface;

use App\Staurie\Game\Position\Position;

interface Positionnable {
    public function position() : Position;
}
<?php
namespace App\Component;

interface StatsInterface
{
    public function getChance(): int;
    public function getForce(): int;
    public function getSagesse(): int;
    public function getResistance(): int;
    public function getSoin(): int;
    public function getSante(): int;
}

interface LevelInterface
{
    public function getLevel(): int;
    public function getXp(): int;
    public function addXp(int $amount): void;
    public function xpToNextLevel(): int;
}

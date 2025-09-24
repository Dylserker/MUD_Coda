<?php
namespace MUD_Coda\Component;

class LevelSystem
{
    public int $level;
    public int $xp;

    public function __construct(int $level = 1, int $xp = 0)
    {
        $this->level = $level;
        $this->xp = $xp;
    }

    public function addXp(int $amount): void
    {
        $this->xp += $amount;
        while ($this->xp >= $this->xpToNextLevel()) {
            $this->xp -= $this->xpToNextLevel();
            $this->level++;
        }
    }

    public function xpToNextLevel(): int
    {
        // LV1 = 10xp, LV2 = 20xp, LV3 = 40xp, etc. (double à chaque fois)
        return 10 * (2 ** ($this->level - 1));
    }
}

<?php
declare(strict_types=1);

namespace Day\Five;

use JsonSerializable;

class BoardingPass implements JsonSerializable
{
    public int $row;
    public int $column;
    public int $seat;

    public function __construct(string $bspId)
    {
        $this->seat = bindec(
            strtr($bspId, ['F' => '0', 'B' => 1, 'L' => '0', 'R' => 1])
        );
        $this->row = $this->seat >> 3;
        $this->column = $this->seat - ($this->row << 3);
    }

    /**
     * @return array<string, int>
     */
    public function jsonSerialize(): array
    {
        return [
            'row' => $this->row,
            'column' => $this->column,
            'seat' => $this->seat,
        ];
    }
}

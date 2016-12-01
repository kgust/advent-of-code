<?php

namespace Day1;

class Puzzle1
{
    // Where we are facing
    const DIRECTION_FACING_NORTH = 'north';
    const DIRECTION_FACING_EAST = 'east';
    const DIRECTION_FACING_SOUTH = 'south';
    const DIRECTION_FACING_WEST = 'west';

    // Parsing instructions
    const TURN_DIRECTION_RIGHT = 'right';
    const TURN_DIRECTION_LEFT = 'left';

    private $x = 0;
    private $y = 0;
    private $directionFacing = self::DIRECTION_FACING_NORTH;

    /**
     * @param string $instructions
     *
     * @return int
     */
    public function __invoke($instructions)
    {
        return $this->parse($instructions);
    }

    /**
     * @param string $instructions
     *
     * @return int $answer
     */
    public function parse($instructions)
    {
        $this->resetCoordinates();

        $instructions = explode(',', str_replace(', ', ',', $instructions));

        foreach ($instructions as $instruction) {
            // Convert the instruction to turn direction, and walking distance
            // R3 - RIGHT, WALK THREE
            $instruction = $this->parseInstruction($instruction); // ['turnDirection' => const::TURN_DIRECTION_RIGHT, 'walkDistance' => 3]
            $this->turn($instruction['turnDirection']);
            $this->walk($instruction['walkDistance']);
        }

        return abs($this->x) + abs($this->y);
    }

    /**
     * @param $instruction
     * @return array
     */
    public function parseInstruction($instruction)
    {
        preg_match(
            '/(?<turnDirection>[A-Z])(?<walkDistance>[0-9]{1,3})/',
            strtoupper($instruction),
            $matches
        );

        $matches = array_intersect_key(
            $matches,
            array_flip(
                [
                    'turnDirection',
                    'walkDistance'
                ]
            )
        );

        $matches['turnDirection'] = $this->convertTurnDirectionToConst($matches['turnDirection']);
        $matches['walkDistance'] = (int) $matches['walkDistance'];

        return $matches;
    }

    /**
     * @param $turnDirection
     * @return string
     * @throws \Exception
     */
    private function convertTurnDirectionToConst($turnDirection)
    {
        switch ($turnDirection) {
            case 'R':
                return self::TURN_DIRECTION_RIGHT;
            case 'L':
                return self::TURN_DIRECTION_LEFT;
            default:
                throw new \Exception('That was totally invalid, what the heck!');
        }
    }

    /**
     * @param string $direction
     * @return $this
     */
    public function face($direction = self::DIRECTION_FACING_NORTH)
    {
        $this->directionFacing = $direction;

        return $this;
    }

    /**
     * @return string
     */
    public function facing()
    {
        return $this->directionFacing;
    }

    // If we're facing north, and we turn right, we should face east
    /**
     * @param $turnDirection
     * @return $this
     * @throws \Exception
     */
    public function turn($turnDirection)
    {
        $facing = $this->facing(); // NORTH

        $directionMapRight = [
            self::DIRECTION_FACING_NORTH => self::DIRECTION_FACING_EAST,
            self::DIRECTION_FACING_EAST => self::DIRECTION_FACING_SOUTH,
            self::DIRECTION_FACING_SOUTH => self::DIRECTION_FACING_WEST,
            self::DIRECTION_FACING_WEST => self::DIRECTION_FACING_NORTH,
        ];

        $directionMapLeft = [
            self::DIRECTION_FACING_NORTH => self::DIRECTION_FACING_WEST,
            self::DIRECTION_FACING_EAST => self::DIRECTION_FACING_NORTH,
            self::DIRECTION_FACING_SOUTH => self::DIRECTION_FACING_EAST,
            self::DIRECTION_FACING_WEST => self::DIRECTION_FACING_SOUTH,
        ];

        switch ($turnDirection) {
            case self::TURN_DIRECTION_LEFT:
                $this->face($directionMapLeft[$facing]);
                break;
            case self::TURN_DIRECTION_RIGHT:
                $this->face($directionMapRight[$facing]);
                break;
            default:
                throw new \Exception('Invalid turn direction, what are you playing at? == ' . $turnDirection);
        }

        return $this;
    }

    /**
     * @param int $walkDistance
     * @throws \Exception
     *
     * @return $this
     */
    protected function walk($walkDistance)
    {
        // $this->x = horizontal - facing west (decrement)/east (increment)
        // $this->y = vertical - facing north (increment)/south (decrement)

        switch ($this->facing()) {
            case self::DIRECTION_FACING_NORTH:
                $this->y += $walkDistance;
                break;
            case self::DIRECTION_FACING_SOUTH:
                $this->y -= $walkDistance;
                break;
            case self::DIRECTION_FACING_EAST:
                $this->x += $walkDistance;
                break;
            case self::DIRECTION_FACING_WEST:
                $this->x -= $walkDistance;
                break;
            default:
                throw new \Exception('Facing in a weird way: ' . $this->facing());
        }

        return $this;
    }

    public function resetCoordinates()
    {
        $this->x = 0;
        $this->y = 0;

        return $this;
    }
    /**
     * @return int
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY()
    {
        return $this->y;
    }
}

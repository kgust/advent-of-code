<?php

namespace Day8;

class Screen
{
    /**
     * @var int
     */
    public $wide = 0;

    /**
     * @var int
     */
    public $tall = 0;

    /**
     * @var array
     */
    private $screen = [];

    public function __construct($wide=0, $tall=0)
    {
        $this->wide = $wide;
        $this->tall = $tall;
        $this->clear();
    }

    public function __toString()
    {
        return implode("\n", $this->screen)."\n";
    }

    private function clear()
    {
        for ($a=0; $a<$this->tall; $a++) {
            $this->screen[$a] = '';
            for ($b=0; $b<$this->wide; $b++) {
                $this->screen[$a] .= '.';
            }
        }
    }

    public function rect($wide, $tall)
    {
        for ($a=0; $a<$tall; $a++) {
            for ($b=0; $b<$wide; $b++) {
                $this->screen[$a][$b] = '#';
            }
        }
        return $this;
    }

    public function rotate($type, $index, $value)
    {
        if (method_exists($this, 'rotate'.$type)) {
            $this->{'rotate'.$type}($index, $value);
        }
        return $this;
    }

    public function rotateColumn($index, $value)
    {
        if ($value > 1) {
            for ($a=0; $a<$value; $a++) {
                $this->rotateColumn($index, 1);
            }
            return;
        }

        $length = count($this->screen);

        $last = $this->screen[$length-1][$index];

        for ($a=$length-1; $a>0; $a--) {
            $this->screen[$a][$index] = $this->screen[$a-1][$index];
        }

        $this->screen[0][$index] = $last;
    }

    public function rotateRow($index, $value)
    {
        $length = strlen($this->screen[$index]);
        if ($value > $length) {
            for ($a=0; $a<$value; $a++) {
                $this->rotateRow($index, 1);
            }
            return;
        }

        $sub = substr($this->screen[$index], 0-$value, $value);
        $this->screen[$index] = $sub . substr($this->screen[$index], 0, $length-$value);
    }

    public function countLitPixels()
    {
        $litPixels = 0;
        foreach ($this->screen as $line) {
            $litPixels += preg_match_all('/#/', $line);
        }

        return $litPixels;
    }

    public function getScreen()
    {
        return $this->screen;
    }
}

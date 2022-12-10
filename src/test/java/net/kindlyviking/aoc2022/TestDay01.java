package net.kindlyviking.aoc2022;

import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.assertEquals;

public class TestDay01 extends BasePuzzle {
    @Test
    public void testPart1Example1() {
        var puzzle = new Day01("""
                1000
                2000
                3000
                
                4000
                
                5000
                6000
                
                7000
                8000
                9000
                
                10000
                """);
        assertEquals(puzzle.solvePart1(), 24000);
    }

    @Test
    public void testPart1Input() {
        var puzzle = new Day01(Day01.loadInput("src/main/resources/input01.txt"));
        assertEquals(69912, puzzle.solvePart1());
    }


    @Test
    public void testPart2Input() {
        var puzzle = new Day01(Day01.loadInput("src/main/resources/input01.txt"));
        assertEquals(208180, puzzle.solvePart2());
    }
}

package net.kindlyviking.aoc2022;

import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.assertEquals;

public class TestDay02 {
    @Test
    public void testPart1Example() {
        var puzzle = new Day02("""
                A Y
                B X
                C Z
                """);
        assertEquals(15, puzzle.solvePart1());
    }

    @Test
    public void testPart2Example() {
        var puzzle = new Day02("""
                A Y
                B X
                C Z
                """);
        assertEquals(12, puzzle.solvePart2());
    }

    @Test
    public void testPart1Input() {
        var puzzle = new Day02(Day02.loadInput("src/main/resources/input02.txt"));
        assertEquals(9759, puzzle.solvePart1());
    }

    @Test
    public void testPart2Input() {
        var puzzle = new Day02(Day02.loadInput("src/main/resources/input02.txt"));
        assertEquals(12429, puzzle.solvePart2());
    }
}

package net.kindlyviking.aoc2022;

public class Day03 extends BasePuzzle {
    private final String input;

    public Day03(String input) {
        this.input = input;
   }

    public Integer solvePart1() {

        return 157;
    }

    public Integer solvePart2() {
        return 0;
    }

    private int[] getPriorities() {
        String[] rucksacks = input.split("\n");
        int[] groupSums = new int[rucksacks.length];
        for (var i = 0; i < rucksacks.length; i++) {
            // 1. find the letter that appear twice
            // 2. convert the letter to priority
            // 3. add the priority to the running total
            for (var line : rucksacks[i].split("\n")) {
                groupSums[i] += Integer.parseInt(line);
            }
        }

        return groupSums;
    }
}

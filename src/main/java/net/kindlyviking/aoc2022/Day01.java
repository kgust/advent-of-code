package net.kindlyviking.aoc2022;

import java.util.Arrays;

public class Day01 extends BasePuzzle {
    private final String input;

    public Day01(String input) {
        this.input = input;
    }

    public Integer solvePart1() {
        int[] groupSums = getGroupSums();

        return Arrays.stream(groupSums).max().orElseThrow();
    }

    public Integer solvePart2() {
        int[] groupSums = getGroupSums();

        int[] sorted = Arrays.stream(groupSums).sorted().toArray();
        int count = sorted.length;

        return sorted[count - 1] + sorted[count - 2] + sorted[count - 3];
    }

    private int[] getGroupSums() {
        String[] groups = input.split("\n\n");
        int[] groupSums = new int[groups.length];
        for (var i = 0; i < groups.length; i++) {
            for (var line : groups[i].split("\n")) {
                groupSums[i] += Integer.parseInt(line);
            }
        }

        return groupSums;
    }
}

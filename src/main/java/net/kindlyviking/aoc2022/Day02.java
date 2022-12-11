package net.kindlyviking.aoc2022;

public class Day02 extends BasePuzzle {
    private final String input;

    public Day02(String input) {
        this.input = input;
    }

    public int solvePart1() {
        String[] rounds = this.input.split("\n");
        int sum = 0;
        for (String round : rounds) {
            sum += round.charAt(2) - 'W';
            sum += this.calculateWinScore(round);
        }

        return sum;
    }

    public int solvePart2() {
        String[] rounds = this.input.split("\n");
        int score = 0;
        for (String round : rounds) {
            var opponent = round.charAt(0) - 'A';
            var outcome = round.charAt(2) - 'X';
            switch (outcome) {
                case 0 -> score += (opponent + 2) % 3 + 1; // Lose
                case 1 -> score += opponent + 4; // Draw
                case 2 -> score += (opponent + 1) % 3 + 7; // Win
            }
        }

        return score;
    }

    private int calculateWinScore(String round) {
        var opponent = round.charAt(0) - 'A';
        var me = round.charAt(2) - 'X';

        if (me == opponent) return 3;
        if ((me + 2) % 3 == opponent) return 6;

        return 0;
    }
}

package net.kindlyviking.aoc2022;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;

public class BasePuzzle {
    public static String loadInput(String filePath) {
        StringBuilder builder = new StringBuilder();

        try (BufferedReader buffer = new BufferedReader(new FileReader(filePath))) {
            String str;

            while ((str = buffer.readLine()) != null) {
                builder.append(str).append("\n");
            }
        } catch (IOException e) {
            e.printStackTrace();
        }

        return builder.toString();
    }
}

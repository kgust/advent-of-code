require 'rotn'

@input = File.open('./day4.txt', "r")
    .readlines.map {|e| e
        .chomp
        .scan(/(^.+)\-(\d+)\[(.+)\]/)
        .flatten
    }
    .map {|e|
        [
            e[0].split('')
                .delete_if{|e| e == '-'}
                .sort_by {|x| [-e[0].count(x), x] }
                .uniq[0..4]
                .join,
            e[1].to_i,
            e[2],
            e[0]
        ]
    }
    .select {|e| e[0] == e[2]}


p @input .map {|e| e[1]} .inject :+
p @input .map {|e| [e[3].rotn_shift({a:e[1] % 26}), e[1]]}.select {|e| e[0].include?("pole")}

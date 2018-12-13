const Parser = require('./Parser');
const PartOne = require('./PartOne');

test('Operation "This will probably all end badly..." is a Go!', () => {
    const parser = new Parser('./Day 12/sample.txt');
    expect(parser.notes[0]).toEqual(['...##', '#']);
    expect(parser.initialState).toEqual('#..#.#..##......###...###');
});

test('Displaying initial value', () => {
    const parser = new Parser('./Day 12/sample.txt');
    let one = new PartOne(parser.initialState, parser.notes);
    expect(one.display().substring(0, 39)).toEqual('...#..#.#..##......###...###...........');
});

test('Plant: What happens in the next generation for one plant?', () => {
    const parser = new Parser('./Day 12/input.txt');
    let one = new PartOne('', parser.notes);
    expect(one.updatePlant('.....')).toEqual('.')
    expect(one.updatePlant('.#.#.')).toEqual('.')
    expect(one.updatePlant('#####')).toEqual('.')
});

test('Next generation of potted plants', () => {
    const parser = new Parser('./Day 12/input.txt');
    const partOne = new PartOne(parser.initialState, parser.notes);
    const output = partOne.updateAllPlants().display();
});

test('Twenty generations with sample data`', () => {
    const parser = new Parser('./Day 12/sample.txt');
    const partOne = new PartOne(parser.initialState, parser.notes);
    expect(partOne.allGenerations()).toEqual(325);
});

test('Twenty generations with input data`', () => {
    const parser = new Parser('./Day 12/input.txt');
    const partOne = new PartOne(parser.initialState, parser.notes);
    expect(partOne.allGenerations()).toEqual(3061);
});

test('50 trillion generations with input data', () => {
    const parser = new Parser('./Day 12/input.txt');
    const two = new PartOne(parser.initialState, parser.notes);

    // 200 14775
    // 201 14856 (+81)
    /*
    50,000,000,000 - 200  (500000 - 200 = 49999800)

    49,999,999,800
    x           81
    --------------
    =
    +        14775
    =
     */
    two.allGenerations(2000);
});
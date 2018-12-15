const { partOne, partTwo } = require('./ChocolateCharts');

test('after _n_ iterations', () => {
    expect(partOne(4)).toEqual('3710');
    expect(partOne(6)).toEqual('371010');
    expect(partOne(7)).toEqual('3710101');
    expect(partOne(8)).toEqual('37101012');
    expect(partOne(9)).toEqual('371010124');
    expect(partOne(10)).toEqual('3710101245');
    expect(partOne(11)).toEqual('37101012451');
    expect(partOne(12)).toEqual('371010124515');
    expect(partOne(13)).toEqual('3710101245158');
    expect(partOne(14)).toEqual('37101012451589');
    expect(partOne(16)).toEqual('3710101245158916');
    expect(partOne(17)).toEqual('37101012451589167');
    expect(partOne(18)).toEqual('371010124515891677');
    expect(partOne(19)).toEqual('3710101245158916779');
    expect(partOne(20)).toEqual('37101012451589167792');
});

test('show 10 after', () => {
    expect(partOne(5)).toEqual('37101');
    expect(partOne(5, true)).toEqual('0124515891');
});

test('solve part one', () => {
    const actual = partOne(327901, true);
    expect(actual).toEqual('1115317115');
});

test('sample appears after', () => {
    expect(partTwo('51589')).toBe(9);
    expect(partTwo('01245')).toBe(5);
    expect(partTwo('92510')).toBe(18);
    expect(partTwo('59414')).toBe(2018);
});

test('puzzle input appears after', () => {
    expect(partTwo('327901')).toBe(201202298228);
});

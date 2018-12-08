
module.exports = data => {
    let results = '';
    while(true) {
        const values = Object.values(data)
            .filter(obj => !Object.keys(obj.belongsTo).length)
            .sort((a, b) => a.id < b.id ? -1 : 1);
        if (!values[0]) break;
        const id = values[0].id;
        results += id;
        delete data[id];
        Object.values(data).forEach(datum => {
            delete datum.belongsTo[id];
        });
    }
    return results;
};

module.exports = (data, workers) => {
    let map = {}
    data.forEach(row => {
        const id = row.split(' ')[1];
        const child = row.split(' ')[7];
        map[id] = map[id] || {id: id, belongsTo: {}, duration: 60 + id.charCodeAt(0) - 64};
        map[child] = map[child] || {id: child, belongsTo: {}, duration: 60 + child.charCodeAt(0) - 64};
        map[child].belongsTo[id] = true;
    });
    let timer = 0;
    let workerStack = Array(workers).fill('');
    while (true) {
        let values = Object.values(map)
            .filter(obj => !Object.keys(obj.belongsTo).length)
            .sort((a, b) => a.id < b.id ? -1 : 1);
        if (!values[0]) break;
        values = values.filter(obj => !workerStack.includes(obj.id));
        let i = -1;
        workerStack = workerStack.map(worker => worker || (values[++i] || {}).id || '');
        workerStack.forEach((worker, index) => {
            if (!map[worker]) return;
            map[worker].duration -= 1;
            if (!map[worker].duration) {
                delete map[worker];
                workerStack[index] = '';
                Object.values(map).forEach(obj => {
                    delete obj.belongsTo[worker];
                });
            }
        });
        timer += 1;
    }
    return timer;
};
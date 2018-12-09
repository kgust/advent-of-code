const repository = Symbol('repository');

class Dict {
    constructor(props) {
        if (typeof props !== 'object') {
            throw new Error(
                `Props must be an object, you passed ${typeof props} ${props}.`
            );
        }
        Object.freeze(props);
        Object.defineProperty(this, repository, { value: props });
        Object.freeze(this);
    }

    merge(props) {
        return new Dict({
            ...this[repository],
            ...props,
        });
    }

    set(key, value) {
        return new Dict({
            ...this[repository],
            [key]: value,
        });
    }

    get(key) {
        return this[repository][key];
    }
}

module.exports = Dict;

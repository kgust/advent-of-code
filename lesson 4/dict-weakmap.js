const weakMap = new WeakMap();

class Dict {
    constructor(props) {
        if (typeof props !== 'object') {
            throw new Error(
                `Props must be an object, you passed ${typeof props} ${props}.`
            );
        }
        weakMap.set(this, props);
        Object.freeze(this);
    }

    set(key, value) {
        return new Dict({
            ...weakMap.get(this),
            [key]: value,
        });
    }

    merge(props) {
        return new Dict({
            ...weakMap.get(this),
            ...props,
        });
    }

    get(key) {
        return weakMap.get(this)[key];
    }
}

module.exports = Dict;

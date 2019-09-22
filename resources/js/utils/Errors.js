class Errors {
    constructor() {
        this.errors = {};
    }

    has(field) {
        if (!this.errors) {
            return false;
        }
        return this.errors.hasOwnProperty(field);
    }

    any() {
        return Object.keys(this.errors).length > 0;
    }

    get(field) {
        if (this.errors[field]) {
            return this.errors[field][0];
        }
    }

    record(response) {
        this.errors = response.errors;
    }

    clear(field) {
        if (field) {
            delete this.errors[field];
            return;
        }
        this.errors = {};
    }

}

export default Errors;
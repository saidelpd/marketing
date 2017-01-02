window.Errors = class Errors {
    constructor() {
        this.errors = {};
    }

    get(field) {
        if (this.errors[field]) {
            return this.errors[field][0];
        }
    }

    any() {
        return Object.keys(this.errors).length > 0;
    }

    record(error) {
        this.errors = error;
    }

    has(field) {
        return this.errors.hasOwnProperty(field);
    }

    clear(field) {
        if (field) {
            delete this.errors[field];
            return;
        }
        this.errors = {};
    }
}

window.Form = class Form {
    constructor(data) {
        this.originalData = data;
        this.is_sending = false;
        this.message = '';
        for (let field in data) {
            this[field] = data[field];
        }
        this.errors = new Errors();
    }

    reset() {
        for (let field in this.originalData) {
            if (field != '_token')
                this[field] = '';
        }
        this.message = '';
        this.errors.clear();
    }

    /**
     *  return the Data for post
     * @returns {void|*}
     */
    data() {
        let data = {};
        for (let property in this.originalData) {
            data[property] = this[property];
        }
        return data;
    }

    /**
     * Trigger when the post was Successful
     */
    onSuccess(data) {
        this.is_sending = false;
        this.reset();
    }

    /**
     * trigger when the form has errors
     * @param data
     */
    onFail(data) {
        this.message = '';
        this.is_sending = false;

        if (data.status == 422) {
            this.errors.record(data.responseJSON);
        }
        else if (data.status == 403) {
            this.message = 'Access Denied';
        }
        else if (data.status == 417) {
            this.message = data.responseJSON.status;
        }
        else {
            this.message = 'An unknown error has occurred please refresh the browser and try again';
        }
    }

    /**
     * Submit the form
     * @param path
     * @param vue
     */
    submit(path) {
        var form = this;
        this.is_sending = true;
        return new Promise(function (resolve, reject) {
            $.post(path, form.data())
                .done(function (data) {
                    form.onSuccess(data);
                    resolve(data);
                })
                .fail(function (data) {
                    form.onFail(data);
                    reject(data);
                });
        });
    }

}

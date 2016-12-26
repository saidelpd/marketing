
class Errors {
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
        if(field)
        {
            delete this.errors[field];
            return;
        }
        this.errors={};
    }
}

class Form {
    constructor(data) {
        this.originalData = data;
        this.has_success = false;
        this.has_error = false;
        this.is_sending = false;
        this.message = '';
        for (let field in data) {
            this[field] = data[field];
        }
        this.errors = new Errors();
    }

    reset() {
        for (let field in this.originalData) {
            if(field!='_token')
            this[field] = '';
        }
    }

    data() {
        let data = Object.assign({}, this);
        delete data.originalData;
        delete data.errors;
        delete data.has_success;
        delete data.is_sending;
        delete data.has_error;
        return data;
    }

    onSuccess() {
        this.has_success = true;
        this.has_error = this.is_sending = false;
        this.errors.clear();
        this.reset();
    }

    onFail(data) {
        this.message = '';
        this.has_error = true;
        this.has_success = this.is_sending = false;
        if(data.status == 500)
        {
            this.message = 'An unknown error has occurred please refresh the browser and try again';
        }
        else if(data.status == 417)
        {
            this.message = 'Error Con Stripe';
        }
        else{
            this.errors.record(data.responseJSON);
        }
    }

    submit(path,vue) {
        let form = this;
        this.is_sending =true;
        $.post(path, form.data())
            .done(function () {
                form.onSuccess();
                vue.callback();
            })
            .fail(function (data) {
                form.onFail(data);
                vue.callback();
            });
    }
}
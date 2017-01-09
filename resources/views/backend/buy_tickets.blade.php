@extends('layouts.app')
@section('content')
    <div id="page-wrapper">
        <div id="buy-tickets">
            @include('backend.includes._title')
            <form class="col-sm-3">
                @include('assets._alert')
                <div class="input-field" :class="{'has-error' : form.errors.has('checkout_quantity')}">
                    <label for="name">Please Select Ticket Quantity <span class="text-danger">*</span></label>
                    <input type="number" min="1" name="checkout_quantity" class="form-control"
                           placeholder="Ticket Quantity..." v-model="form.checkout_quantity">
                    <span class="help-block" v-if="form.errors.has('checkout_quantity')" v-text="form.errors.get('checkout_quantity')"></span>
                </div>
                <div class="row text-center top_20">
                    <button type="submit" @click.prevent="buy()" class="btn btn-primary" :disabled="!isValidCheckOut() || form.is_sending">
                        Buy Tickets
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection



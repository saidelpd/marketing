@extends('layouts.app')
@section('content')
    <div id="page-wrapper">
        @include('backend.includes._title')
        @if(count($payments))
            <div class="row">
                <div class="col-sm-6">
                    {{$payments->links()}}
                </div>
                <div class="col-sm-6">
                    <form class="form-inline">
                        <div class="form-group">
                            <label for="exampleInputName2">Payment ID</label>
                            <input type="text" class="form-control" name="payment_id" placeholder="Payment ID">
                        </div>
                        @if(count($user_list))
                            <div class="form-group">
                                <label for="exampleInputEmail2">Owner</label>
                                <select class="form-control" name="owner">
                                    <option value="0">Select One User</option>
                                    @foreach($user_list as $list)
                                        <option value="{{$list->id}}">{{$list->name}} {{$list->last_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                    </form>
                </div>
            </div>

            <table class="table table-condensed table-bordered table-hover table-striped top_20">
                <tr>
                    <th>Raffle</th>
                    @if($user->isAdmin())
                        <th>Owner</th>
                    @endif
                    <th class="text-center">Payment ID</th>
                    <th class="text-center">Payment Date</th>
                    <th class="text-center">Tickets</th>
                    <th class="text-center">Amount</th>
                    @if($user->isAdmin())
                    <th class="text-center">Fee</th>
                    <th class="text-center">Income</th>
                    <th class="text-center">More Details</th>
                    @endif
                </tr>
                @foreach($payments as $payment)
                    <tr>
                        <td>@if($payment->raffle) {{$payment->raffle->obj_name}} @endif</td>
                        @if($user->isAdmin())
                            <td>@if($payment->user) {{$payment->user->name}} {{$payment->user->last_name}} @endif</td>
                        @endif
                        <td class="text-center">{{$payment->billing_id}}</td>
                        <td class="text-center">{{$payment->created_at->format('m/d/Y h:i:s A')}}</td>
                        <td class="text-center">
                            @if(count($payment->tickets))
                                @foreach($payment->tickets as $ticket)
                                    {{$ticket->ticket_number}} </br>
                                 @endforeach
                            @endif
                        </td>
                        <td class="text-right">{{\App\Http\Helpers\HelperClass::currency($payment->charge_amount)}}</td>
                        @if($user->isAdmin())
                        <td class="text-right">{{\App\Http\Helpers\HelperClass::currency($payment->fee)}}</td>
                        <td class="text-right">{{\App\Http\Helpers\HelperClass::currency($payment->income)}}</td>
                        <td class="text-center"> <a href="/fantasy/payments/{{$payment->billing_id}}"> View</a></td>
                        @endif

                    </tr>
                @endforeach
            </table>
            {{$payments->links()}}
        @else
            <div class="alert alert-info">
                Payments Not Found
            </div>
        @endif
    </div>
@endsection

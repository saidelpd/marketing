@extends('layouts.app')
@section('content')
    <div id="page-wrapper">
        @include('backend.includes._title')
        @if(count($tickets))
            <div class="row">
                <div class="col-sm-6">
                    {{ $tickets->links()}}
                </div>
                <div class="col-sm-6">
                    <form class="form-inline">
                        <div class="form-group">
                            <label for="exampleInputName2">Ticket Number</label>
                            <input type="text" class="form-control" name="ticket_number" placeholder="Ticket Number">
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
                    <th class="text-center">Ticket Number</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Purchase Date</th>
                    <th class="text-center">Price</th>
                    @if($user->isAdmin())
                    <th class="text-center">View Payment</th>
                    @endif
                </tr>
                @foreach($tickets as $ticket)
                    <tr>
                        <td>@if($ticket->raffle) {{$ticket->raffle->obj_name}} @endif</td>
                        @if($user->isAdmin())
                            <td>@if($ticket->user) {{$ticket->user->name}} {{$ticket->user->last_name}} @endif</td>
                        @endif
                        <td class="text-center">{{$ticket->ticket_number}}</td>
                        <td class="text-center">{!! $ticket->getStatusLabel() !!}</td>
                        <td class="text-center">{{$ticket->created_at->format('m/d/Y h:i:s A')}}</td>
                        <td class="text-right">@if($ticket->raffle) {{$ticket->raffle->ticketCostPrice()}} @endif</td>
                        @if($user->isAdmin())
                        <td class="text-center">
                            @if($ticket->payment)
                                <a href="/fantasy/payments/{{$ticket->payment->billing_id}}"> View</a>
                            @endif
                        </td>
                        @endif
                    </tr>
                @endforeach
            </table>
            {{$tickets->links()}}
        @else
            <div class="alert alert-info">
                Tickets Not Found
            </div>
        @endif
    </div>
@endsection

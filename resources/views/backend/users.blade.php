@extends('layouts.app')
@section('content')
    <div id="page-wrapper">
        @include('backend.includes._title')
        @if(count($users))
            <div id="users-view">
             @include('assets._notification_modal')
               <button class="btn btn-primary" @click="openModal('all')"><i class="fa fa-envelope"></i> Send Notification</button>
                <div class="row">
                    <div class="col-sm-6">
                        {{$users->links()}}
                    </div>
                    <div class="col-sm-6">
                        <form class="form-inline">
                            <div class="form-group">
                                <label for="exampleInputName2">First Name</label>
                                <input type="text" class="form-control" name="first_name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName2">Last Name</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                        </form>
                    </div>
                </div>
                <table class="table table-condensed table-bordered table-hover table-striped top_20">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th class="text-center">Tickets</th>
                        <th class="text-center">Payments</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">Address</th>
                        <th class="text-center">Created At</th>
                        <th class="text-center">Contact User</th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                           <td>{{$user->name}} {{$user->last_name}}</td>
                           <td>{{$user->email}}</td>
                           <td class="text-center"><a href="{{URL::route('fantasy.tickets',['owner'=>$user->id])}}">{{$user->tickets->count()}}</a></td>
                           <td class="text-center">
                               <a href="{{URL::route('fantasy.payments',['owner'=>$user->id])}}">
                                   {{\App\Http\Helpers\HelperClass::currency($user->getIncomeAmount())}} ({{$user->payments->count()}})
                               </a>
                           </td>
                           <td class="text-center">{{$user->phone}}</td>
                           <td class="text-center">
                               {{$user->address}}</br>
                               {{$user->city}}, {{$user->state}} {{$user->zip}}</br>
                           </td>
                            <td class="text-center">{{$user->created_at->format('m/d/Y h:i:s A')}}</td>
                            <td class="text-center">
                               <button  class="btn btn-default btn-xs" @click="openModal('{{$user->email}}')">
                                   <i class="fa fa-envelope" > </i>
                               </button>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{ $users->links() }}
            </div>
        @else
            <div class="alert alert-info">
                Users Not Found
            </div>
        @endif
    </div>
@endsection



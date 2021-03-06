@extends('layouts.app')
@section('content')
    <div id="page-wrapper">

        @include('backend.includes._title')

        @if($user->isAdmin())
            @include('backend.includes._admin_boxes')
        @endif

        <div class="row">
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i> Tickets
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12" id="homeGraph">
                                <div class="loading_chart_dashboard" v-show="loading">
                                    <img src="/images/loading.gif" class="img-responsive center-block" style="height: 300px;">
                                </div>
                                <canvas id="chart" height="130px" v-show="!loading"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>

            </div>
            <!-- /.col-lg-8 -->
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-ticket fa-fw"></i> Latest Ticket(s)
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                      @if(count($latest_tickets))
                            <div class="list-group">
                           @foreach($latest_tickets as $ticket)
                                    <a href="#" class="list-group-item">
                                      <strong>Number : </strong> {{ $ticket->ticket_number }} | <strong>Status : </strong> {!! $ticket->getStatusLabel() !!}
                                        <span class="pull-right text-muted small"><em>{{$ticket->created_at->diffForHumans()}}</em>
                                    </span>
                                    </a>
                               @endforeach
                            </div>
                            <a href="#" class="btn btn-default btn-block">View All</a>
                          @else
                          <div class="alert alert-info">
                              Not tickets Found
                          </div>
                       @endif

                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
@endsection

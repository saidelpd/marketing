<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">{{$title}}</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="alert alert-info">
    <div class="row">
        <div class="col-sm-1 text-center">
            <i class="fa fa-exclamation-triangle fa-4x"></i>
        </div>
        <div class="col-sm-11">
            <strong>Active Raffle :</strong> {{$open_raffle->obj_name}}.</br>
            <strong>Tickets Price :</strong> {{$open_raffle->ticketCostPrice()}}.</br>
            <strong>Closing Date :</strong>{{$open_raffle->closing_date->toDayDateTimeString()}} .</br>
        </div>
    </div>
</div>
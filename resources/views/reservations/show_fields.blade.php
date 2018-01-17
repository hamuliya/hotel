<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $reservation->id !!}</p>
</div>

<!-- Roomid Field -->
<div class="form-group">
    {!! Form::label('roomId', 'Roomid:') !!}
    <p>{!! $reservation->roomId !!}</p>
</div>

<!-- Customerid Field -->
<div class="form-group">
    {!! Form::label('customerId', 'Customerid:') !!}
    <p>{!! $reservation->customerId !!}</p>
</div>

<!-- Paid Field -->
<div class="form-group">
    {!! Form::label('Paid', 'Paid:') !!}
    <p>{!! $reservation->paid !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $reservation->status !!}</p>
</div>

<!-- Startdate Field -->
<div class="form-group">
    {!! Form::label('startDate', 'Startdate:') !!}
    <p>{!! $reservation->startDate !!}</p>
</div>

<!-- Enddate Field -->
<div class="form-group">
    {!! Form::label('endDate', 'Enddate:') !!}
    <p>{!! $reservation->endDate !!}</p>
</div>

<!-- Needcarpark Field -->
<div class="form-group">
    {!! Form::label('needCarPark', 'Needcarpark:') !!}
    @if ($reservation->needCarPark==1)
        <p>YES</p>
    @else
        <p>NO</p>
    @endif
</div>

<!-- Payway Field -->
<div class="form-group">
    {!! Form::label('payWay', 'Payway:') !!}
    <p>{!! $reservation->payWay !!}</p>
</div>

<!-- Sum Field -->
<div class="form-group">
    {!! Form::label('sum', 'Sum:') !!}
    <p>{!! $reservation->sum !!}</p>
</div>

<!-- Bookway Field -->
<div class="form-group">
    {!! Form::label('bookWay', 'Bookway:') !!}
    <p>{!! $reservation->bookWay !!}</p>
</div>

<!-- Commend Field -->
<div class="form-group">
    {!! Form::label('Commend', 'Commend:') !!}
    <p>{!! $reservation->Commend !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $reservation->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $reservation->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $reservation->deleted_at !!}</p>
</div>


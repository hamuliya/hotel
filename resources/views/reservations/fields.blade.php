<!-- Roomid Field -->
<div class="form-group col-sm-6"><i class="require">*</i>
    {!! Form::label('roomId', 'Roomid:') !!}
    {!! Form::select('roomId', array($roomsNameArray), null, ['class' => 'form-control']) !!}
</div>

<!-- Customerid Field -->
<div class="form-group col-sm-6"><i class="require">*</i>
    {!! Form::label('customerId', 'Customerid:') !!}
    {!! Form::select('customerId', array($customersNameArray), null, ['class' => 'form-control']) !!}
</div>



<!-- Paid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Paid', 'Paid:') !!}
    {!! Form::text('Paid', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Startdate Field -->
<div class="form-group col-sm-6"><i class="require">*</i>
    {!! Form::label('startDate', 'Startdate:') !!}

    <input type="date" name="startDate" value="{{ \Carbon\Carbon::createFromDate($startYear,$startMonth,$startDay)->format('Y-m-d')}}" class="form-control" />

</div>

<!-- Enddate Field -->
<div class="form-group col-sm-6"><i class="require">*</i>
    {!! Form::label('endDate', 'Enddate:') !!}

    <input type="date" name="endDate" value="{{ \Carbon\Carbon::createFromDate($endYear,$endMonth,$endDay)->format('Y-m-d')}}" class="form-control" />

</div>

<!-- Needcarpark Field -->
<div class="form-group col-sm-6">
    {!! Form::label('needCarPark', 'Needcarpark:') !!}

    {!! Form::select('needCarPark',['1' => 'Yes', '0' => 'No'], null, ['class' => 'form-control']) !!}
</div>

<!-- Payway Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payWay', 'Payway:') !!}
    {!! Form::select('payWay',['cash' => 'cash', 'eftpos' => 'eftpos','voucher'=>'voucher','credit card'=>'credit card'], null, ['class' => 'form-control']) !!}
</div>

<!-- Sum Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sum', 'Sum:') !!}
    {!! Form::text('sum', null, ['class' => 'form-control']) !!}
</div>

<!-- Bookway Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bookWay', 'Bookway:') !!}
    {!! Form::select('bookWay',['online' => 'online', 'offline' => 'offline'], null, ['class' => 'form-control']) !!}
</div>

<!-- Commend Field -->
<div class="form-group col-sm-12">
    {!! Form::label('Commend', 'Commend:') !!}
    {!! Form::textarea('Commend', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('reservations.index') !!}" class="btn btn-default">Cancel</a>
</div>

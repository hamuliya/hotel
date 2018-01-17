
<!-- Roomname Field -->
@if ($authority == 'HouseKeeper')


    <div class="form-group col-sm-6"><i class="require">*</i>
        {!! Form::label('roomName', 'Room Name:') !!}
        {!! Form::text('roomName',null, ['readonly','class' => 'form-control']) !!}
    </div>

    <!-- Roomtypeid Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('roomTypeId', 'Room Type:') !!}
        {!! Form::select('roomTypeId', array($roomTypesArray), null, ['readonly','class' => 'form-control']) !!}

    </div>



    <!-- Max Field -->
    <div class="form-group col-sm-6"><i class="require">*</i>
        {!! Form::label('max', 'Max:') !!}
        {!! Form::number('max', null, ['readonly','class' => 'form-control']) !!}
    </div>

    <!-- Roomstatus Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('roomStatus', 'Room Status:') !!}
        {!! Form::select('roomStatus',['vacant clean' => 'vacant clean', 'vacant dirty' => 'vacant dirty','occupied clean'=>'occupied clean','occupied service'=>'occupied service','on maintenance'=>'on maintenance'], null, ['class' => 'form-control']) !!}
    </div>

@else

    <div class="form-group col-sm-6"><i class="require">*</i>
        {!! Form::label('roomName', 'Room Name:') !!}
        {!! Form::text('roomName', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Roomtypeid Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('roomTypeId', 'Room Type:') !!}
        {!! Form::select('roomTypeId', array($roomTypesArray), null, ['class' => 'form-control']) !!}


    </div>

    <!-- Max Field -->
    <div class="form-group col-sm-6"><i class="require">*</i>
        {!! Form::label('max', 'Max:') !!}
        {!! Form::number('max', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Roomstatus Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('roomStatus', 'Room Status:') !!}
        {!! Form::select('roomStatus',['vacant clean' => 'vacant clean', 'vacant dirty' => 'vacant dirty','occupied clean'=>'occupied clean','occupied service'=>'occupied service','on maintenance'=>'on maintenance'], null, ['class' => 'form-control']) !!}
    </div>

@endif

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('rooms.index') !!}" class="btn btn-default">Cancel</a>
</div>
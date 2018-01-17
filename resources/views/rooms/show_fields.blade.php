


<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $room->id !!}</p>
</div>

<!-- Roomname Field -->
<div class="form-group">
    {!! Form::label('roomName', 'Room Name:') !!}
    <p>{!! $room->roomName !!}</p>
</div>

<!-- Roomtypeid Field -->
<div class="form-group">
    {!! Form::label('roomTypeId', 'Room Type:') !!}
    <p>{!! $roomType!!}</p>
</div>



<!-- Max Field -->
<div class="form-group">
    {!! Form::label('max', 'Max:') !!}
    <p>{!! $room->max !!}</p>
</div>

<!-- Roomstatus Field -->
<div class="form-group">
    {!! Form::label('roomStatus', 'Room Status:') !!}
    <p>{!! $room->roomStatus !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $room->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $room->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $room->deleted_at !!}</p>
</div>


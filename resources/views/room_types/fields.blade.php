<!-- Roomtype Field -->
<div class="form-group col-sm-6"><i class="require">*</i>
    {!! Form::label('roomType', 'Room Type:') !!}
    {!! Form::text('roomType', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6"><i class="require">*</i>
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('roomTypes.index') !!}" class="btn btn-default">Cancel</a>
</div>

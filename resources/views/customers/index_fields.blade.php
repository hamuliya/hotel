<!-- RoomType Field -->
<div class="col-md-5">
    {!! Form::label('firstName', 'First Name:', ['class' => 'index-field']) !!}

    {!! Form::text('firstName', null) !!}
</div>

<!-- Roomstatus Field -->
<div class="col-md-5">
    {!! Form::label('lastName', 'Last Name:',['class' => 'index-field']) !!}
    {!! Form::text('lastName', null) !!}

</div>
<!-- Submit Field -->

<div class="col-md-2">
    <br>
    <input type="submit" value="search" name="search" class="btn btn-primary">
</div>


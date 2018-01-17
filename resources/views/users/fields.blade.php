<!-- Name Field -->
<div class="form-group col-sm-6"><i class="require">*</i>
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Authority Field -->
<div class="form-group col-sm-6"><i class="require">*</i>
    {!! Form::label('authority', 'Authority:') !!}
    {!! Form::select('authority',['Manager'=>'Manager',"Reception"=>'Reception',"HouseKeeper"=>'HouseKeeper'], null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6"><i class="require">*</i>
    {!! Form::label('email', 'Email:') !!}
    @if ($disable)
        {!! Form::email('email', null, ['class' => 'form-control','disabled' => 'disabled']) !!}
    @else
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    @endif
</div>

<!-- Password Field -->
<div class="form-group col-sm-6"><i class="require">*</i>
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Remember Token Field -->
<div class="form-group col-sm-6"><i class="require">*</i>
    {!! Form::label('password_confirmation', 'Comfire Password:') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
</div>

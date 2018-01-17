
   <!-- RoomType Field -->
        <div class="col-md-3">
            {!! Form::label('roomTypeId', 'Room Type:',['class' => 'index-field']) !!}
            @if (count($roomTypesArray)>0)
                {!! Form::select('roomTypeId', array($roomTypesArray), null) !!}
            @endif

        </div>
        <!-- Roomstatus Field -->
        <div class="col-md-5">
            {!! Form::label('roomStatus', 'Room Status:',['class' => 'index-field']) !!}
            {!! Form::select('roomStatus',[''=>'','vacant clean' => 'vacant clean', 'vacant dirty' => 'vacant dirty','occupied clean'=>'occupied clean','occupied service'=>'occupied service','on maintenance'=>'on maintenance'], null) !!}
        </div>

        <!-- Submit Field -->

        <div class="col-md-2">
            <br>
            <input type="submit" value="search" name="search" class="btn btn-primary">
        </div>

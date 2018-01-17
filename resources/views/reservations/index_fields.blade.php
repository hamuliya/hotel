<table>
    <tr>
        <td>
            <!-- firstName Field -->
            <div class="col-md-6">
                {!! Form::label('firstName', 'firstName:',['class' => 'index-field']) !!}
                {!! Form::text('firstName', null) !!}

            </div>
        </td>

        <!--lastName Field-->

        <td>
            <div class="col-md-5">
                {!! Form::label('lastName', 'lastName:',['class' => 'index-field']) !!}
                {!! Form::text('lastName', null) !!}

            </div>
        </td>
    </tr>
    <tr>
        <td><br></td>
        <td><br></td>

    </tr>
    <tr>
        <!-- Startdate Field -->
        <td>
            <div class="col-md-6">
                {!! Form::label('startDate', 'Startdate:  From',['class' => 'index-field']) !!}
                <input type="date" name="startDate"
                       value="{{ \Carbon\Carbon::createFromDate($startYear,$startMonth,$startDay)->format('Y-m-d')}}"
                       class="form-control"/>
            </div>
        </td>

        <!-- Enddate Field -->

        <td>
            <div class="col-md-5">
                {!! Form::label('endDate', 'To:',['class' => 'index-field']) !!}
                <input type="date" name="endDate"
                       value="{{ \Carbon\Carbon::createFromDate($endYear,$endMonth,$endDay)->format('Y-m-d')}}"
                       class="form-control"/>
            </div>
        </td>
        <!-- Submit Field -->
        <td>

            <div class="col-md-1">
                <br>
                <input type="submit" value="search" name="search" class="btn btn-primary">
            </div>
        </td>

    </tr>
</table>


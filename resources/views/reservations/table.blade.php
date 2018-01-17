<table class="table table-responsive" id="reservations-table">
    <thead>
    <th>Room</th>
    <th>Customer</th>
    <th>Paid</th>
    <th>Status</th>
    <th>Startdate</th>
    <th>Enddate</th>
    <th>Needcarpark</th>
    <th>Payway</th>
    <th>Sum</th>
    <th>Bookway</th>
    <th>Commend</th>
    <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($reservations as $reservation)
        <tr>
            <td>{!! $reservation->roomName !!}</td>
            <td>{!! $reservation->firstName . ' ' . $reservation->lastName!!}</td>
            <td>{!! $reservation->paid !!}</td>
            <td>{!! $reservation->status !!}</td>
            <td>{!! $reservation->startDate !!}</td>
            <td>{!! $reservation->endDate !!}</td>

            @if ($reservation->needCarPark==1)
                <td> YES</td>
            @else
                <td>NO</td>
            @endif


            <td>{!! $reservation->payWay !!}</td>
            <td>{!! $reservation->sum !!}</td>
            <td>{!! $reservation->bookWay !!}</td>
            <td>{!! $reservation->commend !!}</td>
            <td>
                {!! Form::open(['route' => ['reservations.destroy', $reservation->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('reservations.show', [$reservation->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('reservations.edit', [$reservation->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
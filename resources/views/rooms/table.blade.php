
<table class="table table-responsive" id="rooms-table">
    <thead>
        <th>Room Name</th>
        <th>Room Type</th>
        <th>Max</th>
        <th>Room Status</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($rooms as $room)
        <tr>
            <td>{!! $room->roomName !!}</td>
            <td>{!! $room->roomType !!}</td>
            <td>{!! $room->max !!}</td>
            <td>{!! $room->roomStatus !!}</td>
            <td>
                {!! Form::open(['route' => ['rooms.destroy', $room->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('rooms.show', [$room->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('rooms.edit', [$room->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    @if ($authority == 'Manager')
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    @endif
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{$rooms->links()}}

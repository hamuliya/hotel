<li class="{{ Request::is('customers*') ? 'active' : '' }}">
    <a href="{!! route('customers.index') !!}"><i class="fa fa-edit"></i><span>Customers</span></a>
</li>

<li class="{{ Request::is('roomTypes*') ? 'active' : '' }}">
    <a href="{!! route('roomTypes.index') !!}"><i class="fa fa-edit"></i><span>RoomTypes</span></a>
</li>

<li class="{{ Request::is('rooms*') ? 'active' : '' }}">
    <a href="{!! route('rooms.index') !!}"><i class="fa fa-edit"></i><span>Rooms</span></a>
</li>

<li class="{{ Request::is('reservations*') ? 'active' : '' }}">
    <a href="{!! route('reservations.index') !!}"><i class="fa fa-edit"></i><span>Reservations</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>

<li class="{{ Request::is('help*') ? 'active' : '' }}">
    <a href=#><i class="fa fa-edit"></i><span>Help</span></a>
</li>
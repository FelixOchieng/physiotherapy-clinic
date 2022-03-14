<div class="sidebar">
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ getUserHomeRoute() }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="nav-item">
                @canany(['view client', 'add client'])
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Client
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                @endcanany

                <ul class="nav nav-treeview">

                    @can('view therapy room')
                        <li class="nav-item">
                            <a href="{{ route('client.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-asterisk"></i>
                                <p>All Clients</p>
                            </a>
                        </li>
                    @endcan

                    @can('view role')
                        <li class="nav-item">
                            <a href="{{ route('client.create') }}" class="nav-link">
                                <i class="nav-icon fas fa-asterisk"></i>
                                <p>Add Client</p>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>

            <li class="nav-item">
                @canany(['view therapy room', 'add therapy room'])
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-hospital"></i>
                        <p>
                            Therapy Room
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                @endcanany

                <ul class="nav nav-treeview">

                    @can('view therapy room')
                        <li class="nav-item">
                            <a href="{{ route('therapy-room.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-asterisk"></i>
                                <p>All Rooms</p>
                            </a>
                        </li>
                    @endcan

                    @can('view role')
                        <li class="nav-item">
                            <a href="{{ route('therapy-room.create') }}" class="nav-link">
                                <i class="nav-icon fas fa-asterisk"></i>
                                <p>Add Room</p>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>

            <li class="nav-item">
                @canany(['view appointment', 'add appointment'])
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-clock"></i>
                        <p>
                            Appointment
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                @endcanany

                <ul class="nav nav-treeview">

                    @can('view appointment')
                        <li class="nav-item">
                            <a href="{{ route('appointment.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-asterisk"></i>
                                <p>All Appointments</p>
                            </a>
                        </li>
                    @endcan

                    @can('add appointment')
                        <li class="nav-item">
                            <a href="{{ route('appointment.create') }}" class="nav-link">
                                <i class="nav-icon fas fa-asterisk"></i>
                                <p>Book Appointment</p>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>

            <li class="nav-item">
                @canany(['view permission', 'view role', 'view user'])
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-lock"></i>
                        <p>
                            Security
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                @endcanany

                <ul class="nav nav-treeview">

                    @can('view permission')
                        <li class="nav-item">
                            <a href="{{ route('permission.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-asterisk"></i>
                                <p>Permissions</p>
                            </a>
                        </li>
                    @endcan

                    @can('view role')
                        <li class="nav-item">
                            <a href="{{ route('role.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-asterisk"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                    @endcan

                    @can('view user')
                        <li class="nav-item">
                            <a href="{{ route('user.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-asterisk"></i>
                                <p>User Manager</p>
                            </a>
                        </li>
                    @endcan

                </ul>
            </li>

        </ul>
    </nav>
</div>

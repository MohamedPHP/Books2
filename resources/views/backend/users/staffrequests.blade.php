@extends('backend.layout.admin')


@section('styles')
    <style media="screen">
    span.badge {
        position: inherit;
        padding: 5px;
        border-radius: 5px;
        color: #fff;
    }
    </style>
@endsection

@section('content')
    <div class="row" style="padding: 20px;">
        <div class="col s12 z-depth-1">
            <h5>Admin Requests</h5>
        </div>
    </div>
    <div class="row" style="padding: 20px;">
        <div class="col s12  z-depth-1">
            <div class="card-panel teal">
                <span class="white-text">Admin Requests</span>
            </div>
        </div>
    </div>
    <div class="row" style="padding: 20px;">
        <div class="col s12 z-depth-1">
            <table class="bordered highlight centered responsive-table">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phonenumber</th>
                        <th>Student id</th>
                        <th>Type</th>
                        <th>Level</th>
                        <th>Specialization</th>
                        <th>Delete</th>
                        <th>Approve</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- `name`, `email`, `password`, `download_limit`, `address`, `phonenumber`, `generated_id`, `type`, `level_id`, `specialization_id` --}}
                    @foreach ($users as $user)
                        <tr>
                            <td>#{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->phonenumber }}</td>
                            <td>{{ $user->student_id }}</td>
                            <td>
                                @if ($user->type == 3)
                                    <div class="">
                                        <span class="badge red">Admin</span>
                                    </div>
                                @elseif ($user->type == 2)
                                    <div class="">
                                        <span class="badge green">Staff</span>
                                    </div>
                                @else
                                    <div class="">
                                        <span class="badge blue">Student</span>
                                    </div>
                                @endif
                            </td>
                            <td>{{ $user->level->number }}</td>
                            <td>{{ $user->specialization->name }}</td>
                            <td>
                                <a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></a>
                            </td>
                            <td>
                                <a href="{{ route('user.index.staff.approve', ['id' => $user->id]) }}" class="btn-floating waves-effect waves-light green">Approve</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
@section('scripts')
    @if (Session::has('message'))
        <script type="text/javascript">
        var $toastContent = $('<span>{{ Session::get('message') }}</span>');
        Materialize.toast($toastContent, 5000);
        </script>
    @endif
@endsection

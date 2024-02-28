<x-navbar-layout>
    @section('title', 'Dashboard')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Admin</h4>
                        <box-icon name='user'></box-icon>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped" id="laravel_datatable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <img src="{{ $user->avatar }}" alt="{{ $user->username }}" width="35" height="35" class="rounded-circle">   
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h4>Joined user</h4>
                    <box-icon name='user'></box-icon>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="laravel_datatable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($joinedUsers as $joinedUser)
                                <tr>
                                    <td>{{ $joinedUser->user->username }}</td>
                                    <td>{{ $joinedUser->user->email }}</td>
                                    <td>
                                        <img src="{{ $joinedUser->user->avatar }}" alt="{{ $joinedUser->user->username }}" width="35" height="35" class="rounded-circle">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-navbar-layout>

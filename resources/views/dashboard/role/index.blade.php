@extends('layouts.dashboard_master')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-1 mb-4">
                <span class="text-muted fw-light">Dashboard /</span> Role Manage
            </h4>
            <h5>You are <span class="text-success">{{ auth()->user()->role }}</span> in this dashboard.</h5>

            {{-- ...................................administration...................................... --}}
            @if (auth()->user()->role == 'administration')
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card">
                                <h5 class="card-header d-flex justify-content-between">
                                    <div>User list</div>
                                    <a class="btn btn-success" href=""><i class="bx bx-plus me-1"></i> Add New
                                        User</a>
                                </h5>
                                <div class="table-responsive text-nowrap">
                                    <table class="table mb-3">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @foreach ($administrator_power as $user)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td> <img src="{{ asset('uploads/image/profile') }}/{{ $user->image }}"
                                                            alt="user image" class="rounded"
                                                            style="height:40px; width:40px;" />
                                                    </td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->role }}</td>
                                                    <td>
                                                        <form action="{{ route('administration.role.edit') }}"
                                                            method="POST">
                                                            @csrf
                                                            <input type="text" name="user_id" value="{{ $user->id }}"
                                                                hidden>
                                                            <div class="d-flex align-items-center">
                                                                <div class="my-3">
                                                                    <select class="form-control" data-allow-clear="true"
                                                                        name="role">
                                                                        {{-- <option value="admin" class="{{old($user->role)=="admin"? 'selected':''}}">Admin </option> --}}
                                                                        <option value="admin"
                                                                            @if ($user->role == 'admin') {{ 'selected="selected"' }} @endif>
                                                                            Admin </option>
                                                                        <option value="co-admin"
                                                                            @if ($user->role == 'co-admin') {{ 'selected="selected"' }} @endif>
                                                                            Co-admin </option>
                                                                        <option value="author"
                                                                            @if ($user->role == 'author') {{ 'selected="selected"' }} @endif>
                                                                            Author </option>
                                                                        <option value="visitor"
                                                                            @if ($user->role == 'visitor') {{ 'selected="selected"' }} @endif>
                                                                            General user </option>

                                                                    </select>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary"
                                                                    style="border-radius: 10px,0px,0px,10px">Change</button>
                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- ...................................admin...................................... --}}
                @elseif (auth()->user()->role == 'admin')
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <h5 class="card-header d-flex justify-content-between">
                                    <div>User list</div>
                                    <a class="btn btn-success" href=""><i class="bx bx-plus me-1"></i> Add New
                                        User</a>
                                </h5>
                                <div class="table-responsive text-nowrap">
                                    <table class="table mb-3">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @foreach ($admin_power as $user)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td> <img
                                                            src="{{ asset('uploads/image/profile') }}/{{ $user->image }}"
                                                            alt="user image" class="rounded"
                                                            style="height:40px; width:40px;" />
                                                    </td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->role }}</td>
                                                    <td>
                                                        <form action="{{ route('administration.role.edit') }}"
                                                            method="POST">
                                                            @csrf
                                                            <input type="text" name="user_id"
                                                                value="{{ $user->id }}" hidden>
                                                            <div class="d-flex align-items-center">
                                                                <div class="my-3">
                                                                    <select class="form-control" data-allow-clear="true"
                                                                        name="role">
                                                                        <option value="co-admin"
                                                                            @if ($user->role == 'co-admin') {{ 'selected="selected"' }} @endif>
                                                                            Co-admin </option>
                                                                        <option value="author"
                                                                            @if ($user->role == 'author') {{ 'selected="selected"' }} @endif>
                                                                            Author </option>
                                                                        <option value="visitor"
                                                                            @if ($user->role == 'visitor') {{ 'selected="selected"' }} @endif>
                                                                            General user </option>

                                                                    </select>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary"
                                                                    style="border-radius: 10px,0px,0px,10px">Change</button>
                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>


                    {{-- ...................................co-admin...................................... --}}
                @elseif (auth()->user()->role == 'co-admin')
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card">
                                    <h5 class="card-header d-flex justify-content-between">
                                        <div>User list</div>
                                        <a class="btn btn-success" href=""><i class="bx bx-plus me-1"></i> Add New
                                            User</a>
                                    </h5>
                                    <div class="table-responsive text-nowrap">
                                        <table class="table mb-3">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Role</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                @foreach ($co_admin_power as $user)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td> <img
                                                                src="{{ asset('uploads/image/profile') }}/{{ $user->image }}"
                                                                alt="user image" class="rounded"
                                                                style="height:40px; width:40px;" />
                                                        </td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->role }}</td>
                                                        <td>
                                                            <form action="{{ route('administration.role.edit') }}"
                                                                method="POST">
                                                                @csrf
                                                                <input type="text" name="user_id"
                                                                    value="{{ $user->id }}" hidden>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="my-3"><select class="form-control"
                                                                            data-allow-clear="true" name="role">
                                                                            <option value="author"
                                                                                @if ($user->role == 'author') {{ 'selected="selected"' }} @endif>
                                                                                Author </option>
                                                                            <option value="visitor"
                                                                                @if ($user->role == 'visitor') {{ 'selected="selected"' }} @endif>
                                                                                General user </option>

                                                                        </select>
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary"
                                                                        style="border-radius: 10px,0px,0px,10px">Change</button>
                                                                </div>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
            @endif
        </div>


    </div>
@endsection

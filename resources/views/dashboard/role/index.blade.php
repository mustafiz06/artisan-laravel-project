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
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#modalLong" data-id="">
                                        <i class="bx bx-plus me-1"></i> Add New User</button>
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
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#modalLong" data-id="">
                                        <i class="bx bx-plus me-1"></i> Add New User</button>
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
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#modalLong" data-id="">
                                            <i class="bx bx-plus me-1"></i> Add New User</button>
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

    {{-- .............................display add user modal..................................... --}}
    <div class="modal fade" id="modalLong" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('add.user') }}" method="POST" class="register-form" id="formAuthentication">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="modalFullTitle">Add User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" placeholder="Enter your name" autofocus />
                        </div>
                        @error('name')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="email" name="email" placeholder="Enter your email" />
                        </div>
                        @error('name')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="password">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        @error('password')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password_confirmation" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        @error('name')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
            </form>
        </div>
    </div>
@endsection
@section('footer_script')
        @if (session('user_add_success'))
            <script>
                const Toast = Swal.fire({
                    icon: 'success',
                    title: 'Congrats',
                    text: '{{ session('user_add_success') }}',
                    showConfirmButton: false,
                    timer: 1000
                })
            </script>
        @endif
    @endsection

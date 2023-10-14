@extends('layouts.dashboard_master')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">

        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">


            <h4 class="py-1 mb-4">
                <span class="text-muted fw-light">Dashboard /</span> Category
            </h4>
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <h5 class="card-header">Category list</h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>1</td>
                                            <td> <img src="{{ asset('uploads/image/category') }}/{{ $category->image }}" alt="category image" class="rounded" style="height:40px; width:40px;" /></td>
                                            <td>{{ $category->title }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td><span class="badge bg-label-primary me-1">{{ $category->status }}</span></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                        <form action="{{ route('category.delete', $category->id) }}" method="post">
                                                            @csrf
                                                            <button class="dropdown-item btn btn-danger my-1"><i class="bx bx-trash me-1"></i> Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <h5 class="card-header">Insert Category name</h5>
                        <div class="card-body">
                            <form action="{{ route('category.insert', auth()->id()) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-floating ">
                                    <input type="text" class="form-control @error('category_title') is-invalid @enderror"
                                        name="category_title" id="category_title" placeholder="Category Title"
                                        aria-describedby="floatingInputHelp" />
                                    <label for="category_title">Category Title</label>
                                    @error('category_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-floating my-3">
                                    <input type="text" name="category_slug"
                                        class="form-control @error('category_slug') is-invalid @enderror" id="category_slug"
                                        placeholder="Category Slug" aria-describedby="floatingInputHelp" />
                                    <label for="category_slug">Category Slug</label>
                                    @error('category_slug')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form">
                                    <label for="category_title" class="py-2">Category image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        name="image" id="image" placeholder="Category image"
                                        aria-describedby="floatingInputHelp" />
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary me-2 my-3">Insert</button>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection()
@section('footer_script')
    @if (session('category_insert_success'))
        <script>
            const Toast = Swal.fire({
                icon: 'success',
                title: 'Congrats',
                text: '{{ session('category_insert_success') }}',
                showConfirmButton: false,
                timer: 1000
            })
        </script>
    @endif
    @if (session('category_delete_success'))
        <script>
            const Toast = Swal.fire({
                icon: 'success',
                text: '{{ session('category_delete_success') }}',
                showConfirmButton: false,
                timer: 1000
            })
        </script>
    @endif
@endsection

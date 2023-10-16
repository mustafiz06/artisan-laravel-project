@extends('layouts.dashboard_master');
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">

        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">



            <h4 class="mb-4">
                <span class="text-muted fw-light">Dashboard / Blogs /</span><span> Add Blog</span>
            </h4>
            <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="POST" action="{{ route('blog.post') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            id="basic-default-name" name="title" />
                                    </div>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">Category</label>
                                    <div class="col-sm-10">
                                        <select id="multicol-country"
                                            class="form-control @error('category') is-invalid @enderror"
                                            data-allow-clear="true" name="category">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"> {{ $category->title }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-date">Date</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <input type="text" id="basic-default-date"
                                                class="form-control @error('date') is-invalid @enderror"
                                                name="date" />
                                        </div>
                                        @error('date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-phone">Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" id="basic-default-phone"
                                            class="form-control @error('image') is-invalid @enderror phone-mask"
                                            name="image" />
                                    </div>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="details">Details</label>
                                    <div class="col-sm-10">
                                        <textarea id="summernote" rows="5" class="form-control @error('details') is-invalid @enderror" name="details"></textarea>
                                    </div>
                                    @error('details')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('footer_script')
        @if (session('blog_insert_success'))
            <script>
                const Toast = Swal.fire({
                    icon: 'success',
                    title: 'Congrats',
                    text: '{{ session('blog_insert_success') }}',
                    showConfirmButton: false,
                    timer: 1000
                })
            </script>
        @endif
        @if (session('blog_insert_error'))
            <script>
                const Toast = Swal.fire({
                    icon: 'error',
                    text: '{{ session('blog_insert_error') }}',
                    showConfirmButton: false,
                    timer: 1000
                })
            </script>
        @endif
    @endsection

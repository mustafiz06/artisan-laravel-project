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
                <div class="col-7"></div>
                <div class="col-md-5">
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
@endsection

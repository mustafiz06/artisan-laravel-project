@extends('layouts.dashboard_master')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-1 mb-4">
                <span class="text-muted fw-light">Dashboard / Blogs /</span> Trash
            </h4>
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header d-flex justify-content-between">
                        <div>Trash list</div>
                        <a class="btn btn-success"  href="{{ route('blog.add') }}"><i class="bx bx-plus me-1"></i> Add New</a>
                    </h5>
                    <div class="table-responsive text-wrap">
                        <table class="table mb-3">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Details</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($blog_trashes as $blog)
                                    <tr>
                                        <td>{{  $loop->index+1 }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/image/blogs') }}/{{ $blog->image }}" style="height: 60px; width:60px;"
                                            alt="tutor image 1" />
                                        </td>
                                        <td>{{ $blog->title }}</td>
                                        <td style="">{{ $blog->details }}</td>
                                        <td class="d-flex">

                                            <form action="{{ route('blog.restore', $blog->id) }}" method="post">
                                                @csrf
                                                <button class="btn btn-success me-1 mx-2"><i class="bx bx-trash me-1"></i>Restore</button>
                                            </form>
                                            <form action="{{ route('blog.forcedelete', $blog->id) }}" method="post">
                                                @csrf
                                                <button class="btn btn-danger me-1 mx-2"><i class="bx bx-delete-alt me-1"></i>Delete </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- <span class="block text-center my-4">{{ $blogs->links() }}</span> --}}
                    </div>
                </div>
            </div>
        </div><!-- End Content -->
    </div>











    @endsection()
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
        @if (session('blog_delete_success'))
            <script>
                const Toast = Swal.fire({
                    icon: 'success',
                    text: '{{ session('blog_delete_success') }}',
                    showConfirmButton: false,
                    timer: 1000
                })
            </script>
        @endif
        @if (session('blog_restore_success'))
            <script>
                const Toast = Swal.fire({
                    icon: 'success',
                    text: '{{ session('blog_restore_success') }}',
                    showConfirmButton: false,
                    timer: 500
                })
            </script>
        @endif
        @if (session('blog_forcedelete_success'))
            <script>
                const Toast = Swal.fire({
                    icon: 'success',
                    text: '{{ session('blog_forcedelete_success') }}',
                    showConfirmButton: false,
                    timer: 500
                })
            </script>
        @endif
    @endsection

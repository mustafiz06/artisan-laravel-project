@extends('layouts.dashboard_master')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">

        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">


            <h4 class="py-1 mb-4">
                <span class="text-muted fw-light">Dashboard /</span> tag
            </h4>
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <h5 class="card-header">tag list</h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table mb-3">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($tags as $tag)
                                        <tr>
                                            <td>{{ $tags->firstItem() + $loop->index++ }}</td>
                                            <td>{{ $tag->title }}</td>
                                            <td>
                                                <form action="{{ route('tag.status.change', $tag->id) }}" method="post">
                                                    @csrf
                                                    @if ($tag->status == 'active')
                                                        <button type="submit"
                                                            class=" btn btn-success me-1">{{ $tag->status }}</button>
                                                    @else
                                                        <button type="submit"
                                                            class="btn btn-danger me-1">{{ $tag->status }}</button>
                                                    @endif
                                                </form>
                                            </td>
                                            <td class="d-flex">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#modalLong{{ $tag->id }}"
                                                    data-id="{{ $tag->id }}">
                                                    <i class="bx bx-edit-alt me-1"></i> Edit</button>

                                                <form action="{{ route('tag.delete', $tag->id) }}" method="post">
                                                    @csrf
                                                    <button class="btn btn-danger me-1 mx-2"><i class="bx bx-trash me-1"></i>
                                                        Delete</button>
                                                </form>
                                            </td>
                                        </tr>

                                        {{-- .............................display tag edit modal..................................... --}}
                                        <div class="modal fade" id="modalLong{{ $tag->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form action="{{ route('tag.edit', auth()->id()) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalFullTitle">Edit tag</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-floating ">
                                                                <input type="text"
                                                                    class="form-control @error('tag_title') is-invalid @enderror"
                                                                    name="tag_title" id="tag_title"
                                                                    value="{{ $tag->title }}"
                                                                    aria-describedby="floatingInputHelp" />
                                                                <label for="tag_title">tag Title</label>
                                                                @error('tag_title')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-secondary"
                                                                data-bs-dismiss="modal">
                                                                Close
                                                            </button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                            <span class="block text-center my-4">{{ $tags->links() }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <h5 class="card-header">Insert tag name</h5>
                        <div class="card-body">
                            <form action="{{ route('tag.insert', auth()->id()) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-floating ">
                                    <input type="text" class="form-control @error('tag_title') is-invalid @enderror"
                                        name="tag_title" id="tag_title" placeholder="tag Title"
                                        aria-describedby="floatingInputHelp" />
                                    <label for="tag_title">tag Title</label>
                                    @error('tag_title')
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
    </div>
@endsection()
{{-- @section('footer_script')
    @if (session('tag_insert_success'))
        <script>
            const Toast = Swal.fire({
                icon: 'success',
                title: 'Congrats',
                text: '{{ session('tag_insert_success') }}',
                showConfirmButton: false,
                timer: 1000
            })
        </script>
    @endif
    @if (session('tag_delete_success'))
        <script>
            const Toast = Swal.fire({
                icon: 'success',
                text: '{{ session('tag_delete_success') }}',
                showConfirmButton: false,
                timer: 1000
            })
        </script>
    @endif
    @if (session('status_change'))
        <script>
            const Toast = Swal.fire({
                icon: 'success',
                text: '{{ session('status_change') }}',
                showConfirmButton: false,
                timer: 500
            })
        </script>
    @endif
@endsection --}}

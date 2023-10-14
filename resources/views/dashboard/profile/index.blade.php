 @extends('layouts.dashboard_master')

 @section('content')
     <!-- Content wrapper -->
     <div class="content-wrapper">

         <!-- Content -->

         <div class="container-xxl flex-grow-1 container-p-y">
             <h4 class="py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

             <div class="row">
                 <div class="col-md-12">
                     <ul class="nav nav-pills flex-column flex-md-row mb-3">
                         <li class="nav-item">
                             <a class="nav-link active" href="{{ route('profile') }}"><i class="bx bx-user me-1"></i>
                                 Account</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="{{ route('profile.privacy') }}"><i class="bx bx-bell me-1"></i>
                                 Privacy</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="{{ route('profile') }}"><i class="bx bx-bell me-1"></i>
                                 Notifications</a>
                         </li>

                         <li class="nav-item">
                             <a class="nav-link" href="{{ route('profile') }}"><i class="bx bx-link-alt me-1"></i>
                                 Connections</a>
                         </li>
                     </ul>
                     <div class="card mb-4">
                         <h5 class="card-header">Profile Details</h5>
                         <!-- Account -->
                         <div class="card-body">
                             <div class="d-flex align-items-start align-items-sm-center gap-4">
                                 <img src="{{ asset('uploads/image/profile') }}/{{ auth()->user()->image }}"
                                     alt="user-avatar" class="d-block rounded" height="100" width="100"
                                     id="uploadedAvatar" />
                                 <div class="button-wrapper">
                                     <form action="{{ route('profile.image.update', auth()->id()) }}" method="POST"
                                         enctype="multipart/form-data">
                                         @csrf
                                         <label for="upload" class="btn btn-outline-secondary me-2 mb-4" tabindex="0">
                                             <span class="d-none d-sm-block">Choose new photo</span>
                                             <i class="bx bx-upload d-block d-sm-none"></i>
                                             <input type="file" id="upload"
                                                 class="account-file-input  @error('image') is-invalid @enderror" hidden
                                                 accept="image/png, image/jpeg" name="image"
                                                 placeholder="{{ auth()->user()->name }}" />
                                         </label>
                                         @error('image')
                                             <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                         <button type="submit" class="btn btn-primary  account-image-reset mb-4">
                                             <i class="bx bx-reset d-block d-sm-none"></i>
                                             <span class="d-none d-sm-block">Update image</span>
                                         </button>

                                         <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                     </form>
                                 </div>
                             </div>
                         </div>
                         <hr class="my-0" />
                         <div class="card-body">
                             <form action="{{ route('profile.details.update', auth()->id()) }}" method="POST">
                                 @csrf
                                 <div class="row">
                                     <div class="mb-3 col-md-6">
                                         <label for="firstName" class="form-label"> Name</label>
                                         <input class="form-control @error('name') is-invalid @enderror" name="name"
                                             value="{{ auth()->user()->name }}" />
                                         @error('name')
                                             <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="mb-3 col-md-6">
                                         <label for="email" class="form-label">E-mail</label>
                                         <input class="form-control" type="text" id="email" name="email" readonly
                                             value="{{ auth()->user()->email }}" />
                                     </div>
                                     <div class="mb-3 col-md-6">
                                         <label class="form-label" for="phone_number">Phone Number</label>
                                         <div class="input-group input-group-merge">
                                             <span class="input-group-text">BD (+880)</span>
                                             <input type="text" id="phone_number" name="phone_number"
                                                 class="form-control" value="{{ auth()->user()->phone_number }}" />
                                         </div>
                                     </div>
                                     <div class="mb-3 col-md-6">
                                         <label for="address" class="form-label">Address</label>
                                         <input class="form-control @error('address') is-invalid @enderror" name="address"
                                             value="{{ auth()->user()->address }}" />
                                         @error('address')
                                             <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                 </div>
                                 <div class="mt-2">
                                     <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                     <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                 </div>
                             </form>
                         </div>
                         </form>
                         <!-- /Account -->
                     </div>
                     <div class="card">
                         <h5 class="card-header">Delete Account</h5>
                         <div class="card-body">
                             <div class="mb-3 col-12 mb-0">
                                 <div class="alert alert-warning">
                                     <h6 class="alert-heading mb-1">Are you sure you want to delete your account?</h6>
                                     <p class="mb-0">Once you delete your account, there is no going back. Please be
                                         certain.</p>
                                 </div>
                             </div>
                             <form action="{{ route('profile.delete', auth()->id()) }}" method="POST">
                                 <div class="form-check mb-3">
                                     <input class="form-check-input" type="checkbox" name="accountActivation"
                                         id="accountActivation" />
                                     <label class="form-check-label" for="accountActivation">I confirm my account
                                         delete</label>
                                 </div>
                                 <button type="submit" class="btn btn-danger deactivate-account">Delete
                                     Account</button>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!-- / Content -->






     </div>
 @endsection

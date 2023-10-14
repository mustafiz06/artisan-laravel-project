@extends('layouts.dashboard_master')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">

        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">


            <h4 class="py-3 mb-4">
                <span class="text-muted fw-light">Account Settings /</span> Security
            </h4>

            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills flex-column flex-md-row mb-3">
                        <li class="nav-item"><a class="nav-link" href="{{ route('profile') }}"><i class="bx bx-user me-1"></i>
                                Account</a></li>
                        <li class="nav-item"><a class="nav-link active" href="{{ route('profile.privacy') }}"><i
                                    class="bx bx-lock-alt me-1"></i> Privacy</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('profile') }}"><i
                                    class="bx bx-bell me-1"></i> Notifications</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('profile') }}"><i
                                    class="bx bx-link-alt me-1"></i> Connections</a></li>
                    </ul>
                    <!-- Change Password -->
                    <div class="card mb-4">
                        <h5 class="card-header">Change Password</h5>
                        <div class="card-body">
                            <form id="formAccountSettings"action="{{ route('profile.password.change', auth()->id()) }}"
                                method="POST">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6 form-password-toggle">
                                        <label class="form-label" for="current_password">Current Password</label>
                                        <div class="input-group input-group-merge">
                                            <input class="form-control @error('current_password') is-invalid @enderror"
                                                type="password" name="current_password" id="current_password"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                            @error('current_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6 form-password-toggle">
                                        <label class="form-label" for="password">New Password</label>
                                        <div class="input-group input-group-merge">
                                            <input class="form-control @error('password') is-invalid @enderror"
                                                type="password" id="password" name="password"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-6 form-password-toggle">
                                        <label class="form-label" for="confirm_password">Confirm New Password</label>
                                        <div class="input-group input-group-merge">
                                            <input class="form-control @error('confirm_password') is-invalid @enderror"
                                                type="password" name="confirm_password" id="confirm_password"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                            @error('confirm_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 mb-4">
                                        <p class="fw-medium mt-2">Password Requirements:</p>
                                        <ul class="ps-3 mb-0">
                                            <li class="mb-1">
                                                Minimum 8 characters long - the more, the better
                                            </li>
                                            <li class="mb-1">At least one lowercase character</li>
                                            <li>At least one number, symbol, or whitespace character</li>
                                        </ul>
                                    </div>
                                    <div class="col-12 mt-1">
                                        <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                        <button type="reset" class="btn btn-label-secondary">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--/ Change Password -->



                    <!-- Two-steps verification -->
                    <div class="card mb-4">
                        <h5 class="card-header">Two-steps verification</h5>
                        <div class="card-body">
                            <h5 class="mb-3">Two factor authentication is not enabled yet.</h5>
                            <p class="w-75">Two-factor authentication adds an additional layer of security to your account
                                by requiring more than just a password to log in.
                                <a href="javascript:void(0);">Learn more.</a>
                            </p>
                            <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#enableOTP">Enable
                                two-factor authentication</button>
                        </div>
                    </div>
                    <!-- Modal -->
                    <!-- Enable OTP Modal -->
                    <div class="modal fade" id="enableOTP" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
                            <div class="modal-content p-3 p-md-5">
                                <div class="modal-body">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    <div class="text-center mb-4">
                                        <h3 class="mb-5">Enable One Time Password</h3>
                                    </div>
                                    <h6>Verify Your Mobile Number for SMS</h6>
                                    <p>Enter your mobile phone number with country code and we will send you a verification
                                        code.</p>
                                    <form id="enableOTPForm" class="row g-3" onsubmit="return false">
                                        <div class="col-12">
                                            <label class="form-label" for="modalEnableOTPPhone">Phone Number</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text">+1</span>
                                                <input type="text" id="modalEnableOTPPhone" name="modalEnableOTPPhone"
                                                    class="form-control phone-number-otp-mask"
                                                    placeholder="202 555 0111" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                            <button type="reset" class="btn btn-label-secondary"
                                                data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Enable OTP Modal -->

                    <!-- /Modal -->

                    <!--/ Two-steps verification -->

                    <!-- Recent Devices -->
                    <div class="card mb-4">
                        <h5 class="card-header">Recent Devices</h5>
                        <div class="table-responsive">
                            <table class="table border-top">
                                <thead>
                                    <tr>
                                        <th class="text-truncate">Browser</th>
                                        <th class="text-truncate">Device</th>
                                        <th class="text-truncate">Location</th>
                                        <th class="text-truncate">Recent Activities</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-truncate"><i class='bx bxl-windows text-info me-3'></i> <span
                                                class="fw-medium">Chrome on Windows</span></td>
                                        <td class="text-truncate">HP Spectre 360</td>
                                        <td class="text-truncate">Switzerland</td>
                                        <td class="text-truncate">10, July 2021 20:07</td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate"><i class='bx bx-mobile-alt text-danger me-3'></i> <span
                                                class="fw-medium">Chrome on iPhone</span></td>
                                        <td class="text-truncate">iPhone 12x</td>
                                        <td class="text-truncate">Australia</td>
                                        <td class="text-truncate">13, July 2021 10:10</td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate"><i class='bx bxl-android text-success me-3'></i> <span
                                                class="fw-medium">Chrome on Android</span></td>
                                        <td class="text-truncate">Oneplus 9 Pro</td>
                                        <td class="text-truncate">Dubai</td>
                                        <td class="text-truncate">14, July 2021 15:15</td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate"><i class='bx bxl-apple me-3'></i> <span
                                                class="fw-medium">Chrome on MacOS</span></td>
                                        <td class="text-truncate">Apple iMac</td>
                                        <td class="text-truncate">India</td>
                                        <td class="text-truncate">16, July 2021 16:17</td>
                                    </tr>
                                    <tr>
                                        <td class="text-truncate"><i class='bx bxl-windows text-info me-3'></i> <span
                                                class="fw-medium">Chrome on Windows</span></td>
                                        <td class="text-truncate">HP Spectre 360</td>
                                        <td class="text-truncate">Switzerland</td>
                                        <td class="text-truncate">20, July 2021 21:01</td>
                                    </tr>
                                    <tr class="border-transparent">
                                        <td class="text-truncate"><i class='bx bxl-android text-success me-3'></i> <span
                                                class="fw-medium">Chrome on Android</span></td>
                                        <td class="text-truncate">Oneplus 9 Pro</td>
                                        <td class="text-truncate">Dubai</td>
                                        <td class="text-truncate">21, July 2021 12:22</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/ Recent Devices -->

                </div>
            </div>


        </div>
        <!-- / Content -->
    @endsection

    @section('footer_script')
        @if (session('update_success'))
            <script>
                const Toast = Swal.fire({
                    icon: 'success',
                    title: 'Congrats',
                    text: '{{ session('update_success') }}'
                })

            </script>
        @endif

        @if (session('update_error'))
            <script>
                const Toast = Swal.fire({
                    icon: 'error',
                    title: 'Opps...',
                    text: '{{ session('update_error') }}'
                })

            </script>
        @endif
    @endsection

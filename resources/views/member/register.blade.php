@extends('layouts.auth')

@section('tab-title')
    {{ __('Member Registration') }}
@endsection

@section('content')
    <div >
        <div class="card-body">
            <div class="row">
                <div class="d-flex justify-content-center">
                    <div class="auth-header">
                        <h2 class="text-secondary"><b>{{ __('Member Registration') }}</b></h2>
                        <p class="f-16 mt-2">{{ __('Create your member account and join an organization') }}</p>
                    </div>
                </div>
            </div>

            {{ Form::open(['url' => route('member.register.store'), 'method' => 'post', 'enctype' => 'multipart/form-data', 'id' => 'registerForm']) }}

            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {!! session('error') !!}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {!! session('success') !!}
                </div>
            @endif

            <div class="row g-4">
                <!-- Left Column -->
                <div class="col-lg-12">
                    <!-- Owner Selection -->
                    <div class="form-floating mb-3">
                        {{ Form::select('owner_id', $ownersList, old('owner_id'), ['class' => 'form-select', 'id' => 'owner_id', 'required' => 'required', 'style' => 'text-transform: uppercase; padding-top: 1.625rem; padding-bottom: 0.625rem;']) }}
                        <label for="owner_id">{{ __('Select State ') }} <span class="text-danger">*</span></label>
                        <small class="form-text text-muted mt-1 d-block">{{ __('Please select the State ') }}</small>
                        @error('owner_id')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Personal Information Section -->
                    <div class="mb-4">
                        <h6 class="text-secondary mb-3"><i class="ti ti-user me-2"></i>{{ __('Personal Information') }}</h6>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    {{ Form::text('first_name', old('first_name'), ['class' => 'form-control' . ($errors->has('first_name') ? ' is-invalid' : ''), 'id' => 'first_name', 'placeholder' => __('First Name'), 'required' => 'required']) }}
                                    <label for="first_name">{{ __('First Name') }} <span class="text-danger">*</span></label>
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    {{ Form::text('last_name', old('last_name'), ['class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : ''), 'id' => 'last_name', 'placeholder' => __('Last Name'), 'required' => 'required']) }}
                                    <label for="last_name">{{ __('Last Name') }} <span class="text-danger">*</span></label>
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    {{ Form::date('dob', old('dob'), ['class' => 'form-control' . ($errors->has('dob') ? ' is-invalid' : ''), 'id' => 'dob', 'required' => 'required']) }}
                                    <label for="dob">{{ __('Date of Birth') }} <span class="text-danger">*</span></label>
                                    @error('dob')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    {{ Form::select('gender', ['' => __('Select Gender'), 'Male' => 'Male', 'Female' => 'Female'], old('gender'), ['class' => 'form-select' . ($errors->has('gender') ? ' is-invalid' : ''), 'id' => 'gender', 'required' => 'required', 'style' => 'padding-top: 1.625rem; padding-bottom: 0.625rem;']) }}
                                    <label for="gender">{{ __('Gender') }} <span class="text-danger">*</span></label>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Information Section -->
                    <div class="mb-4">
                        <h6 class="text-secondary mb-3"><i class="ti ti-mail me-2"></i>{{ __('Contact Information') }}</h6>

                        <div class="form-floating mb-3">
                            {{ Form::email('email', old('email'), ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'id' => 'email', 'placeholder' => __('Email address'), 'required' => 'required']) }}
                            <label for="email">{{ __('Email address') }} <span class="text-danger">*</span></label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            {{ Form::text('phone', old('phone'), ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'id' => 'phone', 'placeholder' => __('Phone Number'), 'required' => 'required']) }}
                            <label for="phone">{{ __('Phone Number') }} <span class="text-danger">*</span></label>
                            <small class="form-text text-muted mt-1 d-block">{{ __('Please enter with country code. e.g., +60XXXXXXXXXX') }}</small>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            {{ Form::text('address', old('address'), ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'id' => 'address', 'placeholder' => __('Address'), 'required' => 'required']) }}
                            <label for="address">{{ __('Address') }} <span class="text-danger">*</span></label>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-lg-12">
                    <!-- Account Security Section -->
                    <div class="mb-4">
                        <h6 class="text-secondary mb-3"><i class="ti ti-lock me-2"></i>{{ __('Account Security') }}</h6>

                        <div class="form-floating mb-3">
                            {{ Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'id' => 'password', 'placeholder' => __('Password'), 'required' => 'required', 'minlength' => '6']) }}
                            <label for="password">{{ __('Password') }} <span class="text-danger">*</span></label>
                            <small class="form-text text-muted mt-1 d-block">{{ __('Minimum 6 characters') }}</small>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Additional Information Section -->
                    <div class="mb-4">
                        <h6 class="text-secondary mb-3"><i class="ti ti-info-circle me-2"></i>{{ __('Additional Information') }}</h6>

                        <div class="mb-3">
                            <label for="image" class="form-label">{{ __('Profile Image') }} <small class="text-muted">({{ __('Optional') }})</small></label>
                            {{ Form::file('image', ['class' => 'form-control' . ($errors->has('image') ? ' is-invalid' : ''), 'id' => 'image', 'accept' => 'image/*']) }}
                            <small class="form-text text-muted">{{ __('Upload your profile picture') }}</small>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            {{ Form::textarea('emergency_contact_information', old('emergency_contact_information'), ['class' => 'form-control' . ($errors->has('emergency_contact_information') ? ' is-invalid' : ''), 'id' => 'emergency_contact_information', 'placeholder' => __('Emergency Contact Information'), 'rows' => '3', 'style' => 'height: 100px']) }}
                            <label for="emergency_contact_information">{{ __('Emergency Contact Information') }} <small class="text-muted">({{ __('Optional') }})</small></label>
                            @error('emergency_contact_information')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            {{ Form::textarea('notes', old('notes'), ['class' => 'form-control' . ($errors->has('notes') ? ' is-invalid' : ''), 'id' => 'notes', 'placeholder' => __('Notes'), 'rows' => '3', 'style' => 'height: 100px']) }}
                            <label for="notes">{{ __('Notes') }} <small class="text-muted">({{ __('Optional') }})</small></label>
                            @error('notes')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="ti ti-user-plus me-2"></i>{{ __('Register') }}
                </button>
            </div>

            <!-- Login Link -->
            <div class="text-center mt-4">
                <p class="mb-0">{{ __('Already have an account?') }}
                    <a href="{{ route('login') }}" class="text-primary f-w-500">{{ __('Login here') }}</a>
                </p>
            </div>

            {{ Form::close() }}
        </div>
    </div>
@endsection

@push('script-page')
    <style>
        .auth-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .form-floating > label {
            padding: 0.75rem 0.75rem;
        }
        .form-floating > .form-select {
            padding-top: 1.625rem;
            padding-bottom: 0.625rem;
        }
        h6.text-secondary {
            font-size: 0.95rem;
            font-weight: 600;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid #e9ecef;
            margin-bottom: 1rem !important;
        }
        .mb-4 {
            margin-bottom: 1.5rem !important;
        }
        .card {
            max-width: 100%;
        }
        .card-body {
            padding: 2rem;
        }
        @media (min-width: 992px) {
            .card {
                max-width: 1200px;
                margin: 0 auto;
            }
            .row.g-4 > [class*="col-"] {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }
        @media (max-width: 991px) {
            .card-body {
                padding: 1.5rem;
            }
        }
        .form-section {
            background: #f8f9fa;
            padding: 1.25rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
        }
    </style>
@endpush

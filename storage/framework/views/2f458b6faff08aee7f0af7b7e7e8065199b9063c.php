<?php $__env->startSection('tab-title'); ?>
    <?php echo e(__('Member Registration')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div >
        <div class="card-body">
            <div class="row">
                <div class="d-flex justify-content-center">
                    <div class="auth-header">
                        <h2 class="text-secondary"><b><?php echo e(__('Member Registration')); ?></b></h2>
                        <p class="f-16 mt-2"><?php echo e(__('Create your member account and join an organization')); ?></p>
                    </div>
                </div>
            </div>

            <?php echo e(Form::open(['url' => route('member.register.store'), 'method' => 'post', 'enctype' => 'multipart/form-data', 'id' => 'registerForm'])); ?>


            <?php if(session('error')): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo session('error'); ?>

                </div>
            <?php endif; ?>

            <?php if(session('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo session('success'); ?>

                </div>
            <?php endif; ?>

            <div class="row g-4">
                <!-- Left Column -->
                <div class="col-lg-12">
                    <!-- Owner Selection -->
                    <div class="form-floating mb-3">
                        <?php echo e(Form::select('owner_id', $ownersList, old('owner_id'), ['class' => 'form-select', 'id' => 'owner_id', 'required' => 'required', 'style' => 'text-transform: uppercase; padding-top: 1.625rem; padding-bottom: 0.625rem;'])); ?>

                        <label for="owner_id"><?php echo e(__('Select State ')); ?> <span class="text-danger">*</span></label>
                        <small class="form-text text-muted mt-1 d-block"><?php echo e(__('Please select the State ')); ?></small>
                        <?php $__errorArgs = ['owner_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback d-block" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Personal Information Section -->
                    <div class="mb-4">
                        <h6 class="text-secondary mb-3"><i class="ti ti-user me-2"></i><?php echo e(__('Personal Information')); ?></h6>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <?php echo e(Form::text('first_name', old('first_name'), ['class' => 'form-control' . ($errors->has('first_name') ? ' is-invalid' : ''), 'id' => 'first_name', 'placeholder' => __('First Name'), 'required' => 'required'])); ?>

                                    <label for="first_name"><?php echo e(__('First Name')); ?> <span class="text-danger">*</span></label>
                                    <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <?php echo e(Form::text('last_name', old('last_name'), ['class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : ''), 'id' => 'last_name', 'placeholder' => __('Last Name'), 'required' => 'required'])); ?>

                                    <label for="last_name"><?php echo e(__('Last Name')); ?> <span class="text-danger">*</span></label>
                                    <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <?php echo e(Form::date('dob', old('dob'), ['class' => 'form-control' . ($errors->has('dob') ? ' is-invalid' : ''), 'id' => 'dob', 'required' => 'required'])); ?>

                                    <label for="dob"><?php echo e(__('Date of Birth')); ?> <span class="text-danger">*</span></label>
                                    <?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <?php echo e(Form::select('gender', ['' => __('Select Gender'), 'Male' => 'Male', 'Female' => 'Female'], old('gender'), ['class' => 'form-select' . ($errors->has('gender') ? ' is-invalid' : ''), 'id' => 'gender', 'required' => 'required', 'style' => 'padding-top: 1.625rem; padding-bottom: 0.625rem;'])); ?>

                                    <label for="gender"><?php echo e(__('Gender')); ?> <span class="text-danger">*</span></label>
                                    <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Information Section -->
                    <div class="mb-4">
                        <h6 class="text-secondary mb-3"><i class="ti ti-mail me-2"></i><?php echo e(__('Contact Information')); ?></h6>

                        <div class="form-floating mb-3">
                            <?php echo e(Form::email('email', old('email'), ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'id' => 'email', 'placeholder' => __('Email address'), 'required' => 'required'])); ?>

                            <label for="email"><?php echo e(__('Email address')); ?> <span class="text-danger">*</span></label>
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-floating mb-3">
                            <?php echo e(Form::text('phone', old('phone'), ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'id' => 'phone', 'placeholder' => __('Phone Number'), 'required' => 'required'])); ?>

                            <label for="phone"><?php echo e(__('Phone Number')); ?> <span class="text-danger">*</span></label>
                            <small class="form-text text-muted mt-1 d-block"><?php echo e(__('Please enter with country code. e.g., +60XXXXXXXXXX')); ?></small>
                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-floating mb-3">
                            <?php echo e(Form::text('address', old('address'), ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'id' => 'address', 'placeholder' => __('Address'), 'required' => 'required'])); ?>

                            <label for="address"><?php echo e(__('Address')); ?> <span class="text-danger">*</span></label>
                            <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-lg-12">
                    <!-- Account Security Section -->
                    <div class="mb-4">
                        <h6 class="text-secondary mb-3"><i class="ti ti-lock me-2"></i><?php echo e(__('Account Security')); ?></h6>

                        <div class="form-floating mb-3">
                            <?php echo e(Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'id' => 'password', 'placeholder' => __('Password'), 'required' => 'required', 'minlength' => '6'])); ?>

                            <label for="password"><?php echo e(__('Password')); ?> <span class="text-danger">*</span></label>
                            <small class="form-text text-muted mt-1 d-block"><?php echo e(__('Minimum 6 characters')); ?></small>
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <!-- Additional Information Section -->
                    <div class="mb-4">
                        <h6 class="text-secondary mb-3"><i class="ti ti-info-circle me-2"></i><?php echo e(__('Additional Information')); ?></h6>

                        <div class="mb-3">
                            <label for="image" class="form-label"><?php echo e(__('Profile Image')); ?> <small class="text-muted">(<?php echo e(__('Optional')); ?>)</small></label>
                            <?php echo e(Form::file('image', ['class' => 'form-control' . ($errors->has('image') ? ' is-invalid' : ''), 'id' => 'image', 'accept' => 'image/*'])); ?>

                            <small class="form-text text-muted"><?php echo e(__('Upload your profile picture')); ?></small>
                            <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-floating mb-3">
                            <?php echo e(Form::textarea('emergency_contact_information', old('emergency_contact_information'), ['class' => 'form-control' . ($errors->has('emergency_contact_information') ? ' is-invalid' : ''), 'id' => 'emergency_contact_information', 'placeholder' => __('Emergency Contact Information'), 'rows' => '3', 'style' => 'height: 100px'])); ?>

                            <label for="emergency_contact_information"><?php echo e(__('Emergency Contact Information')); ?> <small class="text-muted">(<?php echo e(__('Optional')); ?>)</small></label>
                            <?php $__errorArgs = ['emergency_contact_information'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-floating mb-3">
                            <?php echo e(Form::textarea('notes', old('notes'), ['class' => 'form-control' . ($errors->has('notes') ? ' is-invalid' : ''), 'id' => 'notes', 'placeholder' => __('Notes'), 'rows' => '3', 'style' => 'height: 100px'])); ?>

                            <label for="notes"><?php echo e(__('Notes')); ?> <small class="text-muted">(<?php echo e(__('Optional')); ?>)</small></label>
                            <?php $__errorArgs = ['notes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="ti ti-user-plus me-2"></i><?php echo e(__('Register')); ?>

                </button>
            </div>

            <!-- Login Link -->
            <div class="text-center mt-4">
                <p class="mb-0"><?php echo e(__('Already have an account?')); ?>

                    <a href="<?php echo e(route('login')); ?>" class="text-primary f-w-500"><?php echo e(__('Login here')); ?></a>
                </p>
            </div>

            <?php echo e(Form::close()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-page'); ?>
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp-new\www\dppum\resources\views/member/register.blade.php ENDPATH**/ ?>
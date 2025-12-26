<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Member Detail')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('dashboard')); ?>">
                <?php echo e(__('Dashboard')); ?>

            </a>
        </li>
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('member.index')); ?>"><?php echo e(__('Member')); ?></a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#"> <?php echo e(__('Details')); ?> <?php echo e(memberPrefix() . $member->member_id); ?></a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col col-xxl-4">
                            <div class="card border">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <img class="img-radius img-fluid wid-80"
                                                src="<?php echo e(!empty($member->image) ? asset(Storage::url('upload/image/' . $member->image)) : asset(Storage::url('upload/profile/avatar.png'))); ?>"
                                                alt="User image" />
                                        </div>
                                        <div class="flex-grow-1 mx-3">
                                            <h5 class="mb-1">
                                                <?php echo e($member->first_name); ?> <?php echo e($member->last_name); ?>

                                            </h5>
                                            <h6 class="mb-0 text-secondary">
                                                <?php echo e(memberPrefix()); ?><?php echo e($member->member_id); ?></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-2 pb-0">
                                    <div class="list-group list-group-flush">
                                        <a href="#" class="list-group-item list-group-item-action">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <i class="material-icons-two-tone f-20">email</i>
                                                </div>
                                                <div class="flex-grow-1 mx-3">
                                                    <h5 class="m-0"><?php echo e(__('Email')); ?></h5>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <small><?php echo e($member->email); ?></small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <i class="material-icons-two-tone f-20">phonelink_ring</i>
                                                </div>
                                                <div class="flex-grow-1 mx-3">
                                                    <h5 class="m-0"><?php echo e(__('Phone')); ?></h5>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <small><?php echo e($member->phone); ?>

                                                    </small>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6 col-auto col-xxl-8">
                            <div class="card border">
                                <div class="card-header">
                                    <h5><?php echo e(__('Additional Detail')); ?></h5>
                                </div>
                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td><b class="text-header"><?php echo e(__('Date of Birth')); ?></b></td>
                                                    <td>:</td>
                                                    <td><?php echo e(dateFormat($member->dob)); ?> </td>
                                                </tr>
                                                <tr>
                                                    <td><b class="text-header"><?php echo e(__('Gender')); ?></b></td>
                                                    <td>:</td>
                                                    <td><?php echo e($member->gender); ?>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b
                                                            class="text-header"><?php echo e(__('Emergency Contact Information')); ?></b>
                                                    </td>
                                                    <td>:</td>
                                                    <td><?php echo e($member->emergency_contact_information); ?>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b class="text-header"><?php echo e(__('Notes')); ?></b></td>
                                                    <td>:</td>
                                                    <td><?php echo e($member->notes); ?>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b class="text-header"><?php echo e(__('Address')); ?></b></td>
                                                    <td>:</td>
                                                    <td><?php echo e($member->address); ?>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b class="text-header"><?php echo e(__('Active Plan')); ?></b></td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php echo e(!empty($member->membershipLates) && !empty($member->membershipLates->plans) ? $member->membershipLates->plans->plan_name : '-'); ?>

                                                        <br>
                                                        <?php echo e(!empty($member->membershipLates) ? dateFormat($member->membershipLates->expiry_date) : '-'); ?>




                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if(!empty($member->details)): ?>
            <div class="col-sm-12">
                <div class="card border">
                    <div class="card-header">
                        <h5><?php echo e(__('Member Additional Details')); ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <?php if(!empty($member->details->full_name)): ?>
                                        <tr>
                                            <td><b class="text-header"><?php echo e(__('Full Name')); ?></b></td>
                                            <td>:</td>
                                            <td><?php echo e($member->details->full_name); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if(!empty($member->details->phone_whatsapp)): ?>
                                        <tr>
                                            <td><b class="text-header"><?php echo e(__('Phone/WhatsApp')); ?></b></td>
                                            <td>:</td>
                                            <td><?php echo e($member->details->phone_whatsapp); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if(!empty($member->details->business_company_name)): ?>
                                        <tr>
                                            <td><b class="text-header"><?php echo e(__('Business/Company Name')); ?></b></td>
                                            <td>:</td>
                                            <td><?php echo e($member->details->business_company_name); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if(!empty($member->details->role_in_company)): ?>
                                        <tr>
                                            <td><b class="text-header"><?php echo e(__('Role in Company')); ?></b></td>
                                            <td>:</td>
                                            <td>
                                                <?php if(is_array($member->details->role_in_company)): ?>
                                                    <?php echo e(implode(', ', $member->details->role_in_company)); ?>

                                                <?php else: ?>
                                                    <?php echo e($member->details->role_in_company); ?>

                                                <?php endif; ?>
                                                <?php if(!empty($member->details->role_other)): ?>
                                                    - <?php echo e($member->details->role_other); ?>

                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if(!empty($member->details->represent_ngo)): ?>
                                        <tr>
                                            <td><b class="text-header"><?php echo e(__('Represent NGO')); ?></b></td>
                                            <td>:</td>
                                            <td><?php echo e($member->details->represent_ngo); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if(!empty($member->details->ngo_position)): ?>
                                        <tr>
                                            <td><b class="text-header"><?php echo e(__('NGO Position')); ?></b></td>
                                            <td>:</td>
                                            <td><?php echo e($member->details->ngo_position); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if(!empty($member->details->ngo_name)): ?>
                                        <tr>
                                            <td><b class="text-header"><?php echo e(__('NGO Name')); ?></b></td>
                                            <td>:</td>
                                            <td><?php echo e($member->details->ngo_name); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if(!empty($member->details->ngo_business_count)): ?>
                                        <tr>
                                            <td><b class="text-header"><?php echo e(__('NGO/Business Count')); ?></b></td>
                                            <td>:</td>
                                            <td><?php echo e($member->details->ngo_business_count); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if(!empty($member->details->ssm_status)): ?>
                                        <tr>
                                            <td><b class="text-header"><?php echo e(__('SSM Status')); ?></b></td>
                                            <td>:</td>
                                            <td><?php echo e($member->details->ssm_status); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if(!empty($member->details->ssm_registration_number)): ?>
                                        <tr>
                                            <td><b class="text-header"><?php echo e(__('SSM Registration Number')); ?></b></td>
                                            <td>:</td>
                                            <td><?php echo e($member->details->ssm_registration_number); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if(!empty($member->details->has_bank_account)): ?>
                                        <tr>
                                            <td><b class="text-header"><?php echo e(__('Has Bank Account')); ?></b></td>
                                            <td>:</td>
                                            <td><?php echo e($member->details->has_bank_account); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if(!empty($member->details->office_address)): ?>
                                        <tr>
                                            <td><b class="text-header"><?php echo e(__('Office Address')); ?></b></td>
                                            <td>:</td>
                                            <td><?php echo e($member->details->office_address); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if(!empty($member->details->office_state)): ?>
                                        <tr>
                                            <td><b class="text-header"><?php echo e(__('Office State')); ?></b></td>
                                            <td>:</td>
                                            <td><?php echo e($member->details->office_state); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if(!empty($member->details->office_district)): ?>
                                        <tr>
                                            <td><b class="text-header"><?php echo e(__('Office District')); ?></b></td>
                                            <td>:</td>
                                            <td><?php echo e($member->details->office_district); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if(!empty($member->details->business_problems)): ?>
                                        <tr>
                                            <td><b class="text-header"><?php echo e(__('Business Problems')); ?></b></td>
                                            <td>:</td>
                                            <td>
                                                <?php if(is_array($member->details->business_problems)): ?>
                                                    <?php echo e(implode(', ', $member->details->business_problems)); ?>

                                                <?php else: ?>
                                                    <?php echo e($member->details->business_problems); ?>

                                                <?php endif; ?>
                                                <?php if(!empty($member->details->business_problems_other)): ?>
                                                    - <?php echo e($member->details->business_problems_other); ?>

                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if(!empty($member->details->support_required)): ?>
                                        <tr>
                                            <td><b class="text-header"><?php echo e(__('Support Required')); ?></b></td>
                                            <td>:</td>
                                            <td>
                                                <?php if(is_array($member->details->support_required)): ?>
                                                    <?php echo e(implode(', ', $member->details->support_required)); ?>

                                                <?php else: ?>
                                                    <?php echo e($member->details->support_required); ?>

                                                <?php endif; ?>
                                                <?php if(!empty($member->details->support_required_other)): ?>
                                                    - <?php echo e($member->details->support_required_other); ?>

                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if(!empty($member->details->suggestions_feedback)): ?>
                                        <tr>
                                            <td><b class="text-header"><?php echo e(__('Suggestions/Feedback')); ?></b></td>
                                            <td>:</td>
                                            <td><?php echo e($member->details->suggestions_feedback); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if(!empty($member->details->social_media_accounts)): ?>
                                        <tr>
                                            <td><b class="text-header"><?php echo e(__('Social Media Accounts')); ?></b></td>
                                            <td>:</td>
                                            <td>
                                                <?php if(is_array($member->details->social_media_accounts)): ?>
                                                    <?php echo e(implode(', ', $member->details->social_media_accounts)); ?>

                                                <?php else: ?>
                                                    <?php echo e($member->details->social_media_accounts); ?>

                                                <?php endif; ?>
                                                <?php if(!empty($member->details->social_media_other)): ?>
                                                    - <?php echo e($member->details->social_media_other); ?>

                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if(!empty($member->details->social_media_link)): ?>
                                        <tr>
                                            <td><b class="text-header"><?php echo e(__('Social Media Link')); ?></b></td>
                                            <td>:</td>
                                            <td>
                                                <a href="<?php echo e($member->details->social_media_link); ?>" target="_blank"><?php echo e($member->details->social_media_link); ?></a>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if(!empty($member->details->delivery_app_interest)): ?>
                                        <tr>
                                            <td><b class="text-header"><?php echo e(__('Delivery App Interest')); ?></b></td>
                                            <td>:</td>
                                            <td><?php echo e($member->details->delivery_app_interest); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if(!empty($member->details->learned_from)): ?>
                                        <tr>
                                            <td><b class="text-header"><?php echo e(__('Learned From')); ?></b></td>
                                            <td>:</td>
                                            <td>
                                                <?php if(is_array($member->details->learned_from)): ?>
                                                    <?php echo e(implode(', ', $member->details->learned_from)); ?>

                                                <?php else: ?>
                                                    <?php echo e($member->details->learned_from); ?>

                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if(!empty($member->details->invited_by)): ?>
                                        <tr>
                                            <td><b class="text-header"><?php echo e(__('Invited By')); ?></b></td>
                                            <td>:</td>
                                            <td><?php echo e($member->details->invited_by); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if(isset($member->details->declaration_consent)): ?>
                                        <tr>
                                            <td><b class="text-header"><?php echo e(__('Declaration Consent')); ?></b></td>
                                            <td>:</td>
                                            <td>
                                                <?php if($member->details->declaration_consent): ?>
                                                    <span class="badge text-bg-success"><?php echo e(__('Yes')); ?></span>
                                                <?php else: ?>
                                                    <span class="badge text-bg-danger"><?php echo e(__('No')); ?></span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="col-sm-12">
            <div class="card table-card">
                <div class="card-header">
                    <div class="row align-items-center g-2">
                        <div class="col">
                            <h5>
                                <?php echo e(__('Documents')); ?>

                            </h5>
                        </div>
                        <div class="col-auto">
                            <a class="btn btn-secondary customModal" href="#" data-size="lg"
                                data-url="<?php echo e(route('member.document.create', $member->id)); ?>"
                                data-title="<?php echo e(__('Create Document')); ?>">
                                <i class="ti ti-circle-plus align-text-bottom"></i>
                                <?php echo e(__('Create Document')); ?>

                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="dt-responsive table-responsive">
                        <table class="table table-hover advance-datatable">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Name')); ?></th>
                                    <th><?php echo e(__('Type')); ?></th>
                                    <th><?php echo e(__('Upload Date')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>
                                    <th><?php echo e(__('Document')); ?></th>
                                    <th><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($document->document_name); ?> </td>
                                        <td><?php echo e(!empty($document->types) ? $document->types->type : ''); ?> </td>
                                        <td><?php echo e(dateFormat($document->upload_date)); ?> </td>
                                        <td><?php echo e($document->status); ?> </td>
                                        <td>
                                            <a href="<?php echo e(asset(Storage::url('upload/member/document')) . '/' . $document->document); ?>"
                                                download="download">
                                                <i data-feather="download" class=""></i>
                                            </a>
                                        </td>
                                        <td>
                                            <div class="cart-action">
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['member.document.destroy', $document->id]]); ?>

                                                <a class="avtar avtar-xs btn-link-secondary text-secondary customModal"
                                                    data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Edit')); ?>"
                                                    href="#" data-size="md"
                                                    data-url="<?php echo e(route('member.document.edit', $document)); ?>"
                                                    data-title="<?php echo e(__('Edit Document')); ?>"> <i data-feather="edit"></i></a>
                                                <a class=" avtar avtar-xs btn-link-danger text-danger confirm_dialog"
                                                    data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Detete')); ?>"
                                                    href="#"> <i data-feather="trash-2"></i></a>
                                                <?php echo Form::close(); ?>

                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-sm-12">
            <div class="card table-card">
                <div class="card-header">
                    <div class="row align-items-center g-2">
                        <div class="col">
                            <h5>
                                <?php echo e(__('Membership History')); ?>

                            </h5>
                        </div>

                        <?php if($status == 'true'): ?>
                            <div class="col-auto">
                                <a class="btn btn-secondary customModal" href="#" data-size="lg"
                                    data-url="<?php echo e(route('membership-payment.edit', $lastMembership->plan_id)); ?>"
                                    data-title="<?php echo e(__('Renew')); ?>">
                                    <i class="ti ti-circle-plus align-text-bottom"></i>
                                    <?php echo e(__('Renew')); ?>

                                </a>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="dt-responsive table-responsive">
                        <table class="table table-hover advance-datatable">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Plan')); ?></th>
                                    <th><?php echo e(__('Start Date')); ?></th>
                                    <th><?php echo e(__('Expiry Date')); ?></th>
                                    
                                    <?php if(Gate::check('edit membership') || Gate::check('delete membership') || Gate::check('show membership')): ?>
                                        <th><?php echo e(__('Action')); ?></th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $__currentLoopData = $memberships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $membership): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        </td>
                                        <td><?php echo e(!empty($membership->plans) ? $membership->plans->plan_name : '-'); ?></td>
                                        <td><?php echo e(dateFormat($membership->start_date)); ?></td>
                                        <td><?php echo e(dateFormat($membership->expiry_date)); ?></td>


                                        
                                        <?php if(Gate::check('edit membership') || Gate::check('delete membership') || Gate::check('show membership')): ?>
                                            <td>
                                                <?php echo Form::open(['route' => ['membership.destroy', $membership->id], 'method' => 'DELETE']); ?>

                                                <?php if(Gate::check('show membership')): ?>
                                                    <a href="#"
                                                        class="avtar avtar-xs btn-link-warning text-warning customModal"
                                                        data-size="lg"
                                                        data-url="<?php echo e(route('membership.show', $membership->id)); ?>"
                                                        data-title="<?php echo e(__('View Membership')); ?>">
                                                        <i data-feather="eye"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if(Gate::check('delete membership')): ?>
                                                    <a href="#"
                                                        class="avtar avtar-xs btn-link-danger text-danger confirm_dialog"
                                                        data-title="<?php echo e(__('Delete Membership')); ?>">
                                                        <i data-feather="trash-2"></i>
                                                    </a>
                                                <?php endif; ?>

                                                <?php echo Form::close(); ?>

                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-sm-12">
            <div class="card table-card">
                <div class="card-header">
                    <div class="row align-items-center g-2">
                        <div class="col">
                            <h5>
                                <?php echo e(__('Membership Payment History')); ?>

                            </h5>
                        </div>


                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="dt-responsive table-responsive">
                        <table class="table table-hover advance-datatable">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('ID')); ?></th>
                                    <th><?php echo e(__('Member')); ?></th>
                                    <th><?php echo e(__('Plan')); ?></th>
                                    <th><?php echo e(__('Period')); ?></th>
                                    <th><?php echo e(__('Amount')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>

                                    <?php if(Gate::check('show membership payment') || Gate::check('delete membership payment')): ?>
                                        <th><?php echo e(__('Action')); ?></th>
                                    <?php endif; ?>
                                </tr>

                            </thead>
                            <tbody>

                                <?php $__currentLoopData = $membershipPayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $membership = App\Models\Membership::where('member_id', $payment->member_id)
                                            ->where('plan_id', $payment->plan_id)
                                            ->first();
                                    ?>

                                    <tr>
                                        <td><?php echo e(paymentPrefix() . $payment->payment_id); ?></td>
                                        <td><?php echo e(!empty($payment->members) ? $payment->members->first_name : ''); ?></td>
                                        <td><?php echo e(!empty($payment->plans) ? $payment->plans->plan_name : ''); ?></td>
                                        <td> <?php echo e(dateFormat($membership->start_date) ?? '-'); ?> -
                                            <?php echo e(dateFormat($membership->expiry_date) ?? '-'); ?></td>

                                        <td><?php echo e(priceFormat($payment->amount)); ?></td>
                                        <td>
                                            <?php if($payment->status == 'Paid'): ?>
                                                <span class="badge text-bg-success"><?php echo e($payment->status); ?></span>
                                            <?php else: ?>
                                                <span class="badge text-bg-danger"><?php echo e($payment->status); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <?php if(Gate::check('show membership payment') || Gate::check('delete membership payment')): ?>
                                            <td>
                                                <?php echo Form::open(['route' => ['membership-payment.destroy', $payment->id], 'method' => 'DELETE']); ?>

                                                <?php if(Gate::check('show membership payment')): ?>
                                                    <a class="avtar avtar-xs btn-link-warning text-warning"
                                                        href="<?php echo e(route('membership-payment.show', \Illuminate\Support\Facades\Crypt::encrypt($payment->id))); ?>">
                                                        <i data-feather="eye"></i>
                                                    </a>
                                                <?php endif; ?>

                                                <?php if(Gate::check('delete membership payment')): ?>
                                                    <a class="avtar avtar-xs btn-link-danger text-danger confirm_dialog"
                                                        href="#">
                                                        <i data-feather="trash-2"></i>
                                                    </a>
                                                <?php endif; ?>

                                                <?php if(\Auth::user()->type != 'member' && $payment->status == 'Pending'): ?>
                                                    <a class="avtar avtar-xs btn-link-secondary text-secondary"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-original-title="<?php echo e(__('Accept')); ?>"
                                                        href="<?php echo e(route('membership.bank.transfer.action', [$payment->id, 'accept'])); ?>">
                                                        <i data-feather="user-check"></i>
                                                    </a>

                                                    <a class="avtar avtar-xs btn-link-danger text-danger"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-original-title="<?php echo e(__('Reject')); ?>"
                                                        href="<?php echo e(route('membership.bank.transfer.action', [$payment->id, 'reject'])); ?>">
                                                        <i data-feather="user-x"></i>
                                                    </a>

                                                <?php endif; ?>

                                                <?php echo Form::close(); ?>

                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp-new\www\dppum\resources\views/member/show.blade.php ENDPATH**/ ?>
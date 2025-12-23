

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Complete Your Member Details')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Member Details')); ?></li>
    </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <style>
        .step-indicator {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            position: relative;
        }
        
        .step-indicator::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 0;
            right: 0;
            height: 2px;
            background: #e0e0e0;
            z-index: 0;
        }
        
        .step {
            flex: 1;
            text-align: center;
            position: relative;
            z-index: 1;
        }
        
        .step-number {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #e0e0e0;
            color: #666;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        
        .step.active .step-number {
            background: #4680ff;
            color: white;
        }
        
        .step.completed .step-number {
            background: #2ca87f;
            color: white;
        }
        
        .step-title {
            font-size: 12px;
            color: #666;
            font-weight: 500;
        }
        
        .step.active .step-title {
            color: #4680ff;
            font-weight: 600;
        }
        
        .form-step {
            display: none;
        }
        
        .form-step.active {
            display: block;
        }
        
        .form-navigation {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
        }
        
        .checkbox-group {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 10px;
        }
        
        .checkbox-item {
            display: flex;
            align-items: center;
        }
        
        .checkbox-item input[type="checkbox"] {
            margin-right: 8px;
        }
        
        .required-field::after {
            content: " *";
            color: #dc2626;
        }
        
        .conditional-field {
            display: none;
            margin-top: 15px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 5px;
        }
        
        .conditional-field.show {
            display: block;
        }
    </style>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <!-- Step Indicator -->
                    <div class="step-indicator">
                        <div class="step active" data-step="1">
                            <div class="step-number">1</div>
                            <div class="step-title">Basic Info</div>
                        </div>
                        <div class="step" data-step="2">
                            <div class="step-number">2</div>
                            <div class="step-title">NGO & Business</div>
                        </div>
                        <div class="step" data-step="3">
                            <div class="step-number">3</div>
                            <div class="step-title">Location</div>
                        </div>
                        <div class="step" data-step="4">
                            <div class="step-number">4</div>
                            <div class="step-title">Business Issues</div>
                        </div>
                        <div class="step" data-step="5">
                            <div class="step-number">5</div>
                            <div class="step-title">Social & Referral</div>
                        </div>
                    </div>

                    <form id="memberDetailsForm" method="POST">
                        <?php echo csrf_field(); ?>

                        <!-- Step 1: Basic Information -->
                        <div class="form-step active" data-step="1">
                            <h4 class="mb-4">Section A: Basic Information</h4>
                            
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="full_name" class="form-label required-field">Full Name</label>
                                    <input type="text" class="form-control" id="full_name" name="full_name" 
                                           placeholder="Enter your full name" value="<?php echo e($existingData->full_name ?? $member->first_name . ' ' . $member->last_name); ?>" required>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="phone_whatsapp" class="form-label required-field">Phone Number / WhatsApp</label>
                                    <input type="text" class="form-control" id="phone_whatsapp" name="phone_whatsapp" 
                                           placeholder="Enter your phone/WhatsApp number" value="<?php echo e($existingData->phone_whatsapp ?? $member->phone); ?>" required>
                                </div>
                                
                                <div class="form-group col-md-12">
                                    <label for="business_company_name" class="form-label required-field">Business / Company Name</label>
                                    <input type="text" class="form-control" id="business_company_name" name="business_company_name" 
                                           placeholder="Enter your business/company name" value="<?php echo e($existingData->business_company_name ?? ''); ?>" required>
                                </div>
                                
                                <div class="form-group col-md-12">
                                    <label class="form-label required-field">Your Role in the Company / Business (Multiple selection allowed)</label>
                                    <div class="checkbox-group">
                                        <?php
                                            $roles = [
                                                'Company Owner',
                                                'Founder',
                                                'Shareholder',
                                                'Director',
                                                'Chief Executive / Top Management',
                                                'Operations Manager',
                                                'Finance Manager',
                                                'Marketing Manager',
                                                'Human Resource Manager',
                                                'IT Manager',
                                                'Supervisor',
                                                'Operations Staff',
                                                'Support / Admin Staff',
                                                'Advisor / Consultant',
                                                'Investor',
                                                'Strategic Partner / Business Partner'
                                            ];
                                            $selectedRoles = $existingData->role_in_company ?? [];
                                        ?>
                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="role_<?php echo e($loop->index); ?>" name="role_in_company[]" 
                                                       value="<?php echo e($role); ?>" <?php echo e(in_array($role, $selectedRoles) ? 'checked' : ''); ?>>
                                                <label for="role_<?php echo e($loop->index); ?>"><?php echo e($role); ?></label>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <div class="checkbox-item">
                                            <input type="checkbox" id="role_other_check" name="role_in_company[]" 
                                                   value="Other" <?php echo e(in_array('Other', $selectedRoles) ? 'checked' : ''); ?>>
                                            <label for="role_other_check">Other (Specify)</label>
                                        </div>
                                    </div>
                                    <div id="role_other_field" class="conditional-field">
                                        <input type="text" class="form-control" id="role_other" name="role_other" 
                                               placeholder="Please specify your role" value="<?php echo e($existingData->role_other ?? ''); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Step 2: NGO & Business Registration -->
                        <div class="form-step" data-step="2">
                            <h4 class="mb-4">NGO Representation & Business Registration</h4>
                            
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="form-label required-field">Do you represent any NGO?</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="represent_ngo" id="ngo_yes" 
                                                   value="Yes" <?php echo e(($existingData->represent_ngo ?? '') == 'Yes' ? 'checked' : ''); ?> required>
                                            <label class="form-check-label" for="ngo_yes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="represent_ngo" id="ngo_no" 
                                                   value="No" <?php echo e(($existingData->represent_ngo ?? 'No') == 'No' ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="ngo_no">No</label>
                                        </div>
                                    </div>
                                </div>

                                <div id="ngo_details" class="conditional-field" style="display: none;">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="ngo_position" class="form-label">Your Position in the NGO</label>
                                            <select class="form-control" id="ngo_position" name="ngo_position">
                                                <option value="">Select Position</option>
                                                <option value="President" <?php echo e(($existingData->ngo_position ?? '') == 'President' ? 'selected' : ''); ?>>President</option>
                                                <option value="Vice President" <?php echo e(($existingData->ngo_position ?? '') == 'Vice President' ? 'selected' : ''); ?>>Vice President</option>
                                                <option value="Secretary" <?php echo e(($existingData->ngo_position ?? '') == 'Secretary' ? 'selected' : ''); ?>>Secretary</option>
                                                <option value="Treasurer" <?php echo e(($existingData->ngo_position ?? '') == 'Treasurer' ? 'selected' : ''); ?>>Treasurer</option>
                                                <option value="Committee Member" <?php echo e(($existingData->ngo_position ?? '') == 'Committee Member' ? 'selected' : ''); ?>>Committee Member</option>
                                                <option value="Other" <?php echo e(($existingData->ngo_position ?? '') == 'Other' ? 'selected' : ''); ?>>Other</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                            <label for="ngo_name" class="form-label">NGO Name</label>
                                            <input type="text" class="form-control" id="ngo_name" name="ngo_name" 
                                                   placeholder="Enter NGO name" value="<?php echo e($existingData->ngo_name ?? ''); ?>">
                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                            <label for="ngo_business_count" class="form-label">Estimated number of businesses under your NGO</label>
                                            <select class="form-control" id="ngo_business_count" name="ngo_business_count">
                                                <option value="">Select Range</option>
                                                <option value="Less than 10 people" <?php echo e(($existingData->ngo_business_count ?? '') == 'Less than 10 people' ? 'selected' : ''); ?>>Less than 10 people</option>
                                                <option value="10 – 50 people" <?php echo e(($existingData->ngo_business_count ?? '') == '10 – 50 people' ? 'selected' : ''); ?>>10 – 50 people</option>
                                                <option value="51 – 100 people" <?php echo e(($existingData->ngo_business_count ?? '') == '51 – 100 people' ? 'selected' : ''); ?>>51 – 100 people</option>
                                                <option value="101 – 500 people" <?php echo e(($existingData->ngo_business_count ?? '') == '101 – 500 people' ? 'selected' : ''); ?>>101 – 500 people</option>
                                                <option value="Others" <?php echo e(($existingData->ngo_business_count ?? '') == 'Others' ? 'selected' : ''); ?>>Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12"><hr class="my-4"></div>
                                <h5 class="mb-3">Section B: Business Registration</h5>
                                
                                <div class="form-group col-md-6">
                                    <label class="form-label required-field">Do you have SSM business registration?</label>
                                    <select class="form-control" name="ssm_status" required>
                                        <option value="">Select Option</option>
                                        <option value="Yes, I already have SSM" <?php echo e(($existingData->ssm_status ?? '') == 'Yes, I already have SSM' ? 'selected' : ''); ?>>Yes, I already have SSM</option>
                                        <option value="No, but I am interested (PPUM will try to guide you)" <?php echo e(($existingData->ssm_status ?? '') == 'No, but I am interested (PPUM will try to guide you)' ? 'selected' : ''); ?>>No, but I am interested (PPUM will try to guide you)</option>
                                        <option value="In the process of registering SSM" <?php echo e(($existingData->ssm_status ?? '') == 'In the process of registering SSM' ? 'selected' : ''); ?>>In the process of registering SSM</option>
                                    </select>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="ssm_registration_number" class="form-label required-field">SSM Registration Number</label>
                                    <input type="text" class="form-control" id="ssm_registration_number" name="ssm_registration_number" 
                                           placeholder="Enter SSM number or 'None'" value="<?php echo e($existingData->ssm_registration_number ?? ''); ?>" required>
                                    <small class="form-text text-muted">Write "None" if not available</small>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label class="form-label required-field">Do you have a Bank Account?</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="has_bank_account" id="bank_yes" 
                                                   value="Yes" <?php echo e(($existingData->has_bank_account ?? '') == 'Yes' ? 'checked' : ''); ?> required>
                                            <label class="form-check-label" for="bank_yes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="has_bank_account" id="bank_no" 
                                                   value="No" <?php echo e(($existingData->has_bank_account ?? '') == 'No' ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="bank_no">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Step 3: Location & Proof -->
                        <div class="form-step" data-step="3">
                            <h4 class="mb-4">Section D: Location & Proof</h4>
                            
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="office_address" class="form-label required-field">Office / Premise / Shop Address</label>
                                    <textarea class="form-control" id="office_address" name="office_address" rows="3" 
                                              placeholder="Enter your business address" required><?php echo e($existingData->office_address ?? ''); ?></textarea>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="office_state" class="form-label required-field">State of Office / Premise / Shop</label>
                                    <select class="form-control" id="office_state" name="office_state" required>
                                        <option value="">Select State</option>
                                        <?php
                                            $malaysianStates = [
                                                'Johor', 'Kedah', 'Kelantan', 'Melaka', 'Negeri Sembilan',
                                                'Pahang', 'Penang', 'Perak', 'Perlis', 'Sabah',
                                                'Sarawak', 'Selangor', 'Terengganu', 'Kuala Lumpur', 
                                                'Labuan', 'Putrajaya'
                                            ];
                                        ?>
                                        <?php $__currentLoopData = $malaysianStates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($state); ?>" <?php echo e(($existingData->office_state ?? '') == $state ? 'selected' : ''); ?>><?php echo e($state); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="office_district" class="form-label required-field">District of Office / Premise / Shop</label>
                                    <input type="text" class="form-control" id="office_district" name="office_district" 
                                           placeholder="Enter district" value="<?php echo e($existingData->office_district ?? ''); ?>" required>
                                </div>
                            </div>
                        </div>

                        <!-- Step 4: Business Issues -->
                        <div class="form-step" data-step="4">
                            <h4 class="mb-4">Current Business Issues & Support</h4>
                            
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="form-label required-field">Problems / Constraints in your current business (Multiple selection allowed)</label>
                                    <div class="checkbox-group">
                                        <?php
                                            $problems = [
                                                'Capital',
                                                'License / Permit',
                                                'Marketing',
                                                'Workers',
                                                'Supplier',
                                                'Logistics',
                                                'Networking'
                                            ];
                                            $selectedProblems = $existingData->business_problems ?? [];
                                        ?>
                                        <?php $__currentLoopData = $problems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $problem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="problem_<?php echo e($loop->index); ?>" name="business_problems[]" 
                                                       value="<?php echo e($problem); ?>" <?php echo e(in_array($problem, $selectedProblems) ? 'checked' : ''); ?>>
                                                <label for="problem_<?php echo e($loop->index); ?>"><?php echo e($problem); ?></label>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <div class="checkbox-item">
                                            <input type="checkbox" id="problem_other_check" name="business_problems[]" 
                                                   value="Other" <?php echo e(in_array('Other', $selectedProblems) ? 'checked' : ''); ?>>
                                            <label for="problem_other_check">Other (Specify)</label>
                                        </div>
                                    </div>
                                    <div id="problem_other_field" class="conditional-field">
                                        <input type="text" class="form-control" id="business_problems_other" name="business_problems_other" 
                                               placeholder="Please specify other problems" value="<?php echo e($existingData->business_problems_other ?? ''); ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group col-md-12">
                                    <label class="form-label required-field">Support / Assistance Required (Multiple selection allowed)</label>
                                    <div class="checkbox-group">
                                        <?php
                                            $supports = [
                                                'Financial assistance / Capital',
                                                'Training & Courses',
                                                'Marketing & Promotion',
                                                'Technology & Digitalisation',
                                                'Operational support (Logistics / Infrastructure)',
                                                'Advocacy / Business voice'
                                            ];
                                            $selectedSupports = $existingData->support_required ?? [];
                                        ?>
                                        <?php $__currentLoopData = $supports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $support): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="support_<?php echo e($loop->index); ?>" name="support_required[]" 
                                                       value="<?php echo e($support); ?>" <?php echo e(in_array($support, $selectedSupports) ? 'checked' : ''); ?>>
                                                <label for="support_<?php echo e($loop->index); ?>"><?php echo e($support); ?></label>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <div class="checkbox-item">
                                            <input type="checkbox" id="support_other_check" name="support_required[]" 
                                                   value="Other" <?php echo e(in_array('Other', $selectedSupports) ? 'checked' : ''); ?>>
                                            <label for="support_other_check">Other (Specify)</label>
                                        </div>
                                    </div>
                                    <div id="support_other_field" class="conditional-field">
                                        <input type="text" class="form-control" id="support_required_other" name="support_required_other" 
                                               placeholder="Please specify other support needed" value="<?php echo e($existingData->support_required_other ?? ''); ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group col-md-12">
                                    <label for="suggestions_feedback" class="form-label required-field">Suggestions / Feedback for DPPUM</label>
                                    <textarea class="form-control" id="suggestions_feedback" name="suggestions_feedback" rows="4" 
                                              placeholder="Share your suggestions or feedback" required><?php echo e($existingData->suggestions_feedback ?? ''); ?></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Step 5: Social Media & Referral -->
                        <div class="form-step" data-step="5">
                            <h4 class="mb-4">Social Media, Delivery App & Referral</h4>
                            
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="form-label">Do you have any social media accounts? (Multiple selection allowed)</label>
                                    <div class="checkbox-group">
                                        <?php
                                            $socialMedia = [
                                                'TikTok',
                                                'Facebook',
                                                'Instagram',
                                                'Telegram',
                                                'Website',
                                                'None'
                                            ];
                                            $selectedSocial = $existingData->social_media_accounts ?? [];
                                        ?>
                                        <?php $__currentLoopData = $socialMedia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="social_<?php echo e($loop->index); ?>" name="social_media_accounts[]" 
                                                       value="<?php echo e($media); ?>" <?php echo e(in_array($media, $selectedSocial) ? 'checked' : ''); ?>>
                                                <label for="social_<?php echo e($loop->index); ?>"><?php echo e($media); ?></label>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <div class="checkbox-item">
                                            <input type="checkbox" id="social_other_check" name="social_media_accounts[]" 
                                                   value="Other" <?php echo e(in_array('Other', $selectedSocial) ? 'checked' : ''); ?>>
                                            <label for="social_other_check">Other (Specify)</label>
                                        </div>
                                    </div>
                                    <div id="social_other_field" class="conditional-field">
                                        <input type="text" class="form-control" id="social_media_other" name="social_media_other" 
                                               placeholder="Please specify other social media" value="<?php echo e($existingData->social_media_other ?? ''); ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group col-md-12">
                                    <label for="social_media_link" class="form-label">Business Social Media / Website Link</label>
                                    <input type="text" class="form-control" id="social_media_link" name="social_media_link" 
                                           placeholder="Enter your business link or write 'None'" value="<?php echo e($existingData->social_media_link ?? ''); ?>">
                                    <small class="form-text text-muted">Write "None" if not available</small>
                                </div>
                                
                                <div class="col-md-12"><hr class="my-4"></div>
                                <h5 class="mb-3">Section G: Business Listing in Food Delivery App</h5>
                                
                                <div class="form-group col-md-12">
                                    <label class="form-label required-field">Are you interested in listing your product/menu/service in the Delivery App for FREE?</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="delivery_app_interest" id="delivery_yes" 
                                                   value="Yes" <?php echo e(($existingData->delivery_app_interest ?? '') == 'Yes' ? 'checked' : ''); ?> required>
                                            <label class="form-check-label" for="delivery_yes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="delivery_app_interest" id="delivery_no" 
                                                   value="No" <?php echo e(($existingData->delivery_app_interest ?? '') == 'No' ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="delivery_no">No</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12"><hr class="my-4"></div>
                                <h5 class="mb-3">Section H: Referral / Source</h5>
                                
                                <div class="form-group col-md-12">
                                    <label class="form-label required-field">Through which social media platform did you first learn about DPPUM? (Multiple selection allowed)</label>
                                    <div class="checkbox-group">
                                        <?php
                                            $learnedFrom = [
                                                'Facebook DPPUM',
                                                'TikTok',
                                                'WhatsApp Group',
                                                'Telegram DPPUM',
                                                'Friends',
                                                'Banner',
                                                'Flyers'
                                            ];
                                            $selectedLearned = $existingData->learned_from ?? [];
                                        ?>
                                        <?php $__currentLoopData = $learnedFrom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="checkbox-item">
                                                <input type="checkbox" id="learned_<?php echo e($loop->index); ?>" name="learned_from[]" 
                                                       value="<?php echo e($source); ?>" <?php echo e(in_array($source, $selectedLearned) ? 'checked' : ''); ?>>
                                                <label for="learned_<?php echo e($loop->index); ?>"><?php echo e($source); ?></label>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                
                                <div class="form-group col-md-12">
                                    <label for="invited_by" class="form-label required-field">Who invited or recommended you to join DPPUM?</label>
                                    <input type="text" class="form-control" id="invited_by" name="invited_by" 
                                           placeholder="Enter the name of the person who referred you" value="<?php echo e($existingData->invited_by ?? ''); ?>" required>
                                    <small class="form-text text-muted">Note: In some states, DPPUM organizes lucky draws/competitions based on referrals.</small>
                                </div>
                                
                                <div class="col-md-12"><hr class="my-4"></div>
                                <h5 class="mb-3">Final Declaration</h5>
                                
                                <div class="form-group col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="declaration_consent" name="declaration_consent" 
                                               value="1" <?php echo e(($existingData->declaration_consent ?? false) ? 'checked' : ''); ?> required>
                                        <label class="form-check-label" for="declaration_consent">
                                            <strong>I agree that the information provided is true and allow DPPUM to use it for monitoring, reference, and future improvement actions.</strong>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Navigation Buttons -->
                        <div class="form-navigation">
                            <button type="button" class="btn btn-secondary" id="prevBtn" style="display: none;">
                                <i class="ti ti-arrow-left"></i> Previous
                            </button>
                            <button type="button" class="btn btn-primary" id="nextBtn">
                                Next <i class="ti ti-arrow-right"></i>
                            </button>
                            <button type="submit" class="btn btn-success" id="submitBtn" style="display: none;">
                                <i class="ti ti-check"></i> Submit Form
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-page'); ?>
    <script>
        var successImg = '<?php echo e(asset('assets/images/notification/ok-48.png')); ?>';
        var errorImg = '<?php echo e(asset('assets/images/notification/high_priority-48.png')); ?>';
        
        function show_toastr(title, message, type) {
            var img = type === 'success' ? successImg : errorImg;
            notifier.show(title, message, type, img, 4000);
        }
        
        let currentStep = 1;
        const totalSteps = 5;

        $(document).ready(function() {
            // Show/hide other fields based on checkbox
            $('#role_other_check').on('change', function() {
                $('#role_other_field').toggleClass('show', this.checked);
            });

            $('#problem_other_check').on('change', function() {
                $('#problem_other_field').toggleClass('show', this.checked);
            });

            $('#support_other_check').on('change', function() {
                $('#support_other_field').toggleClass('show', this.checked);
            });

            $('#social_other_check').on('change', function() {
                $('#social_other_field').toggleClass('show', this.checked);
            });

            // Show/hide NGO details
            $('input[name="represent_ngo"]').on('change', function() {
                if ($(this).val() === 'Yes') {
                    $('#ngo_details').show();
                } else {
                    $('#ngo_details').hide();
                }
            });

            // Initialize NGO details visibility
            if ($('input[name="represent_ngo"]:checked').val() === 'Yes') {
                $('#ngo_details').show();
            }

            // Initialize other fields visibility
            if ($('#role_other_check').is(':checked')) {
                $('#role_other_field').addClass('show');
            }
            if ($('#problem_other_check').is(':checked')) {
                $('#problem_other_field').addClass('show');
            }
            if ($('#support_other_check').is(':checked')) {
                $('#support_other_field').addClass('show');
            }
            if ($('#social_other_check').is(':checked')) {
                $('#social_other_field').addClass('show');
            }

            // Next button
            $('#nextBtn').on('click', function() {
                if (validateStep(currentStep)) {
                    showStep(currentStep + 1);
                }
            });

            // Previous button
            $('#prevBtn').on('click', function() {
                showStep(currentStep - 1);
            });

            // Form submission
            $('#memberDetailsForm').on('submit', function(e) {
                e.preventDefault();

                if (!validateStep(currentStep)) {
                    return;
                }

                // Validate at least one checkbox is selected for required checkbox groups
                if (!validateCheckboxGroups()) {
                    return;
                }

                const formData = new FormData(this);
                
                $('#submitBtn').prop('disabled', true).html('<i class="ti ti-loader ti-spin"></i> Submitting...');

                $.ajax({
                    url: '<?php echo e(route("member-details.store")); ?>',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            show_toastr('Success', response.message, 'success');
                            setTimeout(function() {
                                window.location.href = response.redirect;
                            }, 1500);
                        }
                    },
                    error: function(xhr) {
                        $('#submitBtn').prop('disabled', false).html('<i class="ti ti-check"></i> Submit Form');
                        
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            show_toastr('Error', xhr.responseJSON.message, 'error');
                        } else {
                            show_toastr('Error', 'An error occurred while submitting the form.', 'error');
                        }

                        // Show validation errors
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            let errors = xhr.responseJSON.errors;
                            let errorMsg = '';
                            for (let field in errors) {
                                errorMsg += errors[field][0] + '<br>';
                            }
                            show_toastr('Validation Error', errorMsg, 'error');
                        }
                    }
                });
            });
        });

        function showStep(step) {
            if (step < 1 || step > totalSteps) return;

            // Hide current step
            $(`.form-step[data-step="${currentStep}"]`).removeClass('active');
            $(`.step[data-step="${currentStep}"]`).removeClass('active').addClass('completed');

            // Show new step
            currentStep = step;
            $(`.form-step[data-step="${currentStep}"]`).addClass('active');
            $(`.step[data-step="${currentStep}"]`).addClass('active').removeClass('completed');

            // Update completed steps
            for (let i = 1; i < currentStep; i++) {
                $(`.step[data-step="${i}"]`).addClass('completed');
            }

            // Update buttons
            $('#prevBtn').toggle(currentStep > 1);
            $('#nextBtn').toggle(currentStep < totalSteps);
            $('#submitBtn').toggle(currentStep === totalSteps);

            // Scroll to top
            $('html, body').animate({ scrollTop: 0 }, 300);
        }

        function validateStep(step) {
            const currentForm = $(`.form-step[data-step="${step}"]`);
            let isValid = true;

            // Validate required text inputs, selects, and textareas
            currentForm.find('input[required], select[required], textarea[required]').each(function() {
                if ($(this).attr('type') !== 'checkbox' && $(this).attr('type') !== 'radio') {
                    if (!$(this).val()) {
                        isValid = false;
                        $(this).addClass('is-invalid');
                    } else {
                        $(this).removeClass('is-invalid');
                    }
                }
            });

            // Validate required radio buttons
            currentForm.find('input[type="radio"][required]').each(function() {
                const name = $(this).attr('name');
                if (!$(`input[name="${name}"]:checked`).length) {
                    isValid = false;
                    $(this).closest('.form-group').find('label:first').addClass('text-danger');
                } else {
                    $(this).closest('.form-group').find('label:first').removeClass('text-danger');
                }
            });

            // Validate checkbox groups on step 1
            if (step === 1) {
                if (!$('input[name="role_in_company[]"]:checked').length) {
                    isValid = false;
                    show_toastr('Error', 'Please select at least one role in the company.', 'error');
                }
            }

            // Validate checkbox groups on step 4
            if (step === 4) {
                if (!$('input[name="business_problems[]"]:checked').length) {
                    isValid = false;
                    show_toastr('Error', 'Please select at least one business problem.', 'error');
                }
                if (!$('input[name="support_required[]"]:checked').length) {
                    isValid = false;
                    show_toastr('Error', 'Please select at least one support required.', 'error');
                }
            }

            // Validate checkbox groups on step 5
            if (step === 5) {
                if (!$('input[name="learned_from[]"]:checked').length) {
                    isValid = false;
                    show_toastr('Error', 'Please select at least one source where you learned about DPPUM.', 'error');
                }
                if (!$('#declaration_consent').is(':checked')) {
                    isValid = false;
                    show_toastr('Error', 'Please accept the declaration and consent to proceed.', 'error');
                }
            }

            if (!isValid) {
                show_toastr('Error', 'Please fill in all required fields before proceeding.', 'error');
            }

            return isValid;
        }

        function validateCheckboxGroups() {
            // Already validated in validateStep
            return true;
        }
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp-new\www\dppum\resources\views/member-details/form.blade.php ENDPATH**/ ?>
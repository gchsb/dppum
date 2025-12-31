<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Dashboard')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item" aria-current="page"><?php echo e(__('Dashboard')); ?></li>
<?php $__env->stopSection(); ?>
<?php
    $settings = settings();
?>
<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="avtar bg-light-warning">
                                <i class="ti ti-package f-24"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="mb-1"><?php echo e(__('Membership Plan')); ?></p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="mb-0 text-muted"><?php echo e($result['MembershipPlan']->plan_name ?? '-'); ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="avtar bg-light-warning">
                                <i class="ti ti-package f-24"></i>
                            </div>
                        </div>

                        
                        <div class="flex-grow-1 ms-3">
                            <p class="mb-1"><?php echo e(__('Membership Expiry Date')); ?></p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="mb-0 text-muted">
                                    <?php echo e(!empty($result['Membership']->expiry_date) ? dateformat($result['Membership']->expiry_date) : '-'); ?>

                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="avtar bg-light-primary">
                                <i class="ti ti-history f-24"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="mb-1"><?php echo e(__('Total Activity Tracking')); ?></p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="mb-0"><?php echo e($result['totalActivityTrack']); ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="avtar bg-light-secondary">
                                <i class="ti ti-users f-24"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="mb-1"><?php echo e(__('Total Membership Plan')); ?></p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="mb-0"><?php echo e($result['totalMemberbershipPlan']); ?></h5>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
            $currentMember = \App\Models\Member::where('user_id', Auth::id())->first();
            $memberDetails = $currentMember ? \App\Models\MemberDetail::where('member_id', $currentMember->id)->first() : null;
        ?>

        <?php if($currentMember && $currentMember->form_submitted && $memberDetails): ?>
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><?php echo e(__('Your Member Details')); ?></h5>
                    <a href="<?php echo e(route('member-details.edit')); ?>" class="btn btn-sm btn-primary">
                        <i class="ti ti-edit"></i> <?php echo e(__('Edit Details')); ?>

                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <p class="mb-2"><strong><?php echo e(__('Full Name')); ?>:</strong> <?php echo e($memberDetails->full_name); ?></p>
                            <p class="mb-2"><strong><?php echo e(__('Business/Company')); ?>:</strong> <?php echo e($memberDetails->business_company_name); ?></p>
                        </div>
                        <div class="col-md-4">
                            <p class="mb-2"><strong><?php echo e(__('Phone/WhatsApp')); ?>:</strong> <?php echo e($memberDetails->phone_whatsapp); ?></p>
                            <p class="mb-2"><strong><?php echo e(__('Office State')); ?>:</strong> <?php echo e($memberDetails->office_state); ?></p>
                        </div>
                        <div class="col-md-4">
                            <p class="mb-2"><strong><?php echo e(__('SSM Status')); ?>:</strong> <?php echo e($memberDetails->ssm_status); ?></p>
                            <p class="mb-2"><strong><?php echo e(__('Last Updated')); ?>:</strong> <?php echo e($memberDetails->updated_at->format('d M Y')); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>



        <div class="col-sm-12 mb-5">
            <div class="row g-4">
                <?php echo Form::hidden('plan', null, ['class' => 'new-plan']); ?>

                <?php $__currentLoopData = $memberShipPlans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $membershipPlan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $MemberLatPlan = lastMembershipPlan();
                    ?>
                    <div class="col-md-3">
                        <div class="card price-card p-4 border border-secondary border-2 h-100">
                            <div class="card-body bg-secondary bg-opacity-10 rounded v3">
                                <?php if(
                                    !empty($MemberLatPlan) &&
                                        $MemberLatPlan->status == 'Payment Pending' &&
                                        $MemberLatPlan->plan_id == $membershipPlan->plan_id): ?>
                                    <div class="position-absolute top-0 end-0 p-2">
                                        <span class="badge bg-secondary px-3 py-2 shadow-sm">
                                            <?php echo e(__('Payment Pending')); ?>

                                        </span>
                                    </div>
                                <?php endif; ?>



                                <h4 class="mb-0 text-secondary"><?php echo e($membershipPlan->plan_name); ?></h4>
                                <div class="price-price mt-3">
                                    <?php echo e(priceFormat($membershipPlan->price)); ?>

                                </div>

                                <ul class="list-group list-group-flush product-list v3">
                                    <li class="list-group-item"><?php echo e(__('Plan ID')); ?> :
                                        <?php echo e(planPrefix() . $membershipPlan->plan_id); ?></li>
                                    <li class="list-group-item"><?php echo e(__('Duration')); ?> : <?php echo e($membershipPlan->duration); ?>

                                    </li>
                                    <li class="list-group-item"><?php echo e(__('Billing Frequency')); ?> :
                                        <?php echo e($membershipPlan->billing_frequency); ?></li>
                                </ul>


                                <?php if($activeMembership && $activeMembership->plan_id == $membershipPlan->plan_id): ?>
                                    <span class="badge bg-secondary px-3 py-2 fs-6"><?php echo e(__('Active')); ?></span><br>
                                    <?php if($activeMembership->expiry_date): ?>
                                        <small><?php echo e(__('Expiry Date')); ?>:
                                            <?php echo e(date('d M Y', strtotime($activeMembership->expiry_date))); ?></small>
                                    <?php else: ?>
                                        <small><?php echo e(__('Unlimited')); ?></small>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if(Auth::user()->type == 'member'): ?>
                                        <?php if(!empty($MemberLatPlan) && $MemberLatPlan->plan_id == $membershipPlan->plan_id): ?>
                                            <?php if(
                                                $invoicePaymentSettings['STRIPE_PAYMENT'] == 'on' ||
                                                    $invoicePaymentSettings['paypal_payment'] == 'on' ||
                                                    $invoicePaymentSettings['bank_transfer_payment'] == 'on' ||
                                                    $invoicePaymentSettings['flutterwave_payment'] == 'on' ||
                                                    $invoicePaymentSettings['paystack_payment'] == 'on'): ?>
                                                <a class="btn btn-outline-info mt-3 customModal buy_now" href="#"
                                                    data-size="lg" data-id="<?php echo e(Crypt::encrypt($membershipPlan->id)); ?>"
                                                    data-url="<?php echo e(route('membership-payment.edit', $membershipPlan->id)); ?>?plan=<?php echo e(urlencode($membershipPlan->plan_name)); ?>"
                                                    data-title="<?php echo e(__('Renew Plan')); ?>">
                                                    <?php if($MemberLatPlan->status == 'Payment Pending'): ?>
                                                        <?php echo e(__('Make payment')); ?>

                                                    <?php else: ?>
                                                        <?php echo e(__('Renew')); ?>

                                                    <?php endif; ?>
                                                </a>
                                            <?php else: ?>
                                                <a href="#" class="btn btn-info disabled mt-3">
                                                    <?php if($MemberLatPlan->status == 'Payment Pending'): ?>
                                                        <?php echo e(__('Make payment')); ?>

                                                    <?php else: ?>
                                                        <?php echo e(__('Renew')); ?>

                                                    <?php endif; ?>
                                                </a>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?php if(
                                                $invoicePaymentSettings['STRIPE_PAYMENT'] == 'on' ||
                                                    $invoicePaymentSettings['paypal_payment'] == 'on' ||
                                                    $invoicePaymentSettings['bank_transfer_payment'] == 'on' ||
                                                    $invoicePaymentSettings['flutterwave_payment'] == 'on' ||
                                                    $invoicePaymentSettings['paystack_payment'] == 'on'): ?>
                                                <a class="btn btn-outline-primary mt-3 customModal buy_now" href="#"
                                                    data-size="lg" data-id="<?php echo e(Crypt::encrypt($membershipPlan->id)); ?>"
                                                    data-url="<?php echo e(route('membership-payment.edit', $membershipPlan->id)); ?>?plan=<?php echo e(urlencode($membershipPlan->plan_name)); ?>"
                                                    data-title="<?php echo e(__('Buy New Plan ')); ?>">
                                                    <?php echo e(__('Buy Now')); ?>

                                                </a>
                                            <?php else: ?>
                                                <a href="#" class="btn btn-primary disabled mt-3">
                                                    <?php echo e(__('Buy Now')); ?>

                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>


                            </div>
                        </div>
                    </div>

                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-page'); ?>

    <script>
        $(document).on("click", ".buy_now", function() {
            let planId = $(this).data('id');
            $('.new-plan').val(planId);
        });
    </script>

    <script src="https://js.stripe.com/v3/"></script>

    <?php if(
        $invoicePaymentSettings['STRIPE_PAYMENT'] == 'on' &&
            !empty($invoicePaymentSettings['STRIPE_KEY']) &&
            !empty($invoicePaymentSettings['STRIPE_SECRET'])): ?>
        <script type="text/javascript">
            let stripeCardInstance = null;



            $(document).on('click', '.stripe_payment_tab', function() {
                // Destroy old Stripe element if exists
                if (stripeCardInstance) {
                    stripeCardInstance.unmount();
                    $('#card-element').html(''); // Clear old element content
                }

                // Create new Stripe instance
                const stripe = Stripe('<?php echo e($invoicePaymentSettings['STRIPE_KEY']); ?>');
                const elements = stripe.elements();
                const style = {
                    base: {
                        fontSize: '14px',
                        color: '#32325d',
                    },
                };
                stripeCardInstance = elements.create('card', {
                    style: style
                });
                stripeCardInstance.mount('#card-element');

                // Attach submit handler only once
                const stripeForm = document.getElementById('stripe-payment');
                if (!stripeForm.dataset.handlerAttached) {
                    stripeForm.addEventListener('submit', function(event) {
                        event.preventDefault();

                        const billingDetails = {
                            line1: document.querySelector('[name="state"]')?.value || '',
                            city: document.querySelector('[name="city"]')?.value || '',
                            postal_code: document.querySelector('[name="zipcode"]')?.value || '',
                            country: document.querySelector('[name="country"]')?.value || ''
                        };

                        stripe.createToken(stripeCardInstance).then(function(result) {
                            if (result.error) {
                                $("#stripe_card_errors").html(result.error.message);
                                $.NotificationApp.send("Error", result.error.message, "top-right",
                                    "rgba(0,0,0,0.2)", "error");
                            } else {
                                const token = result.token;
                                const hiddenInput = document.createElement('input');
                                hiddenInput.setAttribute('type', 'hidden');
                                hiddenInput.setAttribute('name', 'stripeToken');
                                hiddenInput.setAttribute('value', token.id);
                                stripeForm.appendChild(hiddenInput);
                                stripeForm.submit();
                            }
                        });
                    });
                    stripeForm.dataset.handlerAttached = "true";
                }
            });
        </script>
    <?php endif; ?>


    
    <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
    <script>
        $(document).on("click", "#flutterwavePaymentBtn", function() {
            var amount = $('.amount').val().trim();
            if (!amount || amount <= 0) {
                alert('Please enter a valid amount');
                return;
            }

            let planId = $('.new-plan').val();

            var tx_ref = "RX1_" + Math.floor((Math.random() * 1000000000) + 1);
            var customer_email = '<?php echo e(\Auth::user()->email); ?>';
            var customer_name = '<?php echo e(\Auth::user()->name); ?>';
            var flutterwave_public_key = '<?php echo e($invoicePaymentSettings['flutterwave_public_key']); ?>';
            var currency = '<?php echo e($invoicePaymentSettings['CURRENCY']); ?>';

            var flutterwavePayment = getpaidSetup({
                txref: tx_ref,
                PBFPubKey: flutterwave_public_key,
                amount: amount, // Ensure amount is passed
                currency: currency,
                customer_email: customer_email,
                customer_name: customer_name,
                meta: [{
                    metaname: "payment_id",
                    metavalue: "id"
                }],
                onclose: function() {},
                callback: function(result) {
                    if (result.tx.chargeResponseCode == "00" || result.tx.chargeResponseCode == "0") {
                        var txRef = result.tx.txRef;
                        var redirectUrl =
                            "<?php echo e(url('membership/flutterwave')); ?>/" + planId +
                            "/" + txRef + "?amount=" + amount;

                        window.location.href = redirectUrl;
                    } else {
                        alert('Payment failed');
                    }
                    flutterwavePayment.close();
                }
            });
        });
    </script>

    
    <script src="<?php echo e(asset('assets/js/plugins/jquery.form.min.js')); ?>"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <?php if(isset($invoicePaymentSettings['paystack_payment']) && $invoicePaymentSettings['paystack_payment'] == 'on'): ?>
        <script>
            $(document).ready(function() {
                $(document).on("click", "#paystackPaymentBtn", function(e) {
                    e.preventDefault();

                    let planId = $('.new-plan').val();

                    const $button = $(this);
                    const $paymentForm = $('#paystack-payment-form');
                    const formActionUrl = $paymentForm.attr('action');
                    const formMethod = $paymentForm.attr('method');
                    const formSerializedData = $paymentForm.serialize();

                    const paystackPublicKey = "<?php echo e($invoicePaymentSettings['paystack_public_key']); ?>";
                    const redirectBaseUrl = "<?php echo e(url('/membership/paystack')); ?>";
                    const encryptedInvoiceId = planId;

                    $button.prop('disabled', true).text('Processing...');

                    $.ajax({
                        url: formActionUrl,
                        method: formMethod,
                        data: formSerializedData,
                        dataType: 'json',
                        success: function(res) {
                            if (res.flag === 1) {
                                const transactionReference = 'pay_ref_id' + Math.floor(Math
                                    .random() * 1000000000 + 1);
                                const couponId = res.coupon;

                                const paystackOptions = {
                                    key: paystackPublicKey,
                                    email: res.email,
                                    amount: res.total_price * 100,
                                    currency: res.currency,
                                    ref: transactionReference,
                                    metadata: {
                                        custom_fields: [{
                                            display_name: "Email",
                                            variable_name: "email",
                                            value: res.email
                                        }]
                                    },
                                    callback: function(response) {
                                        window.location.href =
                                            `${redirectBaseUrl}/${response.reference}/${encryptedInvoiceId}?coupon_id=${couponId}`;
                                    },
                                    onClose: function() {
                                        alert(
                                            'Payment popup was closed without completing.'
                                        );
                                        $button.prop('disabled', false).text('Pay Now');
                                    }
                                };

                                const paymentHandler = PaystackPop.setup(paystackOptions);
                                paymentHandler.openIframe();
                            } else if (res.flag === 2) {
                                show_toastr('Warning', res.message, 'msg');
                                $button.prop('disabled', false).text('Pay Now');
                            } else {
                                show_toastr('Error', res.message, 'msg');
                                $button.prop('disabled', false).text('Pay Now');
                            }
                        },
                        error: function(xhr) {
                            console.error('AJAX Error:', xhr.responseText);
                            show_toastr('Error', 'An unexpected error occurred. Please try again.',
                                'msg');
                            $button.prop('disabled', false).text('Pay Now');
                        }
                    });
                });
            });
        </script>
    <?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp-new\www\dppum\resources\views/dashboard/member.blade.php ENDPATH**/ ?>
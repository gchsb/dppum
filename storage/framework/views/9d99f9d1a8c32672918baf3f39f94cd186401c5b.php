<?php echo e(Form::model($subscription, ['route' => ['subscriptions.update', $subscription->id], 'method' => 'PUT'])); ?>

<div class="modal-body">
    <div class="row">
        <div class="form-group">
            <?php echo e(Form::label('title', __('Title'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::text('title', null, ['class' => 'form-control', 'placeholder' => __('Enter subscription title'), 'required' => 'required'])); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('interval', __('Interval'), ['class' => 'form-label'])); ?>

            <?php echo Form::select('interval', $intervals, null, ['class' => 'form-control hidesearch', 'required' => 'required']); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('package_amount', __('Package Amount'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::number('package_amount', null, ['class' => 'form-control', 'placeholder' => __('Enter package amount'), 'step' => '0.01'])); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('user_limit', __('User Limit'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::number('user_limit', null, ['class' => 'form-control', 'placeholder' => __('Enter user limit'), 'required' => 'required'])); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('member_limit', __('Member Limit'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::number('member_limit', null, ['class' => 'form-control', 'placeholder' => __('Enter member limit'), 'required' => 'required'])); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('membership_plan_limit', __('Membership Plan Limit'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::number('membership_plan_limit', null, ['class' => 'form-control', 'placeholder' => __('Enter membership plan limit'), 'required' => 'required'])); ?>

        </div>

        <div class="form-group col-md-6">
            <div class="form-check form-switch custom-switch-v1 mb-2">
                <input type="checkbox" class="form-check-input input-secondary" name="enabled_logged_history"
                    id="enabled_logged_history" <?php echo e($subscription->enabled_logged_history == 1 ? 'checked' : ''); ?>>
                <?php echo e(Form::label('enabled_logged_history', __('Show User Logged History'), ['class' => 'form-label'])); ?>

            </div>
        </div>
    </div>
</div>
<div class="modal-footer">

    <?php echo e(Form::submit(__('Update'), ['class' => 'btn btn-secondary btn-rounded'])); ?>

</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /home/u821011235/domains/dppum.com/public_html/resources/views/subscription/edit.blade.php ENDPATH**/ ?>
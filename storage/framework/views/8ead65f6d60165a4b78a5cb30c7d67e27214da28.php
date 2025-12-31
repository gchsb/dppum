

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('My Products')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('dashboard')); ?>">
                <?php echo e(__('Dashboard')); ?>

            </a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#"><?php echo e(__('My Products')); ?></a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            
            <?php if(session('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo e(session('error')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if(session('warning')): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?php echo e(session('warning')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            
            <?php if(!$hasProducts): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong><?php echo e(__('Complete Your Registration!')); ?></strong>
                    <p class="mb-0"><?php echo e(__('You need to add at least one product to complete your registration. Please click the "Add Product" button below to get started.')); ?></p>
                </div>
            <?php endif; ?>
            
            <div class="card table-card">
                <div class="card-header">
                    <div class="row align-items-center g-2">
                        <div class="col">
                            <h5>
                                <?php echo e(__('My Products')); ?>

                            </h5>
                        </div>
                        <div class="col-auto">
                            <a href="<?php echo e(route('member-products.create')); ?>" class="btn btn-secondary">
                                <i class="ti ti-circle-plus align-text-bottom"></i>
                                <?php echo e(__('Add Product')); ?>

                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <?php if($hasProducts): ?>
                        <div class="dt-responsive table-responsive">
                            <table class="table table-hover advance-datatable">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('ID')); ?></th>
                                        <th><?php echo e(__('Product Name')); ?></th>
                                        <th><?php echo e(__('Category')); ?></th>
                                        <th><?php echo e(__('Price')); ?></th>
                                        <th><?php echo e(__('Quantity')); ?></th>
                                        <th><?php echo e(__('SKU')); ?></th>
                                        <th><?php echo e(__('Status')); ?></th>
                                        <th><?php echo e(__('Action')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($product->id); ?></td>
                                            <td><?php echo e($product->product_name); ?></td>
                                            <td><?php echo e($product->category ?? '-'); ?></td>
                                            <td><?php echo e($product->price ? priceFormat($product->price) : '-'); ?></td>
                                            <td><?php echo e($product->quantity); ?></td>
                                            <td><?php echo e($product->sku ?? '-'); ?></td>
                                            <td>
                                                <?php if($product->status == 'active'): ?>
                                                    <span class="badge bg-success"><?php echo e(__('Active')); ?></span>
                                                <?php else: ?>
                                                    <span class="badge bg-secondary"><?php echo e(__('Inactive')); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('member-products.edit', $product->id)); ?>" class="avtar avtar-xs btn-link-secondary text-secondary">
                                                    <i data-feather="edit"></i>
                                                </a>
                                                <?php if($products->count() > 1): ?>
                                                    <a href="#" class="avtar avtar-xs btn-link-danger text-danger delete-product" data-id="<?php echo e($product->id); ?>">
                                                        <i data-feather="trash-2"></i>
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="text-center py-5">
                            <img src="<?php echo e(asset('assets/images/empty-state.svg')); ?>" alt="No products" class="mb-3" style="max-width: 200px; opacity: 0.5;">
                            <h5 class="text-muted"><?php echo e(__('No Products Yet')); ?></h5>
                            <p class="text-muted"><?php echo e(__('You haven\'t added any products yet. Add your first product to complete your registration.')); ?></p>
                            <a href="<?php echo e(route('member-products.create')); ?>" class="btn btn-secondary mt-3">
                                <i class="ti ti-circle-plus align-text-bottom"></i>
                                <?php echo e(__('Add Your First Product')); ?>

                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('javascript'); ?>
<script>
    $(document).on('click', '.delete-product', function(e) {
        e.preventDefault();
        var productId = $(this).data('id');
        
        if (confirm('<?php echo e(__("Are you sure you want to delete this product?")); ?>')) {
            $.ajax({
                url: '<?php echo e(url("member-products")); ?>/' + productId,
                type: 'DELETE',
                data: {
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                success: function(response) {
                    if (response.success) {
                        show_toastr('<?php echo e(__("Success")); ?>', response.message, 'success');
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    } else {
                        show_toastr('<?php echo e(__("Error")); ?>', response.message, 'error');
                    }
                },
                error: function(xhr) {
                    var response = xhr.responseJSON;
                    show_toastr('<?php echo e(__("Error")); ?>', response.message || '<?php echo e(__("An error occurred")); ?>', 'error');
                }
            });
        }
    });
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp-new\www\dppum\resources\views/member-products/index.blade.php ENDPATH**/ ?>
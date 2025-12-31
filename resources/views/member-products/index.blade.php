@extends('layouts.app')

@section('page-title')
    {{ __('My Products') }}
@endsection

@section('breadcrumb')
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">
                {{ __('Dashboard') }}
            </a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#">{{ __('My Products') }}</a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('warning'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('warning') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            @if(!$hasProducts)
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ __('Complete Your Registration!') }}</strong>
                    <p class="mb-0">{{ __('You need to add at least one product to complete your registration. Please click the "Add Product" button below to get started.') }}</p>
                </div>
            @endif
            
            <div class="card table-card">
                <div class="card-header">
                    <div class="row align-items-center g-2">
                        <div class="col">
                            <h5>
                                {{ __('My Products') }}
                            </h5>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('member-products.create') }}" class="btn btn-secondary">
                                <i class="ti ti-circle-plus align-text-bottom"></i>
                                {{ __('Add Product') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    @if($hasProducts)
                        <div class="dt-responsive table-responsive">
                            <table class="table table-hover advance-datatable">
                                <thead>
                                    <tr>
                                        <th>{{ __('ID') }}</th>
                                        <th>{{ __('Product Name') }}</th>
                                        <th>{{ __('Category') }}</th>
                                        <th>{{ __('Price') }}</th>
                                        <th>{{ __('Quantity') }}</th>
                                        <th>{{ __('SKU') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->category ?? '-' }}</td>
                                            <td>{{ $product->price ? priceFormat($product->price) : '-' }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ $product->sku ?? '-' }}</td>
                                            <td>
                                                @if($product->status == 'active')
                                                    <span class="badge bg-success">{{ __('Active') }}</span>
                                                @else
                                                    <span class="badge bg-secondary">{{ __('Inactive') }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('member-products.edit', $product->id) }}" class="avtar avtar-xs btn-link-secondary text-secondary">
                                                    <i data-feather="edit"></i>
                                                </a>
                                                @if($products->count() > 1)
                                                    <a href="#" class="avtar avtar-xs btn-link-danger text-danger delete-product" data-id="{{ $product->id }}">
                                                        <i data-feather="trash-2"></i>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <img src="{{ asset('assets/images/empty-state.svg') }}" alt="No products" class="mb-3" style="max-width: 200px; opacity: 0.5;">
                            <h5 class="text-muted">{{ __('No Products Yet') }}</h5>
                            <p class="text-muted">{{ __('You haven\'t added any products yet. Add your first product to complete your registration.') }}</p>
                            <a href="{{ route('member-products.create') }}" class="btn btn-secondary mt-3">
                                <i class="ti ti-circle-plus align-text-bottom"></i>
                                {{ __('Add Your First Product') }}
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
<script>
    $(document).on('click', '.delete-product', function(e) {
        e.preventDefault();
        var productId = $(this).data('id');
        
        if (confirm('{{ __("Are you sure you want to delete this product?") }}')) {
            $.ajax({
                url: '{{ url("member-products") }}/' + productId,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        show_toastr('{{ __("Success") }}', response.message, 'success');
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    } else {
                        show_toastr('{{ __("Error") }}', response.message, 'error');
                    }
                },
                error: function(xhr) {
                    var response = xhr.responseJSON;
                    show_toastr('{{ __("Error") }}', response.message || '{{ __("An error occurred") }}', 'error');
                }
            });
        }
    });
</script>
@endpush


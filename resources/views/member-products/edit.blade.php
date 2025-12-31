@extends('layouts.app')

@section('page-title')
    {{ __('Edit Product') }}
@endsection

@section('breadcrumb')
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">
                {{ __('Dashboard') }}
            </a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('member-products.index') }}">
                {{ __('My Products') }}
            </a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#">{{ __('Edit Product') }}</a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('Edit Product') }}</h5>
                </div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form id="product-form" action="{{ route('member-products.update', $product->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="product_name" class="form-label">{{ __('Product Name') }} <span class="text-danger">*</span></label>
                                <input type="text" name="product_name" id="product_name" class="form-control @error('product_name') is-invalid @enderror" placeholder="{{ __('Enter product name') }}" value="{{ old('product_name', $product->product_name) }}" required>
                                @error('product_name')
                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="category" class="form-label">{{ __('Category') }}</label>
                                <input type="text" name="category" id="category" class="form-control @error('category') is-invalid @enderror" placeholder="{{ __('Enter category') }}" value="{{ old('category', $product->category) }}">
                                @error('category')
                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="description" class="form-label">{{ __('Description') }}</label>
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="{{ __('Enter product description') }}">{{ old('description', $product->description) }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="price" class="form-label">{{ __('Price') }}</label>
                                <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="{{ __('Enter price') }}" step="0.01" min="0" value="{{ old('price', $product->price) }}">
                                @error('price')
                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="quantity" class="form-label">{{ __('Quantity') }}</label>
                                <input type="number" name="quantity" id="quantity" class="form-control @error('quantity') is-invalid @enderror" placeholder="{{ __('Enter quantity') }}" min="1" value="{{ old('quantity', $product->quantity) }}">
                                @error('quantity')
                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="sku" class="form-label">{{ __('SKU') }}</label>
                                <input type="text" name="sku" id="sku" class="form-control @error('sku') is-invalid @enderror" placeholder="{{ __('Enter SKU') }}" value="{{ old('sku', $product->sku) }}">
                                @error('sku')
                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="status" class="form-label">{{ __('Status') }} <span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                                    <option value="active" {{ old('status', $product->status) == 'active' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                    <option value="inactive" {{ old('status', $product->status) == 'inactive' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-secondary" id="submit-btn">
                                {{ __('Update Product') }}
                            </button>
                            <a href="{{ route('member-products.index') }}" class="btn btn-light">
                                {{ __('Cancel') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



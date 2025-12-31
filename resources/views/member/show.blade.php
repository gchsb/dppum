@extends('layouts.app')
@section('page-title')
    {{ __('Member Detail') }}
@endsection
@section('breadcrumb')
    <ul class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">
                {{ __('Dashboard') }}
            </a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('member.index') }}">{{ __('Member') }}</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="#"> {{ __('Details') }} {{ memberPrefix() . $member->member_id }}</a>
        </li>
    </ul>
@endsection

@section('content')
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
                                                src="{{ !empty($member->image) ? asset(Storage::url('upload/image/' . $member->image)) : asset(Storage::url('upload/profile/avatar.png')) }}"
                                                alt="User image" />
                                        </div>
                                        <div class="flex-grow-1 mx-3">
                                            <h5 class="mb-1">
                                                {{ $member->first_name }} {{ $member->last_name }}
                                            </h5>
                                            <h6 class="mb-0 text-secondary">
                                                {{ memberPrefix() }}{{ $member->member_id }}</h6>
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
                                                    <h5 class="m-0">{{ __('Email') }}</h5>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <small>{{ $member->email }}</small>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <i class="material-icons-two-tone f-20">phonelink_ring</i>
                                                </div>
                                                <div class="flex-grow-1 mx-3">
                                                    <h5 class="m-0">{{ __('Phone') }}</h5>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <small>{{ $member->phone }}
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
                                    <h5>{{ __('Additional Detail') }}</h5>
                                </div>
                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td><b class="text-header">{{ __('Date of Birth') }}</b></td>
                                                    <td>:</td>
                                                    <td>{{ dateFormat($member->dob) }} </td>
                                                </tr>
                                                <tr>
                                                    <td><b class="text-header">{{ __('Gender') }}</b></td>
                                                    <td>:</td>
                                                    <td>{{ $member->gender }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b
                                                            class="text-header">{{ __('Emergency Contact Information') }}</b>
                                                    </td>
                                                    <td>:</td>
                                                    <td>{{ $member->emergency_contact_information }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b class="text-header">{{ __('Notes') }}</b></td>
                                                    <td>:</td>
                                                    <td>{{ $member->notes }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b class="text-header">{{ __('Address') }}</b></td>
                                                    <td>:</td>
                                                    <td>{{ $member->address }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b class="text-header">{{ __('Active Plan') }}</b></td>
                                                    <td>:</td>
                                                    <td>
                                                        {{ !empty($member->membershipLates) && !empty($member->membershipLates->plans) ? $member->membershipLates->plans->plan_name : '-' }}
                                                        <br>
                                                        {{ !empty($member->membershipLates) ? dateFormat($member->membershipLates->expiry_date) : '-' }}



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
        @if (!empty($member->details))
            <div class="col-sm-12">
                <div class="card border">
                    <div class="card-header">
                        <h5>{{ __('Member Additional Details') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    @if (!empty($member->details->full_name))
                                        <tr>
                                            <td><b class="text-header">{{ __('Full Name') }}</b></td>
                                            <td>:</td>
                                            <td>{{ $member->details->full_name }}</td>
                                        </tr>
                                    @endif
                                    @if (!empty($member->details->phone_whatsapp))
                                        <tr>
                                            <td><b class="text-header">{{ __('Phone/WhatsApp') }}</b></td>
                                            <td>:</td>
                                            <td>{{ $member->details->phone_whatsapp }}</td>
                                        </tr>
                                    @endif
                                    @if (!empty($member->details->business_company_name))
                                        <tr>
                                            <td><b class="text-header">{{ __('Business/Company Name') }}</b></td>
                                            <td>:</td>
                                            <td>{{ $member->details->business_company_name }}</td>
                                        </tr>
                                    @endif
                                    @if (!empty($member->details->role_in_company))
                                        <tr>
                                            <td><b class="text-header">{{ __('Role in Company') }}</b></td>
                                            <td>:</td>
                                            <td>
                                                @if (is_array($member->details->role_in_company))
                                                    {{ implode(', ', $member->details->role_in_company) }}
                                                @else
                                                    {{ $member->details->role_in_company }}
                                                @endif
                                                @if (!empty($member->details->role_other))
                                                    - {{ $member->details->role_other }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                    @if (!empty($member->details->represent_ngo))
                                        <tr>
                                            <td><b class="text-header">{{ __('Represent NGO') }}</b></td>
                                            <td>:</td>
                                            <td>{{ $member->details->represent_ngo }}</td>
                                        </tr>
                                    @endif
                                    @if (!empty($member->details->ngo_position))
                                        <tr>
                                            <td><b class="text-header">{{ __('NGO Position') }}</b></td>
                                            <td>:</td>
                                            <td>{{ $member->details->ngo_position }}</td>
                                        </tr>
                                    @endif
                                    @if (!empty($member->details->ngo_name))
                                        <tr>
                                            <td><b class="text-header">{{ __('NGO Name') }}</b></td>
                                            <td>:</td>
                                            <td>{{ $member->details->ngo_name }}</td>
                                        </tr>
                                    @endif
                                    @if (!empty($member->details->ngo_business_count))
                                        <tr>
                                            <td><b class="text-header">{{ __('NGO/Business Count') }}</b></td>
                                            <td>:</td>
                                            <td>{{ $member->details->ngo_business_count }}</td>
                                        </tr>
                                    @endif
                                    @if (!empty($member->details->ssm_status))
                                        <tr>
                                            <td><b class="text-header">{{ __('SSM Status') }}</b></td>
                                            <td>:</td>
                                            <td>{{ $member->details->ssm_status }}</td>
                                        </tr>
                                    @endif
                                    @if (!empty($member->details->ssm_registration_number))
                                        <tr>
                                            <td><b class="text-header">{{ __('SSM Registration Number') }}</b></td>
                                            <td>:</td>
                                            <td>{{ $member->details->ssm_registration_number }}</td>
                                        </tr>
                                    @endif
                                    @if (!empty($member->details->has_bank_account))
                                        <tr>
                                            <td><b class="text-header">{{ __('Has Bank Account') }}</b></td>
                                            <td>:</td>
                                            <td>{{ $member->details->has_bank_account }}</td>
                                        </tr>
                                    @endif
                                    @if (!empty($member->details->office_address))
                                        <tr>
                                            <td><b class="text-header">{{ __('Office Address') }}</b></td>
                                            <td>:</td>
                                            <td>{{ $member->details->office_address }}</td>
                                        </tr>
                                    @endif
                                    @if (!empty($member->details->office_state))
                                        <tr>
                                            <td><b class="text-header">{{ __('Office State') }}</b></td>
                                            <td>:</td>
                                            <td>{{ $member->details->office_state }}</td>
                                        </tr>
                                    @endif
                                    @if (!empty($member->details->office_district))
                                        <tr>
                                            <td><b class="text-header">{{ __('Office District') }}</b></td>
                                            <td>:</td>
                                            <td>{{ $member->details->office_district }}</td>
                                        </tr>
                                    @endif
                                    @if (!empty($member->details->business_problems))
                                        <tr>
                                            <td><b class="text-header">{{ __('Business Problems') }}</b></td>
                                            <td>:</td>
                                            <td>
                                                @if (is_array($member->details->business_problems))
                                                    {{ implode(', ', $member->details->business_problems) }}
                                                @else
                                                    {{ $member->details->business_problems }}
                                                @endif
                                                @if (!empty($member->details->business_problems_other))
                                                    - {{ $member->details->business_problems_other }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                    @if (!empty($member->details->support_required))
                                        <tr>
                                            <td><b class="text-header">{{ __('Support Required') }}</b></td>
                                            <td>:</td>
                                            <td>
                                                @if (is_array($member->details->support_required))
                                                    {{ implode(', ', $member->details->support_required) }}
                                                @else
                                                    {{ $member->details->support_required }}
                                                @endif
                                                @if (!empty($member->details->support_required_other))
                                                    - {{ $member->details->support_required_other }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                    @if (!empty($member->details->suggestions_feedback))
                                        <tr>
                                            <td><b class="text-header">{{ __('Suggestions/Feedback') }}</b></td>
                                            <td>:</td>
                                            <td>{{ $member->details->suggestions_feedback }}</td>
                                        </tr>
                                    @endif
                                    @if (!empty($member->details->social_media_accounts))
                                        <tr>
                                            <td><b class="text-header">{{ __('Social Media Accounts') }}</b></td>
                                            <td>:</td>
                                            <td>
                                                @if (is_array($member->details->social_media_accounts))
                                                    {{ implode(', ', $member->details->social_media_accounts) }}
                                                @else
                                                    {{ $member->details->social_media_accounts }}
                                                @endif
                                                @if (!empty($member->details->social_media_other))
                                                    - {{ $member->details->social_media_other }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                    @if (!empty($member->details->social_media_link))
                                        <tr>
                                            <td><b class="text-header">{{ __('Social Media Link') }}</b></td>
                                            <td>:</td>
                                            <td>
                                                <a href="{{ $member->details->social_media_link }}" target="_blank">{{ $member->details->social_media_link }}</a>
                                            </td>
                                        </tr>
                                    @endif
                                    @if (!empty($member->details->delivery_app_interest))
                                        <tr>
                                            <td><b class="text-header">{{ __('Delivery App Interest') }}</b></td>
                                            <td>:</td>
                                            <td>{{ $member->details->delivery_app_interest }}</td>
                                        </tr>
                                    @endif
                                    @if (!empty($member->details->learned_from))
                                        <tr>
                                            <td><b class="text-header">{{ __('Learned From') }}</b></td>
                                            <td>:</td>
                                            <td>
                                                @if (is_array($member->details->learned_from))
                                                    {{ implode(', ', $member->details->learned_from) }}
                                                @else
                                                    {{ $member->details->learned_from }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                    @if (!empty($member->details->invited_by))
                                        <tr>
                                            <td><b class="text-header">{{ __('Invited By') }}</b></td>
                                            <td>:</td>
                                            <td>{{ $member->details->invited_by }}</td>
                                        </tr>
                                    @endif
                                    @if (isset($member->details->declaration_consent))
                                        <tr>
                                            <td><b class="text-header">{{ __('Declaration Consent') }}</b></td>
                                            <td>:</td>
                                            <td>
                                                @if ($member->details->declaration_consent)
                                                    <span class="badge text-bg-success">{{ __('Yes') }}</span>
                                                @else
                                                    <span class="badge text-bg-danger">{{ __('No') }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        
        <div class="col-sm-12">
            <div class="card table-card">
                <div class="card-header">
                    <div class="row align-items-center g-2">
                        <div class="col">
                            <h5>
                                {{ __('Products') }}
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    @if($products && $products->count() > 0)
                        <div class="dt-responsive table-responsive">
                            <table class="table table-hover advance-datatable">
                                <thead>
                                    <tr>
                                        <th>{{ __('Product Name') }}</th>
                                        <th>{{ __('Description') }}</th>
                                        <th>{{ __('Category') }}</th>
                                        <th>{{ __('Price') }}</th>
                                        <th>{{ __('Quantity') }}</th>
                                        <th>{{ __('SKU') }}</th>
                                        <th>{{ __('Status') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->description ?? '-' }}</td>
                                            <td>{{ $product->category ?? '-' }}</td>
                                            <td>{{ priceFormat($product->price) }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ $product->sku ?? '-' }}</td>
                                            <td>
                                                @if ($product->status == 'Active')
                                                    <span class="badge text-bg-success">{{ $product->status }}</span>
                                                @else
                                                    <span class="badge text-bg-secondary">{{ $product->status }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <p class="text-muted">{{ __('No products found for this member.') }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="col-sm-12">
            <div class="card table-card">
                <div class="card-header">
                    <div class="row align-items-center g-2">
                        <div class="col">
                            <h5>
                                {{ __('Documents') }}
                            </h5>
                        </div>
                        <div class="col-auto">
                            <a class="btn btn-secondary customModal" href="#" data-size="lg"
                                data-url="{{ route('member.document.create', $member->id) }}"
                                data-title="{{ __('Create Document') }}">
                                <i class="ti ti-circle-plus align-text-bottom"></i>
                                {{ __('Create Document') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="dt-responsive table-responsive">
                        <table class="table table-hover advance-datatable">
                            <thead>
                                <tr>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Type') }}</th>
                                    <th>{{ __('Upload Date') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Document') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($documents as $document)
                                    <tr>
                                        <td>{{ $document->document_name }} </td>
                                        <td>{{ !empty($document->types) ? $document->types->type : '' }} </td>
                                        <td>{{ dateFormat($document->upload_date) }} </td>
                                        <td>{{ $document->status }} </td>
                                        <td>
                                            <a href="{{ asset(Storage::url('upload/member/document')) . '/' . $document->document }}"
                                                download="download">
                                                <i data-feather="download" class=""></i>
                                            </a>
                                        </td>
                                        <td>
                                            <div class="cart-action">
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['member.document.destroy', $document->id]]) !!}
                                                <a class="avtar avtar-xs btn-link-secondary text-secondary customModal"
                                                    data-bs-toggle="tooltip" data-bs-original-title="{{ __('Edit') }}"
                                                    href="#" data-size="md"
                                                    data-url="{{ route('member.document.edit', $document) }}"
                                                    data-title="{{ __('Edit Document') }}"> <i data-feather="edit"></i></a>
                                                <a class=" avtar avtar-xs btn-link-danger text-danger confirm_dialog"
                                                    data-bs-toggle="tooltip" data-bs-original-title="{{ __('Detete') }}"
                                                    href="#"> <i data-feather="trash-2"></i></a>
                                                {!! Form::close() !!}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
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
                                {{ __('Membership History') }}
                            </h5>
                        </div>

                        @if ($status == 'true')
                            <div class="col-auto">
                                <a class="btn btn-secondary customModal" href="#" data-size="lg"
                                    data-url="{{ route('membership-payment.edit', $lastMembership->plan_id) }}"
                                    data-title="{{ __('Renew') }}">
                                    <i class="ti ti-circle-plus align-text-bottom"></i>
                                    {{ __('Renew') }}
                                </a>
                            </div>
                        @endif

                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="dt-responsive table-responsive">
                        <table class="table table-hover advance-datatable">
                            <thead>
                                <tr>
                                    <th>{{ __('Plan') }}</th>
                                    <th>{{ __('Start Date') }}</th>
                                    <th>{{ __('Expiry Date') }}</th>
                                    {{-- <th>{{ __('Status') }}</th> --}}
                                    @if (Gate::check('edit membership') || Gate::check('delete membership') || Gate::check('show membership'))
                                        <th>{{ __('Action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($memberships as $membership)
                                    <tr>
                                        </td>
                                        <td>{{ !empty($membership->plans) ? $membership->plans->plan_name : '-' }}</td>
                                        <td>{{ dateFormat($membership->start_date) }}</td>
                                        <td>{{ dateFormat($membership->expiry_date) }}</td>


                                        {{-- <td>
                                            @if ($membership->status == 'Expired')
                                                <span class="badge text-bg-danger">{{ __('Expired') }}</span>
                                            @else
                                                <span class="badge text-bg-success">{{ __('Active') }}</span>
                                            @endif
                                        </td> --}}
                                        @if (Gate::check('edit membership') || Gate::check('delete membership') || Gate::check('show membership'))
                                            <td>
                                                {!! Form::open(['route' => ['membership.destroy', $membership->id], 'method' => 'DELETE']) !!}
                                                @if (Gate::check('show membership'))
                                                    <a href="#"
                                                        class="avtar avtar-xs btn-link-warning text-warning customModal"
                                                        data-size="lg"
                                                        data-url="{{ route('membership.show', $membership->id) }}"
                                                        data-title="{{ __('View Membership') }}">
                                                        <i data-feather="eye"></i>
                                                    </a>
                                                @endif
                                                @if (Gate::check('delete membership'))
                                                    <a href="#"
                                                        class="avtar avtar-xs btn-link-danger text-danger confirm_dialog"
                                                        data-title="{{ __('Delete Membership') }}">
                                                        <i data-feather="trash-2"></i>
                                                    </a>
                                                @endif

                                                {!! Form::close() !!}
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
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
                                {{ __('Membership Payment History') }}
                            </h5>
                        </div>


                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="dt-responsive table-responsive">
                        <table class="table table-hover advance-datatable">
                            <thead>
                                <tr>
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('Member') }}</th>
                                    <th>{{ __('Plan') }}</th>
                                    <th>{{ __('Period') }}</th>
                                    <th>{{ __('Amount') }}</th>
                                    <th>{{ __('Status') }}</th>

                                    @if (Gate::check('show membership payment') || Gate::check('delete membership payment'))
                                        <th>{{ __('Action') }}</th>
                                    @endif
                                </tr>

                            </thead>
                            <tbody>

                                @foreach ($membershipPayments as $payment)
                                    @php
                                        $membership = App\Models\Membership::where('member_id', $payment->member_id)
                                            ->where('plan_id', $payment->plan_id)
                                            ->first();
                                    @endphp

                                    <tr>
                                        <td>{{ paymentPrefix() . $payment->payment_id }}</td>
                                        <td>{{ !empty($payment->members) ? $payment->members->first_name : '' }}</td>
                                        <td>{{ !empty($payment->plans) ? $payment->plans->plan_name : '' }}</td>
                                        <td> {{ dateFormat($membership->start_date) ?? '-' }} -
                                            {{ dateFormat($membership->expiry_date) ?? '-' }}</td>

                                        <td>{{ priceFormat($payment->amount) }}</td>
                                        <td>
                                            @if ($payment->status == 'Paid')
                                                <span class="badge text-bg-success">{{ $payment->status }}</span>
                                            @else
                                                <span class="badge text-bg-danger">{{ $payment->status }}</span>
                                            @endif
                                        </td>
                                        @if (Gate::check('show membership payment') || Gate::check('delete membership payment'))
                                            <td>
                                                {!! Form::open(['route' => ['membership-payment.destroy', $payment->id], 'method' => 'DELETE']) !!}
                                                @if (Gate::check('show membership payment'))
                                                    <a class="avtar avtar-xs btn-link-warning text-warning"
                                                        href="{{ route('membership-payment.show', \Illuminate\Support\Facades\Crypt::encrypt($payment->id)) }}">
                                                        <i data-feather="eye"></i>
                                                    </a>
                                                @endif

                                                @if (Gate::check('delete membership payment'))
                                                    <a class="avtar avtar-xs btn-link-danger text-danger confirm_dialog"
                                                        href="#">
                                                        <i data-feather="trash-2"></i>
                                                    </a>
                                                @endif

                                                @if (\Auth::user()->type != 'member' && $payment->status == 'Pending')
                                                    <a class="avtar avtar-xs btn-link-secondary text-secondary"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-original-title="{{ __('Accept') }}"
                                                        href="{{ route('membership.bank.transfer.action', [$payment->id, 'accept']) }}">
                                                        <i data-feather="user-check"></i>
                                                    </a>

                                                    <a class="avtar avtar-xs btn-link-danger text-danger"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-original-title="{{ __('Reject') }}"
                                                        href="{{ route('membership.bank.transfer.action', [$payment->id, 'reject']) }}">
                                                        <i data-feather="user-x"></i>
                                                    </a>

                                                @endif

                                                {!! Form::close() !!}
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

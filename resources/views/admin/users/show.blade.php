@extends('admin.layouts.master')

@section('title', __('User: :name', ['name' => $user->name]))

@section('css')
    @include('admin.layouts.datatables-css')
<link rel="stylesheet" href="{{ asset('build/libs/swiper/swiper-bundle.min.css') }}">
@endsection
@section('content')

    <div class="profile-foreground position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg">
            <img src="{{ asset('build/images/profile-bg.jpg') }}" alt="" class="profile-wid-img" />
        </div>
    </div>

    <div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper">
        <div class="row g-4">
            <!--end col-->
            <div class="col">
                <div class="p-2">
                    <h3 class="text-white mb-1">{{ $user->name }}</h3>
                    <p class="text-white-75">{{ $user->role() }}</p>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div>
                <div class="d-flex profile-wrapper">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
                                <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span
                                    class="d-none d-md-inline-block">{{ __('Overview') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-14" data-bs-toggle="tab" href="#authentications" role="tab">
                                <i class="ri-price-tag-line d-inline-block d-md-none"></i> <span
                                    class="d-none d-md-inline-block">{{ __('Authentication Logs') }}</span>
                            </a>
                        </li>
                        {{-- @if($user->orders()->exists()) --}}
                        <li class="nav-item">
                            <a class="nav-link fs-14" data-bs-toggle="tab" href="#orders" role="tab">
                                <i class="ri-folder-4-line d-inline-block d-md-none"></i> <span
                                    class="d-none d-md-inline-block">{{ __('Orders') }}</span>
                            </a>
                        </li>
                        {{-- @endif
                        @if($user->services()->exists()) --}}
                        <li class="nav-item">
                            <a class="nav-link fs-14" data-bs-toggle="tab" href="#services" role="tab">
                                <i class="ri-folder-4-line d-inline-block d-md-none"></i> <span
                                    class="d-none d-md-inline-block">{{ __('Services') }}</span>
                            </a>
                        </li>
                        {{-- @endif --}}
                    </ul>
                    <div class="flex-shrink-0">
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-success"><i
                                class="ri-edit-box-line align-bottom"></i> {{ __('Edit User') }}</a>
                    </div>
                </div>
                <!-- Tab panes -->
                <div class="tab-content pt-4 text-muted">
                    <div class="tab-pane active" id="overview-tab" role="tabpanel">
                        <div class="row">
                            <div class="col-xxl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class=" mb-3">{{ __('User Info') }}</h3>
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th class="ps-0" scope="row">{{ __('ID') }} :</th>
                                                        <td class="text-muted">{{ $user->id }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">{{ __('Name') }} :</th>
                                                        <td class="text-muted">{{ $user->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">{{ __('E-mail') }} :</th>
                                                        <td class="text-muted">{{ $user->email }} @if($user->email_verified)<span class="badge badge-soft-success"><span class="bx bx-check"></span>@endif</td>
                                                    </tr>
                                                    {{-- <tr>
                                                        <th class="ps-0" scope="row">{{ __('Phone') }} :</th>
                                                        <td class="text-muted">{{ $user->phone }}</td>
                                                    </tr> --}}
                                                    <tr>
                                                        <th class="ps-0" scope="row">{{ __('Role') }} :</th>
                                                        <td class="text-muted">{{ $user->role() }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">{{ __('Joining Date') }}</th>
                                                        <td class="text-muted">{{ $user->created_at->format('d-m-Y H:i') }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">{{ __('Roles') }}</h5>
                                        <div class="d-flex flex-wrap gap-2 fs-15">
                                            @foreach($user->getRoleNames() as $role)
                                            <a href="javascript:void(0);" class="badge badge-soft-primary">{{ $role }}</a>
                                            @endforeach
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->

                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <div class="tab-pane fade" id="authentications" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center gy-3">
                                    <div class="col-sm">
                                        <h5 class="card-title mb-0">{{ __('Authentication Logs') }}</h5>
                                    </div>
                                    <div class="col-sm-auto">
                                        <div class="d-flex gap-1 flex-wrap">
                                        </div>
                                    </div>
                                </div>                
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <table id="authentications-table" class="display table table-bordered dt-responsive" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>{{__('#ID')}}</th>
                                                    <th>{{__('IP Address')}}</th>
                                                    <th>{{__('Login at')}}</th>
                                                    <th>{{__('Logout at')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($user->authentications as $authentication)
                                                    <tr>
                                                        <td> {{$authentication->id}} </td>
                                                        <td> {{$authentication->ip_address}} </td>
                                                        <td> {{$authentication->login_at}} </td>
                                                        <td> {{$authentication->logout_at}} </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end tab-pane-->
                    {{-- @if($user->orders()->exists()) --}}
                    {{-- <div class="tab-pane fade" id="orders" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center gy-3">
                                    <div class="col-sm">
                                        <h5 class="card-title mb-0">{{ __('Orders') }}</h5>
                                    </div>
                                    <div class="col-sm-auto">
                                        <div class="d-flex gap-1 flex-wrap">
                                        </div>
                                    </div>
                                </div>                
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <table id="orders-table" class="display table table-bordered dt-responsive" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>{{__('#ID')}}</th>
                                                    <th>{{__('Plan')}}</th>
                                                    <th>{{__('Amount Total')}}</th>
                                                    <th>{{__('Inv. Status')}}</th>
                                                    <th>{{__('Completed at')}}</th>
                                                    <th>{{__('Action')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($user->orders as $order)
                                                    <tr>
                                                        <td> {{$order->id}} </td>
                                                        <td> {{$order->plan->name}} </td>
                                                        <td> {{$order->amount_total}} </td>
                                                        <td> {{$order->invoice_status_text}} </td>
                                                        <td> {{optional($order->completed_at)->format('d-m-Y H:i') }} </td>
                                                        <td> Action </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div> --}}
                    <!--end tab-pane-->
                    {{-- @endif
                    @if($user?->services()->exists()) --}}
                    {{-- <div class="tab-pane fade" id="services" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center gy-3">
                                    <div class="col-sm">
                                        <h5 class="card-title mb-0">{{ __('Services') }}</h5>
                                    </div>
                                    <div class="col-sm-auto">
                                        <div class="d-flex gap-1 flex-wrap">
                                        </div>
                                    </div>
                                </div>                
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <table id="services-table" class="display table table-bordered dt-responsive" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>{{__('#ID')}}</th>
                                                    <th>{{__('Plan')}}</th>
                                                    <th>{{__('Start Date')}}</th>
                                                    <th>{{__('End Date')}}</th>
                                                    <th>{{__('Status')}}</th> 
                                                    <th>{{__('Remaining')}}</th>
                                                    <th>{{__('Action')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($user->services as $service)
                                                    <tr>
                                                        <td> {{$service->id}} </td>
                                                        <td> {{$service->plan->name}} </td>
                                                        <td> {{$service->created_at->format('d-m-Y H:i') }} </td>
                                                        <td> {{$service->ended_at->format('d-m-Y H:i') }} </td>
                                                        <td> {!! $service->status_badge !!} </td>
                                                        <td> {{ $service->remaining ? __(':days days', ['days' => $service->remaining]) : '-' }} </td>
                                                        <td> <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-sm btn-soft-info">{{ __('Edit') }}</a> </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div> --}}
                    <!--end tab-pane-->
                    {{-- @endif --}}
                </div>
                <!--end tab-content-->
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
@section('js')
@include('admin.layouts.datatables-js')
<script src="{{ asset('build/libs/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/profile.init.js') }}"></script>
<script type="text/javascript">
    $('#authentications-table').DataTable({
        processing: true,
        responsive: true,
        order: [[0, 'desc']]
    });
    $('#orders-table').DataTable({
        processing: true,
        responsive: true,
        order: [[0, 'desc']]
    });
    $('#services-table').DataTable({
        processing: true,
        responsive: true,
        order: [[0, 'desc']]
    });
</script>
@endsection

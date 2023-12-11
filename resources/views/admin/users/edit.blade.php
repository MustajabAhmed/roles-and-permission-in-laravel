@extends('admin.layouts.master')

@section('title', __('Edit User: :name', ['name' => $user->name]))

@section('content')
@component('components.breadcrumb')
@slot('li_1', __('Customer Management'))
@slot('li_2', __('Users'))
@slot('title', __('Edit User: :name', ['name' => $user->name]))
@endcomponent
<div class="row">
    <!--end col-->
    <div class="col-xxl-9">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link text-body active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                            <i class="fas fa-home"></i>
                            {{ __('Personal Details') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body" data-bs-toggle="tab" href="#changePassword" role="tab">
                            <i class="far fa-user"></i>
                            {{ __('Change Password') }}
                        </a>
                    </li>
                </ul>
            </div>
            <form action="{{ route('admin.users.update', $user->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="tab-pane active" id="personalDetails" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">{{ __('Name') }}</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" maxlength="255">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" maxlength="255" required>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="skillsInput" class="form-label">{{ __('Role') }}</label>
                                        <select class="form-control" name="role" data-choices id="skillsInput" name="skillsInput">
                                            <option value="admin" @if($user->role() == 'admin') selected @endif>{{ __('Admin') }}</option>
                                            <option value="user" @if($user->role() == 'user') selected @endif>{{ __('User') }}</option>
                                            {{-- <option value="2" @if($user->authority == 2) selected @endif>{{ __('Customer') }}</option>
                                            <option value="50" @if($user->authority == 50) selected @endif>{{ __('Admin') }}</option>
                                            <option value="99" @if($user->authority == 99) selected @endif>{{ __('Developer') }}</option> --}}
                                        </select>
                                    </div>
                                </div>                   
                                <!--end col-->
                                {{-- <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="skillsInput" class="form-label">Skills</label>
                                        <select class="form-control" name="skillsInput" data-choices
                                            data-choices-removeItem multiple id="skillsInput">
                                            <option value="illustrator">Illustrator</option>
                                            <option value="photoshop">Photoshop</option>
                                            <option value="css">CSS</option>
                                            <option value="html">HTML</option>
                                            <option value="javascript" selected>Javascript</option>
                                            <option value="python">Python</option>
                                            <option value="php">PHP</option>
                                        </select>
                                    </div>
                                </div> --}}
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end tab-pane-->
                        <div class="tab-pane" id="changePassword" role="tabpanel">
                            <div class="row g-2">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="new_password" class="form-label">{{ __('New Password') }}*</label>
                                        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="{{ __('New password') }}">
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end tab-pane-->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                    <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-soft-success">{{ __('Cancel') }}</a>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->
@endsection
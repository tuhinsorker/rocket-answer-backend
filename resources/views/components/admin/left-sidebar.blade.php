<nav class="sidebar sidebar-bunker">
    <div class="sidebar-header">
        <a href="{{setting('site.url','javascript:void(0);')}}" class="sidebar-brand">
            <img src="{{  setting('site.logo_black',admin_asset('img/logo-light.png'),true)}}">
        </a>
    </div>

    <!--/.sidebar header-->
    <div class="profile-element d-block align-items-center flex-shrink-0">

        <div class="avatar online mb-2">
            <img src="{{ isset( auth()->user()->profile_photo_path)?URL::to('storage').'/'.auth()->user()->profile_photo_path:nanopkg_asset('image/blank.png') }}" class="img-fluid rounded-circle">
        </div>

        <div class="profile-text text-center">
            <h6 class="m-0">{{ auth()->user()?->name }}</h6>
            <span class="text-muted">
                <i class="typcn typcn-media-record text-success"></i>
                {{ implode(",", auth()->user()?->getRoleNames()?->toArray()) }}
            </span>
        </div>

    </div>


    <!--/.sidebar header-->
    <div class="sidebar-body">
        <nav class="sidebar-nav">

                <ul class="metismenu">
                    {{-- <x-admin.nav-title title="Dashbord" /> --}}
                    <x-admin.nav-link href="{{ route('admin.dashboard') }}">
                        <i class="typcn typcn-home-outline"></i>
                        {{ __('Dashboard') }}
                    </x-admin.nav-link>

                    <!--============================================
                        =            Setting Management            =
                    =============================================-->
                    @if(can('permission_management')||can('role_read')||can('user_management')||(module_active('setting')&&
                    can('setting_management')))
                    {{-- <x-admin.nav-title title="Setting Managment" /> --}}

                    @endif

                    @include('layouts.partials.nav_experts')

                    {{-- Transaction menu --}}
                    <x-admin.multi-nav>

                        <x-slot name="title">
                            <i class="typcn typcn-arrow-sync-outline"></i> {{ __('Transaction') }}
                        </x-slot>

                        @if (module_active('expert')&& can('withdraw_request'))
                            <li @class(['mm-active' => request()->routeIs('expert-withdraw-request.index') ])>
                                <a class="text-capitalize" href="{{ route('expert-withdraw-request.index') }}">
                                {{ __('Withdraw Request') }}
                                </a>
                            </li>
                        @endif
                        @if (module_active('expert')&& can('transaction_management'))
                        <li @class(['mm-active' => request()->routeIs('payment-transaction.index')])>
                            <a class="text-capitalize" href="{{ route('payment-transaction.index') }}">
                                {{ __('Payment Transactions') }}
                            </a>
                        </li>
                        @endif

                    </x-admin.multi-nav>

                    {{-- Conversation --}}
                    <x-admin.multi-nav>
                        <x-slot name="title">
                            <i class="typcn typcn-message-typing"></i> {{ __('Conversation') }}
                        </x-slot>

                        <li @class(['mm-active' => request()->routeIs('admin.customer.customer_conversation_history')
                                || request()->routeIs('admin.customer.customer_conversation_logs')
                                ])>
                            <a class="text-capitalize" href="{{ route('admin.customer.customer_conversation_history') }}">
                                {{ __('Conversation List') }}
                            </a>
                        </li>
                    </x-admin.multi-nav>

                    <x-admin.multi-nav>

                        <x-slot name="title">
                            <i class="typcn typcn-group-outline"></i> {{ __('Customer') }}
                        </x-slot>

                        @if (module_active('customer')&& can('customer_list'))
                            <li @class(['mm-active' => request()->routeIs('admin.customer.index') || request()->routeIs('admin.customer.edit') || request()->routeIs('admin.customer.create') ])>
                                <a class="text-capitalize" href="{{ route('admin.customer.index') }}">
                                   {{ __('All Customers') }}
                                </a>
                            </li>
                        @endif

                        @if (module_active('customer')&& can('customer_subscription'))
                            <li @class(['mm-active' => request()->routeIs('admin.customer.customer_subscription')])>
                                <a class="text-capitalize" href="{{ route('admin.customer.customer_subscription') }}">
                                    {{ __('Subscription List') }}
                                </a>
                            </li>
                        @endif

                        {{-- @if (module_active('customer')&& can('customer_subscription')) --}}
                            <li @class(['mm-active' => request()->routeIs('admin.customer.contact-query')])>
                                <a class="text-capitalize" href="{{ route('admin.customer.contact-query') }}">
                                    {{ __('Contact Queries') }}
                                </a>
                            </li>
                        {{-- @endif --}}

                    </x-admin.multi-nav>


                    <x-admin.multi-nav>
                        <x-slot name="title">
                            <i class="typcn typcn-th-list-outline"></i> {{ __('Subscription') }}
                        </x-slot>

                        @if (module_active('subcription')&& can('package_list'))

                            <x-admin.nav-link href="{{ route('pricing.index') }}">
                                {{ __('Pricing List') }}
                            </x-admin.nav-link>

                            {{-- <x-admin.nav-link href="{{ route('packages.index') }}">
                                {{ __('Package List') }}
                            </x-admin.nav-link> --}}
                        @endif

                        <x-admin.nav-link href="{{ route('subscription-invoice.index') }}">
                            {{ __('Invoice List') }}
                        </x-admin.nav-link>



                        @if (module_active('subcription')&& can('invoice_list'))
                            {{-- <x-admin.nav-link href="{{ route('packages-invoices.index') }}">
                                {{ __('Invoice List') }}
                            </x-admin.nav-link> --}}
                        @endif
                    </x-admin.multi-nav>

                    @include('layouts.partials.nav_report')

                    @include('layouts.partials.nav_cms')


                    {{-- @include('layouts.partials.nav_subscription') --}}
                    <x-admin.multi-nav>


                        <x-slot name="title">
                            <i class="typcn typcn-cog-outline"></i> {{ __('Setting') }}
                        </x-slot>

                        @if (module_active('setting') && can('setting_management'))
                            <x-admin.nav-link href="{{ route('admin.setting.index') }}">
                                {{ __('General Setting') }}
                            </x-admin.nav-link>
                        @endif

                        @if (module_active('setting')&& can('default_payment_setup'))
                            <x-admin.nav-link href="{{ route('admin.setting.default-payment.index') }}">
                                {{ __('Default Payment Setup') }}
                            </x-admin.nav-link>
                        @endif

                        <x-admin.nav-link href="{{ route('predefinedanswer.index') }}">
                            {{ __('Predefined Answer List') }}
                        </x-admin.nav-link>

                        @if (module_active('setting')&& can('payment_method'))
                            <x-admin.nav-link href="{{ route('admin.setting.payment-method.index') }}">
                                {{ __('Payment Method') }}
                            </x-admin.nav-link>
                        @endif

                        @if (module_active('permission') && can('permission_management'))
                            <x-admin.nav-link href="{{ route('admin.permission.index') }}">
                                {{ __('Permission') }}
                            </x-admin.nav-link>
                        @endif

                        @if (module_active('role')&& can('role_management'))
                            <x-admin.nav-link href="{{ route('admin.role.index') }}">
                                {{ __('Role') }}
                            </x-admin.nav-link>
                        @endif

                        @if (module_active('user') && can('user_management'))
                            <x-admin.nav-link href="{{ route('admin.user.index') }}">
                                {{ __('User') }}
                            </x-admin.nav-link>
                        @endif

                    </x-admin.multi-nav>


                    {{-- Setting Mangment --}}
                    @if (module_active('backup')&& can('backup_management'))
                    {{-- <x-admin.nav-title title="Backup Managment" />
                    <x-admin.nav-link href="{{ route('admin.backup.index') }}">
                        <i class="typcn typcn-cloud-storage-outline"></i>
                        {{ __('Backup') }}
                    </x-admin.nav-link> --}}
                    @endif
                </ul>
        </nav>
        <div class="mt-auto p-3">
            <x-logout>
                <span class="btn btn-primary w-100"> <img class="me-2"
                        src="{{ admin_asset('img/logout.png') }}"><span>{{ __('Logout') }}</span></span>
            </x-logout>

        </div>
    </div>
    <!-- sidebar-body -->
</nav>

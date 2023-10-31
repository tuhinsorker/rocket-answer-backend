
    <x-admin.multi-nav>

        <x-slot name="title">
            <i class="typcn typcn-user-outline"></i> {{ __('Experts') }}
        </x-slot>

        @if (can('active_expert'))


        <li @class(['mm-active' => (request()->routeIs('expert.index') && request()->route()->parameter('status') != null )
                        || (request()->routeIs('expert.show') && request()->route()->parameter('status') != null )
         ])>
            <a class="text-capitalize" href="{{ route('expert.index',1) }}">
                {{ __('Active Experts') }}
            </a>
        </li>
        @endif

        @if (can('pending_expert'))

            <li @class(['mm-active' => (request()->routeIs('expert.index') && request()->route()->parameter('status') == null)
            || (request()->routeIs('expert.show') && request()->route()->parameter('status') == null )

            ])>
                <a class="text-capitalize" href="{{ route('expert.index') }}">
                    {{ __('Pending Experts') }}
                </a>
            </li>

        @endif

        @if (can('expert_category'))
            <x-admin.nav-link href="{{ route('expert-category.index') }}">
                {{ __('Categories') }}
            </x-admin.nav-link>
        @endif

        @if (can('expert_sub_category'))
            <x-admin.nav-link href="{{ route('expert-sub-category.index') }}">
                {{ __('Subcategories') }}
            </x-admin.nav-link>
        @endif

        {{-- @if (module_active('setting')&& can('setting_management'))
            <x-admin.nav-link href="{{ route('expert-doc-type.index') }}">
                {{ __('Doc Types') }}
            </x-admin.nav-link>
        @endif --}}



        @if (can('expert_pay_account'))
            <x-admin.nav-link href="{{ route('expert-pay-account.index') }}">
                {{ __('Pay Accounts') }}
            </x-admin.nav-link>
        @endif

        @if (can('expert_review'))
            <x-admin.nav-link href="{{ route('expert-review.index') }}">
                {{ __('Reviews') }}
            </x-admin.nav-link>
        @endif

        @if (can('expert_payment_setup'))
            <x-admin.nav-link href="{{ route('expert-payment-setup.index') }}">
                {{ __('Payment Setup') }}
            </x-admin.nav-link>
        @endif

        @if (can('expert_payment_setup'))
            <x-admin.nav-link href="{{ route('expert.expert-pending-sessions') }}">
                {{ __('Expert Pending Sessions') }}
            </x-admin.nav-link>
        @endif

    </x-admin.multi-nav>


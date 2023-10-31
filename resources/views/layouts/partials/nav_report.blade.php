@if(can('CMS')||(module_active('CMS')))
    <x-admin.multi-nav>

        <x-slot name="title">
            <i class="typcn typcn-chart-bar"></i> {{ __('Reports') }}
        </x-slot>

        <x-admin.nav-link href="{{ route('report.customer-billing-history') }}">
            {{ __('Customer Billing History') }}
        </x-admin.nav-link>
        <x-admin.nav-link href="{{ route('report.expert-payment-history') }}">
            {{ __('Expert Payment History') }}
        </x-admin.nav-link>
        <x-admin.nav-link href="{{ route('report.customer-recurring-billing') }}">
            {{ __('Recurring Billing') }}
        </x-admin.nav-link>

        <x-admin.nav-link href="{{ route('report.expert-payment-report') }}">
            {{ __('Expert Payment') }}
        </x-admin.nav-link>


        {{-- @if (module_active('cms')&& can('post_list'))
            <x-admin.nav-link href="{{ route('report.expert-payment') }}">
                {{ __('Expert Payments Report') }}
            </x-admin.nav-link>
        @endif
        @if (module_active('cms')&& can('post_list'))
            <x-admin.nav-link href="{{ route('report.expert-payment') }}">
                {{ __('Expert Payments Report') }}
            </x-admin.nav-link>
        @endif --}}

    </x-admin.multi-nav>

@endif

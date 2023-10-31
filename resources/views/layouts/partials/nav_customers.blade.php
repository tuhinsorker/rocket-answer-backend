@if(can('customer_management')||can('role_read')||can('user_management'))
    <x-admin.multi-nav>

        <x-slot name="title">
            <i class="typcn typcn-cog-outline"></i> {{ __('Customer') }}
        </x-slot>

        @if (module_active('customer')&& can('customer_management'))
            <x-admin.nav-link href="{{ route('admin.customer.index') }}">
                {{ __('All Customers') }}
            </x-admin.nav-link>
        @endif

    </x-admin.multi-nav>
@endif
@if(can('CMS')||(module_active('CMS')))
    <x-admin.multi-nav>

        <x-slot name="title">
            <i class="typcn typcn-th-large"></i> {{ __('CMS') }}
        </x-slot>

        @if (module_active('cms')&& can('add_post'))
            <x-admin.nav-link href="{{ route('cms.posts.create') }}">
                {{ __('Add Post') }}
            </x-admin.nav-link>
        @endif


        @if (module_active('cms')&& can('post_list'))
            <x-admin.nav-link href="{{ route('cms.posts.index') }}">
                {{ __('Post List') }}
            </x-admin.nav-link>
        @endif


        @if (module_active('cms')&& can('add_page'))
            <x-admin.nav-link href="{{ route('cms.pages.create') }}">
                {{ __('Add Page') }}
            </x-admin.nav-link>
        @endif


        @if (module_active('cms')&& can('page_list'))
            <x-admin.nav-link href="{{ route('cms.pages.index') }}">
                {{ __('Page List') }}
            </x-admin.nav-link>
        @endif

        @if (module_active('cms')&& can('page_list'))
            <x-admin.nav-link href="{{ route('cms.team-member.index') }}">
                {{ __('Team Members') }}
            </x-admin.nav-link>
        @endif


        @if (module_active('cms')&& can('post_category'))
            <x-admin.nav-link href="{{ route('cms.categories.index') }}">
                {{ __('Post Category') }}
            </x-admin.nav-link>
        @endif

        @if (module_active('cms')&& can('post_category'))
            <x-admin.nav-link href="{{ route('cms.websetup.index') }}">
                {{ __('Web Setup') }}
            </x-admin.nav-link>
        @endif

        @if (module_active('cms')&& can('post_category'))
            <x-admin.nav-link href="{{ route('cms.social-link') }}">
                {{ __('Social Link') }}
            </x-admin.nav-link>
        @endif

        @if (module_active('cms')&& can('landing_page_setup'))
            <x-admin.nav-link href="{{ route('cms.landing-page-setup') }}">
                {{ __('Landing Page Setup') }}
            </x-admin.nav-link>
        @endif

        @if (module_active('cms')&& can('testimonial'))
            <x-admin.nav-link href="{{ route('cms.how-it-work') }}">
                {{ __('How It Work') }}
            </x-admin.nav-link>
        @endif

        @if (module_active('cms')&& can('testimonial'))
            <x-admin.nav-link href="{{ route('cms.testimonial.index') }}">
                {{ __('Testimonials') }}
            </x-admin.nav-link>
        @endif


        @if (module_active('cms')&& can('terms_of_service'))
            <x-admin.nav-link href="{{ route('cms.add-terms-of-service') }}">
                {{ __('Terms of Service') }}
            </x-admin.nav-link>
        @endif

        @if (module_active('cms')&& can('privacy_policy'))
            <x-admin.nav-link href="{{ route('cms.privacy-policy-setup') }}">
                {{ __('Privacy Policy Setup') }}
            </x-admin.nav-link>
        @endif



    </x-admin.multi-nav>

@endif

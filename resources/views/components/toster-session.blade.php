@php
if(!isset($errors)) $errors= new Illuminate\Support\ViewErrorBag;
@endphp

@if (session()->has('success'))
<input type="hidden" id="session_success" value="{{ ucwords(session()->get('success'))}}">
@endif
@if (session()->has('status'))
<input type="hidden" id="session_success" value="{{ ucwords(session()->get('status'))}}">
@endif
@if(session()->has('error'))
@if (is_array(session()->get('error')))
@foreach (session()->get('error') as $key=>$error)
<input type="hidden" class="session_error_array" value="{{ ucwords($error) }}">
@endforeach
@else
<input type="hidden" id="session_error" value="{{ ucwords(session()->get('error'))}}">
@endif
@endif
@if(session()->has('warning'))
<input type="hidden" id="session_warning" value="{{ ucwords(session()->get('warning'))}}">
@endif
@if(session()->has('info'))
<input type="hidden" id="session_info" value="{{ ucwords(session()->get('info'))}}">
@endif
@if($errors->any())
<input type="hidden" id="session_error_count" value="{{ count($errors) }}">
@foreach ($errors->all() as $key=>$error)
<input type="hidden" id="session_error{{ $key }}" value="{{ ucwords($error) }}">
@endforeach
@endif
<script src="{{nanopkg_asset('js/tosterSession.min.js')}}"></script>
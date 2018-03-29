@if(session()->has('flash_message'))
    @php
        $flash = session('flash_message');
        $flashImportant = session('flash_message_important');
    @endphp
    {{--(message = 'Welcome', type = 'info', style = 'bar', timeout = 0, position = 'top')--}}
    <script>
        window.flash(
            "{!! $flash['message'] !!}",
            "{{ $flash['type'] }}",
            "{{ $flash['style'] }}",
            "{{ $flashImportant ? 0 : $flash['timeout'] }}"
        )
    </script>

    @php
        session()->forget('flash_message')
    @endphp
@endif


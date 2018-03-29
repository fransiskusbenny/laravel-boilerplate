{{--@if($menu->childs()->exists())--}}
{{--@foreach($menu->childs as $child)--}}
{{--@php--}}
{{--$url[] = $child->childs()->exists() ? return; : "$child->url*"--}}
{{--@endphp--}}
{{--@endforeach--}}
{{--@else--}}
{{--@php--}}
{{--$url = "$menu->url*";--}}
{{--@endphp--}}
{{--@endif--}}

{{--@dd($menu)--}}
@if($menu->accessibleBy($login_user))
    <li class="{{ menu_active($menu, 'open active') }}">
        <a href="{{ $menu->childs()->exists() ? '#' : url($menu->url) }}">
            <span class="title">{{ $menu->name }}</span>
            @if($menu->childs()->exists())
                <span class="arrow {{ menu_active($menu, 'open active') }}"></span>
            @endif
        </a>
        <span class="icon-thumbnail"><i class="{{ $menu->icon ?? 'fa fa-circle-o' }}"></i></span>
        @if($menu->childs()->exists())
            <ul class="sub-menu" {{ menu_active($menu) ? 'style=display:block' : null }}>
                @each('layouts.includes.sidebar_item', $menu->childs, 'menu')
            </ul>
        @endif
    </li>
@endif
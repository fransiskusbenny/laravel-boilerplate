@extends('layouts.page', ['bg' => 'bg-white'])

@section('page_content')
    <menu-index :menus="{{ $menus }}"></menu-index>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/assets/plugins/jquery-dynatree/skin/ui.dynatree.css') }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.bootstrap3.min.css">
@endpush

@push('script_before')
    <script src="{{ asset('vendor/assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('vendor/assets/plugins/classie/classie.js') }}"></script>
    <script src="{{ asset('vendor/assets/plugins/jquery-dynatree/jquery.dynatree.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/js/standalone/selectize.js"></script>
@endpush
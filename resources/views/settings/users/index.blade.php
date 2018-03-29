@extends('layouts.page')

@section('page_content')
    <table-user create-url="{{ route('users.create') }}"></table-user>
@endsection


@extends('layouts.page')

@section('page_content')
    <form-edit-user :user="{{ $user }}"></form-edit-user>
@endsection
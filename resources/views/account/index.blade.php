@extends('layouts.page')

@section('page_content')

<account :user="{{ $login_user }}"></account>

@endsection
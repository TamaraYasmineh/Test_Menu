@extends('layouts.admin')

@section('title', 'إضافة مطعم')
@section('page_title', 'إضافة مطعم جديد')

@section('content')

    <div class="admin-card">
        <form method="POST" action="{{ route('admin.restaurants.store') }}" enctype="multipart/form-data">
            @include('admin.restaurants._form')
        </form>
    </div>

@endsection

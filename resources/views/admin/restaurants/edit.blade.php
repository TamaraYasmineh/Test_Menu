@extends('layouts.admin')

@section('title', 'تعديل مطعم')
@section('page_title', 'تعديل: ' . $restaurant->name)

@section('content')

    <div class="admin-card">
        <form method="POST" action="{{ route('admin.restaurants.update', $restaurant) }}" enctype="multipart/form-data">
            @method('PUT')
            @include('admin.restaurants._form')
        </form>
    </div>

@endsection

@extends('layouts.admin')

@section('title', 'تعديل صنف')
@section('page_title', 'تعديل: ' . $menuItem->name)

@section('content')

    <div class="admin-card">
        <form method="POST" action="{{ route('admin.menu-items.update', $menuItem) }}" enctype="multipart/form-data">
            @method('PUT')
            @include('admin.menu-items._form')
        </form>
    </div>

@endsection

@extends('layouts.admin')

@section('title', 'تعديل تصنيف')
@section('page_title', 'تعديل: ' . $category->name)

@section('content')

    <div class="admin-card">
        <form method="POST" action="{{ route('admin.categories.update', $category) }}" enctype="multipart/form-data">
            @method('PUT')
            @include('admin.categories._form')
        </form>
    </div>

@endsection

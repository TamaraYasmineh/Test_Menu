@extends('layouts.admin')

@section('title', 'إضافة تصنيف')
@section('page_title', 'إضافة تصنيف جديد')

@section('content')

    <div class="admin-card">
        <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
            @include('admin.categories._form')
        </form>
    </div>

@endsection

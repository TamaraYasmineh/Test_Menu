@extends('layouts.admin')

@section('title', 'إضافة صنف')
@section('page_title', 'إضافة صنف جديد')

@section('content')

    <div class="admin-card">
        <form method="POST" action="{{ route('admin.menu-items.store') }}" enctype="multipart/form-data">
            @include('admin.menu-items._form')
        </form>
    </div>

@endsection

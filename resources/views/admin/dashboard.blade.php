@extends('layouts.admin')

@section('title', 'لوحة التحكم')
@section('page_title', 'لوحة التحكم')

@section('content')

    <div class="admin-card">
        <p style="color: var(--admin-text-muted);">
            مرحبًا، {{ auth()->user()->name }}. اختر قسمًا من القائمة الجانبية للبدء.
        </p>
    </div>

@endsection

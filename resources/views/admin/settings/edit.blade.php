@extends('layouts.admin')

@section('title', 'إعدادات الألوان')
@section('page_title', 'إعدادات ألوان لوحة الإدارة')

@section('content')

    <div class="admin-card" style="max-width: 32rem;">

        <form method="POST" action="{{ route('admin.settings.update') }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="admin-label">اللون الذهبي (Gold)</label>
                <input type="text" name="admin_gold" value="{{ old('admin_gold', $settings->admin_gold) }}"
                    class="admin-input" placeholder="#D4AF37">
                @error('admin_gold')
                    <p class="admin-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="admin-label">اللون العنّابي (Maroon)</label>
                <input type="text" name="admin_maroon" value="{{ old('admin_maroon', $settings->admin_maroon) }}"
                    class="admin-input" placeholder="#7A1F3D">
                @error('admin_maroon')
                    <p class="admin-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="admin-label">لون الخلفية</label>
                <input type="text" name="admin_bg" value="{{ old('admin_bg', $settings->admin_bg) }}" class="admin-input"
                    placeholder="#0F0D0B">
                @error('admin_bg')
                    <p class="admin-error">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="admin-btn">حفظ</button>

        </form>

    </div>

@endsection

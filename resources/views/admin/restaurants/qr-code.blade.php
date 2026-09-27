@extends('layouts.admin')

@section('title', 'QR - ' . $restaurant->name)
@section('page_title', 'QR Code: ' . $restaurant->name)

@section('content')

    <div class="admin-card" style="max-width: 28rem; text-align: center;">

        <h2 style="font-size: 1.1rem; font-weight: 700; margin-bottom: 1rem;">
            {{ $restaurant->name }}
        </h2>

        <img
            src="{{ route('admin.restaurants.qr-code.image', $restaurant) }}"
            alt="QR Code - {{ $restaurant->name }}"
            style="width: 260px; height: 260px; margin: 0 auto; border-radius: 0.75rem; background: #ffffff; padding: 12px;"
        >

        <p style="margin-top: 1rem; color: var(--admin-text-muted); font-size: 0.85rem; word-break: break-all;">
            {{ $menuUrl }}
        </p>

        <div class="mt-6" style="display: flex; gap: 0.75rem; justify-content: center;">

<a
                href="{{ route('admin.restaurants.qr-code.image', $restaurant) }}"
                download="qr-{{ $restaurant->slug }}.png"
                class="admin-btn"
            >
                تحميل الصورة
            </a>

            <a href="{{ route('admin.restaurants.index') }}" class="admin-link" style="align-self: center;">
                رجوع
            </a>

        </div>

    </div>

@endsection

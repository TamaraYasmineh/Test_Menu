@extends('layouts.admin')

@section('title', 'المطاعم')
@section('page_title', 'المطاعم')

@section('content')

    <div class="mb-4">
        <a href="{{ route('admin.restaurants.create') }}" class="admin-btn">+ إضافة مطعم</a>
    </div>

    <div class="admin-table-wrapper">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>الشعار</th>
                    <th>الاسم</th>
                    <th>الرابط</th>
                    <th>الحالة</th>
                    <th>إجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($restaurants as $restaurant)
                    <tr>
                        <td>
                            @if($restaurant->logo)
                                <img src="{{ asset('storage/' . $restaurant->logo) }}" class="admin-thumb admin-thumb--round">
                            @else
                                <span style="color: var(--admin-text-muted);">—</span>
                            @endif
                        </td>
                        <td>{{ $restaurant->name }}</td>
                        <td style="color: var(--admin-text-muted);">
                            <a href="{{ route('menu.show', $restaurant) }}" target="_blank" class="admin-link">
                                /r/{{ $restaurant->slug }}
                            </a>
                        </td>
                        <td>
                            @if($restaurant->is_active)
                                <span class="admin-badge admin-badge--success">مفعّل</span>
                            @else
                                <span class="admin-badge admin-badge--muted">معطّل</span>
                            @endif
                        </td>
                        <td>
                            <div class="flex items-center gap-3">
                                <a href="{{ route('admin.restaurants.edit', $restaurant) }}" class="admin-link">تعديل</a>
                                <a href="{{ route('admin.restaurants.qr-code', $restaurant) }}" class="admin-link">QR</a>

                                <form method="POST" action="{{ route('admin.restaurants.destroy', $restaurant) }}"
                                      onsubmit="return confirm('هل أنت متأكد من حذف هذا المطعم؟ سيتم حذف كل تصنيفاته وأصنافه أيضًا.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="admin-link-danger">حذف</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="admin-empty">لا يوجد مطاعم بعد.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection

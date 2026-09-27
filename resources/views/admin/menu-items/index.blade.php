@extends('layouts.admin')

@section('title', 'الأصناف')
@section('page_title', 'الأصناف')

@section('content')

    <div class="mb-4">
        <a href="{{ route('admin.menu-items.create') }}" class="admin-btn">+ إضافة صنف</a>
    </div>

    <div class="admin-table-wrapper">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>الصورة</th>
                    <th>الاسم</th>
                    <th>التصنيف</th>
                    <th>السعر</th>
                    <th>الترتيب</th>
                    <th>الحالة</th>
                    <th>إجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($menuItems as $menuItem)
                    <tr>
                        <td>
                            @if($menuItem->image)
                                <img src="{{ asset('storage/' . $menuItem->image) }}" class="admin-thumb">
                            @else
                                <span style="color: var(--admin-text-muted);">—</span>
                            @endif
                        </td>
                        <td>{{ $menuItem->name }}</td>
                        <td style="color: var(--admin-text-muted);">
                            {{ $menuItem->category->name }} ({{ $menuItem->category->restaurant->name }})
                        </td>
                        <td>{{ number_format((float) $menuItem->price, 0) }} ل.س</td>
                        <td>{{ $menuItem->sort_order }}</td>
                        <td>
                            @if($menuItem->is_available)
                                <span class="admin-badge admin-badge--success">متوفر</span>
                            @else
                                <span class="admin-badge admin-badge--muted">غير متوفر</span>
                            @endif
                        </td>
                        <td>
                            <div class="flex items-center gap-3">
                                <a href="{{ route('admin.menu-items.edit', $menuItem) }}" class="admin-link">تعديل</a>

                                <form method="POST" action="{{ route('admin.menu-items.destroy', $menuItem) }}"
                                      onsubmit="return confirm('هل أنت متأكد من حذف هذا الصنف؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="admin-link-danger">حذف</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="admin-empty">لا يوجد أصناف بعد.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection

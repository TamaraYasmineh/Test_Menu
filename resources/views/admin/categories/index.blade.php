@extends('layouts.admin')

@section('title', 'التصنيفات')
@section('page_title', 'التصنيفات')

@section('content')

    <div class="mb-4">
        <a href="{{ route('admin.categories.create') }}" class="admin-btn">+ إضافة تصنيف</a>
    </div>

    <div class="admin-table-wrapper">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>الصورة</th>
                    <th>الاسم</th>
                    <th>المطعم</th>
                    <th>الترتيب</th>
                    <th>الحالة</th>
                    <th>إجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td>
                            @if($category->image)
                                <img src="{{ asset('storage/' . $category->image) }}" class="admin-thumb">
                            @else
                                <span style="color: var(--admin-text-muted);">—</span>
                            @endif
                        </td>
                        <td>{{ $category->name }}</td>
                        <td style="color: var(--admin-text-muted);">{{ $category->restaurant->name }}</td>
                        <td>{{ $category->sort_order }}</td>
                        <td>
                            @if($category->is_active)
                                <span class="admin-badge admin-badge--success">مفعّل</span>
                            @else
                                <span class="admin-badge admin-badge--muted">معطّل</span>
                            @endif
                        </td>
                        <td>
                            <div class="flex items-center gap-3">
                                <a href="{{ route('admin.categories.edit', $category) }}" class="admin-link">تعديل</a>

                                <form method="POST" action="{{ route('admin.categories.destroy', $category) }}"
                                      onsubmit="return confirm('هل أنت متأكد من حذف هذا التصنيف؟ سيتم حذف كل أصنافه أيضًا.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="admin-link-danger">حذف</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="admin-empty">لا يوجد تصنيفات بعد.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection

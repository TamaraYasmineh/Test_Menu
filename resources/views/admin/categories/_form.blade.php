@csrf

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <div>
        <label class="admin-label">المطعم</label>
        <select name="restaurant_id" class="admin-input">
            @foreach($restaurants as $restaurant)
                <option value="{{ $restaurant->id }}"
                    {{ (int) old('restaurant_id', $category->restaurant_id ?? null) === $restaurant->id ? 'selected' : '' }}>
                    {{ $restaurant->name }}
                </option>
            @endforeach
        </select>
        @error('restaurant_id') <p class="admin-error">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="admin-label">اسم التصنيف</label>
        <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}" class="admin-input">
        @error('name') <p class="admin-error">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="admin-label">الرابط المختصر (Slug)</label>
        <input type="text" name="slug" value="{{ old('slug', $category->slug ?? '') }}" class="admin-input" placeholder="Hot_Drinks">
        @error('slug') <p class="admin-error">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="admin-label">ترتيب الظهور (Sort Order)</label>
        <input type="number" name="sort_order" min="0" value="{{ old('sort_order', $category->sort_order ?? 0) }}" class="admin-input">
        @error('sort_order') <p class="admin-error">{{ $message }}</p> @enderror
    </div>

    <div class="md:col-span-2">
        <label class="admin-label">الوصف</label>
        <textarea name="description" rows="3" class="admin-input">{{ old('description', $category->description ?? '') }}</textarea>
        @error('description') <p class="admin-error">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="admin-label">صورة التصنيف</label>
        <input type="file" name="image" accept="image/*" class="admin-input">
        @error('image') <p class="admin-error">{{ $message }}</p> @enderror

        @if(isset($category) && $category->image)
            <img src="{{ asset('storage/' . $category->image) }}" class="admin-thumb mt-2">
        @endif
    </div>

    <div class="admin-checkbox-row">
        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $category->is_active ?? true) ? 'checked' : '' }}>
        <label style="color: var(--admin-text-muted); font-size: 0.9rem;">مفعّل (يظهر للزبائن)</label>
    </div>

</div>

<div class="mt-6">
    <button type="submit" class="admin-btn">حفظ</button>
</div>

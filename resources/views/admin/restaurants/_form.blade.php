@csrf

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <div>
        <label class="admin-label">اسم المطعم</label>
        <input type="text" name="name" value="{{ old('name', $restaurant->name ?? '') }}" class="admin-input">
        @error('name')
            <p class="admin-error">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="admin-label">الرابط المختصر (Slug)</label>
        <input type="text" name="slug" value="{{ old('slug', $restaurant->slug ?? '') }}" class="admin-input"
            placeholder="sergella">
        @error('slug')
            <p class="admin-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="md:col-span-2">
        <label class="admin-label">الوصف</label>
        <textarea name="description" rows="3" class="admin-input">{{ old('description', $restaurant->description ?? '') }}</textarea>
        @error('description')
            <p class="admin-error">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="admin-label">الهاتف</label>
        <input type="text" name="phone" value="{{ old('phone', $restaurant->phone ?? '') }}" class="admin-input">
        @error('phone')
            <p class="admin-error">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="admin-label">العنوان</label>
        <input type="text" name="address" value="{{ old('address', $restaurant->address ?? '') }}"
            class="admin-input">
        @error('address')
            <p class="admin-error">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="admin-label">اللون الأساسي</label>
        <input type="text" name="primary_color"
            value="{{ old('primary_color', $restaurant->primary_color ?? '#7A1F3D') }}" class="admin-input"
            placeholder="#7A1F3D">
        @error('primary_color')
            <p class="admin-error">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="admin-label">اللون الثانوي</label>
        <input type="text" name="secondary_color"
            value="{{ old('secondary_color', $restaurant->secondary_color ?? '#D4AF37') }}" class="admin-input"
            placeholder="#D4AF37">
        @error('secondary_color')
            <p class="admin-error">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="admin-label">لون خلفية القائمة</label>
        <input type="text" name="background_color"
            value="{{ old('background_color', $restaurant->background_color ?? '#0B0B0D') }}" class="admin-input"
            placeholder="#0B0B0D">
        @error('background_color')
            <p class="admin-error">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="admin-label">الشعار (Logo)</label>
        <input type="file" name="logo" accept="image/*" class="admin-input">
        @error('logo')
            <p class="admin-error">{{ $message }}</p>
        @enderror

        @if (isset($restaurant) && $restaurant->logo)
            <img src="{{ asset('storage/' . $restaurant->logo) }}" class="admin-thumb admin-thumb--round mt-2"
                style="width:4rem;height:4rem;">
        @endif
    </div>

    <div>
        <label class="admin-label">صورة الغلاف (Cover)</label>
        <input type="file" name="cover_image" accept="image/*" class="admin-input">
        @error('cover_image')
            <p class="admin-error">{{ $message }}</p>
        @enderror

        @if (isset($restaurant) && $restaurant->cover_image)
            <img src="{{ asset('storage/' . $restaurant->cover_image) }}" class="admin-thumb mt-2"
                style="width:100%;height:6rem;">
        @endif
    </div>

    <div class="admin-checkbox-row">
        <input type="checkbox" name="is_active" value="1"
            {{ old('is_active', $restaurant->is_active ?? true) ? 'checked' : '' }}>
        <label style="color: var(--admin-text-muted); font-size: 0.9rem;">مفعّل (يظهر للزبائن)</label>
    </div>

</div>

<div class="mt-6">
    <button type="submit" class="admin-btn">حفظ</button>
</div>

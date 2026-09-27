<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول - لوحة الإدارة</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/admin.css'])
    @php($adminSettings = \App\Models\AdminSetting::current())
   @php($adminSettings = \App\Models\AdminSetting::current())
<style>
    :root {
        --admin-gold: {{ $adminSettings->admin_gold }};
        --admin-maroon: {{ $adminSettings->admin_maroon }};
        --admin-bg: {{ $adminSettings->admin_bg }};
    }
</style>
</head>

<body>

    <div class="admin-login-shell">

        <div class="admin-card admin-login-card">

            <h1 class="admin-topbar__title mb-6 text-center">لوحة الإدارة</h1>

            @if ($errors->any())
                <div class="admin-flash-success"
                    style="background-color: rgba(224,82,82,0.12); border-color: rgba(224,82,82,0.35); color: #f3a6a6; margin: 0 0 1rem;">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.attempt') }}">
                @csrf

                <div class="mb-4">
                    <label class="admin-label">البريد الإلكتروني</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="admin-input">
                </div>

                <div class="mb-6">
                    <label class="admin-label">كلمة المرور</label>
                    <input type="password" name="password" required class="admin-input">
                </div>

                <button type="submit" class="admin-btn w-full">
                    دخول
                </button>

            </form>

        </div>

    </div>

</body>

</html>

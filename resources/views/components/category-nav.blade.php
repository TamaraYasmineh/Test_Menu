<nav class="category-nav" aria-label="تصنيفات القائمة">

    <div class="container">

        <h2 class="category-nav__title">
            <span>🍴</span> قائمة المطعم
        </h2>

        <ul class="category-nav__list">

            @foreach($categories as $category)

                <li class="category-nav__item">

                    <a
                        href="#category-{{ $category->id }}"
                        data-category-id="{{ $category->id }}"
                        class="category-nav__link"
                    >
                        {{ $category->name }}
                    </a>

                </li>

            @endforeach

        </ul>

    </div>

</nav>

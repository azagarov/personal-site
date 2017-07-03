<div class="top-right links">
    @if($__currentLocale == 'en')
        <span style="text-decoration: underline;">English</span>
    @else
        <a href="{{ url('/switchLanguage/en') }}">English</a>
    @endif
    @if($__currentLocale == 'es')
        <span style="text-decoration: underline;">Español</span>
    @else
        <a href="{{ url('/switchLanguage/es') }}">Español</a>
    @endif
    @if($__currentLocale == 'ru')
        <span style="text-decoration: underline;">Русский</span>
    @else
        <a href="{{ url('/switchLanguage/ru') }}">Русский</a>
    @endif
</div>

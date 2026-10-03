 @php
 $locale = app()->getLocale() == 'ar' ? 'en': 'ar';
 @endphp


 <a class="nav-link text-muted my-2" href="{{ LaravelLocalization::getLocalizedURL($locale) }}" id="langSwitcher" data-mode="lang">

 {{ strtoupper($locale) }}
 
 </a>
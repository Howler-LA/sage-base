@if($socials['links'])
  <ul class="flex gap-min">
    @foreach($socials['links'] as $link)
      <li>
        <a 
          aria-label="Links to {{ $link['name'] }}"
          href="{{ $link['url'] }}"
          @class([
            'bg-background text-foreground',
            'hover:bg-foreground hover:text-background',
            'transition ease',
            'border border-border size-14 flex items-center justify-center rounded-full group',
          ])
        >
          {{-- <x-dynamic-component
            component="{{ $link['name'] ? strtolower($link['name']) : 'fab-facebook' }}" 
            class="translate-y-px size-6 stroke-3 transition-transform duration-300 ease" 
          /> --}}
          @set($iconClass,'translate-y-px size-6 stroke-3 transition-transform duration-300 ease')
          @switch($link['name'])
            @case($link['name'] == 'facebook')
              <svg class="{{ $iconClass }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M240 363.3L240 576L356 576L356 363.3L442.5 363.3L460.5 265.5L356 265.5L356 230.9C356 179.2 376.3 159.4 428.7 159.4C445 159.4 458.1 159.8 465.7 160.6L465.7 71.9C451.4 68 416.4 64 396.2 64C289.3 64 240 114.5 240 223.4L240 265.5L174 265.5L174 363.3L240 363.3z"/></svg>
              @break
            @case($link['name'] == 'instagram')
              <svg class="{{ $iconClass }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M240 363.3L240 576L356 576L356 363.3L442.5 363.3L460.5 265.5L356 265.5L356 230.9C356 179.2 376.3 159.4 428.7 159.4C445 159.4 458.1 159.8 465.7 160.6L465.7 71.9C451.4 68 416.4 64 396.2 64C289.3 64 240 114.5 240 223.4L240 265.5L174 265.5L174 363.3L240 363.3z"/></svg>
              @break
            @default
              <svg class="{{ $iconClass }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M240 363.3L240 576L356 576L356 363.3L442.5 363.3L460.5 265.5L356 265.5L356 230.9C356 179.2 376.3 159.4 428.7 159.4C445 159.4 458.1 159.8 465.7 160.6L465.7 71.9C451.4 68 416.4 64 396.2 64C289.3 64 240 114.5 240 223.4L240 265.5L174 265.5L174 363.3L240 363.3z"/></svg>
          @endswitch
        </a>
      </li>
    @endforeach
  </ul>
@endif
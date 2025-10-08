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
              <x-fab-facebook :class="$iconClass" />
              @break
            @case($link['name'] == 'instagram')
              <x-fab-instagram :class="$iconClass" />
              @break
            @default
              <x-fab-facebook :class="$iconClass" />
          @endswitch
        </a>
      </li>
    @endforeach
  </ul>
@endif
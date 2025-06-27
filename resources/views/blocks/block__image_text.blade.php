@set($width,$config['media']['image_size'])
@set($order,$config['media']['reverse'])
@set($container, $config['media']['scaling'] ? 'empty' : 'container')
@set($scaling, $config['media']['scaling'])

<x-section class="{{ $scaling ? 'py-zero' : null }}" data-theme="{{ $config['block']['themes'] }}">
  @php
    // Dynamically adding a container component if we're toggling off fluid width
  @endphp
  <x-dynamic-component :component="$scaling ? 'empty' : 'container'">
    <x-columns gutter="{{ $scaling ? 'zero' : 'xl' }}" class="items-center">
      <x-columns.column>
        @php
          // Dynamically adding a contained component if we're toggling on fluid width
        @endphp
        <x-dynamic-component order="{{ $order }}" :component="$scaling ? 'columns.contained' : 'empty'">
          <div class="space-y-small">
            <x-eyebrow>{{ $content['eyebrow'] }}</x-eyebrow>
            <x-display>{{ $content['headline'] }}</x-display>
            <x-body>{!! $content['copy'] !!}</x-body>
            @if($content['links'])
              <x-card.footer>
                <x-button.group>
                  @foreach($content['links'] as $link)
                    <x-button 
                      variant="{{ $loop->iteration == 1 ? 'primary' : 'outline' }}"
                      label="{{ $link['link']['title'] }}"
                      title="{{ $link['link']['title'] }}"
                      href="{{ $link['link']['url'] }}"
                      target="{{ $link['link']['target'] }}"
                    />
                  @endforeach
                </x-button.group>
              </x-card.footer>
            @endif
          </div>
        </x-dynamic-component>
      </x-columns.column>
      <x-columns.column class="{{ $order ? 'xl:order-first' : '' }}">
        <div
          data-theme="{{ $config['media']['themes'] }}"
          @class([
            'bg-background' => $scaling,
            'p-zero' => $width == 'full',
            'p-large' => $width == 'narrow',
            'p-x-large' => $width == 'wide',
          ])
        >
          @set($rounded, $width == 'narrow' || $width == 'wide' || !$scaling ? 'rounded-card' : '')
          @image($content['image'],'large',['alt'=> ' ', 'class'=> "w-full h-full object-cover {$rounded}"])
        </div>
      </x-columns.column>
    </x-columns>
  </x-dynamic-component>
</x-section>
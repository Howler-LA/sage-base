@set($width,get_sub_field('config')['media']['image_size'])
@set($order,get_sub_field('config')['media']['image_orientation'])

<section class="grid xl:grid-cols-2 relative">
  <div 
    data-theme="{{ $config['block']['theme'] }}" 
    @class([
      'relative',
      'bg-background text-foreground',
      'flex flex-col justify-center',
      'p-0 xl:p-lg',
      'xl:items-end' => $order == 'right',
    ])
  >
    <div class="flex flex-col gap-sm">
      <x-lockup
        @class([
          'xl:w-full',
          'p-lg xl:p-0',
          'max-w-browser',
          'mx-auto xl:mx-0',
          'xl:max-w-[calc(calc(calc(var(--sizing-browser-width)*.5)-calc(var(--spacing-large)*2))*1px)]'
        ])
        eyebrow="{!! $content['eyebrow'] !!}"
        headline="{!! $content['headline'] !!}"
        copy="{!! $content['copy'] !!}"
      />
      @if($content['links'])
        <x-button.group>
          @foreach($content['links'] as $link)
            <x-button
              style="{{ $link['config']['style'] }}"
              format="{{ $link['config']['format'] }}"
              title="{!! $link['link']['title'] !!}"
              target="{!! $link['link']['target'] !!}"
              href="{!! $link['link']['url'] !!}"
            >
              {!! $link['link']['title'] !!}
            </x-button>
          @endforeach
        </x-button.group>
      @endif
    </div>
  </div>
  <div 
    data-theme="{{ $config['media']['theme'] }}" 
    @class([
      'bg-background',
      // 'xl:min-h-[calc(100vh-136px)]' => $config['block']['height'],
      // 'min-h-[calc(60vh-136px)]' => !$config['block']['height'],
      // 'bg-background flex flex-col justify-center relative',
      'p-0'   => $width == 'full',
      'p-lg'  => $width == 'narrow',
      'p-xl'  => $width == 'wide',
      'xl:order-first' => $order == 'left'
    ])
  >
    <x-media 
      data-aos="fade-in"
      id="{!! $content['image'] !!}"
      @class([
        'w-full h-full',
        'object-cover',
        // 'w-full h-auto rounded-lg' => $width != 'full',
        // 'absolute inset-0 w-full h-full' => $width == 'full',
      ])
    />
  </div>
</section>
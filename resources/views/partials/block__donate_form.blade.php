@set($width,'wide')
@set($fullImage, $content['image'] && $config['media']['image_placement'] == 'full')
@set($halfImage, $content['image'] && $config['media']['image_placement'] == 'half')

<x-section 
  data-theme="{{ $config['block']['theme'] }}"
  @class([
    'relative',
    'grid xl:grid-cols-2',
    '!py-0',
    'bg-black' => $fullImage,
  ])
>
  @if($fullImage)
    <div class="absolute inset-0 opacity-50">
      <x-media 
        id="{{ $content['image'] }}" 
        class="w-full h-full object-cover" 
      />
    </div>
  @endif

  <div 
    data-theme="{{ $config['block']['theme'] }}" 
    @class([
      'relative',
      'flex flex-col justify-center items-end',
      'p-lg',
      'max-w-browser mx-auto',
      'xl:max-w-none xl:mx-0', 
    ])
  >
    <x-lockup
      @class([
        'xl:w-full',
        'xl:max-w-[calc(calc(calc(var(--sizing-browser-width)*.5)-calc(var(--spacing-large)*2))*1px)]'
      ])
      eyebrow="{!! $content['eyebrow'] !!}"
      headline="{!! $content['headline'] !!}"
      copy="{!! $content['copy'] !!}"
    />
  </div>
  <div 
    data-theme="{{ $config['media']['theme'] }}" 
    @class([
      'relative',
      'bg-pink-50/50' => !$content['image'],
      'xl:min-h-[calc(100vh-136px)]' => $config['block']['height'],
      'min-h-[calc(60vh-136px)]' => !$config['block']['height'],
      'flex flex-col justify-center relative',
      'xl:p-0' => $width == 'full',
      'xl:p-xl' => $width == 'narrow',
      'xl:p-lg' => $width == 'wide',
      'bg-background text-foreground' => !$content['image'],
      'bg-black' => $halfImage,
      'w-full max-w-browser mx-auto',
      'xl:max-w-none xl:mx-0', 
    ])
  >
    @if($halfImage)
      <div class="absolute inset-0 opacity-75">
        <x-media 
          id="{{ $content['image'] }}" 
          class="w-full h-full object-cover" 
        />
      </div>
    @endif
    <div 
      data-theme="light"
      @class([
        'rounded-card-radius',
        'h-full w-full relative',
        'bg-background text-foreground',
        'shadow-2xl' => $content['image'],
        'p-sm',
      ])
    >
      <div class="w-full h-full">
        {!! $content['embed'] ? $content['embed'] : 'Enter embed code' !!}
      </div>
      @if($config['media']['sticker'])
        <div 
          @class([
            'absolute right-0 top-0 translate-x-1/3 -translate-y-1/3',
            'size-lg xl:size-xl xl:size-xl',
          ])
        >
          @image($config['media']['sticker'],'large',['class'=>'w-full h-auto block opacity-95'])
        </div>
      @endif
    </div>
  </div>
</x-section>
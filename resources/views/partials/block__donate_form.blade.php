@set($width,'wide')
@set($fullImage, $content['image'] && $config['media']['image_placement'] == 'full')
@set($halfImage, $content['image'] && $config['media']['image_placement'] == 'half')

<section 
  @class([
    'grid xl:grid-cols-2',
    'bg-black' => $fullImage,
  ])
>
  @if($fullImage)
    <div class="absolute inset-0 opacity-75">
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
      'text-foreground',
      'bg-background' => !$fullImage,
      'flex flex-col justify-center',
      'p-xs sm:p-sm sm:pb-0 md:p-md md:pb-0 xl:p-lg',
    ])
  >
    <x-lockup
      @class([
        'xl:w-full xl:max-w-[calc(calc(var(--spacing-mega)*.5)-calc(var(--spacing-lg)*2))]'
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
      'xl:min-h-[calc(100vh-136px)]' => $config['block']['height'],
      'min-h-[calc(60vh-136px)]' => !$config['block']['height'],
      'flex flex-col justify-center relative',
      'p-0' => $width == 'full',
      'p-sm sm:p-md md:p-lg xl:p-xl' => $width == 'narrow',
      'p-xs sm:p-sm md:p-md xl:p-lg' => $width == 'wide',
      'bg-background text-foreground' => !$content['image'],
      'bg-black' => $halfImage,
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
        'h-full w-full rounded relative',
        'bg-background text-foreground',
        'shadow-2xl' => $content['image'],
        'p-lg',
      ])
    >
      <div class="w-full h-full border-2 rounded-lg border-dashed border-pink-400 bg-pink-50"></div>
      @if($config['media']['sticker'])
        <div 
          @class([
            'absolute right-0 top-0 translate-x-1/3 -translate-y-1/3',
            'size-lg md:size-xl xl:size-xl',
          ])
        >
          @image($config['media']['sticker'],'large',['class'=>'w-full h-auto block opacity-95'])
        </div>
      @endif
    </div>
  </div>
</section>
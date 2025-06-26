@set($width,'wide')
@set($fullImage, $content['image'] && $config['media']['image_placement'] == 'full')
@set($halfImage, $content['image'] && $config['media']['image_placement'] == 'half')

<x-section 
  data-theme="{{ $config['block']['theme'] }}"
>
  @if($fullImage)
    <div class="absolute inset-0 opacity-50">
      @image($content['image'],'large',['alt'=>' ', 'class'=>'w-full h-full object-cover inset-0'])
    </div>
  @endif
  <div
    @class([
      'grid',
      'grid-cols-1 xl:grid-cols-2 gap-md',
      'relative'
    ])
  >
    <div 
      data-theme="{{ $config['block']['theme'] }}" 
      class="flex flex-col justify-center items-end"
    >
      <div
        @class([
          'w-full',
          'lg:max-w-[calc(var(--spacing-browser)*0.5)]',
          'px-[calc((var(--margins-small))*1px)]',
        ])
      >
        <x-lockup
          eyebrow="{!! $content['eyebrow'] !!}"
          headline="{!! $content['headline'] !!}"
          copy="{!! $content['copy'] !!}"
        />
      </div>
    </div>
    <div 
      data-theme="{{ $config['media']['theme'] }}" 
      @class([
        'relative',
        'h-[50vh]' => !$content['embed'],
        'bg-pink-200' => !$halfImage && !$content['embed'],
        'bg-black' => $halfImage,
        'xl:p-lg' => $width == 'wide',
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
      <div class="inset-0 size-full relative">
        <div class="w-full h-full bg-white relative">
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
  </div>
</x-section>

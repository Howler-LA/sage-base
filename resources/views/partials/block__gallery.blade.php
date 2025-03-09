@set($columns,3)
@set($items,3)

<x-section data-theme="{{ $config['block']['theme'] }}">
  <x-container 
    @class([
      'grid',
      'grid-cols-1 gap-x-sm sm:gap-x-md',
      'xl:grid-cols-1 gap-y-sm',
    ])
  >
    <x-lockup
      align="{{ $columns == 2 ? 'left' : 'center' }}"
      eyebrow="{!! $content['eyebrow'] !!}"
      headline="{!! $content['headline'] !!}"
      copy="{!! $content['copy'] !!}"
    />
    <div 
      @class([
        'columns-3 xl:columns-2' => $columns == 2,
        'columns-3 xl:columns-3' => $columns == 3,
        'columns-3 xl:columns-4' => $columns == 4,
        'gap-2 lg:gap-xs'
      ])
    >
      @foreach($content['images'] as $image)
        @php
          
          $width = wp_get_attachment_image_src($image,'full')[1];
          $height = wp_get_attachment_image_src($image,'full')[2];

          if ($width >= $height) {
            $aspect = 'landscape';
          } else {
            $aspect = 'portrait';
          }

        @endphp
        <div class="break-inside-avoid-column mb-2 lg:mb-xs">
          <div 
            @class([
              'bg-foreground/10 relative',
              'aspect-[5/4]' => $aspect == 'landscape',
              'aspect-[4/5]' => $aspect == 'portrait',
            ])
          >
            <div class="absolute inset-0">
              <x-image 
                id="{{ $image }}" 
                class="w-full h-full object-cover" 
              />
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </x-container>
</x-section>

@set($columns,3)
@set($items,3)

<x-section data-theme="{{ $config['block']['themes'] }}">
	<x-section.header>
    <x-eyebrow>{{ $content['eyebrow'] }}</x-eyebrow>
    <x-display>{{ $content['headline'] }}</x-display>
    <x-body class="max-w-prose mx-auto">{!! $content['copy'] !!}</x-body>
  </x-section.header>
  @if($content['images'])
    <x-container>
      <div 
      	x-data x-masonry
        @class([
        	'grid',
          'grid-cols-2 xl:grid-cols-3',
          'gap-em xl:gap-med'
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
            <div 
              @class([
                'relative',
                'w-full',
                'aspect-[5/4]' => $aspect == 'landscape',
                'aspect-[4/5]' => $aspect == 'portrait',
              ])
            >
              <div class="absolute inset-0 bg-black/10">
              	@image($image,'medium',[
              		'class'=>'w-full h-full object-cover'
              	])
              </div>
            </div>
        @endforeach
      </div>
    </x-container>
  @endif
</x-section>

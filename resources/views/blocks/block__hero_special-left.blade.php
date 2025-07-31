<x-section data-theme="{{ $config['block']['themes'] }}" padding="none" class="overflow-hidden">
  <x-container class="grid grid-cols-1 xl:grid-cols-2">
    <div class="relative z-10 py-x-large">
      <x-eyebrow :content="$content['eyebrow']" />
      <x-super-display :message="$content['headline']" class="mt-large mb-em" />
      <x-title :message="$content['subhead']" class="mb-med" />
      <x-body :message="$content['copy']" class="max-w-[480px]" />
      @if($content['links'])
        <div class="flex flex-col pt-med card-footer justify-end">
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
        </div>
      @endif
    </div>
    <div class="relative">
      <div class="-mx-[calc(var(--spacing-browser)*.2)]">
        @image($content['image'],'large',[
          'data-aos-delay' => '100', 
          'data-aos'=>'fade-in', 
          'class'=>'w-full h-auto block', 
          'alt'=> $content['headline'] 
        ])
      </div>
    </div>
  </x-container>
</x-section>

{{-- <x-section data-theme="{{ $config['block']['themes'] }}" padding="none" class="overflow-hidden">
	<div
    @class([
      'grid grid-cols-1',
      'gap-med xl:grid-cols-2 xl:gap-med' => $align != 'center'
    ])
  >
    <div class="relative order-last">
      <div 
        @class([
          'bg-pink-100',
          'w-[calc(var(--spacing-browser)*.75)]',
        ])
      > 
        @image($content['image'],'large',[
          'data-aos-delay' => '100', 
          'data-aos'=>'fade-in', 
          'class'=>'w-full h-auto block', 
          'alt'=> $content['headline'] 
        ])
      </div>
    </div>
    <div class="flex flex-col justify-center relative">
      <x-eyebrow :content="$content['eyebrow']" />
      <x-super-display :message="$content['headline']" class="mt-med mb-em" />
      <x-title :message="$content['subhead']" class="mb-med" />
      <x-body :message="$content['copy']" />
      @if($content['links'])
        <div class="flex flex-col pt-em card-footer justify-end">
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
        </div>
      @endif
    </div>
	</div>
</x-section> --}}

{{-- <x-section
  :padding="$align == 'center' ? '' : 'none'"
  data-theme="{{ $config['block']['themes'] }}" 
  @class([
    'bg-background text-foreground',
    'overflow-hidden',
    'pb-0 overflow-hidden' => $content['image'],
  ])
>
  <x-container
    @class([
      'grid grid-cols-1',
      'gap-med xl:gap-med' => $align == 'center' && !$content['svg_headline'],
      'gap-med xl:grid-cols-2 xl:gap-med' => $align != 'center'
    ])
  >
    <div class="z-10">
      <div
        @class([
          'flex flex-col justify-center h-full space-y-med',
          'items-center text-balance' => $align == 'center' && !$content['svg_headline']
        ])
      >
        <x-eyebrow :content="$content['eyebrow']" />
        <div class="space-y-em">
          <x-super-display 
            @class([
              'relative',
              'items-center justify-center text-center xl:px-large' => $config['block']['align'] == 'center',
              'items-start justify-start text-left' => $config['block']['align'] == 'left',
              'items-end justify-end text-right' => $config['block']['align'] == 'right',
              'sr-only' => $content['svg_headline']
            ])
            :message="$content['headline']"
          />
          <x-title 
            :message="$content['subhead']" 
          />
        </div>
        <x-body 
          :message="$content['copy']" 
          @class([
            'max-w-prose mx-auto',
            'text-center' => $align == 'center'
          ])
        />
        @if($content['links'])
          <div class="flex flex-col pt-em card-footer justify-end">
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
          </div>
        @endif
      </div>
    </div>
    <div class="">
      <div 
        @class([
          'xl:-mx-[12.5vw]' => $align != 'center'
        ])
      >
        @image($content['image'],'large',[
          'data-aos-delay' => '100', 
          'data-aos'=>'fade-in', 
          'class'=>'w-full h-auto block', 
          'alt'=> $content['headline'] 
        ])
      </div>
    </div>
  </x-container>
</x-section> --}}
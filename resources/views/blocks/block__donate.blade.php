@set($width,'narrow')
@set($order,false)
@set($scaling,true)

<x-section data-theme="{{ $config['block']['themes'] }}" class="overflow-hidden" padding="{{ $scaling ? '' : 'none' }}">
  <x-cols :reversed="$order" :contained="$scaling" center>
    <x-cols.col :contained="!$scaling" data-aos="fade-in">
      <div class="space-y-small {{ $scaling ? '' : 'py-section' }}">
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
    </x-cols.col>
    <x-cols.col data-aos-delay="100" data-aos="fade-up">
      @if($content['image'])
        @image($content['image'],'large',['class'=>'w-full aspect-[5/4] object-cover object-top'])
      @else
        <div class="aspect-[5/4] bg-background rounded-card bg-black/10">
          <div class="absolute inset-0 flex items-center justify-center">
            <x-lucide-image-off class="size-24 stroke-1" />
          </div>
        </div>
      @endif
    </x-cols.col>
  </x-cols>
</x-section>
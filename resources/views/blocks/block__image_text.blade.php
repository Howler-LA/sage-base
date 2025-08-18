@set($width,$config['media']['image_size'])
@set($order,$config['media']['reverse'])
@set($scaling,$config['media']['scaling'])

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
    <x-cols.col>
      @if($content['image'])
        <div
          data-aos-delay="100" 
          data-aos="fade-in"
          data-theme="{{ $config['media']['themes'] }}"
          @class([
            'bg-background',
            'p-zero' => $config['media']['image_size'] == 'full',
            'p-large' => $config['media']['image_size'] == 'narrow',
            'p-x-large' => $config['media']['image_size'] == 'wide',
          ])
        >
          @set($rounded,$config['media']['image_size'] == 'full' ? 'w-full h-auto object-cover object-top' : 'w-full h-auto object-cover object-top rounded-card')
          @image($content['image'],'large',['class'=> $rounded])
        </div>
      @else
        <div class="aspect-[5/4] bg-background rounded-card bg-black/10 relative">
          <div class="absolute inset-0 flex items-center justify-center">
            <x-lucide-image-off class="size-24 stroke-1" />
          </div>
        </div>
      @endif
    </x-cols.col>
  </x-cols>
</x-section>
@set($questions,[
  '1' => ['headline'=>'Text link to another component','link'=>'#'],
  '2' => ['headline'=>'Text link to another component','link'=>'#'],
  '3' => ['headline'=>'Text link to another component','link'=>'#'],
  '4' => ['headline'=>'Text link to another component','link'=>'#'],
])

<x-section
  data-theme="{{ $config['block']['theme'] }}"
>
  <x-container class="relative grid grid-cols-1 xl:grid-cols-3 gap-xs sm:gap-md">
    <x-lockup
      class="xl:col-span-2"
      eyebrow="{!! $content['eyebrow'] !!}"
      headline="{!! $content['headline'] !!}"
      copy="{!! $content['copy'] !!}"
    />
    <div class="flex flex-col gap-4">
      <x-type.key title="Common Questions" />
      <div>
        <x-divider class="col-span-2 xl:col-span-1" />
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-1 bg-foreground/50 pb-px gap-px">
          @foreach($questions as $question)
            <a 
              href="#" 
              @class([
                'flex items-center justify-between py-3 !no-underline group bg-background',
                'sm:odd:pr-3 sm:even:pl-3 sm:py-4',
                'xl:even:pl-0 xl:odd:pr-0'
              ])
            >
              <x-type.copy size="body-2" content="{{ $question['headline'] }}" />
              <x-button.arrow />
            </a>
          @endforeach
        </div>
      </div>
  </x-container>
</x-section>
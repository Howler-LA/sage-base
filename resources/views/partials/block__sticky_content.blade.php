@set($columns,2)

<x-section data-theme="{{ $config['block']['theme'] }}">
  <x-container 
    @class([
      'grid',
      'grid-cols-1',
      'gap-x-md'          => !$config['block']['flush'],
      'max-w-full !px-0'  => $config['block']['flush'],
      'xl:grid-cols-2'    => $columns == 2,
    ])
  >
    <div>
      <x-lockup
        @class([
          'xl:sticky',
          'xl:top-[calc(var(--spacing-xl)+136px)] xl:pb-lg' => $header['sticky'],
          'xl:max-w-[calc(calc(var(--spacing-mega)*.5)-calc(var(--spacing-lg)*2))]'
        ])
        align="{{ $columns == 2 ? 'left' : 'center' }}"
        eyebrow="{!! $content['eyebrow'] !!}"
        headline="{!! $content['headline'] !!}"
        copy="{!! $content['copy'] !!}"
      />
    </div>
    <div 
      @class([
        'flex flex-col',
      ])
    >
      @repeat(3)
        <x-card.image_text 
          items="2"
          class="border-b py-xs sm:py-sm first:xl:pt-0"
          key="0{{ $loop->iteration }}"
          title="Headline about a particular topic you’re promoting"
          copy="Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Ut enim ad minim veniam, quis nostrud exercitation."
        />
      @endrepeat
    </div>
  </x-container>
</x-section>

{{-- This is a

<div 
  data-theme="{{ $config['block']['theme'] }}"
  class="grid xl:grid-cols-2 bg-background text-foreground hidden"
>
  <div 
    @class([
      'p-xs pb-0 sm:p-sm sm:pb-0 xl:p-md xl:pb-0 xl:p-lg',
      'flex flex-col',
      'items-end'
    ])
  >
    <x-lockup
      @class([
        'xl:sticky',
        'xl:top-56' => $header['sticky'],
        'xl:max-w-[calc(calc(var(--spacing-mega)*.5)-calc(var(--spacing-lg)*2))]'
      ])
      eyebrow="{!! $content['eyebrow'] !!}"
      headline="{!! $content['headline'] !!}"
      copy="{!! $content['copy'] !!}"
    />
  </div>
  <div 
    @class([
      'min-h-[calc(100vh-136px)]',
      'flex flex-col',
      'p-0'
    ])
  >
    @repeat(5)
      <div class="border-b bg-background p-xs sm:p-sm xl:p-md xl:p-lg flex flex-col gap-4">
        <div class="aspect-video bg-bg-foreground/10 rounded-lg"></div>
        <x-lockup
          key="0{{ $loop->iteration }}"
          title="Some title goes here"
          copy="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse quis elit vitae orci sagittis facilisis. Aenean egestas fermentum justo, lobortis consectetur nisi. Integer non semper ante. "
        />
      </div>
    @endrepeat
  </div>
</div> --}}
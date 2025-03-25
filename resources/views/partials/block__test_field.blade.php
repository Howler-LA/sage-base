<x-section data-theme="{{ $config['block']['theme'] }}">
  <x-container>
    <div 
      @class([
        'flex flex-col',
        'gap-[calc((var(--spacing-gutters))*1px)]',
        'items-center text-center',
        'mb-sm',
        'px-lg'
      ])
    >
      <x-eyebrow content="Key Goes Here" />
      <header class="space-y-[calc((var(--spacing-em))*1px)]">
        <x-display content="Card title" />
        <x-body content="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation." />
      </header>
    </div>
    <div class="grid xl:grid-cols-3 gap-sm">
      @repeat(3)
        <div 
          data-theme="Primary"
          @class([
            'bg-[var(--bg-color)] text-[var(--txt-color)]',
            'rounded-[calc((var(--card-radius))*1px)]',
            'overflow-hidden',
          ])
        >
          <div class="h-64 bg-black/50"></div>
          <div
            @class([
              'p-[calc((var(--card-padding))*1px)]',
              'flex flex-col items-start',
              'gap-[calc((var(--spacing-gutters))*1px)]',
            ])
          > 
            <x-eyebrow wrapper="false" content="Key Goes Here" />
            <header class="space-y-[calc((var(--spacing-em))*1px)]">
              <x-subhead content="Card title" />
              <x-body content="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt." />
            </header>
            <x-button size="sm" href="/" label="Do Something" />
          </div>
        </div>
      @endrepeat
    </div>
  </x-container>
</x-section>
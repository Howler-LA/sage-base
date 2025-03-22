@set($size,'sm')

<x-section data-theme="White">
  <x-container>
    <div class="grid xl:grid-cols-3 gap-[calc((var(--spacing-small))*1px)]">
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
            <x-eyebrow content="Key Goes Here" />
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
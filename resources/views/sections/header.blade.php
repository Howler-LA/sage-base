<x-section data-theme="White" html="header" class="py-small relative">
  <x-container>
    <div class="flex justify-between gap-med items-center">
      <a href="/">
        <x-title size="1">{{ $siteName }}</x-title>
      </a>
      <x-button.group>
        <x-desktop-menu class='flex' />
        <x-button 
          label="Support Us"
          href="#"
          target="self"
          variant=""
        />
        <x-button 
          label="Do Something"
          href="#"
          target="self"
          variant="outline"
        />
      </x-button.group>
    </div>
  </x-container>
</x-section>
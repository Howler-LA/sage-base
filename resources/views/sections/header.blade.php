<x-section 
  data-theme="White" 
  html="header"
  @class([
    'py-small',
    'ring-1 ring-black/5',
    'sticky z-50',
    is_user_logged_in() ? 'top-[32px]' : 'top-0'
  ])
>
  <x-container>
    <div class="flex justify-between gap-med items-center">
      <a href="/">
        <x-title size="1">{{ $siteName }}</x-title>
      </a>
      <x-button.group>
        <x-desktop-menu class='hidden xl:flex' />
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
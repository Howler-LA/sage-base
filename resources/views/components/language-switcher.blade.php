@props([
  'name' => null,
])

@php($menu = Navi::build($name))

@if ($menu->isNotEmpty())
  <div class="relative group">
    <x-button 
      :label="weglot_get_current_language()"
      href="#"
      size="sm"
      variant="outline"
      class="capitalize"
      icon="lucide-arrow-down"
    />
    <div class="invisible opacity-100 group-hover:visible group-hover:opacity-100 top-full absolute -mt-px pt-em z-30">
      <div data-theme="White" class="drop-shadow-2xl bg-background text-foreground rounded overflow-hidden -ml-btn-horiz-l transition ease-in-out duration-300 translate-y-min group-hover:translate-y-0">
        <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('lang_navigation') }}">
          {!! wp_nav_menu(['theme_location' => 'lang_navigation', 'menu_class' => 'nav flex flex-col', 'echo' => false]) !!}
        </nav>
      </div>
    </div>
  </div>
  <style>
    .menu-item-weglot a {
      display:flex;
      align-items:center;
      gap: 3px;
      border-bottom: 1px solid var(--gridlines-tint);
      padding-top: var(--spacing-btn-vert-l);
      padding-bottom: var(--spacing-btn-vert-l);
      padding-left: var(--spacing-btn-horiz-l);
      padding-right: var(--spacing-btn-horiz-l);
    }
    .menu-item-weglot a:hover {
      background-color: #f9f9f9;
    }
  </style>
@endif
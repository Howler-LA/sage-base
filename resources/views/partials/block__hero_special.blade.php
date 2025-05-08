@if(file_exists(get_theme_file_path('resources/views/partials/layout__hero_special_'.$config['style']['client'].'_'.$config['style']['version'].'.blade.php')))
  @include('partials/layout__hero_special_'.$config['style']['client'].'_'.$config['style']['version'])
@else
  <div class="py-12 bg-pink-100">
    <x-container>
      Sorry, nothing here
    </x-container>
  </div>
@endif



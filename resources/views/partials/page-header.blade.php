@include('partials.block__page_hero', [
  'content'     => [
    'headline'  => $title,
    'eyebrow'   => 'single page',
    'copy'      => ''
  ],
  'config'      => [
    'block'     => [
      'theme'   => 'light'
    ]
  ]
])
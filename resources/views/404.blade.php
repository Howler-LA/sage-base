@extends('layouts.app')
@section('content')

<section 
  data-theme="subtle" 
  @class([
    'bg-background text-foreground min-h-[calc(66vh-var(--spacing-header))]',
    'flex items-center justify-center'
  ])
>
  <x-container>
    <x-lockup
      align="center"
      eyebrow="404 — Not Found"
      headline="Sorry, nothing here"
      copy="Why not try these links?"
    />
  </x-container>
</section>

@endsection

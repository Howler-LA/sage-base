@props([
  'id'    => null,
  'size'  => 'large',
  'class' => 'w-full h-auto block'
])

@if(str_contains(get_post_mime_type($id), 'video'))
  <video 
    width="320" height="240" autoplay muted playsinline loop class="{{$class}}"
    >
    <source 
      src="{{ wp_get_attachment_url($id) }}" 
      type="video/mp4"
    >
  </video>
@else
  <x-image
    class="{{ $class }}"
    id="{{$id}}"
  />
@endif
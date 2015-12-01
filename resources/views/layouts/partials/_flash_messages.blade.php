@if (Session::has(md5(\studyhub\Services\FlashedMessage::FLASH_BASE_KEY)))
  @foreach(Session::get(md5(\studyhub\Services\FlashedMessage::FLASH_BASE_KEY)) as $message => $level)
    <div class="alert alert-{{ $level }}">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      {{ $message }}
    </div>
  @endforeach
@endif

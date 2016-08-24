@if ($errors->any())
  <ul class="alert alert-danger" id="erorr-list">
    <li><b>{{ trans ('panel.are_errors') }}</b></li>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif
@if ($are_deleted_registers || $registers->count() > 0)
  <div class="row center">
    @if ($are_deleted_registers)
      @if ($registers->count() > 0)
        <div class="col-md-3 col-sm-12 col-xs-12 deleted-model-button">
      @else
        <div>
      @endif
        @if ($model == 'people')
          <a class="btn btn-default btn-sm" href="{{ route('panel.deleted.people.index', $status) }}">
        @else
          <a class="btn btn-default btn-sm" href="{{ route('panel.deleted.index', $model) }}">
        @endif
          <i class="material-icons">delete</i>
          @if ($model == 'people' || $model == 'provinces' || $model == 'suggestions')
            {{ trans('panel.view_deleted_female', ['model' => trans('panel.' . $model)]) }}
          @else
            {{ trans('panel.view_deleted_male', ['model' => trans('panel.' . $model)]) }}
          @endif
        </a>
      </div>
    @else
      <div class="col-md-3 col-sm-12 col-xs-12"></div>
    @endif
    @if ($registers->count() > 0)
      <div class="col-md-6 col-sm-12 col-xs-12">
        {!! $registers->render() !!}
      </div>
      <div class="col-md-3 col-sm-0 col-xs-0">
      </div>
    @endif
  </div>
@endif
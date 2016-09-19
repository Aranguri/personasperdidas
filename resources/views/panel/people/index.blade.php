@extends ('layouts.panel', ['user' => $user, 'status' => $status])

@section ('content')
<div class="container" id="person-controller">
  <?php $general_status = $status; ?>
  @if (!isset($user) || $user->hierarchy == 0)
    <ul class="nav nav-tabs" role="tablist">
      <?php $i = 0; ?>
      @foreach (Config::get('constants.status') as $status)
        <?php $i++; ?>
        @if ($i < 5)
          <li role="presentation" class="{{ setActive($status) }}"><a href="{{ route('panel.people.index', $status) }}" role="tab">{{ trans('forms.' . $status . '_plural') }}</a></li>
        @else
          <li role="presentation" class="{{ setActive($status) }} finished-tabs"><a href="{{ route('panel.people.index', $status) }}" role="tab">{{ trans('forms.' . $status . '_plural') }}</a></li>
        @endif
      @endforeach
      <li class="{{ setActive('finished') }}" id="finished">
        <a id="dropdownMenuFinished" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" href="">
          {{ trans('forms.finished_plural') }}
          <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuFinished">
          <?php $i = 0; ?>
          @foreach (Config::get('constants.status') as $tab_status)
            <?php $i++; ?>
            @if ($i > 4)
              <li><a href="{{ route('panel.people.index', $tab_status) }}">{{ trans('forms.' . $tab_status) }}</a></li>
            @endif
          @endforeach
        </ul>
      </li>
    </ul>
  @endif
  <div class="row center">
    <div class="col-md-4 col-sm-4 col-xs-0">
    </div>
    <div class="col-md-4 col-sm-4 col-xs-6">
      <a class="btn btn-success center" href="{{ route('panel.people.create', $general_status) }}">
        <i class="material-icons">add</i>
        {{ trans('panel.new_model_female', ['model' => trans('panel.person')]) }}
      </a>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-6">
      <a class="btn btn-primary center" href="#" onclick="toggleFilterNavbar()">
        <i class="material-icons">search</i>
        {{ trans('panel.filters') }}
      </a>
    </div>
  </div>
  <div class="center filters no-display" id="filter-navbar">
    <div class="form-group" id="order-by-filter">
      {!! Form::select('order_by',
      ['name_asc' => trans('panel.asc', ['field' => trans('forms.name')]),
      'name_desc' => trans('panel.desc', ['field' => trans('forms.name')]),
      'surname_asc' => trans('panel.asc', ['field' => trans('forms.surname')]),
      'surname_desc' => trans('panel.desc', ['field' => trans('forms.surname')]),
      'created_at_asc' => trans('panel.asc', ['field' => trans('forms.created_at')]),
      'created_at_desc' => trans('panel.desc', ['field' => trans('forms.created_at')])],
      $orderBy,
      ['placeholder' => trans('panel.order_by'), 'id' => 'order-by-select', 'class' => 'form-control', 'onchange' => 'orderByRedirect("'. route('panel.people.index', $general_status) . '", "' . $search . '", "' . $paginate . '");']) !!}
    </div>
    <div class="input-group" id="search-filter">
      {!! Form::text('search', $search, ['class' => 'form-control', 'id' => 'search']) !!}
      <span class="span-submit-comment">
        <a class="btn btn-primary btn-responsive button-inline-field" href="#" onclick="searchRedirect('{{ route('panel.people.index', $general_status) }}', '{{ $orderBy }}', '{{ $paginate }}')">
          <i class="material-icons">search</i>
          {{ trans('forms.search') }}
        </a>
      </span>
    </div>
    <div class="form-group" id="paginate-filter">
      {!! Form::select('paginate', [5 => '5', 10 => '10', 20 => '20 (' . trans('panel.as_default') . ')', 50 => '50', 100 => '100', 'all' => trans('panel.all')],
      $paginate,
      ['placeholder' => trans('forms.select_one', ['field' => trans('forms.paginate_number')]), 'id' => 'paginate-select', 'class' => 'form-control', 'onchange' => 'paginateRedirect("'. route('panel.people.index', $general_status) . '", "' . $orderBy . '", "' . $search . '");']) !!}
    </div>
  </div>
  @if ($people->count() > 0)
    <table class="table table-striped" id="people-table">
      <thead>
        <td>{{ trans('forms.image') }}</td>
        <td>{{ trans('forms.name') }}</td>
        <td>{{ trans('panel.location') }}</td>
        <td>G.</td>
        @if ($general_status == 'missing_to_validate' || $general_status == 'missing')
          <td>{{ trans('forms.missing_at') }}</td>
        @elseif ($general_status == 'found_to_validate' || $general_status == 'found')
          <td>{{ trans('forms.found_at') }}</td>
        @elseif ($general_status == 'missing_found_with_life' || $general_status == 'missing_found_without_life' || $general_status == 'found_refound' || $general_status == 'closed')
          <td>{{ trans('forms.closure_at') }}</td>
        @endif
        <td class="right">{{ trans('panel.actions') }}</td>
      </thead>
      <tbody>
        @foreach ($people as $person)
          <tr>
            <td>
              <img class="people-table-image" src="{{ includeAsset('images/people/' . $person->id . '_square.jpg') }}" onerror="this.src='{{ includeAsset('images/src/image_not_found.png') }}'">
            </td>
            @if (strlen(getName($person)) > 26)
              <td>{{ substr(getName($person), 0, 24) }}...</td>
            @else
              <td>{{ getName($person) }}</td>
            @endif
            @if (strlen(getLocation($person)) > 33)
              <td>{{ substr(getLocation($person), 0, 31) }}...</td>
            @else
              <td>{{ getLocation($person) }}</td>
            @endif
            @if ($person->gender)
              <td>0</td>
            @else
              <td>1</td>
            @endif
            @if ($general_status == 'missing_to_validate' || $general_status == 'missing')
              @if ($person->missing_at)
                <td>{{ $person->missing_at }}</td>
              @else
                <td>{{ trans('forms.date_not_found') }}</td>
              @endif
            @elseif ($general_status == 'found_to_validate' || $general_status == 'found')
              @if ($person->found_at)
                <td>{{ $person->found_at }}</td>
              @else
                <td>{{ trans('forms.date_not_found') }}</td>
              @endif
            @elseif ($general_status == 'missing_found_with_life' || $general_status == 'missing_found_without_life' || $general_status == 'found_refound' || $general_status == 'closed')
              @if ($person->closure_at)
                <td>{{ $person->closure_at }}</td>
              @else
                <td>{{ trans('forms.date_not_found') }}</td>
              @endif
            @endif
            <td class="right">
              <a class="btn btn-primary btn-responsive" href="{{ route('panel.people.show', $person->id) }}">
                <i class="material-icons">visibility</i> {{ trans('panel.view') }}
              </a>
              <a class="btn btn-success btn-responsive" href="{{ route('panel.people.edit', $person->id) }}">
                <i class="material-icons">edit</i> {{ trans('panel.edit') }}
              </a>
              {!! Form::open(['route' => ['panel.people.destroy', $person->id], 'method' => 'delete', 'class' => 'inline-form', 'onsubmit' => 'return confirmAction("'.trans('panel.sure_delete').'")']) !!}
              <button class="btn btn-danger btn-responsive" type="submit">
                <i class="material-icons">delete</i> {{ trans('panel.delete') }}
              </button>
              {!! Form::close() !!}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    @if ($search)
      <p class="no-results">{{ trans('panel.no_people_results_in_search', ['status' => trans('forms.' . $general_status)]) }}</p>
    @else
      <p class="no-results">{{ trans('panel.no_people_results', ['status' => trans('forms.' . $general_status)]) }}</p>
    @endif
  @endif
  @include ('panel.layouts.show-footer', ['registers' => $people, 'model' => 'people', 'are_deleted_registers' => $are_deleted_registers, 'status' => $general_status])
</div>
@endsection

@section ('scripts')
<script>

</script>
@endsection
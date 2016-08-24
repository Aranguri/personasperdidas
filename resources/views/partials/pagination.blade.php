<?php
$link_limit = 7;
?>

@if ($paginator->lastPage() > 1)
  <div class="ui menu center" id="people-pagination">
    <ul class="pagination">
      @if($paginator->currentPage() != 1)
        <a class="page-link" id="previous-page-text" tabindex="0" href="{{ $paginator->url($paginator->currentPage() - 1) }}">
          <li class="page-item previous {{ ($paginator->currentPage() == 1) ? 'disabled' : '' }}">{{ trans('home.previous') }}</li>
        </a>
        <a class="page-link" id="previous-page-char" tabindex="0" href="{{ $paginator->url($paginator->currentPage() - 1) }}">
          <li class="page-item previous {{ ($paginator->currentPage() == 1) ? 'disabled' : '' }}"><</li>
        </a>
      @endif
      @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <?php
          $half_total_links = floor($link_limit / 2);
          $from = $paginator->currentPage() - $half_total_links;
          $to = $paginator->currentPage() + $half_total_links;
          if ($paginator->currentPage() < $half_total_links) {
            $to += $half_total_links - $paginator->currentPage();
          }
          if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
            $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
          }
        ?>
        @if ($from < $i && $i < $to)
          <a class="page-link" href="{{ $paginator->url($i) }}">
            <li class="page-item {{ ($paginator->currentPage() == $i) ? 'active' : '' }} {{ ($i == 1) ? 'first' : '' }} {{ ($paginator->lastPage() == $i) ? 'last' : '' }} {{ ($to - 1 == $i) ? 'penultimate' : '' }}">
            {{ $i }}
            </li>
          </A>
        @endif
      @endfor
      @if($paginator->currentPage() != $paginator->lastPage())
        <a class="page-link" id="next-page-text" tabindex="0" href="{{ $paginator->url($paginator->currentPage() + 1) }}">
          <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? 'disabled' : '' }}">{{ trans('home.next') }}</li>
        </a>
        <a class="page-link" id="next-page-char" tabindex="0" href="{{ $paginator->url($paginator->currentPage() + 1) }}">
          <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? 'disabled' : '' }}">></li>
        </a>
      @endif
    </ul>
  </div>
@endif
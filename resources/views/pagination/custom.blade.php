@php
$search = '';
if(isset($_GET['search']))
{
$search= '&search='.$_GET['search'];
}
@endphp

<div class="product__pagination">
    @if ($paginator->hasPages())


            @if ($paginator->onFirstPage())
            <a href="javascript:void(0)" class="disabled"><i class="fa fa-angle-double-left"></i></a>
            @else

                @if (empty($search))
                <a href="{{ $paginator->previousPageUrl() }}"><i class="fa fa-angle-double-left"></i></a>
                @else
                <a href="{{ $paginator->previousPageUrl() . $search }}"><i class="fa fa-angle-double-left"></i></a>
                @endif


            @endif



            @foreach ($elements as $element)

            @if (is_string($element))
            <a href="javascript:void(0)" class="disabled">{{ $element }}</a>
            @endif



            @if (is_array($element))
            @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
            <a href="javascript:void(0)" class="current-page">{{ $page }}</a>
            @else


                @if (empty($search))
                <a href="{{ $url }}">{{ $page }}</a>
                @else
                <a href="{{ $url . $search }}">{{ $page }}</a>
                @endif


            @endif
            @endforeach
            @endif
            @endforeach



            @if ($paginator->hasMorePages())

                @if (empty($search))
                    <a href="{{ $paginator->nextPageUrl() }}"><i class="fa fa-angle-double-right"></i></a>
                @else
                    <a href="{{ $paginator->nextPageUrl() . $search  }}"><i class="fa fa-angle-double-right"></i></a>
                @endif


            @else
                <a href="javascript:void(0)" class="disabled"><i class="fa fa-angle-double-right"></i></a>
            @endif

        @endif
</div>




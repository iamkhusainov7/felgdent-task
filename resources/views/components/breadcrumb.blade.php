<div class="page-bar">
    <div class="page-title-breadcrumb">
        <div class=" pull-left">
            <div class="page-title">{{ $pagename }}</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right">
            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('dashboard')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
            </li>
            {{ $content ?? '' }}
        </ol>
    </div>
</div>
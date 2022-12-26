<a href="{{ route('web.category.products', ["category" => $category->id]) }}">{{$category->name}}</a>

<ul>
    @foreach($category->activeChildren as $category)
        @if($category->activeChildren()->count())
            <li>@include('web.categories.index', $category)</li>
        @else
            <li><a href="{{ route('web.category.products', ["category" => $category->id]) }}">{{$category->name}}</a></li>
        @endif
    @endforeach
</ul>







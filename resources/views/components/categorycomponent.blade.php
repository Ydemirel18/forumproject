        <!-- Categories widget-->
        <div class="card mb-4">
            <div class="card-header">Kategoriler</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        @if (count($categories)>0)
                        <ul class="list-unstyled mb-0">
                            @foreach($categories as $category)
                            <a href="/category/{{$category->id}}">
                                <li>
                                   {{$category->category}}<br>
                                </li>
                            </a>
                            @endforeach
                         </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
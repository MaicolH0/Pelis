<div class="col-md-12">
    @foreach ($categories as $category)
        <h3 class="mt-5">{{ $category->name }}</h3>
        <hr>
        <div class="row" id="list-movies">
            @forelse ($movies as $movie)
                @if ($movie->category_id == $category->id)
                    <div class="col-md-4 mb-4">
                        <div class="card mb-3" style="max-width: 540px; min-height:194px;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <figure class="img-fcard" style="background-image: url({{ asset($movie->image) }});"></figure>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $movie->name }}</h5>
                                        <p class="card-text">
                                            @php
                                                $td = \Carbon\Carbon::now();
                                                $dt = \Carbon\Carbon::parse($movie->created_at);
                                            @endphp
                                            <small>
                                                <strong>Creado hace:</strong> {{ $td->diffForHumans($dt,1) }}
                                            </small>
                                        </p>
                                        <a href="{{ route('movies.show',$movie->id) }}" class="btn btn-outline-primary btn-block">
                                            <i class="fas fa-search-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                    <hr>
                    <br>
                    <div class="alert alert-secondary col-12"> No hay peliculas en la categoria seleccionada</div>
                    <br>

            @endforelse

        </div>

    @endforeach
</div>
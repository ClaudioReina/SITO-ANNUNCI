<x-layout>

<div class="container-fluid">
    <div class="row py-5">

        <div class="col-12 text-center py-5">
            <h1>{{$category->name}}</h1>
        </div>
        @if(count($articles) > 0)
        @foreach ($articles as $article)
            <div class="col-12 col-md-3 mx-auto">
                <div class="card shadow">
                    @if (!$article->cover)
                        <img src="/media/ImmagineSalvaposto.jpg" class="img-fluid card-img-top" alt="immagine non trovata">
                    @else
                        <img src="{{Storage::url($article->cover)}}" class="img-fluid card-img-top" alt="{{$article->name}}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>
                        <p class="card-text">{{$article->price}} €</p>
                        <p class="card-text text-muted">{{Str::limit($article->description,50)}}</p>
                        <p>Creato da <a class="text-success" href="{{route('profile', ['user' => $article->user->id])}}">{{$article->user->name ?? 'Utente sconosciuto'}}</a>, il {{$article->created_at->format('d/m/Y')}}</p>
                        <a href="{{route('article.show', compact('article'))}}" class="btn btn-secondary">Dettagli</a>
                    </div>
                </div>
            </div>
        @endforeach
        @else
        <div class="col-12 text-center mt-5">
            <p>Non ci sono articoli!</p>
        </div>
        @endif
    </div>
</div>

<div class="container-fluid spaced">
</div>

</x-layout>
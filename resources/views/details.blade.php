{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des articles') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Détails de l'article -->
                    <h1>{{ $article->nom }}</h1>
                    <p>{{ $article->description }}</p>
                    <p><strong>Prix:</strong> {{ number_format($article->prix, 2) }} €</p>
                    <p><strong>Date de création:</strong> {{ $article->created_at }}</p>
                    <!-- Formulaire pour poster un commentaire -->
                    <div class="comment-form mt-4">
                        <h2>Ajouter un commentaire</h2>
                        <form action="" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="comment_text">Commentaire:</label>
                                <textarea name="comment_text" id="comment_text" class="form-control" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Envoyer</button>
                        </form>
                    </div>

                    <!-- Liste des commentaires -->
                    <div class="comments-list mt-5">
                        <h2>Commentaires ({{ $comments->count() }})</h2>
                        @if ($comments->isEmpty())
                            <p>Aucun commentaire pour le moment. Soyez le premier à commenter!</p>
                        @else
                            @foreach ($comments as $comment)
                                <div class="comment mb-3">
                                    <p><strong>{{ $comment->user->name }}</strong> <span class="text-muted">{{ $comment->created_at->diffForHumans() }}</span></p>
                                    <p>{{ $comment->texte }}</p>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

 --}}
<x-app-layout>
     <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détails des articles') }}
        </h2>
    </x-slot>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900">
                <div class="py-2">
                    <div class="bg-white p-4 rounded-lg shadow-md">
                        <h1 class="text-lg font-bold">{{ $article->nom }}</h1>
                        <p class="text-gray-700">{{ $article->description }}</p>
                        <p><strong>Prix:</strong> {{ number_format($article->prix, 2) }} €</p>
                    </div>
                </div>
                <div class="py-3">
                    <h2 class="text-lg font-bold mb-4">Commentaires</h2>
                </div>
                <div class="flex flex-col space-y-4">
                    <div class="py-2">
                        <form action="/addComment" method="POST" class="bg-white p-4 rounded-lg shadow-md">
                            @csrf
                            <h3 class="text-lg font-bold mb-2">Ajouter un commentaire</h3>
                            <input type="number" name="idArticle" value={{ $article->id }} hidden>
                            <input type="number" name="idUser" value={{ Auth::user()->id }} hidden>
                            <div class="mb-4">
                                <textarea name="texte"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="comment" rows="3" placeholder="Entrez votre commentaire"></textarea>
                            </div>
                            <button style="background-color: rgb(20, 146, 230);"
                                class="bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit">
                                Submit
                            </button>
                        </form>
                    </div>
                    @if (!$comments->isEmpty())
                        @foreach ($comments as $comment)
                            <div class="py-2">
                                <div class="bg-white p-4 rounded-lg shadow-md">
                                    <h3 class="text-lg font-bold">{{ $comment->user->name}}</h3>
                                    <p class="text-gray-700 text-sm mb-2">Publié le {{ $comment->created_at}}</p>
                                    <p class="text-gray-700">{{ $comment->texte }} </p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
</x-app-layout>

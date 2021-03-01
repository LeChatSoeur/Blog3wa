            <div id="commentsPoster">


                @foreach($commentsParent as $commentParent)
                    <div class="divCommentParent" id="{{$commentParent->id}}">
                        <p>De: {{$commentParent->nameUser}}</p>
                        <p>Le: {{$commentParent->created_at->format('d/m/Y')}}
                           à: {{$commentParent->created_at->format('h:m:s')}}
                        </p>
                        <p>{{$commentParent->content}}</p>
                            <a href="#formComment" data-id="{{$commentParent->id}}"
                               class="buttonCommentChild">Répondre</a>


                    @foreach($commentsChild as $commentChild)
                        @if($commentChild->parent_id === $commentParent->id)
                            <div class="divCommentChild">
                                <p>De: {{$commentChild->nameUser}}</p>
                                <p>Le: {{$commentChild->created_at->format('d/m/Y')}}
                                    à: {{$commentChild->created_at->format('h:m:s')}}
                                </p>
                                <p>{{$commentChild->content}}</p>
                            </div>
                        @endif
                    @endforeach

                    </div>
                @endforeach

            </div>


            <form id="formComment" action="{{route('addAjaxComment')}}" method="POST"
                  data-id="{{$post[0]['id']}}">
                @csrf
                <input type="text" name="nameUser" id="nameUser" placeholder="Nom *">
                <input type="text" name="email" id="email" placeholder="Email *">
                <input type="hidden" name="parent_id" id="parent_id">
                <textarea id="content" name="content" placeholder="Commentaire *"></textarea>
                <div class="createButtons">
                    <button id="buttonComment" type="button">Envoyer</button>
                    <a id="buttonCancelComment" href="{{ route('front-posts') }}">Annuler</a>
                </div>
            </form>

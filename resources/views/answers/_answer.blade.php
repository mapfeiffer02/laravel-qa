<div class="media post">
    @include ('shared._vote', ["model" => $answer])
        <div class="media-body">
            {!! $answer->body_html !!}
            <div class="row">
                <div class="col-4">
                    <div class="ml-auto">
                        @can ('update', $answer)
                            <a href="{{ route('answers.edit', [$question, $answer])}}" class="btn- btn-sm btn-outline-info">Edit</a>
                        @endcan
                        @can ('delete', $answer)
                        <form method="post" class="form-delete" action="{{ route('answers.destroy', [$question->id, $answer->id])}}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')" >Delete</button>
                        </form>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="col-4"></div>
            <div class="col-4">
                @include ('shared._author', [
                    'model' => $answer,
                    'label' => 'answered'
                    ])
            </div>
        </div>
    </div>
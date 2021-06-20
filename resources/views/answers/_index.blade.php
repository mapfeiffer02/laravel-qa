@if ( $answersCount > 0)
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>{{ $answersCount." ".Str::plural('Answer', $answersCount) }}</h2>
                    </div>
                    <hr>
                    @include ('layouts._messages')
                    @forelse ($answers as $answer)
                        @include('answers._answer')
                    @empty
                        <div class="alert alert-warning">
                            <strong>Sorry</strong> there are no answers available.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endif

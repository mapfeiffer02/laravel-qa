@can ('accept', $model)
    <a title="Click to mark this answer as best answer(Click again to undo)"
        class="{{ $model->status }} mt-2"
        onclick="event.preventDefault(); document.getElementById('accept-answer-{{ $model->id }}').submit();">
        <i class="fas fa-check fa-2x"></i>
    </a>
    <form id="accept-answer-{{ $model->id }}" action={{ route('answers.accept', $model->id) }} method="post" style="display:none;">
        @csrf
    </form>
@else
    @if ($model->is_best_answer)
        <a title="The question owner accepted this answer as best answer."
            class="{{ $model->status }} mt-2">
            <i class="fas fa-check fa-2x"></i>
        </a>
    @endif
@endcan

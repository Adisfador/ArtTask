<p class="h4">Комментарии:</p>
<div class="comments">
    @foreach ($comments as $comment)
        <figure>
            <blockquote class="blockquote">
                <p>{{ $comment->text }}</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                {{ $comment->theme }} <cite title="Source Title">{{ $comment->created_at }}</cite>
            </figcaption>
        </figure>
    @endforeach
</div>

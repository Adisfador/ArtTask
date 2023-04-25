<p class="h4">Оставить комментарий</p>

<form id="form" style="margin-bottom:20px;">
    <div class="mb-3">
        <input  id="theme" name="theme" type="text" placeholder="Ваше имя"
            class="form-control">
        @error('theme')
            <p class="alert alert-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-floating">
        <textarea  id="text" name="text" class="form-control"
            placeholder="Leave a comment here"></textarea>
        <label for="floatingTextarea">Comments</label>
    </div>
    @error('text')
        <p class="alert alert-danger">{{ $message }}</p>
    @enderror
    <input id="id" style="display:none;" name="article_id" value="{{ $post->id }}" type="text"
        class="form-control">
    <input id="slug" style="display:none;" name="slug" value="{{ $post->slug }}" type="text"
        class="form-control">
    <button id="btn" style="margin-top:20px;" type="submit" class="btn btn-primary">Отправить</button>
</form>


<form action="{{route('comment.store')}}" method="POST">
    {!! csrf_field() !!}
    <div class="text-center" >
        <h3>poster un commentaire</h3>
    </div>
    <div>
        <label for="commentaire"><strong>Commentaire</strong></label>
        <input type="text" class="classe" id="comment" name="commentaire" value="{{old('commentaire')}}">
    </div>
</form>
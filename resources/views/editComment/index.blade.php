@extends('layouts.design')

@section('editComment')
<div class="EditComment" id="replyModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark">
        <div class="modal-body rounded-4">
            <h3 class="text-secondary-emphasis" id="modalReplyToTxt"></h3>
            <form action="/thread/comments/{{$comments->threadId}}" method="post">
                {{ csrf_field() }}
                <div class="form-floating">
                    <input type="hidden" name="threadId" value="{{$comments->id}}">
                    <input type="hidden" name="replyToId" id="modalReplyToId">
                    <input type="hidden" id="modalReplyTo" name="replyTo">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="comment" maxlength="255">{{$comments->comment}}</textarea>
                    <label for="floatingTextarea2">Your Comment</label>
                  </div>
                  <button type="submit" class="btn btn-success mt-3">Submit</button>
                  <button type="reset" class="btn btn-danger mt-3" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            </form>
        </div>
    </div>
    </div>
</div>


@endsection
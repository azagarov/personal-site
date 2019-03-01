<EditPostLang v-cloak inline-template
  _content="{{ json_encode($post->{$lang['locale']}) }}"
>
<div class="tab-pane{{ $lang['active'] }}" id="tab_lang_{{ $lang['locale'] }}">
    @php
        $content = $post->content($lang['locale']);
    @endphp
    <form role="form" target="_self" method="post" action="/admin/blog/save-post/{{ $post->id }}/{{ $lang['locale'] }}">
        {{ csrf_field() }}

        <input type="hidden" name="postId" value="{{$post->id}}" />
        <input type="hidden" name="locale" value="{{ $lang['locale'] }}" />
        <div class="box-body">
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" placeholder="Title ..." value="{{ $content->title }}" name="title" />
            </div>
            <div class="form-group">
                <label>Annotation</label>
                <textarea class="form-control" rows="3" placeholder="Annotation ..." name="annotation">{{ $content->annotation }}</textarea>
                {{--<span class="help-block">Comma separated : history, living, diving, ...</span>--}}
            </div>
            <div class="form-group">
                <label>Body</label>
                <textarea class="form-control" rows="3" id="html_content_{{ $lang['locale'] }}" placeholder="Body ..." name="html_content">{{ $content->html_content }}</textarea>
                {{--<span class="help-block">Comma separated : history, living, diving, ...</span>--}}
            </div>
            <div class="form-group">
                <label>Place Name</label>
                <input type="text" class="form-control" placeholder="Place Name ..." value="{{ $content->place_name }}" name="place_name" />
            </div>
            <div class="form-group">
                <label>Place Description</label>
                <textarea class="form-control" rows="3" placeholder="Place Description ..." name="place_description">{{ $content->place_description }}</textarea>
                {{--<span class="help-block">Comma separated : history, living, diving, ...</span>--}}
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Save {{ $lang['name'] }} Content</button>
        </div>
    </form>
</div>
</EditPostLang>
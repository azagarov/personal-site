<EditPostLang v-cloak inline-template ref="lang_{{$lang['locale']}}"
  :_id="postId"
  locale="{{$lang['locale']}}"
  lname="{{$lang['name']}}"
>
<div class="tab-pane{{ $lang['active'] }} overlay-wrapper" id="tab_lang_{{ $lang['locale'] }}" style="position:relative;">
    <form role="form" name="form_lang_{{$lang['locale']}}" target="_self" method="post" action="/admin/blog/save-post/{{ $_id }}/{{ $lang['locale'] }}">
        {{ csrf_field() }}

        <input type="hidden" name="postId" v-model="_id" />
        <input type="hidden" name="locale" v-model="locale" />
        <div class="box-body">
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" placeholder="Title ..." v-model="content.title" name="title" />
            </div>
            <div class="form-group">
                <label>Annotation</label>
                <textarea class="form-control" rows="3" placeholder="Annotation ..." name="annotation" v-model="content.annotation"></textarea>
                {{--<span class="help-block">Comma separated : history, living, diving, ...</span>--}}
            </div>
            <div class="form-group">
                <label>Body</label>
                <textarea class="form-control" rows="3" id="html_content_{{ $lang['locale'] }}" placeholder="Body ..." name="html_content" v-model="content.html_content"></textarea>
                {{--<span class="help-block">Comma separated : history, living, diving, ...</span>--}}
            </div>
            <div class="form-group">
                <label>Place Name</label>
                <input type="text" class="form-control" placeholder="Place Name ..." v-model="content.place_name" name="place_name" />
            </div>
            <div class="form-group">
                <label>Place Description</label>
                <textarea class="form-control" rows="3" placeholder="Place Description ..." name="place_description" v-model="content.place_description"></textarea>
                {{--<span class="help-block">Comma separated : history, living, diving, ...</span>--}}
            </div>
        </div>
        <div class="box-footer">
            <button type="button" class="btn btn-save" :class="hasSaved ? 'btn-success' : 'btn-primary'" @click="save" :disabled="isSaving || !changed">
                <i class="fa fa-spinner fa-spin" v-if="isSaving"></i>
                <i class="fa fa-check" v-if="hasSaved"></i>
                <span v-if="hasSaved">Saved OK</span>
                <span v-else>Save {{ $lang['name'] }} Content</span>
            </button>
        </div>
    </form>
    <div class="overlay" v-if="!timersAreActive">
        <i class="fa fa-refresh fa-spin"></i>
    </div>
</div>
</EditPostLang>
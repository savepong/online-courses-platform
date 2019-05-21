@section('style')
    <!-- Bootstrap Datepicker -->
    <link rel="stylesheet" href="{{ asset('learnplus/assets/css/bootstrap-datepicker.css') }}">

    <!-- Nestable -->
    <link rel="stylesheet" href="{{ asset('learnplus/assets/css/nestable.css') }}">

    <!-- TagEditor -->
    <link rel="stylesheet" href="{{ asset('plugins/tag-editor/jquery.tag-editor.css') }}">

    <!-- Jasny -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">

    <!-- Summernote WYSIWYG -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">

    <style>
        .tab-active{
            background-color: #f9f9f9!important;
            border-color: #efefef #efefef #f9f9f9!important;
        }
    </style>
@endsection

@section('script')
    <!-- Vendor JS -->
    <script src="{{ asset('learnplus/assets/vendor/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('learnplus/assets/vendor/jquery.nestable.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
    <script src="{{ asset('plugins/tag-editor/jquery.caret.min.js') }}"></script>
    <script src="{{ asset('plugins/tag-editor/jquery.tag-editor.min.js') }}"></script>

 
    <!-- Summernote WYSIWYG -->
    <script src="{{ asset('learnplus/assets/vendor/summernote.min.js') }}"></script>
 
    <!-- Init -->
    <script>
        var mediaUploadUrl = "{{ route('media.upload') }}"
    </script>
    <script src="{{ asset('learnplus/assets/js/summernote.js') }}"></script>
    <script src="{{ asset('learnplus/assets/js/date-time.js') }}"></script>
    <script src="{{ asset('learnplus/assets/js/nestable.js') }}"></script>

    <!-- Vimeo -->
    <script src="https://player.vimeo.com/api/player.js"></script>

    <script type="text/javascript">
        $('#title').on('blur', function(){
            var theTitle = this.value.toLowerCase().trim(),
                slugInput = $('#slug'),
                theSlug = theTitle.replace(/&/g, '-and-')
                                    .replace(/[^a-z0-9ก-๙-]+/g, '-')
                                    .replace(/\-\-+/g, '-')
                                    .replace(/^-+|-+$/g, '');
                
                slugInput.val(theSlug);
        });


        
        /** Tags **/
        var options = {placeholder: 'Ex. Tag1,Tag2,..'};
        @if($post->exists)
            options = {
                initialTags: {!! $post->tags_list !!},
            };
        @endif
        $('textarea[name=post_tags]').tagEditor(options);


        /** Summernote **/
        $('#summernote').summernote({
            height: ($(window).height() - 300),
            callbacks: {
                onImageUpload: function(image) {
                    uploadImage(image[0]);
                }
            }
        });

    </script>
@endsection


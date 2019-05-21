@section('style')
    <!-- Bootstrap Datepicker -->
    <link rel="stylesheet" href="{{ asset('learnplus/assets/css/bootstrap-datepicker.css') }}">
    <!-- Summernote WYSIWYG -->
    <link rel="stylesheet" href="{{ asset('learnplus/assets/css/summernote.css') }}">
    <!-- Nestable -->
    <link rel="stylesheet" href="{{ asset('learnplus/assets/css/nestable.css') }}">
    <!-- TagEditor -->
    <link rel="stylesheet" href="{{ asset('plugins/tag-editor/jquery.tag-editor.css') }}">
    <!-- Jasny -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
    
    <!-- Include external CSS. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
 
    <!-- Include Editor style. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.3/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.3/css/froala_style.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('script')
    <!-- Vendor JS -->
    <script src="{{ asset('learnplus/assets/vendor/summernote.min.js') }}"></script>
    <script src="{{ asset('learnplus/assets/vendor/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('learnplus/assets/vendor/jquery.nestable.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
    <script src="{{ asset('plugins/tag-editor/jquery.caret.min.js') }}"></script>
    <script src="{{ asset('plugins/tag-editor/jquery.tag-editor.min.js') }}"></script>

    <!-- Include external JS libs. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
 
    <!-- Include Editor JS files. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.3/js/froala_editor.pkgd.min.js"></script>
 
    <!-- Initialize the editor. -->
    <script> $(function() { $('textarea.froala-editor').froalaEditor() }); </script>
    
    <!-- Init -->
    <script src="{{ asset('learnplus/assets/js/summernote.js') }}"></script>
    <script src="{{ asset('learnplus/assets/js/date-time.js') }}"></script>
    <script src="{{ asset('learnplus/assets/js/nestable.js') }}"></script>

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
    
        $('#datepicker1').datepicker({
            format: 'yyyy-mm-dd 00:00:00'
        });
    </script>

@endsection


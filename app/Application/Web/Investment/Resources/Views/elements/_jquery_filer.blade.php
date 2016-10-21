<link href="{!! asset('bower_components/jquery.filer/css/jquery.filer.css') !!}" type="text/css" rel="stylesheet" />
<link href="{!! asset('bower_components/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css')!!}" type="text/css" rel="stylesheet" />


<input type="file" name="file" id="filer_input">


@section('scripts')
    @parent
        <script src="{!! asset('bower_components/jquery.filer/js/jquery.filer.min.js') !!}"></script>
        <script>
            $(document).ready(function()
            {
                $form = $('#jquery-filer');

                $('#filer_input').filer({
                    maxSize: 1,
                    extensions: ['pdf'],
                    changeInput: true,
                    showThumbs: true,

                    progressBar: '<div class="bar"></div>',
                    itemAppendToEnd: false,
                    removeConfirmation: true,
                    _selectors: {
                        list: '.jFiler-items-list',
                        item: '.jFiler-item',
                        progressBar: '.bar',
                        remove: '.jFiler-item-trash-action'
                    },

                    uploadFile: {
                        url: $form.attr('action'),
                        data: null,
                        type: 'POST',
                        enctype: 'multipart/form-data',
                        beforeSend: function(){},

                        success: function(data, el){
                            var parent = el.find(".jFiler-jProgressBar").parent();
                            el.find(".jFiler-jProgressBar").fadeOut("slow", function(){
                                $("<div class=\"jFiler-item-others text-success\"><i class=\"icon-jfi-check-circle\"></i> Success</div>").hide().appendTo(parent).fadeIn("slow");
                            });
                        },
                        error: function(el){

                            var parent = el.find(".jFiler-jProgressBar").parent();
                            el.find(".jFiler-jProgressBar").fadeOut("slow", function(){
                                $("<div class=\"jFiler-item-others text-error\"><i class=\"icon-jfi-minus-circle\"></i>Error</div>").hide().appendTo(parent).fadeIn("slow");
                            });
                        },
                        statusCode: null,
                        onProgress: null,
                        onComplete: null
                    }
                });

            });
        </script>

@stop
@extends('investment::layouts.app')

<link href="{!! asset('bower_components/jquery.filer/css/jquery.filer.css') !!}" type="text/css" rel="stylesheet" />
<link href="{!! asset('bower_components/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css')!!}" type="text/css" rel="stylesheet" />

<!-- Main Content -->
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">InvesT: Add Logo </div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                       {!! Form::open(['route' => ['investment.company.logo.upload',$id], 'class' => 'form-horizontal', 'role' => 'form','id'=> 'jquery-filer', 'files' =>true ] ) !!}

                            <input type="file" name="file" id="filer_input">

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script src="{!! asset('bower_components/jquery.filer/js/jquery.filer.min.js') !!}"></script>
    <script>
        $(document).ready(function()
        {

            var lastUrl = document.referrer;

            $form = $('#jquery-filer');

            $('#filer_input').filer({
                maxSize: 1,
                extensions: ['png'],
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
                            $("<div class=\"jFiler-item-others text-success\"><i class=\"icon-jfi-check-circle\"></i> Success (seconds...)</div>").hide().appendTo(parent).fadeIn("slow");
                        });

                        setTimeout(window.location.href =lastUrl, '1000')
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
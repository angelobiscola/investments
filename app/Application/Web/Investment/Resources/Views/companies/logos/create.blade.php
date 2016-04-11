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
                       @if(is_null($logo))
                       {!! Form::open(['route' => ['investment.company.logo.upload',$id], 'class' => 'form-horizontal', 'role' => 'form','id'=> 'jquery-filer', 'files' =>true ] ) !!}

                            <input type="file" name="file" id="filer_input">

                        {!! Form::close() !!}

                        @else
                        <div class="jFiler-items jFiler-row">
                            <ul class="jFiler-items-list jFiler-items-grid">
                                <li class="jFiler-item" data-jfiler-index="1">
                                    <div class="jFiler-item-container">
                                        <div class="jFiler-item-inner">
                                            <div class="jFiler-item-thumb">
                                                <div class="jFiler-item-status"></div>
                                                    <div class="jFiler-item-info">
                                                     <span class="jFiler-item-title"><b title="{!! $logo->file_name !!}">{!! $logo->file_name !!} </b></span>
                                                    </div>
                                                    <div class="jFiler-item-thumb-image">
                                                        <img src="{!! asset($logo->src.'/'.$logo->file_name) !!}" draggable="false">
                                                    </div>
                                            </div>
                                            <div class="jFiler-item-assets jFiler-row">
                                                <ul class="list-inline pull-left">
                                                    <li>
                                                        <a href="{!! route('investment.company.logo.download', $logo) !!}" class="icon-jfi-file-image jfi-file-ext-png"></a>
                                                    </li>
                                                </ul>
                                                <ul class="list-inline pull-right">
                                                    <li>
                                                        <a href="{!! route('investment.company.logo.delete', $logo) !!}" data-method="delete" class="icon-jfi-trash jFiler-item-trash-action"></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        @endif


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
                changeInput: '<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-cloud-up-o"></i></div><div class="jFiler-input-text"><h3>Drag&Drop files here</h3> <span style="display:inline-block; margin: 15px 0">or</span></div><a class="jFiler-input-choose-btn blue">Browse Files</a></div></div>',
                maxSize: 1,
                extensions: ['png'],
                disableImageResize: false,
                imageMaxWidth: 548,
                imageMaxHeight: 800,

                showThumbs: true,
                theme: "dragdropbox",

                progressBar: '<div class="bar"></div>',
                itemAppendToEnd: false,
                removeConfirmation: true,
                _selectors: {
                    list: '.jFiler-items-list',
                    item: '.jFiler-item',
                    progressBar: '.bar',
                    remove: '.jFiler-item-trash-action'
                },

                dragDrop: {
                    dragEnter: null,
                    dragLeave: null,
                    drop: null,
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

                        setTimeout(location.reload(), '1000')
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
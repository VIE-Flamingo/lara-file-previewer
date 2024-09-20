<?php
$page_title = $filename;
?>
@extends('lara-file-previewer::layouts.blank_app_no_logo')

@section('content')
    <!--PDF-->
    <link rel="stylesheet" href="{{ asset('plugins/hippo/core/assets/vendor/lara-file-previewer/officetohtml/pdf/pdf.viewer.css') }}">
    <script src="{{ asset('plugins/hippo/core/assets/vendor/lara-file-previewer/officetohtml/pdf/pdf.js') }}"></script>
    <!--Docs-->
    <script src="{{ asset('plugins/hippo/core/assets/vendor/lara-file-previewer/officetohtml/docx/jszip-utils.js') }}"></script>
    <script src="{{ asset('plugins/hippo/core/assets/vendor/lara-file-previewer/officetohtml/docx/mammoth.browser.min.js') }}"></script>
    <!--PPTX-->
    <link rel="stylesheet" href="{{ asset('plugins/hippo/core/assets/vendor/lara-file-previewer/officetohtml/PPTXjs/css/pptxjs.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/hippo/core/assets/vendor/lara-file-previewer/officetohtml/PPTXjs/css/nv.d3.min.css') }}">

    <script type="text/javascript" src="{{ asset('plugins/hippo/core/assets/vendor/lara-file-previewer/officetohtml/PPTXjs/js/filereader.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('plugins/hippo/core/assets/vendor/lara-file-previewer/officetohtml/PPTXjs/js/d3.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('plugins/hippo/core/assets/vendor/lara-file-previewer/officetohtml/PPTXjs/js/nv.d3.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('plugins/hippo/core/assets/vendor/lara-file-previewer/officetohtml/PPTXjs/js/pptxjs.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('plugins/hippo/core/assets/vendor/lara-file-previewer/officetohtml/PPTXjs/js/divs2slides.js') }}">
    </script>

    <!--All Spreadsheet -->
    <link rel="stylesheet" href="{{ asset('plugins/hippo/core/assets/vendor/lara-file-previewer/officetohtml/SheetJS/handsontable.full.min.css') }}">
    <script type="text/javascript"
        src="{{ asset('plugins/hippo/core/assets/vendor/lara-file-previewer/officetohtml/SheetJS/handsontable.full.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/hippo/core/assets/vendor/lara-file-previewer/officetohtml/SheetJS/xlsx.full.min.js') }}">
    </script>
    <!--Image viewer-->
    <link rel="stylesheet"
        href="{{ asset('plugins/hippo/core/assets/vendor/lara-file-previewer/officetohtml/verySimpleImageViewer/css/jquery.verySimpleImageViewer.css') }}">
    <script type="text/javascript"
        src="{{ asset('plugins/hippo/core/assets/vendor/lara-file-previewer/officetohtml/verySimpleImageViewer/js/jquery.verySimpleImageViewer.js') }}">
    </script>
    <!--officeToHtml-->
    <script src="{{ asset('plugins/hippo/core/assets/vendor/lara-file-previewer/officetohtml/officeToHtml/officeToHtml.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('plugins/hippo/core/assets/vendor/lara-file-previewer/officetohtml/officeToHtml/officeToHtml.css') }}">
    
    <style>
        .jqvsiv_main_image_content img {
            width: 100%;
            height: auto;
        }
    </style>

    @include('lara-file-previewer::docstyledef')
    <div class="row">
        <div class="col-md-12">
            <div class="card file-detail-card m-0">
                <div class="card-body p-1">
                    <div class="row">
                        <div class="col-sm-12">
                            @include('lara-file-previewer::previewFileDetails')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div id="resolte-contaniner" class="preview_container"></div>
        </div>
    </div>
    <script>
        $(function() {
            $("#resolte-contaniner").officeToHtml({
                url: '{!! $file_url !!}',
                docxSetting: {
                    includeEmbeddedStyleMap: true,
                    includeDefaultStyleMap: true,
                    convertImage: mammoth.images.imgElement(function(image) {
                        return image.read("base64").then(function(imageBuffer) {
                            return {
                                src: "data:" + image.contentType + ";base64," + imageBuffer
                            };
                        });
                    }),
                    ignoreEmptyParagraphs: false,
                },

                // pdfSetting: {
                //     // setting for pdf
                // },
                // docxSetting: {
                //     // setting for docx
                // },
                pptxSetting: {
                    slidesScale: "50%", //Change Slides scale by percent
                    slideMode: true,
                    /** true,false*/
                    slideType: "revealjs",
                    /*'divs2slidesjs' (default) , 'revealjs'(https://revealjs.com) */
                    revealjsPath: "{{ asset('plugins/hippo/core/assets/vendor/lara-file-previewer/revealjs/') }}",
                    /*path to js file of revealjs. default:  './revealjs/reveal.js'*/
                    keyBoardShortCut: true,
                    /** true,false ,condition: slideMode: true*/
                    mediaProcess: true,
                    /** true,false: if true then process video and audio files */
                    jsZipV2: false,
                    slideModeConfig: {
                        first: 1,
                        nav: true,
                        /** true,false : show or not nav buttons*/
                        navTxtColor: "black",
                        /** color */
                        keyBoardShortCut: false,
                        /** true,false ,condition: */
                        showSlideNum: true,
                        /** true,false */
                        showTotalSlideNum: true,
                        /** true,false */
                        autoSlide: 1,
                        /** false or seconds , F8 to active ,keyBoardShortCut: true */
                        randomAutoSlide: false,
                        /** true,false ,autoSlide:true */
                        loop: true,
                        /** true,false */
                        background: false,
                        /** false or color*/
                        transition: "default",
                        /** transition type: "slid","fade","default","random" , to show transition efects :transitionTime > 0.5 */
                        transitionTime: 1 /** transition time between slides in seconds */
                    },
                    revealjsConfig: {} /*revealjs options. see https://revealjs.com */
                }
                // sheetSetting: {
                //     // setting for excel
                // },
                // imageSetting: {
                //     // setting for  images
                // }
            });


        });
    </script>
@endsection

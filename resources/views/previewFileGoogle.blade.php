<?php
$page_title = $filename;
?>

@extends('lara-file-previewer::layouts.blank_app_no_logo')

@section('content')
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
            <div id="resolte-contaniner" class="preview_container">
                <iframe id="google"
                    src="https://docs.google.com/a/{{ $_SERVER['SERVER_NAME'] }}/viewer?url={!! $file_url !!}&embedded=true"
                    width="100%" height="600" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
            </div>
        </div>
    </div>
    <script>
        function update_viewer() {
            var link = $('#input').val()
            if (link.length <= 1) {
                link = '{!! $file_url !!}';
            }
            $('#google').attr('src', "https://docs.google.com/a/{{ $_SERVER['SERVER_NAME '] }}/viewer?url=" + link +
                '&embedded=true');
        }
    </script>
@endsection

<?php
    $page_title = $filename;
?>
@extends('lara-file-previewer::layouts.blank_app_no_logo')

@section('content')

<style>
    .file-detail-card {
        width: 100%;
        bottom: 0px;
        left: 0px;
        z-index: 999;
        background: #ffffffed;
        /* position: fixed; */
    }

    .preview_container {
        /* border: solid 1px lightgray; */
        overflow: scroll;
        background: white;
        padding: 1em;
        height: 90vh
    }
</style>
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
            <img id="image" src="{!! $file_url !!}" alt="Picture" height="100%" style="display: none;">
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.11.1/viewer.min.js" integrity="sha512-UzpQxIWgLbHvbVd4+8fcRWqFLi1pQ6qO6yXm+Hiig76VhnhW/gvfvnacdPanleB2ak+VwiI5BUqrPovGDPsKWQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.11.1/viewer.min.css" integrity="sha512-XHhuZDcgyu28Fsd75blrhZKbqqWCXaUCOuy2McB4doeSDu34BgydakOK71TH/QEhr0nhiieBNhF8yWS8thOGUg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script>
    const viewer = new Viewer(document.getElementById('image'), {
        inline: true,
        backdrop: false,
        navbar: false
    });
</script>
@endsection
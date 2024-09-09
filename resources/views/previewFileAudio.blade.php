<?php
    $page_title = $filename;
?>
@extends('lara-file-previewer::layouts.blank_app_no_logo')

@section('content')
<script src="https://cdn.plyr.io/3.7.2/plyr.js"></script>
<link rel="stylesheet" href="https://cdn.plyr.io/3.7.2/plyr.css" />
<div class="row">
    <div class="col-md-12">
        <div class="card file-detail-card m-0">
            <div class="card-body p-1">
                @include('lara-file-previewer::previewFileDetails')
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div id="resolte-contaniner" class="preview_container">
            <audio
                controls
                class="w-100"
                style="margin-top: 10%"
                src="{!! $file_url !!}">
                Your browser does not support the
                <code>audio</code> element.
            </audio>
        </div>
    </div>
</div>
<script>
    const player = new Plyr('#player');
</script>
@endsection
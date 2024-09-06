<?php

namespace Khutachan\LaraFilePreviewer;

use Illuminate\Support\Facades\Storage;

class LaraFilePreviewer
{
    public function show(String $filename, String $filePath, String $file_url, $file_data = [])
    {
        if (!Storage::exists($filePath)) {
            abort(404, __("file_not_found_or_deleted"));
        }
        $type = Storage::mimeType($filePath);
        $metadata = [
            'size' => Storage::size($filePath)
        ];
        $icon_class = $this->getIconClass($type);
        $filesizenyteformat = $this->formatBytes($metadata['size']);
        $viewdata = compact('filename', 'file_url', 'type', 'file_data', 'metadata', 'icon_class', 'filesizenyteformat');
        
        switch (explode('/', $type)[0]) {
            case 'image':
                return view('lara-file-previewer::previewFileImage', $viewdata);
                break;
            case 'audio':
                return view('lara-file-previewer::previewFileAudio', $viewdata);
                break;
            case 'video':
                return view('lara-file-previewer::previewFileVideo', $viewdata);
                break;
            
            default:
                return view('lara-file-previewer::previewFileOffice', $viewdata);
                // return view('lara-file-previewer::previewFileGoogle', $viewdata);
                break;
        }
    }

    public function getIconClass($type)
    {
        switch (explode('/', $type)[0]) {
            case 'image':
                return 'fas fa-file-image';
                break;
            
            case 'video':
                return 'fas fa-file-video';
                break;
            
            case 'audio':
                return 'fas fa-file-audio';
                break;
            
            case 'application':
                switch (explode('/', $type)[1]) {
                    case 'pdf':
                        return 'fas fa-file-pdf';
                        break;
                    case 'vnd.openxmlformats-officedocument.presentationml.presentation':
                        return 'fas fa-file-powerpoint';
                        break;
                    
                    case 'vnd.openxmlformats-officedocument.wordprocessingml.document':
                        return 'fas fa-file-word';
                        break;
                    
                    case 'msword':
                        return 'fas fa-file-word';
                        break;
                    
                    case 'vnd.openxmlformats-officedocument.spreadsheetml.sheet':
                        return 'fas fa-file-excel';
                        break;

                    default:
                        return 'fas fa-file';
                        break;
                }
                break;
            
            default:
                return 'fas fa-file';
                break;
        }
    }

    function formatBytes($size, $precision = 2)
    {
        if ($size > 0) {
            $size = (int) $size;
            $base = log($size) / log(1024);
            $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');
            return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
        } else {
            return $size;
        }
    }
}
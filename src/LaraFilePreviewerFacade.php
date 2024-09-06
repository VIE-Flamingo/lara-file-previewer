<?php

namespace Khutachan\LaraFilePreviewer;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Khutachan\LaraFilePreviewer\LaraFilePreviewer
 */
class LaraFilePreviewerFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'lara-file-previewer';
    }
}

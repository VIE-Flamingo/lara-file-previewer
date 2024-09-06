# Lara File Previewer

An inspired version of Laravel File Viewer.

## Overview

Lara File Previewer is a package designed to provide a streamlined and efficient way to preview files within Laravel applications. This package is inspired by the [Laravel File Viewer](https://github.com/vish4395/lara-file-previewer) (Changelog version 1.0.0 - 201X-XX-XX) created by Vishal Sharma. It does the same things as Laravel File Viewer does with some self modifications of mine.

## Installation

You can install the package via composer:

```bash
composer require khutachan/lara-file-previewer
```

Publish assets

```bash
php artisan vendor:publish  --provider="Khutachan\LaraFilePreviewer\LaraFilePreviewerServiceProvider" --tag=assets
```

Publish views (optional)(for customize ui)

```bash
php artisan vendor:publish  --provider="Khutachan\LaraFilePreviewer\LaraFilePreviewerServiceProvider" --tag=views
```

## Usage

### Laravel Integration

Add alias to your Laravel configuration:

```php
'aliases' => Facade::defaultAliases()->merge([
    'LaraFilePreviewer' => Khutachan\LaraFilePreviewer\LaraFilePreviewerFacade::class,
])->toArray(),
```

### WinterCMS Integration

Register alias to your boot() method of Plugin.php configuration:

```php
public function boot(){
    $this->app->register(\Khutachan\LaraFilePreviewer\LaraFilePreviewerServiceProvider::class);
}
```

### Example

```php
use LaraFilePreviewer;
/*
 * ...
 */
public function file_preview($filename){
        $filepath = 'public/'.$filename;
        $file_url = asset('storage/'.$filename);
        $file_data = [
            [
                'label' => __('Label'),
                'value' => "Value"
            ]
        ];
        return LaraFilePreviewer::show($filename,$filepath,$file_url,$file_data);
      }
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Inspiration

This package builds upon the ideas and concepts introduced in the Laravel File Viewer. The goal is to enhance and extend the functionality of file previewing in Laravel, offering a refined experience for developers.

## Acknowledgments

We would like to acknowledge the original creator, Vishal Sharma, for their work on the Laravel File Viewer. This project serves as a tribute and a continuation of their innovative ideas.

## License

This package is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.

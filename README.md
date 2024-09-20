# Lara File Previewer

An inspired version of Laravel File Viewer.

## Overview

Lara File Previewer is a Laravel package designed to offer a seamless and efficient solution for file previews within your applications. This package builds upon the concepts of the [Laravel File Viewer](https://github.com/vish4395/lara-file-previewer) (Packagist version 1.0.2) developed by Vishal Sharma, incorporating several custom modifications to enhance its functionality.

Lara File Previewer provides the same core features as Laravel File Viewer but with additional improvements and adaptations tailored to better fit your needs. Whether you need to preview documents, images, or other file types, this package streamlines the process, making it easier to integrate and use within your Laravel projects.

## Requirements

To use Lara File Previewer, your application must meet the following requirements:

-   PHP: ^7.4|^8.0
-   Laravel Framework: ^9.0|^10.0

## Installation

## Installation

To install the package, you need to update your `composer.json` file to include the repository and then require the package.

1. **Add the repository to your `composer.json` file**:

    Open your `composer.json` file and add the following to the `repositories` section:

```json
    "repositories": {
        "khutachan/lara-file-previewer": {
            "type": "git",
            "url": "https://github.com/khutachan/lara-file-previewer"
        }
    }
```

    If the `repositories` section does not exist, you can add it.

2. **Require the package**:

    Add the package to the `require` section in your `composer.json`:

```json
    "require": {
        "khutachan/lara-file-previewer": "dev-main"
    }
```

3. **Run Composer Update**:

    After adding the repository and require entries, run the following command to install the package:

```bash
    composer update khutachan/lara-file-previewer
```

This will install the package from the specified repository and make it available for use in your Laravel application.

4. **Publish the package assets**:

```bash
    php artisan vendor:publish --provider="Khutachan\LaraFilePreviewer\LaraFilePreviewerServiceProvider" --tag=assets
```

5. (Optional) **Publish the package views (for UI customization):**

    This step is optional and allows you to customize the UI of the file previewer by modifying the package's views.

    **Note:** This has only been tested on Laravel. The compatibility with other frameworks has not been verified.

```bash
    php artisan vendor:publish --provider="Khutachan\LaraFilePreviewer\LaraFilePreviewerServiceProvider" --tag=views
```

## Usage

### For Performance

To ensure optimal performance, it is recommended to open each file preview in a new blank tab. This approach helps to avoid potential conflicts with existing scripts and CSS styles in the user's project, ensuring that the preview operates smoothly and without interference.

### File Type Limitation

Currently, the package supports only one type of file per view. Opening multiple files of the same type within a single view may cause conflicts, such as duplicate element IDs when scripts are executed. To prevent such issues, it is advisable to use separate views or tabs for different files of the same type.

### Laravel Integration

Add the alias to your Laravel configuration:

> **In case you’re unsure where to add the alias:**
> To integrate the package with Laravel, you'll need to add the alias to your Laravel configuration. Specifically, you should include the alias within the `config/app.php` file under the `aliases` key.
> Here’s how you can do it:
>
> 1. **Open `config/app.php`**: This file contains your application's service providers and aliases configuration.
> 2. **Locate the `aliases` Array**: Find the `aliases` key in the `config/app.php` file.
> 3. **Add the Alias**: Include the following line within the `aliases` array to register the `LaraFilePreviewer` facade:
>
> By following these steps, you will ensure that the `LaraFilePreviewer` facade is properly registered and can be easily accessed throughout your Laravel application.

#### Here is an example

```php
    'aliases' => Facade::defaultAliases()->merge([
        'LaraFilePreviewer' => Khutachan\LaraFilePreviewer\LaraFilePreviewerFacade::class, //This line registers the LaraFilePreviewer facade. Ensure that you place it within the aliases array in config/app.php.
    ])->toArray(),
```

### OctoberCMS - WinterCMS Integration

Register the alias in your OctoberCMS - WinterCMS plugin:

#### Here is an example

```php
    namespace Author\Vendor;

    class Plugin extends PluginBase
    {
        public function boot(){
            //Add this line inside boot() method.
            $this->app->register(\Khutachan\LaraFilePreviewer\LaraFilePreviewerServiceProvider::class);
        }
    }
```

### Example

```php
    use LaraFilePreviewer;

    /**
     * Generate a file preview for the given file name.
     *
     * This method constructs a file path and URL based on the provided filename,
     * then creates an array of file data to be used for the preview. It calls
     * the `LaraFilePreviewer::show()` method, which handles generating and returning
     * the preview view as a string. This method's primary purpose is to format
     * the necessary file data and pass it to the `show()` method. The `show()` method
     * internally returns a view, which is rendered as HTML.
     *
     * Note: The `LaraFilePreviewer::show()` method is responsible for returning the
     * view, so this method itself does not directly handle view rendering.
     *
     * @param string $fileName The name of the file to preview. This should be the
     *                         relative path or name of the file to generate a preview for.
     * @return string The HTML content for the file preview, generated by the
     *                `LaraFilePreviewer::show()` method.
     */
    public function filePreview($fileName) : string
    {
        $filePath = 'public/'.$fileName;
        $fileUrl = asset('storage/'.$fileName);
        $fileData = [
            [
                'label' => __('Label'),
                'value' => "Value"
            ]
        ];
        return LaraFilePreviewer::show($fileName, $filePath, $fileUrl, $fileData);
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

## Demo:

A demo from Laravel File Viewer

https://user-images.githubusercontent.com/12929023/210215225-000507cf-d8f4-4e5b-b7ad-ad6a2276ac93.mp4

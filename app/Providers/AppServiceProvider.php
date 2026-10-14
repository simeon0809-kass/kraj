<?php

namespace App\Providers;

use App\Listeners\LogAuthenticationEvents;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Http;
use BezhanSalleh\LanguageSwitch\LanguageSwitch;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::subscribe(LogAuthenticationEvents::class);

        FileUpload::macro('saveToImageKit', function () {
            /** @var FileUpload $this */
            $component = $this;

            return $component->saveUploadedFileUsing(static function ($file) {
                $privateKey = config('filesystems.disks.imagekit.secret') ?? env('IMAGEKIT_PRIVATE_KEY');

                if (!$privateKey) {
                    throw new \Exception('ImageKit private key is missing.');
                }

                $response = Http::withoutVerifying()
                    ->withBasicAuth($privateKey, '')
                    ->attach(
                        'file',
                        file_get_contents($file->getRealPath()),
                        $file->hashName()
                    )
                    ->post('https://upload.imagekit.io/api/v1/files/upload', [
                        'fileName'          => $file->hashName(),
                        'folder'            => '/idrizovo',
                        'useUniqueFileName' => 'true'
                    ]);

                if ($response->failed()) {
                    throw new \Exception('ImageKit API Error: ' . $response->body());
                }

                return ltrim($response->json()['filePath'], '/');
            });
        });
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['en', 'mk']) // Register English and Macedonian
                ->labels([
                    'en' => 'English',
                    'mk' => 'Македонски',
                ]);
        });
    }
}

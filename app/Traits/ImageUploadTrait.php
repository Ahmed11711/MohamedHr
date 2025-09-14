<?php
namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

trait ImageUploadTrait
{
    public function uploadImage(UploadedFile $image, string $folder = 'uploads'): string
    {
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path($folder), $imageName);
        return "$folder/$imageName";
    }

    public function deleteImage(string $path): void
    {
        $fullPath = public_path($path);
        if (File::exists($fullPath)) {
            File::delete($fullPath);
        }
    }

    function sendEmail()
{
    $to="ahmedsamir11711@gmail.com"; $subject="title"; $message="test";
    $sendgridApiKey = env('SENDGRID_API_KEY');
    $fromEmail = env('SENDGRID_FROM_EMAIL');
    $fromName = env('SENDGRID_FROM_NAME');

    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $sendgridApiKey,
        'Content-Type' => 'application/json',
    ])->post('https://api.sendgrid.com/v3/mail/send', [
        'personalizations' => [
            [
                'to' => [
                    ['email' => $to]
                ],
                'subject' => $subject
            ]
        ],
        'from' => [
            'email' => $fromEmail,
            'name' => $fromName
        ],
        'content' => [
            [
                'type' => 'text/plain',
                'value' => $message
            ]
        ]
    ]);

    return $response->successful();
}
}

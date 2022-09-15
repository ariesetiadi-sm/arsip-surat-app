<?php

use Illuminate\Support\Str;

function str($content)
{
    return Str::of($content);
}

function uploadFile($file, $path)
{
    $fileName = '';

    // Buat nama file
    $fileName = time() . '_' . str($file->getClientOriginalName())->lower();

    // Move gambar ke public
    // $file->move('uploaded/files/', $fileName);
    $file->move($path, $fileName);

    return $fileName;
}

function uploadFiles($files)
{
    $fileNames = '';

    if (!is_null($files)) {
        if (count($files) > 0) {
            foreach ($files as $file) {
                // Buat nama file
                $fileName = time() . '_' . str($file->getClientOriginalName())->lower();
                $fileNames .= $fileName . '|';

                // Move gambar ke public
                $file->move('uploaded/files/', $fileName);
            }
        }
    }

    return $fileNames;
}

function isAdmin()
{
    return auth()->user()->jenis_pengguna == 'admin';
}

function isUser()
{
    return auth()->user()->jenis_pengguna == 'user';
}

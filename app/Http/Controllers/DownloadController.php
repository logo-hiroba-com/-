<?php

namespace App\Http\Controllers;

use App\User;
use App\Designer;
use App\Logo;
use App\logoImage;
use App\logoProperty;
use App\logoImprove;
use App\logoColor;
use App\logoFormat;
use App\logoType;

use ZipArchive;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

// use Illuminate\Contracts\Auth\Authenticatable;
// use Illuminate\Auth\Authenticatable as AuthenticableTrait;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Mail\EmailVerification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\PendingMail;

use Chumper\Zipper\Repositories\RepositoryInterface;
use Exception;
use Illuminate\Filesystem\Filesystem;

use Auth;
use Carbon\Carbon;

class DownloadController extends Controller
{

    //ファイルのダウンロード
    public function index()
    {
        //圧縮するファイル
        $filePath1 = Storage::path('public/6QkucPJraX7LmdVyqrHoS1h5PHCq8fcL5PELaa8d.png');
        $filePath2 = Storage::path('public/baKySAxkHyVhTnWmwtLvXFhlVwjDY4gtrMU8jYmn.png');

        //zipファイルの作成
        // $fileInfo = pathinfo($filePath1);
        // $fileName = $fileInfo['filename'];
        $zip = new ZipArchive();
        $fileName = "6Qkuca8d.zip";
        $filePath = Storage::path('file/'.$fileName);
        $result = $zip->open($filePath, ZipArchive::CREATE);
        
        $filename1 = "6QkucPJraX7LmdVyqrHoS1h5PHCq8fcL5PELaa8d.png";
        $filename2 = "baKySAxkHyVhTnWmwtLvXFhlVwjDY4gtrMU8jYmn.png";
        
        if($result){
            $zip->addFile($filePath1,$filename1);
            $zip->addFile($filePath2,$filename2);

            $zip->close();
        }
        
        // $fileName = 'profile.png';


        $mimeType = Storage::mimeType('file/'.$fileName);
        // $filePath = Storage::path('public/6QkucPJraX7LmdVyqrHoS1h5PHCq8fcL5PELaa8d.png');

        $headers = [
            'Content-Type' => $mimeType
        ];

        return response()->download($filePath,$fileName,$headers);
    }
}

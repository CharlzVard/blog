<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }



    public function uploadfile(Request $request)
    {
        $directory='storage/'.\Auth::id().'/';
        if (!is_dir($directory)) mkdir($directory);
        $directory='storage/'.\Auth::id().'/files/';
        if (!is_dir($directory)) mkdir($directory); 
        $extension=array("zip","mp3","7z","rar","doc","docx");
        $files = [];

        if (!is_dir($directory)) mkdir($directory);

        foreach($_FILES["file"]["name"] as $key=>$tmp_name){

            $filename = $_FILES["file"]["name"][$key];
            $filename_tmp = $_FILES['file']['tmp_name'][$key];

            $ext=pathinfo($filename,PATHINFO_EXTENSION);
            if (in_array($ext,$extension)){
                if (!file_exists($directory.$filename).".".$ext){
                    if (move_uploaded_file($filename_tmp,$directory.$filename).".".$ext){
                        array_push($files, [
                            'file-'.$key => [
                                'name' => $filename,
                                'url' => url($directory.$filename),
                                'id' => rand(100000, 999999)
                            ]
                        ]);
                    }
                }
            }
        }
        return response()->json($files);
    }


    public function files(Request $request)
    {
        function format_size($size){
            $metrics[0] = 'байт';
            $metrics[1] = 'KB';
            $metrics[2] = 'MB';
            $metrics[3] = 'GB';
            $metrics[4] = 'TB';
            $metric = 0;
            while(floor($size/1024) > 0){
                ++$metric;
                $size /= 1024;
            }
            $ret =  round($size,1)." ".(isset($metrics[$metric])?$metrics[$metric]:'??');
            return $ret;
        }

        $directory='storage/'.\Auth::id().'/';
        if (!is_dir($directory)) mkdir($directory);
        $directory='storage/'.\Auth::id().'/files/';
        if (!is_dir($directory)) mkdir($directory);      
        $files = [];
        $scanned_directory = array_diff(scandir($directory), array('..', '.'));

        foreach ($scanned_directory as $key => $file) {
            $info = pathinfo($file);
            $files[] = [
                'title' => pathinfo($file,PATHINFO_FILENAME),
                'name' => $file,
                'url' => $directory.$file,
                'size' => format_size(filesize($directory.$file)),
                'id' => rand(100000,999999)
            ];
        }

        return response()->json($files);
    }




    public function uploadphoto(Request $request)
    {
        
        function resizeImage($filename, $max_width, $max_height)
        {
            list($orig_width, $orig_height,,$mime) = getimagesize($filename);
            $wert = getimagesize($filename);

            $width = $orig_width;
            $height = $orig_height;

            if ($height > $max_height) {
                $width = ($max_height / $height) * $width;
                $height = $max_height;
            }

            if ($width > $max_width) {
                $height = ($max_width / $width) * $height;
                $width = $max_width;
            }
        //создаем картинку под размеры
            $image_p = imagecreatetruecolor($width, $height);

        //В зависимости от расширения картинки вызываем соответствующую функцию
            if ($wert['mime'] == 'image/png') {
        $src = imagecreatefrompng($filename); //создаём новое изображение из файла
        } else if ($wert['mime'] == 'image/jpeg') {
            $src = imagecreatefromjpeg($filename);
        } else if ($wert['mime'] == 'image/gif') {
            $src = imagecreatefromgif($filename);
        } else {
            return false;
        }

        //сохраняем прозрачность
        imageAlphaBlending($image_p, false);
        imageSaveAlpha($image_p, true);
        imagecopyresampled($image_p, $src, 0, 0, 0, 0,
            $width, $height, $orig_width, $orig_height);

        //return $image_p;

        $dir = pathinfo($filename,PATHINFO_DIRNAME);
        $name = pathinfo($filename,PATHINFO_FILENAME);
        $ext = pathinfo($filename,PATHINFO_EXTENSION );
        $new_fname = $dir."/".$name."t.".$ext;

        return imagepng($image_p, $new_fname);
        //imagepng($image_p, $filename);//Сохраняет JPEG/PNG/GIF изображение
        }

        $directory='storage/'.\Auth::id().'/';
        if (!is_dir($directory)) mkdir($directory);
        $directory='storage/'.\Auth::id().'/img/';
        if (!is_dir($directory)) mkdir($directory);
        $extension=array("jpeg","jpg","png","gif");
        $files = [];

        foreach($_FILES["file"]["name"] as $key=>$tmp_name){

            $filename = $_FILES["file"]["name"][$key];
            $filename_tmp = $_FILES['file']['tmp_name'][$key];

            $ext=pathinfo($filename,PATHINFO_EXTENSION);
            if (in_array($ext,$extension)){
                if (!file_exists($directory.md5($filename).".".$ext)){
                    if (move_uploaded_file($filename_tmp,$directory.md5($filename).".".$ext)){
                        resizeImage($directory.md5($filename).".".$ext,96,96);
                        $rand = rand(100000, 999999);
                        $files[$rand] = [
                            'url' => url($directory.md5($filename).".".$ext),
                            'id' => $rand
                        ];
                    }

                }
            }
        }

        return response()->json($files);
    }

    
    public function photos(Request $request)
    {
        $directory='storage/'.\Auth::id().'/';
        if (!is_dir($directory)) mkdir($directory);
        $directory='storage/'.\Auth::id().'/img/';
        if (!is_dir($directory)) mkdir($directory);
        $scanned_directory = array_diff(scandir($directory), array('..', '.'));
        $images = [];

        foreach ($scanned_directory as $key=>$img) {
                if (substr(pathinfo($img, PATHINFO_FILENAME),-1)!="t"){
                    array_push($images, [
                        "thumb"=> url($directory.pathinfo($img, PATHINFO_FILENAME)."t.".pathinfo($img, PATHINFO_EXTENSION)),
                        "url"=> url($directory.$img),
                        "id"=> rand(100000,999999),
                        "title"=> ""
                    ]);         
                }
        }

        echo stripslashes(json_encode($images));
        
    }

}
<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Http\Request;
use Storage;
use Str;

class DownloadResumeController extends Controller
{
   public function downloaded_resumes(){
      $downloads = Download::where('user_id', auth()->user()->id)->orderByDesc('created_at')->get();
        return view('pdf.downloads',['downloads'=>$downloads]);
   }
   public function view_resume($id)
   {
      $resume = Download::where('id', $id)
         ->where('user_id', auth()->id())
         ->firstOrFail();

      // 1. Get the raw binary content from R2
      // We parse the path from your full URL
      $path = parse_url($resume->file_path, PHP_URL_PATH);
      $fileContent = Storage::disk('s3')->get($path);

      // 2. Prepare a Clean Filename
      $cleanName = Str::slug($resume->file_name) . '.pdf';

      // 3. Return the response with proper HEADERS
      return response($fileContent)
         ->header('Content-Type', 'application/pdf')
         // 'inline' ensures it opens in the browser tab
         // 'filename' forces the tab to show your resume title instead of pdfshift...
         ->header('Content-Disposition', 'inline; filename="' . $cleanName . '"')
         ->header('Cache-Control', 'public, max-age=3600');
   }
}

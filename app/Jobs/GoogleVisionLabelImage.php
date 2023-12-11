<?php

namespace App\Jobs;

use App\Models\Image;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class GoogleVisionLabelImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $announcment_image_id;
    /**
     * Create a new job instance.
     */
    public function __construct($announcment_image_id)
    {
        $this->announcment_image_id=$announcment_image_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
       $i=Image::find($this->announcment_image_id);
       if(!$i){
        return;
       }
       $image=file_get_contents(storage_path('app/public/' . $i->path));
       putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));
       $ImageAnnotator=new ImageAnnotatorClient();
       $response= $ImageAnnotator->labelDetection($image);
       $labels=$response->getLabelAnnotations();
       if($labels){
        $result=[];
        foreach($labels as $label){
        $result[]=$label->getDescription();
       }
       $i->labels=$result;
       $i->save();
    }
    $ImageAnnotator->close();
}
}
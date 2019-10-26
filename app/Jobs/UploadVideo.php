<?php

namespace App\Jobs;

use App\Model\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UploadVideo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $post;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {

        //https://ffbinaries.com/downloads
        $this->post=$post;
  }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        set_time_limit(0);
        date_default_timezone_set('UTC');
        $post = $this->post;

        $username = $post->account->username;
        $password = $post->account->password;

        $captionText = $post->caption . " " . str_replace(',', ' #', $post->tags);

         $videoFilename =public_path(str_replace('http://localhost/instagram/public','',$post->media->file));

//////////////////////
        $ig = new \InstagramAPI\Instagram(true,true);
        try {
            $ig->login($username, $password);
        } catch (\Exception $e) {
            echo 'Something went wrong: '.$e->getMessage()."\n";

        }
        try {


            $video = new \InstagramAPI\Media\Video\InstagramVideo($videoFilename);
            $ig->timeline->uploadVideo($video->getFile(), ['caption' => $captionText]);

        } catch (\Exception $e) {
            echo 'Something went wrong: '.$e->getMessage()."\n";
        }

    }
}

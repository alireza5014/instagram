<?php

namespace App\Jobs;

use App\Model\Account;
use App\Model\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UploadPhoto implements ShouldQueue
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

        $photoFilename =public_path($this->post->medias[0]->file);

//////////////////////
        $ig = new \InstagramAPI\Instagram();
        try {
            $ig->login($username, $password);
        } catch (\Exception $e) {
            echo 'Something went wrong: '.$e->getMessage()."\n";

        }
        try {

            $photo = new \InstagramAPI\Media\Photo\InstagramPhoto($photoFilename);
            $ig->timeline->uploadPhoto($photo->getFile(), ['caption' => $captionText]);
        } catch (\Exception $e) {
            echo 'Something went wrong: '.$e->getMessage()."\n";
        }


    }
}

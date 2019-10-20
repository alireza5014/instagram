<?php

namespace App\Jobs;

use App\Model\Account;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UploadAlbum implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $account_id;
    protected $media;
    protected $caption;
    protected $tags;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($post)
    {
        $this->account_id=$post->account_id;
        $this->media=$post->media;
        $this->caption=$post->caption;
        $this->tags=$post->tags;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $account=  Account::where('id',$this->account_id)->first();


        set_time_limit(0);
        date_default_timezone_set('UTC');

        $username = $account->username;
        $password=$account->password;

        $captionText = $this->caption." ".str_replace(',','#',$this->tags);


//////////////////////
        $ig = new \InstagramAPI\Instagram();
        try {
            $ig->login($username, $password);
        } catch (\Exception $e) {
            echo 'Something went wrong: '.$e->getMessage()."\n";
            exit(0);
        }
////// NORMALIZE MEDIA //////
// All album files must have the same aspect ratio.
// We copy the app's behavior by using the first file
// as template for all subsequent ones.
        $mediaOptions = [
            'targetFeed' => \InstagramAPI\Constants::FEED_TIMELINE_ALBUM,
            // Uncomment to expand media instead of cropping it.
            //'operation' => \InstagramAPI\Media\InstagramMedia::EXPAND,
        ];
        foreach ($media as &$item) {
            /** @var \InstagramAPI\Media\InstagramMedia|null $validMedia */
            $validMedia = null;
            switch ($item['type']) {
                case 'photo':
                    $validMedia = new \InstagramAPI\Media\Photo\InstagramPhoto($item['file'], $mediaOptions);
                    break;
                case 'video':
                    $validMedia = new \InstagramAPI\Media\Video\InstagramVideo($item['file'], $mediaOptions);
                    break;
                default:
                    // Ignore unknown media type.
            }
            if ($validMedia === null) {
                continue;
            }
            try {
                $item['file'] = $validMedia->getFile();
                // We must prevent the InstagramMedia object from destructing too early,
                // because the media class auto-deletes the processed file during their
                // destructor's cleanup (so we wouldn't be able to upload those files).
                $item['__media'] = $validMedia; // Save object in an unused array key.
            } catch (\Exception $e) {
                continue;
            }
            if (!isset($mediaOptions['forceAspectRatio'])) {
                // Use the first media file's aspect ratio for all subsequent files.
                /** @var \InstagramAPI\Media\MediaDetails $mediaDetails */
                $mediaDetails = $validMedia instanceof \InstagramAPI\Media\Photo\InstagramPhoto
                    ? new \InstagramAPI\Media\Photo\PhotoDetails($item['file'])
                    : new \InstagramAPI\Media\Video\VideoDetails($item['file']);
                $mediaOptions['forceAspectRatio'] = $mediaDetails->getAspectRatio();
            }
        }
        unset($item);
/////////////////////////////
        try {
            $ig->timeline->uploadAlbum($media, ['caption' => $captionText]);
        } catch (\Exception $e) {
            echo 'Something went wrong: '.$e->getMessage()."\n";
        }

    }
}

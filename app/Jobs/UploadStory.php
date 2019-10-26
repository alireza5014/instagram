<?php

namespace App\Jobs;

use App\Model\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UploadStory implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $post;


    /**
     * /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Post $post, $type = 'photo')
    {
        $this->post = $post;

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

//////////////////////
        $ig = new \InstagramAPI\Instagram(true, true);
        try {
            $ig->login($username, $password);
        } catch (\Exception $e) {

            echo 'Something went wrong: ' . $e->getMessage() . "\n";

        }


        try {
            $location = $ig->location->search('40.7439862', '-73.998511')->getVenues()[0];
        } catch (\Exception $e) {
            echo 'Something went wrong: ' . $e->getMessage() . "\n";
        }
// Now create the metadata array:
        $metadata = [
            // (optional) Captions can always be used, like this:
            'caption' => '#test This is a great API!',
            // (optional) To add a hashtag, do this:
            'hashtags' => [
                // Note that you can add more than one hashtag in this array.
                [
                    'tag_name' => 'test', // Hashtag WITHOUT the '#'! NOTE: This hashtag MUST appear in the caption.
                    'x' => 0.5, // Range: 0.0 - 1.0. Note that x = 0.5 and y = 0.5 is center of screen.
                    'y' => 0.5, // Also note that X/Y is setting the position of the CENTER of the clickable area.
                    'width' => 0.24305555, // Clickable area size, as percentage of image size: 0.0 - 1.0
                    'height' => 0.07347973, // ...
                    'rotation' => 0.0,
                    'is_sticker' => false, // Don't change this value.
                    'use_custom_title' => false, // Don't change this value.
                ],
                // ...
            ],
            // (optional) To add a location, do BOTH of these:
            'location_sticker' => [
                'width' => 0.89333333333333331,
                'height' => 0.071281859070464776,
                'x' => 0.5,
                'y' => 0.2,
                'rotation' => 0.0,
                'is_sticker' => true,
                'location_id' => $location->getExternalId(),
            ],
            'location' => $location,
            // (optional) You can use story links ONLY if you have a business account with >= 10k followers.
            // 'link' => 'https://github.com/mgp25/Instagram-API',
        ];
        try {
            // This example will upload the image via our automatic photo processing
            // class. It will ensure that the story file matches the ~9:16 (portrait)
            // aspect ratio needed by Instagram stories. You have nothing to worry
            // about, since the class uses temporary files if the input needs
            // processing, and it never overwrites your original file.
            //
            // Also note that it has lots of options, so read its class documentation!
            foreach ($post->medias as $item) {
                $photoFilename=  public_path(str_replace('http://localhost/instagram/public', '', $item->file));
                if ($item->type == 'video') {
                    $photo = new \InstagramAPI\Media\Video\InstagramVideo($photoFilename, ['targetFeed' => \InstagramAPI\Constants::FEED_STORY]);
                    $ig->story->uploadVideo($photo->getFile(), $metadata);
                } else if ($item->type == 'photo') {
                    $photo = new \InstagramAPI\Media\Photo\InstagramPhoto($photoFilename, ['targetFeed' => \InstagramAPI\Constants::FEED_STORY]);
                    $ig->story->uploadPhoto($photo->getFile(), $metadata);
                }
            }


            // NOTE: Providing metadata for story uploads is OPTIONAL. If you just want
            // to upload it without any tags/location/caption, simply do the following:
            // $ig->story->uploadPhoto($photo->getFile());
        } catch (\Exception $e) {
            echo 'Something went wrong: ' . $e->getMessage() . "\n";
        }

    }
}

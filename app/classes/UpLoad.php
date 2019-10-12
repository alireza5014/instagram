<?php
/**
 * Created by PhpStorm.
 * User: alireza
 * Date: 26/01/2019
 * Time: 18:56
 */

namespace App\classes;


abstract class UpLoad
{


    public static function create($upload_type)
    {
        switch ($upload_type) {
            case 'image':

                return new ImageUpload();

            case 'file':

                return new FileUpload();

                case 'instagram':

                return new Instagram();

        }
    }


}
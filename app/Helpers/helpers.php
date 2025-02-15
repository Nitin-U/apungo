<?php

use App\Models\Backend\Menu;
use App\Models\Backend\MenuItem;
use App\Models\Backend\User;
use JetBrains\PhpStorm\Pure;

if (!function_exists('greeting_msg')) {
    function greeting_msg(): string
    {
        date_default_timezone_set('Asia/kathmandu');
        $hour      = date('H');
        if ($hour >= 20) {
            $greetings = "Its Night Time";
        } elseif ($hour > 17) {
            $greetings = "Good Evening";
        } elseif ($hour > 11) {
            $greetings = "Good Afternoon";
        } elseif ($hour < 12) {
            $greetings = "Good Morning";
        }
        return $greetings;
    }
}

if (!function_exists('profile_percentage')) {
    function profile_percentage($id): int
    {
        $user       = User::find($id);
        $name       = 20;
        $email      = 20;
        $contact    = 20;
        $image      = 15;
        $gender     = 10;
        $address    = 10;
        $about      = 5;
        $percetage = 0;
        if ($user->name !== null) {
            $percetage += $name;
        }
        if ($user->email !== null) {
            $percetage += $email;
        }
        if ($user->contact !== null) {
            $percetage += $contact;
        }
        if ($user->address !== null) {
            $percetage += $address;
        }
        if ($user->image !== null) {
            $percetage += $image;
        }
        if ($user->gender !== null) {
            $percetage += $gender;
        }
        if ($user->about !== null) {
            $percetage += $about;
        }
        return $percetage;
    }
}


if (!function_exists('get_slugs_to_disable')) {
    /**
     * @param $id
     * @return array
     */
    function get_slugs_to_disable($id): array
    {
        $disable    = [];
        $desiredMenu   = Menu::where('slug',$id)->first();
        $menuitems     = MenuItem::where('menu_id',$desiredMenu->id)->get();
        foreach ($menuitems as $items){
            array_push($disable,$items->slug);
        }
        return $disable;
    }
}

if (!function_exists('get_menu_url')) {
    /**
     * @param $menu_type
     * @param $menu
     * @return string
     */
    function get_menu_url($menu_type, $menu){
        $url    = '#';
        if($menu_type == 'custom'){
            $url = '/'.@$menu->slug;
        }else if($menu_type == 'post'){
            $url = url('blog').'/'.@$menu->slug;
        }else if($menu_type == 'service'){
            $url = url('service').'/'.@$menu->slug;
        } else if($menu_type == 'package') {
            $url = url('activity').'/'.@$menu->slug;
        }
        else{
            $url = url('/').'/'.@$menu->slug;
        }

        return $url;
    }
}

if (!function_exists('elipsis')) {
    /**
     * @param $text
     * @param $words
     * @return string
     */
    function elipsis ($text, $words = 10) {
        // Check if string has more than X words
        if (str_word_count($text) > $words) {

            // Extract first X words from string
            preg_match("/(?:[^\s,\.;\?\!]+(?:[\s,\.;\?\!]+|$)){0,$words}/", $text, $matches);
            $text = trim($matches[0]);

            // Let's check if it ends in a comma or a dot.
            if (substr($text, -1) == ',') {
                // If it's a comma, let's remove it and add a ellipsis
                $text = rtrim($text, ',');
                $text .= '...';
            } else if (substr($text, -1) == '.') {
                // If it's a dot, let's remove it and add a ellipsis (optional)
                $text = rtrim($text, '.');
                $text .= '...';
            } else {
                // Doesn't end in dot or comma, just adding ellipsis here
                $text .= '...';
            }
        }
        // Returns "ellipsed" text, or just the string, if it's less than X words wide.
        return  strip_tags($text);
    }
}

if (!function_exists('imagePath')) {
    /**
     * @param $image
     * @return string
     */
    function imagePath($image): string
    {
        return 'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$image;
    }
}

if (!function_exists('filePath')) {
    /**
     * @param $file
     * @return string
     */
    function filePath($file): string
    {
        return 'storage'.DIRECTORY_SEPARATOR.'files'.DIRECTORY_SEPARATOR.$file;
    }
}

if (!function_exists('thumbnailImagePath')) {

    /**
     * @param $image
     * @return string
     */
    function thumbnailImagePath($image): string
    {
        $thumbnail = getThumbImageName($image);

        return 'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$thumbnail;
    }
}

if (!function_exists('galleryImagePath')) {
    /**
     * @param $folder_name
     * @return string
     */
    function galleryImagePath($folder_name): string
    {
        return 'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$folder_name.DIRECTORY_SEPARATOR.'gallery'.DIRECTORY_SEPARATOR;
    }
}

if (! function_exists('getThumbImageName')) {
    /**
     * returns list of flights
     *
     * @param $image
     * @return string
     */
    function getThumbImageName($image): string
    {
        $thumb      = 'thumb_'.substr(strrchr($image, '/'), 1);
        $folder     = substr($image, 0, strrpos($image, '/'));

        return $folder.'/'.$thumb;
    }
}

if (! function_exists('splitWordsFromEnd')) {
    /**
     * returns list of flights
     *
     * @param $image
     * @return string
     */
    function splitWordsFromEnd($sentence, $numWordsToSplit) {
        $split = explode(" ", $sentence);

        if (count($split) > $numWordsToSplit) {
            $lastWords = implode(" ", array_slice($split, -$numWordsToSplit));
            array_splice($split, -$numWordsToSplit);
            $remainingWords = implode(" ", $split);
            return [$remainingWords, $lastWords];
        } else {
            // Handle the case where there are fewer than $numWordsToSplit words
            return [$sentence, ''];
        }
    }
}


<?php
namespace App\Controllers;

use App\notifications\whatsapp;


class test_whats{
    public function testSMS(){
        $whats = new whatsapp();
        $link = "https://www.reddit.com/r/PHPhelp/comments/165jr5v/is_php_really_bad_in_2023/0";
        $whats -> sendMessage($link);
    }

}

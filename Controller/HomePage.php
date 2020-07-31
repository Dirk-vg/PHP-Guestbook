<?php
declare(strict_types=1);

require "Model/Guestbook.php";
require "Model/Post.php";

class Homepage
{

    public function render()
    {


        if (!isset($_POST["name"])) {
            $_POST["name"] = "name";
            $_POST["title"] = "title";
            $_POST["comment"] = "comment";
        }

        function fixTags($text)
        {
            $text = htmlspecialchars($text);
            $text = preg_replace("/=/", "=\"\"", $text);
            $text = preg_replace("/&quot;/", "&quot;\"", $text);
            $tags = "/&lt;(\/|)(\w*)(\ |)(\w*)([\\\=]*)(?|(\")\"&quot;\"|)(?|(.*)?&quot;(\")|)([\ ]?)(\/|)&gt;/i";
            $replacement = "<$1$2$3$4$5$6$7$8$9$10>";
            $text = preg_replace($tags, $replacement, $text);
            $text = preg_replace("/=\"\"/", "=", $text);
            return $text;
        }

        $nameInput = fixTags($_POST["name"]);
        $titleInput = fixTags($_POST["title"]);
        $commentInput = fixTags($_POST["comment"]);
        $dateInput = date('m/d/Y h:i:s a', time());

        $entry = new Post($titleInput, $commentInput, $dateInput, $nameInput);

        $assoc = $entry->createEntryArray($titleInput, $commentInput, $dateInput, $nameInput);



        $book = new Guestbook();

        if (!isset($_SESSION["guestBook"])) {
            $_SESSION["guestBook"] = $book;
        } else {
            $book = $_SESSION["guestBook"];
        }

        $book->pushToMaster($assoc);
        $masterArray = $book->getAllPosts();

        $book->messageLoader($masterArray);

        $revJSON = $book->loaderDecoder();

        while (count($revJSON) > 20) {
            array_shift($revJSON);
        }
        $dateOrderPosts = array_reverse($revJSON);

        require 'View/homepage.php';





    }
}
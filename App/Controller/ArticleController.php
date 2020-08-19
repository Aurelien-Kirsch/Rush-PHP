<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/../App/Model/Article.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/../App/Model/UserModel.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/../router.php");

class ArticleController{
    
    private $article;
    private $param;
    private $user;

    public function __construct($action,$param=null){

        $this->article = new Article();
        $this->user = new UserModel();
        $this->param = $param;

        switch ($action){
            case "Display":
                $this->display();
            break;
                
            case "Create":
                $this->create();
            break;
                
            case "Search":
                $this->search();
            break;

            case "Modify":
                $this->modify();
            break;

            case "Comment":
                $this->comment();
            break;
        }
    }

    public function Display()
    {
        include($_SERVER["DOCUMENT_ROOT"] . "/../App/View/doctype.php");
        include($_SERVER["DOCUMENT_ROOT"] . "/../App/View/header.php");
        include($_SERVER["DOCUMENT_ROOT"] . "/../App/View/ArticleView.php");
        include($_SERVER["DOCUMENT_ROOT"] . "/../App/View/footer.php");
    }
    public function Create(){
        $this->article->getArticle($id);
        $article->setArticle($title, $author, $content, $comment);    
    }
    public function Modify(){
        $this->article->getArticle($id);
        $article->setTitle($title);
        $article->setAuthor($author);
        $article->setContent($content);
        $article->setComment($comment);
        $article->setModification_date();
    }
    public function Comment(){
        $this->user->getUser($id);
        if(($this->user->getUser()) != null){
            $article->setComment($comment);
        }
        else{
            echo "You don't have right, create an account !";
        }
        
    }

}



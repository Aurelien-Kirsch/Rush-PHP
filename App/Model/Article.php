<?php

// namespace Model;
require_once($_SERVER["DOCUMENT_ROOT"] . "/../App/Model/connectDB.php");

class Article{

    private $id;
    private $title;
    private $author;
    private $content;
    private $comment;
    private $creation_date;
    private $modification_date;

    public function getArticle($id){
        try{
            $article = connectDB::getInstance();
            $infos = $article->prepare("SELECT * FROM article WHERE id = ?");
            $infos->bindParam(1, $id);
            $infos->execute();
            $display = $infos->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
        $this->id = $display["id"];
        $this->title = $display["title"];
        $this->author = $display["author"];
        $this->content = $display["content"];
        $this->comment = $display["comment"];
        $this->creation_date = $display["creation_date"];
        $this->modification_date = $display["modification_date"];
    }
    public function getTitle(){
     
        return $this->title;
        
    }
    public function getAuthor(){

        return $this->author;
    }
    public function getContent(){
 
        return $this->content;
    }
    public function getComment(){

        return $this->comment;
    }
    public function getCreation_date(){

        return $this->creation_date;
    }
    public function getModification_date(){
        
        return $this->modification_datemodification_date;
    }
    public function setArticle($title, $author, $content, $comment = null){
        try{
            $article = connectDB::getInstance();
            $infos = $article->prepare("INSERT INTO article(title, author, content) VALUES (?, ?, ?)");
            $infos->bindParam(1, $title);
            $infos->bindParam(2, $author);
            $infos->bindParam(3, $content);
            $infos->execute();
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function setTitle($title){
        if($this->getTitle != null ){

            try{

                $article = connectDB::getInstance();
                $infos = $article->prepare("INSERT INTO article(title) VALUES (?)");
                $infos->bindParam(1, $title);
                $infos->execute();
            }
            catch (PDOException $e){

                echo $e->getMessage;
            }
        }
    }
    public function setAuthor($author){
        if($this->getAuthor != null ){

            try{

                $article = connectDB::getInstance();
                $infos = $article->prepare("INSERT INTO article(author) VALUES (?)");
                $infos->bindParam(1, $author);
                $infos->execute();
            }
            catch (PDOException $e){

                echo $e->getMessage;
            }
        }
    }
    public function setContent($content){
        if($this->getContent != null ){

            try{

                $article = connectDB::getInstance();
                $infos = $article->prepare("INSERT INTO article(content) VALUES (?)");
                $infos->bindParam(1, $content);
                $infos->execute();
            }
            catch (PDOException $e){

                echo $e->getMessage;
            }
        }
    }
    public function setComment($comment){
        if($this->getComment != null ){

            try{

                $article = connectDB::getInstance();
                $infos = $article->prepare("INSERT INTO article(comment) VALUES (?)");
                $infos->bindParam(1, $comment);
                $infos->execute();
            }
            catch (PDOException $e){

                echo $e->getMessage;
            }
        }
    }
    public function setModification_date(){
        if($this->getCreation_date != null ){

            try{

                $article = connectDB::getInstance();
                $infos = $article->prepare("INSERT INTO article(modification_date) VALUES (?)");
                $infos->bindParam(1, date("Y/m/d"));
                $infos->execute();
            }
            catch (PDOException $e){

                echo $e->getMessage;
            }
        }
    }
    public function deleteArticle($title){
        try{
            $article = connectDB::getInstance();
            $infos = $article->prepare("DELETE FROM article WHERE title = ?");
            $infos->bindParam(1, $title);
            $infos->execute();            
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }  
}


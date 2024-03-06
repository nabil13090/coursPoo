<?php
namespace Controllers;

use Http;
      
     
      

      class Comment extends Controller
      {
            protected $modelName = \Models\Comment::class;

            public function insert()
            {

               $author = null;
               if (!empty($_POST['author'])) {
                   $author = $_POST['author'];
               }
               $content = null;
               if (!empty($_POST['content'])) {
                   $content = htmlspecialchars($_POST['content']);
               }
               $article_id = null;
               if (!empty($_POST['article_id']) && ctype_digit($_POST['article_id'])) {
                   $article_id = $_POST['article_id'];
               }
               if (!$author || !$article_id || !$content) {
                   die("Votre formulaire a été mal rempli !");
               }
               $article = $this->model->find($article_id);
               if (!$article) {
                   die("Aucun commentaire n'a l'identifiant $article_id !");
               }
               $this->model->insert($author, $content, $article_id);
               Http::redirect("index.php?controller=article&task=show&id=" . $article_id);
            }


            
            public function delete()
            {

                if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
                    die("Ho ! Fallait préciser le paramètre id en GET !");
                }
                $id = $_GET['id'];
                $commentaire = $this->model->find($id);
                if (! $commentaire) {
                    die("Aucun commentaire n'a l'identifiant $id !");
                }
                $article_id = $commentaire['article_id'];
                $this->model->delete($id);
                Http::redirect("index.php?controller=article&task=delete&id=" . $article_id);
            }
      }
<?php
  namespace App\Controller;

  use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
  use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
  use Symfony\Component\HttpFoundation\Response;

  class ArticleController extends AbstractController{
    /**
      @Route("/",name="app_homepage")
    */
    public function homepage(){
      return $this->render('article/homepage.html.twig');
    }


    // public function show($slug){
    //   return new Response(
    //     sprintf(
    //       "Future page to show one space article:%s",$slug
    //     )
    //   );
    // }

    /**
     * @Route("/news/{slug}",name = "article_show");
     */
    public function show($slug){
      $comments = [
        'i ate a normal rock one. etc..',
        'i can diet',
        'i like chicken'
      ];

      return $this->render('article/show.html.twig',[
        'title' => ucwords(str_replace('-',' ',$slug)),
        'comments' => $comments,
      ]);
    }
  }
?>

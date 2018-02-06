<?php
  namespace App\Controller;

  use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
  use Symfony\Component\HttpFoundation\Response;

  class ArticleController{
    /**
      @Route("/")
    */
    public function homepage(){
      return new Response('OMG! My First page already');
    }

    /**
     * @Route("/news/{slug}");
     */
    public function show($slug){
      return new Response(
        sprintf(
          "Future page to show one space article:%s",$slug
        )
      );
    }
  }
?>

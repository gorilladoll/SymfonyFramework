<?php
  namespace App\Controller;

  use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
  use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
  use Symfony\Component\HttpFoundation\Response;

  class ArticleController extends AbstractController{
    /**
      @Route("/")
    */
    public function homepage(){
      return new Response('OMG! My First page already');
    }


    // public function show($slug){
    //   return new Response(
    //     sprintf(
    //       "Future page to show one space article:%s",$slug
    //     )
    //   );
    // }

    /**
     * @Route("/news/{slug}");
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

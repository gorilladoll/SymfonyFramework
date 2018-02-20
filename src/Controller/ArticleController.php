<?php
  namespace App\Controller;

  use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
  use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
  use Symfony\Component\HttpFoundation\Response;
  use Symfony\Component\HttpFoundation\JsonResponse;
  use Psr\Log\LoggerInterface;
  use Twig\Environment;

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
    public function show($slug,Environment $twigEnvironment){
      $comments = [
        'i ate a normal rock one. etc..',
        'i can diet',
        'i like chicken'
      ];

      $html = $twigEnvironment->render('article/show.html.twig',[
        'title' => ucwords(str_replace('-',' ',$slug)),
        'slug' => $slug,
        'comments' => $comments,
      ]);

      return new Response($html);
    }

    /**
     * @Route("/news/{slug}/hearts",name="article_toggle_heart",methods={"POST"});
     */
    public function toggleArticleHeart($slug,LoggerInterface $logger){
      //TODO - acually heart/unheart the article

      $logger->info('Article is being hearted');

      // return new Response(json_encode(['hearts' => 5]));
      return new JsonResponse(['hearts'=>rand(5,100)]);
    }
  }
?>

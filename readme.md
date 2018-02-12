Symfony 설정하기
*시작시 에러가 발생하는데 이는 무시해도 된다.
*심포니에 필요한 기본적은 ATOM 세팅 패키지  1. php-linter
 2. php-twig
 3. language-twig
 4. emmit 
 5. atom-beautiful(HTML,CSS,JS등을 지원함)

=====================================

심포니 프로젝트 만들기
-composer create-project symfony/skeleton 프로젝트명

심포니 웹 서버 시작하기
php -S 127.0.0.1:8000 -t public

심포니 웹 서버 더욱 쉽게 시작하기
1. Composer로 서버를 설치한다 - composer require server 
2. 설치한 서버로 서버 더욱 쉽게 실행하기 - php bin/console server:run 
=====================================

심포니 라우팅 하는 법:config/routes.yaml 에서 다음과 같은 방법으로 라우팅이 가능하다.
	-index:  		path : /
		controller: App\Controller\컨트롤러 명::메소드 명

기본적인 심포니 컨트롤러 형식
<?php
  namespace App\Controller;
  use Symfony\Component\HttpFoundation\Response;

  class ArticleController extends AbstractController{
    public function homepage(){
      return new Response('OMG! My First page already');
    }
}
?>

직접 라우팅 하지 않고 주석을 통해 라우팅하기
1. Composer 추가기능 설치하기 - composer require annotations 
2. 추가기능을 이용하기 위한 경로 추가 - use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route; 
3. 주석을 이용하여 경로 설정 /**       @Route("/") */ 
4. 경로 마음대로 설정하기 /**  @Route("/news/{slug}"); */ 
5. 마음대로 설정한 경로를 변수로 가져오기 - public function show($slug) - 다음과 같이 $ 설정한 변수 명 의 형식으로 가져오면 된다. 
=====================================

보안 검사 프로그램 설치
 - composer require sec-checker  - composer require sec-checker —dev * 둘 중에 하나만 하면 됨

보안 검사 하기
php bin/console security:check

=====================================

Twig를 이용한 뷰 만들기
 - twig 설치하기 	- composer require twig

 - 설치된 것 확인하기 	 - templates 폴더 	 - config/packages/twig.yaml 파일

 - twig 이용하기 	 - Twig 를 이용하기 위해서 먼저 기본 클래스를 확장
	 - class ArticleController extends AbstractController
	 - use Symfony\Bundle\FrameworkBundle\Controller\AbstractController
	 - 이 두가지를 하면 확장은 끝남

 - 메소드에서 뷰로 리턴하기
	 - return $this->render(‘폴더/파일 명’)
	 - 기본적으로 리턴 되는 view는 templates 폴더를 기본으로 잡고 있음
	 - view 파일은 무조건 뒤쪽에 twig를 붙여야만 한다.
	 - 예) viewFile.html.twig
	 
 - 변수를 리턴하기
	 - return $this->render(‘폴더/파일명’,[ ‘변수로 사용할 텍스트’ => 값 ])
	 
 - 변수 사용하기
	 - <h1>{{ title }}</h1>
	 - 변수를 사용하는 방법에는 두가지가 있다. {{  변수 }}와 {% 변수 %} 이다.
	 - 무언가를 시작하고 끝내는 것이 포함 될 경우(루프문 등) {% %} 를 기본적으로 쓰고
	 - 한번만 쓰는 것일 경우 {{ }}를 이용한다.

 - 변수를 루핑하기
	 - 변수 설정하기
		 - $comments = [
		        'i ate a normal rock one. etc..',
        		  'i can diet',
        		  'i like chicken'
      		];
	
	 - 변수 리턴하기
		 - 'comments' => $comments

	 - 변수 이용하기
		<h2>Comments ({{ comments | length }})</h2>
		<ul>
 			 {% for comment in comments %}
    				<li>{{ comment }}</li>
  			{% endfor %}
		</ul>
	
 - 템플릿 상속하기
	 - 기본적으로 twig는 메인 템플릿을 상속하여 서브 프레임을 사용하는 것이 기본으로 되어있다.
	 
	- 기본적으로 상속하는 템플릿의 기본 구성 요소는 다음과 같다
		 - title
		 - stylesheet
		 - body
		 - javascript
	 
	- 메인 템플릿들 구성요소의 상속을 원하는 경우
		 - {% block title %} 
		 - {% block stylesheet %} 
		 - {% block body %} 
		 - {% block javascript %} 
	 
	 - 메인 탬플릿의 구성 요소를 서브 프레임을 이용 하는 법
		 - {% extends ‘메인 템플릿.html.twig’ %}
		 - {% block title %} 	타이틀 명 	{% endblock %}
 =====================================

디버깅

디버깅을 위한 사전 설치
	 - composer require profiler --dev

dump를 이용한 디버그
	 - controller를 이용한 dump 사용
		 - dump($변수,$this)

	 - view를 이용한 dump 사용
		- {{ dump() }}  

===============================
Symfony 디버깅 및 팩

디버깅 도구 설치
 - composer require debug --dev
 - 디버깅 도구는 기본적으로 6개의 라이브러리로 이루어 진다.
 - composer.json 파일을 보면 “Symfony/debug-pack”으로 하나로 통합 된 것을 확인 할 수 있다.

디버깅 도구 분리하기
 - composer unpack debug
 - 이는 디버그 package를 제거하는 것 처럼 보인다.
 - 사실 이는 디버그의 통합 팩을 제거하고 6개의 라이브러리로 분리시켜주는 효과를 가져다 준다.
 - 디버그 통합 팩이 필요 없고 개별로 하나하나만 필요할 때 사용하면 좋다.

===============================

CSS 및 자바스크립트

Symfony에서 파일을 복붙 하는 경우 우선적으로 해야 할 것
 - rm -rf var/cache/dev/*
 - 이 것을 해야하는 이유는 twig 업데이트 순서가 꼬였기 때문에 재정렬할 필요가 있기 때문

Symfony에서 사용하는 모든 주소들의 위치
 - public 을 기준으로 주소를 결정한다.
 - 예) <link rel="stylesheet" href="/css/font-awesome.css">

모든 주소들을 사용할 때 주의해야 하는 점
 - asset()을 이용하여 주소를 묶어 주는 것이 좋다.
 - 예) <link rel="stylesheet" href="{{ asset('/css/font-awesome.css') }}">
 - asset을 사용하는 이유
	 - CDN으로 저장하거나 자산을 시각화 할 수 있다.
 - asset() 함수를 이용하기 위해서는 사전에 설치를 해 주어야 한다.
	 - composer require asset







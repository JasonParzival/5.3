<?php
require_once "BaseController.php"; // обязательно импортим BaseController

class TwigBaseController extends BaseController {
    public $title = ""; // название страницы
    public $template = ""; // шаблон страницы
    public $temp = "";
    public $caption = "";
    public $urlhelp = "";
    public $nav = [ // добавил список словариков
        [
            "title" => "Главная",
            "url" => "/",
        ],
        [
            "title" => "Уитли",
            "url" => "/space-object/1",
        ],
        [
            "title" => "ГЛэДОС",
            "url" => "/space-object/2",
        ]
    ];

    public $newnav = [
        [
            "title" => "Картинка",
            "url" => "image",
        ],
        [
            "title" => "Описание",
            "url" => "info",
        ]
    ];
    protected \Twig\Environment $twig; // ссылка на экземпляр twig, для рендернига
    
    /*public function __construct($twig)
    {
        $this->twig = $twig; // пробрасываем его внутрь
    }*/

    // добавляем
    public function setTwig($twig) {
        $this->twig = $twig;
    }
    
    // переопределяем функцию контекста
    public function getContext() : array
    {
        $context = parent::getContext(); // вызываем родительский метод
        $context['title'] = $this->title; 
        $context['nav'] = $this->nav;
        $context['newnav'] = $this->newnav;
        $context['temp'] = $this->temp;
        $context['urlhelp'] = $this->urlhelp;
        $context['caption'] = $this->caption;

        return $context;
    }
    
    // функция гет, рендерит результат используя $template в качестве шаблона
    // и вызывает функцию getContext для формирования словаря контекста
    public function get() {
        echo $this->twig->render($this->template, $this->getContext());
    }
}
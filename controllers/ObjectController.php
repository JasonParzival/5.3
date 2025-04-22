<?php

class ObjectController extends TwigBaseController {
    public $template = "main_window_object.twig"; // указываем шаблон

    public function getContext(): array
    {
        $context = parent::getContext();  

        // создам запрос, под параметр создаем переменную my_id в запросе
        $query = $this->pdo->prepare("SELECT description, id FROM space_objects WHERE id= :my_id");
        // подвязываем значение в my_id 
        $query->bindValue("my_id", $this->params['id']);
        $query->execute(); // выполняем запрос

        // тянем данные
        $data = $query->fetch();

        // передаем описание из БД в контекст
        $context['description'] = $data['description'];

        $query = $this->pdo->prepare("SELECT * FROM space_objects WHERE id= :my_id");
        // подвязываем значение в my_id 
        $query->bindValue("my_id", $this->params['id']);
        $query->execute(); // выполняем запрос
        
        // стягиваем данные через fetchAll() и сохраняем результат в контекст
        $context['title_objects'] = $query->fetch();

        return $context;
    }
}
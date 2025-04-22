<?php
// класс абстрактный, чтобы нельзя было создать экземпляр
abstract class BaseController {
    public PDO $pdo; // добавил поле
    public array $params; // добавил поле

    // добавил сеттер
    public function setParams(array $params) {
        $this->params = $params;
    }

    public function setPDO(PDO $pdo) { // и сеттер для него
        $this->pdo = $pdo;
    }
    
    public function getContext(): array {
        return []; // по умолчанию пустой контекст
    }

    abstract public function get();
}
### Тестовое задание (часть landing)

landing – это основной сайт
При переходе на ЛЮБЫЕ страницы landing передается информация в проект activity по протоколу json-rpc версии 2.0. 
Информация содержит URL и Дату.
На странице /admin/activity выводится историю активности с пагинацией сгруппированную по URL. 
Поля таблицы: URL, Количество визитов, Последнее посещение. 
Эту информация запрашивается в проекте activity (json-rpc запрос).

### Параметры конфигурации (.env)

ACTIVITY_URL - адрес сервера с проектом activity


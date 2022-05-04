# Тестовое задание по Laravel API. 

Две таблицы, связь "один ко многим". Добавление серийных номеров, которые проверяются регулярками. Регулярки засунул в Enums.

Для Api использовал [PostMan](https://www.postman.com/), коллекция в репозитории ( *testLaravelApi.postman_collection.json* ). Для работы api необходимо зарегистрироваться через web (/register).

Для JWT-авторизцаии необходимо указать в параметрах email и password, ответом будет jwt токен, который необходимо вставлять в запросы через Bearer Token. 
 
## API:

Для использования JWT-авторизации, необходимо установить [JWT-токен](https://jwt-auth.readthedocs.io/en/develop/laravel-installation/)


**1**.	Запрос на авторизацию пользователя.

**2**.	Получение пагинированного списка оборудования с возможностью поиска по query param.

**3**.	Получение данных оборудования по id.

**4**.	Добавление оборудования.

**5**.	Обновление оборудования.

**6**.	Удаление оборудования.

**7**.	Получение пагинированного списка типов оборудования с возможностью поиска по query param.



## Реализация API:



**1**. *POST, можно вводить как в параметрах, так и в body*:

```bash
http://testlaravelapi/api/auth/login?email=test@mail.ru&password=123456789
``` 

**2**. *GET*:
```bash
http://testlaravelapi/api/equipment?page=1&type_id=1
``` 

**3**. *GET*:
```bash
http://testlaravelapi/api/equipment/6
``` 

**4**. *POST*:
```bash
http://testlaravelapi/api/equipment	
``` 
```bash
{
    "type_id": "3",
    "number": [
        "5FFDSA@RRR",
        "5FSDWA-RFF",
        "5FDDDD@RRA"
    ],
    "note": "123"
}
``` 

**5**. *PUT. Тип, номер, и примечание необязательные параметры*:
```bash
http://testlaravelapi/api/equipment/4	
``` 
```bash
{
    "type_id": "3",
    "number": "5FFDSA@RGG",
    "note": "5555"
}
``` 

**6**. *DELETE*:
```bash
http://testlaravelapi/api/equipment/6	
``` 

**7**. *GET*:
```bash
http://testlaravelapi/api/type?page=1
``` 

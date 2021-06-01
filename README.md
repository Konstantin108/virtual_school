# Курсы повышения квалификации
GB итоговый проект QUIZ Курсы повышения квалификации

## Описание
Наш проект - это реализация виртуальной школы(курс повышения квалификации) для сотрудников организации. Проект даёт возможность ознакомления с информацией и возможность пройти тест после изучения темы. Зарегистрированный пользователь может выбирать из тем, видеть какие темы он уже прошел, на какой балл он их прошел.

Преимущества:

	- для орагнизации:
		- экономия времени на обучение персонала, каждый сотрудник сам ознакамливается с информацией
		- возможность отслеживать какой пользователь, какие темы изучил и на какой бал
		- возможность редактирования данных пользователя, редактирования и добавления новых тем и тестов через админку

	- для пользователя(сотрудника):
		- удобно структурированная иформация изложена кратко и исчерпывающе
		- выбор тем, возможность вернуться к уже изученным для того, чтобы освежить знания
    - показ неправильных ответов после прохождения теста(возможность проанализировать свои результаты)

Стэк - HTML, CSS, JS, Laravel, MySQL

## Истории для backlog (набросок ТЗ)
1. Имеются темы для повышения квалификации. (текст, видео возможно из слайдов)
2. Неавторизованные пользователи могут пройти тему, в конце будут несколько проверочных вопросов, ответив на которые такой пользователь получит оценку (сколько правильных ответов).
   Результаты не сохраняются.
3. Регистрация пользователя по email
4. Авторизованные пользователи могут пройти тему, ответить на вопросы и получить оценку,
   при этом результаты сохраняются в БД (mySQL)
5. Просмотр своей статистики: какая тема пройдена, сколько правильных ответов, общий бал.
6. Просмотр общейстатистики (рейтинга): пользователь, общий бал.
7. Админ: Добавление пользователя.
8. Админ: Добавление/удаление/изменение Темы
9. Админ: Добавление/удаление/изменение Вопросов/Ответов к Теме.
10. Пользователь может добавить отзыв на Тему курса.

## Роли
Максим - фронт, вёрстка
Алексей - фронт, бэк
Константин - бэк, БД

## Анализ конкурентов

https://maksfedorov.ru/blog/all/testovye-zadaniya-dlya-dzhuniora/
- отсутствует анализ ошибок, после прохождения теста нет информации о том, в каких знаниях провалы

https://corp.wamba.com/ru/test/
- отсутствует возможность создания профиля, нет возможности посмотреть свою статистику

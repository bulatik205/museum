# 🏛️ Museum project

## Установка:

- Установить php 8.0+
- Установить museum: `git clone https://github.com/bulatik205/museum.git`

## Команды

<p>Минимальная справка:</p>

`php museum --help`

<p>Создать директорию с сайтом:</p>

`php museum web ?new_folder_name` 

<p><code>new_folder_name</code> - это папка, которую надо создать. В нее загрузится весь скелет сайта. Если не указать, то сгенерируется папка с названием <code>bin2hex(random_bytes(4))</code></p>

## Roadmap:

### MVP

- Функционал, копирующий папку web создавая новый скелет [✅]
- Базовый интерфейс CLI: `php museum make project-name` [✅]

### После MVP

- Возможность наполнять конфиг: путь к проекту, тип проекта, как скачивать
- Возможность скачать скелет как локально, так и с удаленного сервера: `-l` (для локальной установки), `-n` (для установки с удаленного сервера)
- Возможность поднять старый скелет, скачивая удаленно: `-n 1.0.0`
- Возможность поднять [tbot](https://github.com/bulatik205/telegram-tbot) командой
- Переработать интерфейс CLI:

---

<p>Чтобы что то поднять:</p>

```
php museum make:web
php museum make:tbot
```

<p>Опционально с добавлением названия папки проекта: </p>

```
php museum make:web directory
```

<p>Настройки по умолчанию у museum</p>

```
download type: local
museum version: min.maj.pat
directory: auto
```

<p>Настройки по умолчанию у скелетов</p>

```
museum version: min.maj.pat (версия museum на момент установки)
blade version: min.maj.pat
```

<p>Настройка museum</p>

```
php museum conf -l|-n
php museum cong -d:/--now\_myproject (можно собрать свое название, вернет 01.01.1970_myproject)
php museum cong -d:--auto
```

<p>Обьяснение тегов</p>

```
-l              - локальный режим установки (версия скелета, скачанная с museum)
-n              - облачная установка последней версии (с моего сервера)
-d              - управление папкой, в которую будет утсановлен скелет
    --now       - название папки: подставляет текущую дату
    --auto      - название папки: генерируется bin2hex(random_bytes(8)) 
```
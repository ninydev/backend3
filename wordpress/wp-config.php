<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'c1wordpress' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'c1laravel' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'QweAsdZxc!23' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '%nYC3oosM6aI*&b/xRGf,E?2R^vSe&?)^j`@``BC+?8[(&7O?T,%BhD/Y=/3_<;l' );
define( 'SECURE_AUTH_KEY',  '~1CFoW%k]];AdUQm86[cJ[KI%)ktVbUZR49+!*O4=DRX7K:Jl@KJnZxbmi6T 5d4' );
define( 'LOGGED_IN_KEY',    'U.GOnb#`2xe,ZwmjGCcsDCY9d!5xH#8a?{8&B#BvmWOx:u]4H aDBb>qDKD&QYyi' );
define( 'NONCE_KEY',        'o[;Gdt7%N5dEAk}|J|H>e?}@`~{{`&y8V,U@]Sf?5Iz=Y,o$0}Y9VgU.MQJ4|]Kq' );
define( 'AUTH_SALT',        'Hd#m~]JHfrYO24Xbg6jBJ#EulmeGC0)kJGiCqz9$VgsE|02Id+|tNrak3vDQ2}.L' );
define( 'SECURE_AUTH_SALT', '{rVwe4Khye`a(ecXGfo@aV#09NQ~0[?:6aNBm@k4T!eE2:cz8k#3#9kYrC7/cRnP' );
define( 'LOGGED_IN_SALT',   ']oIy8X$~T B&f4Zi*Gb_m}SwU(l2oo3U.a(f/eWj<,XcM}xSK 7acaABo7Q?y2C1' );
define( 'NONCE_SALT',       'o<SvZk9V^hk!NHkWBrSSI?Ah1QNPh+mem:|%+r:_5S}ImmLAWewl;_6Q1TYOseCt' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );

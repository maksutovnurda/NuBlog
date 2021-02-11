-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 07 2019 г., 08:14
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `nublog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `changes`
--

CREATE TABLE `changes` (
  `id` int(11) NOT NULL,
  `last_name` text NOT NULL,
  `last_ava` text NOT NULL,
  `name` text NOT NULL,
  `ava` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `puri` text NOT NULL,
  `name` text NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `block` int(11) NOT NULL DEFAULT 0,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `puri`, `name`, `content`, `date`, `block`, `uid`) VALUES
(1, 'adam-shakiry', 'Nurdaulet Maksutov', 'fwe', '2019-08-20 17:56:53', 0, 11),
(2, 'adam-shakiry', 'Nurdaulet Maksutov', '&lt;b&gt;Admin&lt;/b&gt;', '2019-08-20 18:14:08', 0, 11),
(3, 'adam-shakiry', 'Nurdaulet Maksutov', 'erherh', '2019-08-20 18:14:11', 0, 11),
(4, 'adam-shakiry', 'Nurdaulet Maksutov', 'rntrnrn', '2019-08-20 18:14:22', 0, 11),
(5, 'adam-shakiry', 'Nurdaulet Maksutov', 'wfwefwe&amp;nbsp;', '2019-08-20 18:14:52', 0, 11),
(6, 'our-aim', 'Nurdaulet Maksutov', 'Керемет сайт, сәттілік!', '2019-08-20 18:15:13', 0, 11),
(7, 'adam-shakiry', 'Nurdaulet Maksutov', 'asd', '2019-08-20 18:22:40', 0, 0),
(8, 'adam-shakiry', 'Nurdaulet Maksutov', 'dasdas', '2019-08-20 18:23:06', 0, 0),
(9, 'our-aim', 'Nurdaulet Maksutov', '&lt;pre&gt;SELECT * FROM `posts` WHEqw', '2019-08-20 21:00:15', 0, 11),
(10, 'our-aim', 'Nurdaulet Maksutov', 'MATCH(title, ftxt) AGAINST(Қалайсыңдар)', '2019-08-20 21:00:33', 0, 11),
(11, 'our-aim', '', 'wgaga', '2019-08-21 11:44:27', 0, 0),
(12, 'our-aim', '', 'wgaga', '2019-08-21 11:44:28', 0, 0),
(13, 'our-aim', 'gae', 'gdsgds', '2019-08-21 11:44:32', 0, 0),
(14, 'our-aim', '', 'dsgsd', '2019-08-21 11:46:40', 0, 0),
(15, 'our-aim', 'Nurdaulet Maksutov', 'Hai', '2019-08-21 11:50:24', 0, 0),
(16, 'our-aim', 'Nurdaulet Maksutov', 'Hai', '2019-08-21 11:50:30', 0, 0),
(17, 'loremipsum', 'Nurdaulet Maksutov', 'Nurdaulet', '2019-08-21 15:16:48', 0, 11),
(18, 'our-aim', 'Nurdaulet Maksutov', 'daDSA', '2019-08-21 17:25:36', 0, 11),
(19, 'our-aim', 'Nurdaulet Maksutov', 'SDSA', '2019-08-21 17:25:39', 0, 11),
(20, 'our-aim', 'Nurdaulet Maksutov', 'regre', '2019-08-21 17:29:39', 0, 11),
(21, 'our-aim', 'Nurdaulet Maksutov', 'egrewg', '2019-08-21 17:29:45', 0, 11),
(22, 'our-aim', 'Nurdaulet Maksutov', 'gergre', '2019-08-21 17:31:25', 0, 11),
(23, 'our-aim', 'Zhandos Bolatov', 'Hai', '2019-08-21 17:32:16', 0, 13),
(24, 'our-aim', 'Zhandos Bolatov', 'cxbcxbcx', '2019-08-21 17:32:24', 0, 13),
(25, 'our-aim', 'Zhandos Bolatov', 'ri', '2019-08-21 17:32:37', 0, 13),
(26, 'our-aim', 'Zhandos Bolatov', '1', '2019-08-21 17:33:16', 0, 13),
(27, 'our-aim', 'Zhandos Bolatov', 'gds', '2019-08-21 17:33:22', 0, 13),
(28, 'our-aim', 'Nurdaulet Maksutov', 'Zhandos Bolatov , Басың жасамамайт', '2019-08-21 17:36:45', 0, 11),
(29, 'our-aim', 'Nurdaulet Maksutov', 'кур', '2019-08-21 17:37:17', 0, 11),
(30, 'our-aim', 'Nurdaulet Maksutov', 'рыр', '2019-08-21 17:38:50', 0, 11),
(31, 'our-aim', 'Nurdaulet Maksutov', 'retrey', '2019-08-21 17:41:33', 0, 11),
(32, 'our-aim', 'Nurdaulet Maksutov', 'hjrjtr', '2019-08-21 17:41:34', 0, 11),
(33, 'our-aim', 'Nurdaulet Maksutov', 'rjhrtj', '2019-08-21 17:41:37', 0, 11),
(34, 'our-aim', 'dsb', 'bdbdf', '2019-08-21 17:41:57', 0, 0),
(35, 'our-aim', 'Nurdaulet Maksutov', 'dsb', '2019-08-21 17:42:00', 0, 11),
(36, 'our-aim', 'dsb', 'fgj', '2019-08-21 17:45:17', 0, 0),
(37, 'our-aim', 'Nurdaulet Maksutov', 'wegew', '2019-08-21 17:53:53', 0, 11),
(38, 'our-aim', 'dsb', 'gwegwer', '2019-08-21 17:54:54', 0, 0),
(39, 'our-aim', 'dsb', 'jjrt', '2019-08-21 17:55:44', 0, 0),
(40, 'our-aim', 'dsb', 'gwegw', '2019-08-21 17:55:50', 0, 0),
(41, 'our-aim', 'dsb', 'gre', '2019-08-21 17:56:07', 0, 0),
(42, 'our-aim', 'Shapagat', 'Қызық екен', '2019-08-21 17:56:53', 0, 0),
(43, 'our-aim', 'Nurdaulet Maksutov', 'Shapagat , Иә соны айтам', '2019-08-21 17:57:02', 0, 11),
(44, 'our-aim', 'Shapagat Maksutov', 'Shapagat , Eiii basn zhasaiuma', '2019-08-21 18:13:46', 0, 0),
(45, 'our-aim', 'Nurdaulet Maksutov', 'Shapagat Maksutov , Oziniki shamaid', '2019-08-21 18:14:08', 0, 11),
(46, 'our-aim', 'bolat', 'aggdgf', '2019-08-21 18:14:23', 0, 0),
(47, 'our-aim', 'Nurdaulet Maksutov', 'bolat , Kumash', '2019-08-21 18:15:15', 0, 11),
(48, 'our-aim', 'bolat', 'Nurdaulet Maksutov , Eiii', '2019-08-21 18:15:22', 0, 0),
(49, 'our-aim', 'Nurdaulet Maksutov', 'Nuirda', '2019-08-21 18:15:49', 0, 11),
(50, 'our-aim', 'bolat', 'sgweh', '2019-08-21 18:15:51', 0, 0),
(51, 'our-aim', 'Maksutov Nurdaulet', 'f', '2019-08-28 13:46:06', 0, 11),
(52, 'our-aim', 'Nurdaulet Maksutov', 'as', '2019-08-28 13:46:33', 0, 0),
(53, 'our-aim', 'Nurdaulet Maksutov', 'Nurdaulet Maksutov , Ne bold tagi', '2019-08-28 13:51:19', 0, 0),
(54, 'asd', 'Maksutov Nurdaulet', 'dwq', '2019-08-28 13:58:15', 0, 11),
(55, 'rezinkadan-songy-kadr-nublog', 'Maksutov Nurdaulet', 'First', '2019-08-30 19:28:26', 0, 11);

-- --------------------------------------------------------

--
-- Структура таблицы `counter`
--

CREATE TABLE `counter` (
  `id` int(11) NOT NULL,
  `agent` text NOT NULL,
  `uri` text NOT NULL,
  `ip` text NOT NULL,
  `ref` text NOT NULL,
  `date` text NOT NULL,
  `uid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `counter`
--

INSERT INTO `counter` (`id`, `agent`, `uri`, `ip`, `ref`, `date`, `uid`) VALUES
(188, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', 'our-aim', '::1', 'http://localhost/nublog/', '19 08 31 19', 'none'),
(189, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', 'policy', '::1', 'http://localhost/nublog/index.php', '19 08 31 19', '11'),
(190, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', 'loremipsum', '::1', 'http://localhost/nublog/index.php', '19 08 31 19', '11'),
(191, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', 'rezinkadan-songy-kadr-nublog', '::1', 'http://localhost/nublog/index.php', '19 08 31 19', '11'),
(192, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', 'tyjtjty', '::1', 'http://localhost/nublog/index.php', '19 08 31 19', '11');

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `uri` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `stxt` text NOT NULL,
  `ftxt` text NOT NULL,
  `image` text NOT NULL,
  `alt` text NOT NULL,
  `date` datetime NOT NULL,
  `autor` text NOT NULL,
  `desc` text NOT NULL,
  `keys` text NOT NULL,
  `block` int(11) NOT NULL DEFAULT 0,
  `last_date` datetime NOT NULL,
  `uid` int(11) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `uri`, `title`, `stxt`, `ftxt`, `image`, `alt`, `date`, `autor`, `desc`, `keys`, `block`, `last_date`, `uid`, `views`) VALUES
(1, 'loremipsum', 'Қалайсыңдар өздерің', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi cumque explicabo fugiat quasi necessitatibus consequatur. Tempora, velit aut cum dolorem?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae praesentium cumque repellendus libero. Odit saepe a beatae officiis distinctio illum et, minima, nostrum ullam maiores repellat dolorum, dolorem possimus dicta illo eius. Suscipit ex quia ipsam, asperiores tempore, nostrum cum molestias, modi facere esse labore in est dignissimos repudiandae? Rem?\r\n							<img src=\"https://hsto.org/webt/mx/7h/yr/mx7hyrh8ms-5uuolkemexd9jkvo.jpeg\" alt=\"\" style=\"width: 100%; \">\r\n							<figcaption>Махот Шапок</figcaption><br>\r\n							Lorem ipsum dolor sit amet, consectetur <a href=\"\"></a>dipisicing elit. Ea necessitatibus numquam, eum fugiat voluptates natus nesciunt neque vel eaque vitae consectetur quod consequatur animi hic facere cumque sit exercitationem accusantium quasi facilis modi et.', 'https://ik.imagekit.io/demo/img/image4.jpeg?tr=w-400,h-300', '', '2019-08-17 13:33:29', 'Нұрдәулет Максутов', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, cupiditate. Porro doloremque, distinctio aliquam tempore.', '', 1, '2019-08-10 12:33:29', 11, 15),
(89, 'our-aim', 'Сайтымыздың ашылу мақсаты', 'Ассаламуәлейкүм достар! Бұл сайтымыздың алғашқы жазбасы. Бүгіннен бастап сайт жұмысына кіріседі. Біздің басты мақсат бұл оқырманды қызықты мәлметтермен таң қалдыру, білмегенді үйрету және де адамдарды қазақша контентпен қызықтырып оны дамыту болып саналады. ', '<u style=\"\"><strike style=\"\"><i><b style=\"background-color: rgb(255, 40, 40);\"><font color=\"#ffffff\">Nurdaulet Maskutovf</font></b></i></strike></u>', 'https://ik.imagekit.io/demo/img/image9.jpeg?tr=w-400,h-300', 'aim girl office nublog', '2019-08-21 15:03:22', 'Nurdaulet Maksutov', 'Ассаламуәлейкүм достар! Бұл сайтымыздың алғашқы жазбасы. Бүгіннен бастап сайт жұмысына кіріседі. Біздің басты мақсат бұл оқырманды қызықты мәлметтермен таң қалдыру, білмегенді үйрету және де адамдарды қазақша контентпен қызықтырып оны дамыту болып саналады. ', 'nurdaulet maksutov nublog kazakh photoshop site html css aim', 0, '2019-08-29 15:22:06', 11, 43),
(92, 'policy', 'Жеке деректерді өңдеу және құпиялық саясаты - NuBlog', 'Жеке дереектерді өңдеу және құпиялық саясаты / Оброботка личных данных и политика конфиденциальности', '<h1><b><font color=\"#1c1a24\" size=\"5\">Жеке деректерді өңдеу және құпиялық\nсаясаты</font></b></h1><br>\n<span class=\"policy-content\">\nҚолданушы жеке және де басқа деректерді операторға бере отырып төменде көрсетілген шарттармен келісуін растайды. <br>\n<b style=\"color: red;\">Егер Қолданушы осы шарттармен келіспесе, ол сайтты пайдалануды тоқтауға міндетті!</b><br>\n<b>Осы саясатты сөзсіз қабылдау пайдаланушының сайтты пайдалануды бастауы болып табылады;</b><br><br>\n<font color=\"#201e28\"><b>1. Жеке мәліметтерді жинау және өңдеу</b> <br>\n1.1 Оператор тек пайдаланушымен өзара әрекеттесу үшін қызметтерді ұсыну үшін және сайтты қолдануды жеңілдету үшін қажет деректерді жинайды; <br>\n1.2 Мәліметтер келесі мақсаттар үшін жиналуы мүмкін: <br>\n1.2.1 Пайдаланушыға қызмет көрсету үшін;<br>\n1.2.2 Пайдаланушыны растау үшін (сәйкестендіру);<br>\n1.2.3 Пайдаланушымен әрекеттесу үшін; <br>\n1.2.4 Пайдаланушыға жарнамалық материалдар, ақпараттар мен сұраныстар жіберу үшін; <br>\n1.2.5 Статистикалық және басқа зерттеулер үшін; <br>\n1.2.6 Парольды қайтару үшін; <br>\n1.3 Оператор сонымен қатар келесі деректерді өңдейді:<br>\n1.3.1 Аты-жөні(тегі, аты);<br>\n1.3.2 Электрондық пошта мекенжайы(адресс электронной почты); <br>\n1.3.3 Телефон номеры <br>\n1.3.4 Ip адресс(Мекен-жайы);<br>\n1.3.5 Сайтта болған уақыты;<br>\n1.4 Пайдаланушыға Сайтта үшінші тұлғалардың жеке деректерін көрсетуге тыйым салынады (осы тұлғалардың мүдделерін білдіру жағдайлары мен мұндай әрекеттерді орындауға үшінші тұлғалардың құжатпен расталған жағдайларын қоспағанда);\n<br><br>\n<b>2. Жеке және басқа мәліметтерді өңдеу процедурасы(реті)</b> <br>\n2.1 Оператор Жеке деректерді Қазақстан Республикасының Жеке деректері туралы заңға және Оператордың ішкі құжаттарына сәйкес пайдалануға міндеттенеді;<br>\n2.2 Жеке мәліметтер және басқа пайдаланушы деректеріне қатысты мәліметтер қол жетімді болмаса, олардың құпиялылығы сақталады. <br>\n2.3 Оператор деректердің мұрағаттық көшірмесін (архивную копию) сақтауға құқылы. Және де оларды Қазақстан Республикасының аумағынан тыс серверлерде сақтауға құқылы. <br>\n2.4 Оператор жеке және пайдаланушы деректерін пайдаланушының келісімінсіз келесі тұлғаларға беруге құқылы: <br>\n2.4.1 Мемлекеттік органдарға, оның ішінде анықтау және тергеу органдары және жергілікті өзін-өзі басқару органдарың дәлелді өтініші бойынша; <br>\n2.4.2 Қазақстан Республикасының қолданыстағы заңнамасында тікелей көзделген басқа жағдайларда. <br>\n2.5 Келесі жағдайларда оператор жеке мәліметтерді Құпиялық саясатының 2.4 бөлімінде көрсетілмеген тұлғаларға беругее құқылы: <br>\n2.5.1 Пайдаланушы мұндай әрекеттерге келіскен жағдайда; <br>\n2.5.2 Пайдаланушының сайтты пайдалануы немесе оның қызметтер көрсету бөлігі ретінде қажеттілік туындаған жағдайды;&nbsp; <br>\n2.6 Қолданушы жайлы мәлімет қолданушы компютерінде cookie файл ретінде сақталады;<br>\n2.9 Оператор қолданушы рұқсатынсыз профиліне кіруге құқылы; <br>\n2.8 Оператор жеке деректерді автоматты түрде өңдеуді қолданады; <br><br>\n<b>3. Жеке мәліметтердің қорғалуы</b><br>\n3.1 Пайдаланылатын қорғау шаралары жеке деректерді заңсыз немесе кездейсоқ қол жеткізу, жою, өзгерту, блоктау, көшіру, тарату, сондай-ақ олармен бірге үшінші тұлғалардың басқа да заңсыз әрекеттерінен қорғауды қамтиды. <br>\n3.2 Оператор Заңға сәйкес жеке және басқа да деректерді тиісті түрде қорғауға қажетті және жеткілікті ұйымдастырушылық және техникалық шараларды қабылдауға міндетті. <br><br>\n<b>4. Басқа ережелер</b> <br>\n4.1 Қазақстан Республикасының заңнамасы осы Құпиялылық Саясатына және Пайдаланушы мен Оператор арасындағы Құпиялылық саясатын қолдануға байланысты туындайтын қатынастарға қолданылады. <br>\n4.2 Осы Келісімнен туындайтын барлық даулар Оператордың тіркелген жерінде қолданыстағы заңнамаға сәйкес шешіледі. <br>\n3.3 Сотқа жүгіну алдында Пайдаланушы міндетті сот процедурасын сақтауға және тиісті шағымды Операторға жазбаша түрде жіберуге міндетті. Шағымға жауап беру мерзімі 40 (отыз) жұмыс күнін құрайды. <br>\n4.4 Егер қандай да бір себептермен Құпиялылық саясатының бір немесе бірнеше ережелері жарамсыз немесе орындалуға жарамсыз деп танылса, бұл құпиялылық саясатының қалған ережелерінің жарамдылығына немесе қолданылуына әсер етпейді. <br>4.5 Оператор кез-келген уақытта Пайдаланушының алдын ала келісімінсіз құпиялылық саясатын (толық немесе ішінара) біржақты тәртіпте өзгертуге құқылы. Барлық өзгертулер сайтта жариялана бермейді; <br>\n4.6 Пайдаланушы осы басылымды оқып отырып, Құпиялылық саясатындағы өзгерістерді өздігінше бақылауға алуы тиіс; <br>\n4 .7 Осы Құпиялылық Саясаты бойынша барлық ұсыныстар мен сұрақтарды мына мекен-жайға жіберу керек: <i><b>kz_wikipedia@mail.ru</b></i> немесе&nbsp;</font>\n</span><u style=\"display: inline !important;\"><a href=\"http://vk.com/kz.wikipedia\" style=\"display: inline !important;\" target=\"_blank\">vk.com/kz.wikipedia</a></u><div><u><br></u>\n<div><img src=\"https://adventuregraphics.co.uk/wp-content/uploads/2018/03/GDPR-managing-data-thegem-blog-default-large.png\"><br></div></div>', 'https://www.techdonut.co.uk/sites/default/files/free_it_policy_templates_287157809.jpg', 'policy', '2019-08-28 21:50:21', 'Maksutov Nurdaulet', 'Бұл бетте сіз жеке және де басқа деректерді операторға бере отырып келісуге міндетті шарттар тізімін табасыз.', 'құпиялық саясаты нублог политика конфиденциальности шарттар жеке мәліметтерді өңдеу оброботка данных', 2, '2019-08-29 10:15:48', 11, 5),
(94, 'rezinkadan-songy-kadr-nublog', 'Резинкадан соңғы кадр', 'Әлемге аты әйгілі болған 4 түсті резинкалар бір сәтті 1 түс болды. Бұл жайлы Нұрдәулет Максутов хабарламақ.', '<h1><font size=\"5\"><i>Резинкадан соңғы кадр</i></font></h1><div><i style=\"\">Әлемге аты әйгілі болған <b>4</b> түсті резинкалар <b>бір сәтті 1</b> түс болып жерге шашылып қалған. Бұл жағдайға басты себекер болған Шапағат Мақсот болатын. Және де біздің репартерымыз Нұрдәулет Максутовтың да бұған қатысы болып шықты. Кейін ол <b>\"кішкентай бөлмеден\"</b> қашып шықты. Оның айтуынша Шапағаттың қолдары мүйізге айналып оны қуып шыққан!</i></div><div><font size=\"2\" style=\"\"><i>Соңғы кадрды төменнен көріңіз.</i></font></div><div><img src=\"img/1.jpg\"><figcaption><i style=\"\"><font size=\"2\" color=\"#8d8d8d\">Материял Максутовтар отбасысынан</font></i></figcaption></div>', 'img/2.jpg', 'shapagat rezinka last kadr picture foto', '2019-08-30 18:39:09', 'Maksutov Nurdaulet', 'Әлемге аты әйгілі болған 4 түсті резинкалар бір сәтті 1 түс болды. Бұл жайлы Нұрдәулет Максутов хабарламақ.', 'резинкадан соңғы кадр', 0, '2019-08-30 22:20:32', 11, 12),
(95, 'tyjtjty', 'hrthr', 'trjtyj', 'jtyjty', 'jytjt', 'jtjtyy', '2019-08-31 21:37:45', 'Maksutov Nurdaulet', 'tyjtyjt', 'jtyjty', 1, '2019-08-31 21:37:45', 11, 1),
(96, 'tyjtjty', 'hrthr', 'trjtyj', 'jtyjty', 'jytjt', 'jtjtyy', '2019-08-31 21:37:45', 'Maksutov Nurdaulet', 'tyjtyjt', 'jtyjty', 1, '2019-08-31 21:37:45', 11, 1),
(97, 'ytjtyj', 'tyjtyj', 'tjtyjty', 'jytjtyjt', '', '', '2019-08-31 21:38:11', 'Maksutov Nurdaulet', 'tyjtyjty', 'jytjtyj', 1, '2019-08-31 21:38:11', 11, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `token` text NOT NULL,
  `date` datetime NOT NULL,
  `token2` text NOT NULL,
  `last_date` datetime NOT NULL,
  `ava` text NOT NULL DEFAULT 'https://c.radikal.ru/c19/1907/b2/b31eba3d123d.jpg',
  `token3` text NOT NULL,
  `ip` text NOT NULL,
  `block` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `token`, `date`, `token2`, `last_date`, `ava`, `token3`, `ip`, `block`) VALUES
(11, 'Maksutov Nurdaulet', 'kz_wikipedia@mail.ru', '7629b7aa7fc39727e806b5656cd34360', '2019-08-05 17:46:33', 'da185dfb75e88cb256f68abd200c4168', '2019-08-05 17:46:33', 'http://localhost/nublog/img/1.jpg', '79e20a1fbfd85f40e8b1d7902ef2966f', '::1', 2),
(12, 'Шапағат Мақсот', 'saginish870375@gmail.com', '7e907456fd229123bf2ab8db5c660ab4', '2019-08-05 21:23:43', '05b26104430d1c784d8ff9d19559427e', '2019-08-05 21:23:43', 'http://localhost/nublog/img/shikan.jpg', '74be83e754023fe48d59a37c59509d1f', '::1', 2),
(13, 'Zhandos Bolatov', 'zhandos@mail.ru', 'feec421d2aadc1ec9d5a8198f38a1834', '2019-08-14 12:22:38', '1949268cd7bbdaa709df0b685cfbbccd', '2019-08-14 12:22:38', 'http://localhost/nublog/img/1.jpg', '24b35ff331bf4e6674b823629dc411a3', '::1', 0),
(15, 'Erkebulan Nauryzbai', 'erke@mail.ru', '51890f752425102769ddbd35683ea518', '2019-08-14 16:20:36', 'ff6b9d8f588809cca3eab39344ce1315', '2019-08-14 16:20:36', 'https://c.radikal.ru/c19/1907/b2/b31eba3d123d.jpg', '3a963ec4363d5b40317bd66756922e34', '::1', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `changes`
--
ALTER TABLE `changes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `posts` ADD FULLTEXT KEY `title` (`title`);
ALTER TABLE `posts` ADD FULLTEXT KEY `ftxt` (`ftxt`,`stxt`);
ALTER TABLE `posts` ADD FULLTEXT KEY `stxt` (`stxt`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `changes`
--
ALTER TABLE `changes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT для таблицы `counter`
--
ALTER TABLE `counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

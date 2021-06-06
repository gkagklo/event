-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 06 Ιουν 2021 στις 13:35:38
-- Έκδοση διακομιστή: 10.4.16-MariaDB
-- Έκδοση PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `event`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `amenities`
--

CREATE TABLE `amenities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `amenities`
--

INSERT INTO `amenities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Regular Seating', '2020-11-27 11:37:38', '2020-11-27 11:37:38'),
(2, 'Coffee Break', '2020-11-27 11:38:01', '2020-11-27 11:38:01'),
(3, 'Custom Badge', '2020-11-27 11:38:11', '2020-11-27 11:38:11'),
(4, 'Community Access', '2020-11-27 11:38:19', '2020-11-27 11:38:19'),
(5, 'Workshop Access', '2020-11-27 11:38:30', '2020-11-27 11:38:30'),
(9, 'After Party', '2020-11-27 14:50:48', '2020-11-27 14:50:48');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `amenity_ticket`
--

CREATE TABLE `amenity_ticket` (
  `amenity_id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `amenity_ticket`
--

INSERT INTO `amenity_ticket` (`amenity_id`, `ticket_id`, `created_at`, `updated_at`) VALUES
(1, 15, NULL, NULL),
(1, 16, NULL, NULL),
(2, 16, NULL, NULL),
(3, 16, NULL, NULL),
(4, 16, NULL, NULL),
(1, 18, NULL, NULL),
(2, 18, NULL, NULL),
(3, 18, NULL, NULL),
(4, 18, NULL, NULL),
(5, 18, NULL, NULL),
(9, 18, NULL, NULL),
(2, 15, NULL, NULL),
(3, 15, NULL, NULL);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `checkouts`
--

CREATE TABLE `checkouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `ticket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `checkouts`
--

INSERT INTO `checkouts` (`id`, `name`, `lastname`, `email`, `phone`, `qty`, `total`, `ticket`, `created_at`, `updated_at`) VALUES
(39, 'geo', 'gkagklo', 'deathbreakerxx@hotmail.com', '6981472584', 2, '500.00', 'PRO ACCESS', '2020-12-03 17:25:31', '2020-12-03 17:25:31'),
(40, 'leonidas', 'serasis', 'deathbreakerxx@hotmail.com', '6982583695', 1, '150.00', 'STANDARD ACCESS', '2020-12-03 17:26:37', '2020-12-03 17:26:37');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'Non consectetur a erat nam at lectus urna duis?', 'Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.', '2020-11-26 18:20:39', '2020-11-26 18:20:39'),
(2, 'Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?', 'Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.', '2020-11-26 18:22:07', '2020-11-26 18:22:07'),
(3, 'Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi?', 'Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis', '2020-11-26 18:22:34', '2020-11-26 18:22:34'),
(4, 'Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?', 'Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.', '2020-11-26 18:22:51', '2020-11-26 18:22:51'),
(5, 'Tempus quam pellentesque nec nam aliquam sem et tortor consequat?', 'Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in', '2020-11-26 18:23:09', '2020-11-26 18:23:09'),
(6, 'Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor?', 'Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.', '2020-11-26 18:23:31', '2020-11-26 18:23:31');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `galleries`
--

INSERT INTO `galleries` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, '1_1606421572.jpg', '2020-11-26 18:12:52', '2020-11-26 18:12:52'),
(2, '2_1606421578.jpg', '2020-11-26 18:12:58', '2020-11-26 18:12:58'),
(3, '3_1606421584.jpg', '2020-11-26 18:13:04', '2020-11-26 18:13:04'),
(4, '4_1606421590.jpg', '2020-11-26 18:13:10', '2020-11-26 18:13:10'),
(5, '5_1606421597.jpg', '2020-11-26 18:13:17', '2020-11-26 18:13:17'),
(6, '6_1606421603.jpg', '2020-11-26 18:13:23', '2020-11-26 18:13:23'),
(7, '7_1606421610.jpg', '2020-11-26 18:13:30', '2020-11-26 18:13:30'),
(8, '8_1606421617.jpg', '2020-11-26 18:13:37', '2020-11-26 18:13:37'),
(11, 'microphone-rental_1608412348.jpg', '2020-12-19 19:12:28', '2020-12-19 19:12:28');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `hotels`
--

CREATE TABLE `hotels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` decimal(8,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `address`, `description`, `rating`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Hotel 1', 'Downtown', '0.4 Mile from the Venue', '5.00', '1_1606421010.jpg', '2020-11-26 18:03:30', '2020-11-26 18:03:30'),
(2, 'Hotel 2', 'Dubai Mall', '0.5 Mile from the Venue', '4.00', '2_1606421313.jpg', '2020-11-26 18:08:33', '2020-11-26 18:08:33'),
(3, 'Hotel 3', 'Boulevard', '0.6 Mile from the Venue', '3.00', '3_1606421341.jpg', '2020-11-26 18:09:01', '2020-11-26 18:09:32'),
(5, 'Melia', 'Address 101', 'Melia hotel destination', '3.50', 'melia_327834531_1608411623.jpg', '2020-12-19 19:00:23', '2020-12-19 19:04:43');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_11_19_154834_create_roles_table', 1),
(4, '2020_11_19_155326_create_role_user_table', 1),
(5, '2020_11_20_150148_create_speakers_table', 1),
(6, '2020_11_22_143602_create_sponsors_table', 1),
(7, '2020_11_23_135319_create_faqs_table', 1),
(8, '2020_11_23_144605_create_galleries_table', 1),
(9, '2020_11_24_101209_create_hotels_table', 1),
(10, '2020_11_24_124835_create_schedules_table', 1),
(11, '2020_11_25_191511_create_settings_table', 1),
(12, '2020_11_26_131051_create_venues_table', 1),
(13, '2020_11_27_132453_create_amenities_table', 2),
(14, '2020_11_27_143459_create_tickets_table', 3),
(15, '2020_11_27_152016_create_amenity_tickets_table', 4),
(16, '2020_11_27_155701_create_amenity_ticket_table', 5),
(17, '2020_11_27_191427_create_amenity_ticket_table', 6),
(18, '2020_11_30_113521_create_checkouts_table', 7),
(19, '2020_12_01_133012_create_venues_table', 8),
(20, '2020_12_04_142317_create_contacts_table', 9),
(21, '2020_12_04_151731_create_subscribers_table', 10);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('deathbreakerxx@hotmail.com', '$2y$10$0hyAfiliAsn.tuSEzkH3h.cH8xfiz0FSPyAJlKYfNPBn8TedpiiYG', '2021-02-27 18:15:07');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2020-11-26 17:11:37', '2020-11-26 17:11:37'),
(2, 'user', '2020-11-26 17:11:37', '2020-11-26 17:11:37');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `speaker_id` bigint(20) UNSIGNED NOT NULL,
  `day_number` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `schedules`
--

INSERT INTO `schedules` (`id`, `speaker_id`, `day_number`, `start_time`, `title`, `subtitle`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '09:00:00', 'Keynote', 'Facere provident incidunt quos voluptas.', '2020-11-26 17:44:49', '2020-11-26 17:44:49'),
(2, 5, 1, '11:00:00', 'Et voluptatem iusto dicta nobis.', 'Maiores dignissimos neque qui cum accusantium ut sit sint inventore.', '2020-11-26 17:46:05', '2020-11-26 17:46:05'),
(3, 6, 2, '09:00:00', 'Explicabo et rerum quis et ut ea.', 'Veniam accusantium laborum nihil eos eaque accusantium aspernatur.', '2020-11-26 17:46:50', '2020-11-26 17:46:50'),
(4, 7, 2, '11:00:00', 'Qui non qui vel amet culpa sequi.', 'Nam ex distinctio voluptatem doloremque suscipit iusto.', '2020-11-26 17:47:25', '2020-11-26 17:47:25'),
(5, 8, 3, '09:00:00', 'Quos ratione neque expedita asperiores.', 'Eligendi quo eveniet est nobis et ad temporibus odio quo.', '2020-11-26 17:48:43', '2020-11-26 17:48:43'),
(6, 9, 3, '11:00:00', 'Quo qui praesentium nesciunt', 'Voluptatem et alias dolorum est aut sit enim neque veritatis.', '2020-11-26 17:49:25', '2020-11-26 17:49:25'),
(8, 10, 1, '13:00:00', 'Another journey chamber way yet females man.', 'Way extensive and dejection get delivered deficient sincerity gentleman age.', '2020-12-19 18:56:24', '2020-12-19 18:56:24');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'title', 'The Annual<br><span>Marketing</span> Conference', '2020-11-26 17:13:01', '2020-12-19 18:57:49'),
(2, 'subtitle', '10-12 December, Downtown Conference Center, New York', '2020-11-26 17:13:23', '2020-11-26 17:13:23'),
(3, 'youtube_link', 'https://www.youtube.com/watch?v=jDDaplaOz7Q', '2020-11-26 17:13:40', '2020-11-26 17:13:40'),
(4, 'about_description', 'Sed nam ut dolor qui repellendus iusto odit. Possimus inventore eveniet accusamus error amet eius aut accusantium et. Non odit consequatur repudiandae sequi ea odio molestiae. Enim possimus sunt inventore in est ut optio sequi unde.', '2020-11-26 17:14:34', '2020-11-26 17:14:34'),
(5, 'about_where', 'Downtown Conference Center, New York', '2020-11-26 17:14:54', '2020-11-26 17:14:54'),
(6, 'about_when', 'Monday to Wednesday<br>10-12 December', '2020-11-26 17:15:11', '2020-11-26 17:15:11'),
(7, 'contact_address', 'A108 Adam Street, NY 535022, USA', '2020-11-26 17:15:32', '2020-11-26 17:15:32'),
(8, 'contact_phone', '+1 5589 55488 55', '2020-11-26 17:15:47', '2020-11-26 17:15:47'),
(9, 'contact_email', 'info@example.com', '2020-11-26 17:16:01', '2020-11-26 17:16:01'),
(10, 'footer_description', 'In alias aperiam. Placeat tempore facere. Officiis voluptate ipsam vel eveniet est dolor et totam porro. Perspiciatis ad omnis fugit molestiae recusandae possimus. Aut consectetur id quis. In inventore consequatur ad voluptate cupiditate debitis accusamus repellat cumque.', '2020-11-26 17:16:48', '2020-11-26 17:16:48'),
(11, 'footer_twitter', '#', '2020-11-26 17:17:04', '2020-11-26 17:17:04'),
(12, 'footer_facebook', '#', '2020-11-26 17:17:12', '2020-11-26 17:17:12'),
(13, 'footer_instagram', '#', '2020-11-26 17:17:18', '2020-11-26 17:17:18'),
(14, 'footer_googleplus', '#', '2020-11-26 17:17:25', '2020-11-26 17:17:25'),
(15, 'footer_linkedin', '#', '2020-11-26 17:17:32', '2020-11-26 17:17:32'),
(16, 'latitude', '40.7101282', '2020-12-04 11:58:35', '2020-12-04 11:58:35'),
(17, 'longitude', '-74.0062269', '2020-12-04 11:58:52', '2020-12-04 11:58:52'),
(18, 'venue_address', 'Downtown Conference Center, New York', '2020-12-04 11:59:46', '2020-12-04 12:03:09'),
(19, 'venue_description', 'Iste nobis eum sapiente sunt enim dolores labore accusantium autem. Cumque beatae ipsam. Est quae sit qui voluptatem corporis velit. Qui maxime accusamus possimus. Consequatur sequi et ea suscipit enim nesciunt quia velit.', '2020-12-04 12:00:08', '2020-12-04 12:00:08');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `speakers`
--

CREATE TABLE `speakers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `googleplus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `speakers`
--

INSERT INTO `speakers` (`id`, `name`, `description`, `full_description`, `image`, `twitter`, `facebook`, `googleplus`, `linkedin`, `created_at`, `updated_at`) VALUES
(4, 'Brenden Legros', 'Quas alias incidunt', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\r\n<br>\r\nDonec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend', '1_1606418702.jpg', '#', '#', '#', '#', '2020-11-26 17:25:02', '2020-11-27 10:59:55'),
(5, 'Hubert Hirthe', 'Consequuntur odio aut', 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores. At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles. Ma quande lingues coalesce, li grammatica del resultant lingue es plu simplic e', '2_1606418732.jpg', '#', '#', '#', '#', '2020-11-26 17:25:32', '2020-11-27 11:02:54'),
(6, 'Cole Emmerich', 'Fugiat laborum et', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is', '3_1606418748.jpg', '#', '#', '#', '#', '2020-11-26 17:25:48', '2020-11-27 11:02:40'),
(7, 'Jack Christiansen', 'Debitis iure vero', 'The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. If several languages coalesce, the grammar of the', '4_1606418773.jpg', '#', '#', '#', '#', '2020-11-26 17:26:13', '2020-11-27 11:03:07'),
(8, 'Alejandrin Littel', 'Qui molestiae natus', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.<br>\r\nNemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore', '5_1606418793.jpg', '#', '#', '#', '#', '2020-11-26 17:26:33', '2020-11-27 11:01:19'),
(9, 'Willow Trantow', 'Non autem dicta', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an', '6_1606418810.jpg', '#', '#', '#', '#', '2020-11-26 17:26:50', '2020-11-27 11:03:17'),
(10, 'Christina Saridou', 'Elquada de treanier', 'One advanced diverted domestic sex repeated bringing you old. Possible procured her trifling laughter thoughts property she met way. Companions shy had solicitude favourable own. Which could saw guest man now heard but. Lasted my coming uneasy marked so should. Gravity letters it amongst herself dearest an windows by. Wooded ladies she basket season age her uneasy saw. Discourse unwilling am no described dejection incommode no listening of. Before nature his parish boy.', 'IWD-WomenSpeakers_1608410951.jpg', '#', '#', '#', '#', '2020-12-19 18:49:11', '2020-12-19 18:50:24');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `sponsors`
--

CREATE TABLE `sponsors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `sponsors`
--

INSERT INTO `sponsors` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'STRIDER', '1_1606421759.png', '2020-11-26 18:15:59', '2020-11-26 18:15:59'),
(2, 'runtastic', '2_1606421783.png', '2020-11-26 18:16:23', '2020-11-26 18:16:23'),
(3, 'EditShare', '3_1606421796.png', '2020-11-26 18:16:36', '2020-11-26 18:16:36'),
(4, 'InFocus', '4_1606421812.png', '2020-11-26 18:16:52', '2020-11-26 18:16:52'),
(5, 'gategroup', '5_1606421827.png', '2020-11-26 18:17:07', '2020-11-26 18:17:07'),
(6, 'CADENT', '6_1606421840.png', '2020-11-26 18:17:20', '2020-11-26 18:17:20'),
(7, 'ceph', '7_1606421853.png', '2020-11-26 18:17:33', '2020-11-26 18:17:33'),
(8, 'litalia', '8_1606421864.png', '2020-11-26 18:17:44', '2020-11-26 18:17:44'),
(10, 'Adidas', 'adidas-logo-1_1608412601.png', '2020-12-19 19:14:43', '2020-12-19 19:16:41');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `subscribers`
--

INSERT INTO `subscribers` (`id`, `mail`, `created_at`, `updated_at`) VALUES
(7, 'test@hotmail.com', '2020-12-04 13:58:40', '2020-12-04 13:58:40'),
(9, 'gg@hotmail.com', '2020-12-04 14:24:45', '2020-12-04 14:24:45');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `tickets`
--

INSERT INTO `tickets` (`id`, `name`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(15, 'STANDARD ACCESS', '150.00', 29, '2020-11-27 17:24:06', '2020-12-03 17:26:37'),
(16, 'PRO ACCESS', '250.00', 28, '2020-11-27 17:31:27', '2020-12-03 17:25:31'),
(18, 'PREMIUM ACCESS', '350.00', 50, '2020-11-27 18:01:58', '2020-12-03 17:14:59');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'deathbreakerxx@hotmail.com', NULL, '$2y$10$riNNlMlOytn7I7U0grNGIefEe4ubxrSaZHBPeKvNsc9oCZAT2aTqO', 'y3XYi7QEsBXcgY6YpPGPWGwoqC8vyo2og0ZCHCa1GjXgt3WEBF8O9yXJY0OV', '2020-11-26 17:11:38', '2020-12-03 19:26:08'),
(2, 'User', 'user@user.com', NULL, '$2y$10$8V142uSkSHZqGGSx6Uz.3eIuTDboroZSYuAtqYExMPSe5ENghmfcy', NULL, '2020-11-26 17:11:38', '2020-11-26 17:11:38');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Ευρετήρια για πίνακα `amenity_ticket`
--
ALTER TABLE `amenity_ticket`
  ADD KEY `amenity_ticket_amenity_id_foreign` (`amenity_id`),
  ADD KEY `amenity_ticket_ticket_id_foreign` (`ticket_id`);

--
-- Ευρετήρια για πίνακα `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Ευρετήρια για πίνακα `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedules_speaker_id_foreign` (`speaker_id`);

--
-- Ευρετήρια για πίνακα `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `speakers`
--
ALTER TABLE `speakers`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT για πίνακα `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT για πίνακα `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT για πίνακα `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT για πίνακα `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT για πίνακα `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT για πίνακα `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT για πίνακα `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT για πίνακα `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT για πίνακα `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT για πίνακα `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT για πίνακα `speakers`
--
ALTER TABLE `speakers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT για πίνακα `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT για πίνακα `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT για πίνακα `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `amenity_ticket`
--
ALTER TABLE `amenity_ticket`
  ADD CONSTRAINT `amenity_ticket_amenity_id_foreign` FOREIGN KEY (`amenity_id`) REFERENCES `amenities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `amenity_ticket_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE;

--
-- Περιορισμοί για πίνακα `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_speaker_id_foreign` FOREIGN KEY (`speaker_id`) REFERENCES `speakers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

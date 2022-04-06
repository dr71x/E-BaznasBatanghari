-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2022 at 10:41 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baznas`
--

-- --------------------------------------------------------

--
-- Table structure for table `beritas`
--

CREATE TABLE `beritas` (
  `id` int(10) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `tipe_id` int(10) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `beritas`
--

INSERT INTO `beritas` (`id`, `judul`, `tipe_id`, `gambar`, `isi`, `created_at`, `updated_at`) VALUES
(1, 'ijal mati', 1, 'public/berita/Z29G3GxHCTh5KngEtwhIIgC7BLThrqfRyrfaV80Z.png', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. A amet reprehenderit consequatur eaque necessitatibus sit numquam quidem debitis, sequi voluptate corrupti sed et corporis nisi maxime rerum odit laborum labore autem aliquid expedita! Nisi cumque inventore esse veritatis ad, quos expedita obcaecati neque accusantium qui aliquam aut voluptate mollitia voluptates consequatur quia velit quae voluptatibus fugiat soluta! Eos nostrum, totam dignissimos laboriosam ipsa, magni, neque libero doloribus soluta omnis sunt minus in iure! Ullam eius libero, illum odio officiis laudantium dolorem amet dignissimos, magni quibusdam laborum ea eum quos. Mollitia quaerat in fugit atque hic optio aut eligendi recusandae cum est perspiciatis doloremque incidunt veritatis odit ipsam, molestiae eos nam doloribus iure, autem necessitatibus, reiciendis nihil quidem. Deserunt odio earum cumque! Nihil vitae excepturi iure explicabo aliquam sequi voluptas, laborum similique atque assumenda non doloremque voluptatibus accusamus veniam molestias quibusdam, quae, facere accusantium consectetur corrupti. Dicta ipsam praesentium accusantium deleniti voluptates iste, veniam quasi cum libero id odit itaque dignissimos provident. Iusto perspiciatis laboriosam sunt fugiat? Architecto quasi magnam odio earum minus labore officiis ab sapiente aut distinctio atque voluptate molestiae ut, maiores, cumque sed nulla, quibusdam deserunt quae perferendis accusantium? Neque ipsum similique voluptatem, dolor quidem, veritatis nobis ipsam laboriosam quibusdam, distinctio recusandae ea odio aliquam? Quas, reiciendis eum! Fugit, commodi perspiciatis eveniet dolore provident repellendus non accusamus minima repellat laudantium consequuntur expedita iusto laboriosam tenetur cum debitis omnis assumenda facilis ratione in doloremque cumque! Quam facilis iure neque reiciendis. Facilis recusandae nihil cumque, laboriosam sunt ad ab cupiditate iusto fugit qui aperiam. Voluptas quae nulla dolores optio praesentium, sunt odio numquam ipsa nostrum eaque magnam id minus architecto excepturi distinctio quis eligendi voluptatem delectus placeat officia. Reprehenderit sapiente illo consequuntur blanditiis iure aliquid accusantium animi delectus libero dolorem sequi, voluptas repellat in mollitia aliquam dolore modi voluptatibus dolorum, cumque, temporibus dignissimos explicabo! Nostrum sequi consequuntur ut dignissimos itaque incidunt, maxime officiis commodi fugit animi sed dolorem placeat quo corrupti voluptates aliquam alias quaerat? Modi fugit corporis temporibus deserunt minima, ut fuga architecto repellendus iste obcaecati veniam blanditiis corrupti error nobis placeat unde consectetur. Voluptates, maxime ea, officiis labore illo animi reprehenderit architecto velit quod, minus in unde aliquid laborum placeat! Id eius illo harum voluptatibus eos adipisci repellendus, ipsum quibusdam, sequi magnam, possimus in cum aperiam laboriosam asperiores voluptates doloremque nisi! Unde autem quia voluptatibus quam repellendus impedit earum, dolore necessitatibus accusamus ab. Nihil molestias magnam placeat eum!', '2022-03-20 15:26:12', '2022-03-20 15:26:12');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `kategori_id` int(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `nama`, `kategori_id`, `created_at`, `updated_at`) VALUES
(1, 'Zakat Maal', 1, '2022-03-18 14:45:19', '2022-03-18 14:45:19');

-- --------------------------------------------------------

--
-- Table structure for table `donasis`
--

CREATE TABLE `donasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `donor_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `donor_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `donation_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(20,2) NOT NULL DEFAULT 0.00,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `snap_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donasis`
--

INSERT INTO `donasis` (`id`, `transaction_id`, `donor_name`, `donor_email`, `donation_type`, `phone`, `amount`, `note`, `status`, `snap_token`, `created_at`, `updated_at`) VALUES
(1, '9793d8cb-2db4-4bd4-b944-87aeb98f27dc', 'randi', 'randibm12@gmail.com', 'Zakat Maal', '+6283121250758', '2000.00', NULL, 'pending', 'b35ad14f-35d7-4bc1-bd3f-ab47dd9dddb4', '2022-03-18 07:34:31', '2022-03-18 07:34:32');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` int(10) NOT NULL,
  `nama` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama`) VALUES
(1, 'Zakat');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_28_081819_create_donasis_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `progkategoris`
--

CREATE TABLE `progkategoris` (
  `id` int(10) NOT NULL,
  `nama` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `progkategoris`
--

INSERT INTO `progkategoris` (`id`, `nama`) VALUES
(1, 'Zakat Maal'),
(2, 'Program Baznas');

-- --------------------------------------------------------

--
-- Table structure for table `sebutans`
--

CREATE TABLE `sebutans` (
  `id` int(10) NOT NULL,
  `nama` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sebutans`
--

INSERT INTO `sebutans` (`id`, `nama`) VALUES
(1, 'Bapak');

-- --------------------------------------------------------

--
-- Table structure for table `tentangzakats`
--

CREATE TABLE `tentangzakats` (
  `id` int(10) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `tipe_id` int(10) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tentangzakats`
--

INSERT INTO `tentangzakats` (`id`, `judul`, `tipe_id`, `isi`, `gambar`, `created_at`, `updated_at`) VALUES
(2, 'ijal mati', 1, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. A amet reprehenderit consequatur eaque necessitatibus sit numquam quidem debitis, sequi voluptate corrupti sed et corporis nisi maxime rerum odit laborum labore autem aliquid expedita! Nisi cumque inventore esse veritatis ad, quos expedita obcaecati neque accusantium qui aliquam aut voluptate mollitia voluptates consequatur quia velit quae voluptatibus fugiat soluta! Eos nostrum, totam dignissimos laboriosam ipsa, magni, neque libero doloribus soluta omnis sunt minus in iure! Ullam eius libero, illum odio officiis laudantium dolorem amet dignissimos, magni quibusdam laborum ea eum quos. Mollitia quaerat in fugit atque hic optio aut eligendi recusandae cum est perspiciatis doloremque incidunt veritatis odit ipsam, molestiae eos nam doloribus iure, autem necessitatibus, reiciendis nihil quidem. Deserunt odio earum cumque! Nihil vitae excepturi iure explicabo aliquam sequi voluptas, laborum similique atque assumenda non doloremque voluptatibus accusamus veniam molestias quibusdam, quae, facere accusantium consectetur corrupti. Dicta ipsam praesentium accusantium deleniti voluptates iste, veniam quasi cum libero id odit itaque dignissimos provident. Iusto perspiciatis laboriosam sunt fugiat? Architecto quasi magnam odio earum minus labore officiis ab sapiente aut distinctio atque voluptate molestiae ut, maiores, cumque sed nulla, quibusdam deserunt quae perferendis accusantium? Neque ipsum similique voluptatem, dolor quidem, veritatis nobis ipsam laboriosam quibusdam, distinctio recusandae ea odio aliquam? Quas, reiciendis eum! Fugit, commodi perspiciatis eveniet dolore provident repellendus non accusamus minima repellat laudantium consequuntur expedita iusto laboriosam tenetur cum debitis omnis assumenda facilis ratione in doloremque cumque! Quam facilis iure neque reiciendis. Facilis recusandae nihil cumque, laboriosam sunt ad ab cupiditate iusto fugit qui aperiam. Voluptas quae nulla dolores optio praesentium, sunt odio numquam ipsa nostrum eaque magnam id minus architecto excepturi distinctio quis eligendi voluptatem delectus placeat officia. Reprehenderit sapiente illo consequuntur blanditiis iure aliquid accusantium animi delectus libero dolorem sequi, voluptas repellat in mollitia aliquam dolore modi voluptatibus dolorum, cumque, temporibus dignissimos explicabo! Nostrum sequi consequuntur ut dignissimos itaque incidunt, maxime officiis commodi fugit animi sed dolorem placeat quo corrupti voluptates aliquam alias quaerat? Modi fugit corporis temporibus deserunt minima, ut fuga architecto repellendus iste obcaecati veniam blanditiis corrupti error nobis placeat unde consectetur. Voluptates, maxime ea, officiis labore illo animi reprehenderit architecto velit quod, minus in unde aliquid laborum placeat! Id eius illo harum voluptatibus eos adipisci repellendus, ipsum quibusdam, sequi magnam, possimus in cum aperiam laboriosam asperiores voluptates doloremque nisi! Unde autem quia voluptatibus quam repellendus impedit earum, dolore necessitatibus accusamus ab. Nihil molestias magnam placeat eum!', 'public/berita/8Qtme5ZoeOR5840MhwxYTQtYkgfU5wUbTCwUFNBZ.png', '2022-04-03 13:44:28', '2022-04-03 13:44:28');

-- --------------------------------------------------------

--
-- Table structure for table `tipes`
--

CREATE TABLE `tipes` (
  `id` int(10) NOT NULL,
  `nama` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipes`
--

INSERT INTO `tipes` (`id`, `nama`) VALUES
(1, 'Berita Zakat'),
(2, 'Berita Infak');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$gr6xzNcVgOm030jOGUNyie0PuYqcrbg5HisykcSj/aNM9usjUCp4W', NULL, '2021-11-06 16:51:18', '2021-11-06 16:51:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donasis`
--
ALTER TABLE `donasis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `donasis_transaction_id_unique` (`transaction_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `progkategoris`
--
ALTER TABLE `progkategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sebutans`
--
ALTER TABLE `sebutans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tentangzakats`
--
ALTER TABLE `tentangzakats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donasis`
--
ALTER TABLE `donasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `progkategoris`
--
ALTER TABLE `progkategoris`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sebutans`
--
ALTER TABLE `sebutans`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tentangzakats`
--
ALTER TABLE `tentangzakats`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

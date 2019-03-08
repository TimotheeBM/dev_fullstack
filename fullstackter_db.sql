CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `creator` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date_event` date NOT NULL,
  `location_name` varchar(255) DEFAULT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `guests` (
  `id` int(11) NOT NULL,
  `event` int(11) NOT NULL,
  `is_going` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `event` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `pseudo` varchar(12) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_event_user` (`creator`);


ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`,`event`),
  ADD KEY `fk_guests_event` (`event`);


ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_message_user` (`user`),
  ADD KEY `fk_message_event` (`event`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);


ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE `events`
  ADD CONSTRAINT `fk_event_user` FOREIGN KEY (`creator`) REFERENCES `users` (`id`);

ALTER TABLE `guests`
  ADD CONSTRAINT `fk_guests_event` FOREIGN KEY (`event`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `fk_guests_user` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

ALTER TABLE `messages`
  ADD CONSTRAINT `fk_message_event` FOREIGN KEY (`event`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `fk_message_user` FOREIGN KEY (`user`) REFERENCES `users` (`id`);
COMMIT;

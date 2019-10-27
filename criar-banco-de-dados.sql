CREATE DATABASE crud;

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `location` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

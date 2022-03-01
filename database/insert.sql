
ALTER TABLE `works_history_content` ADD `num_order` INT(5) NOT NULL DEFAULT '1000' ;

ALTER TABLE `works_history` ADD `num_order` INT(5) NOT NULL DEFAULT '1000' ;


INSERT INTO `works_history` (`id`, `title`, `image`, `description`, `system_name`, `external_link`, `work_id`, `status`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES 
(NULL, 'Sección de libros', 'holugin-hpd/book/gif-content.gif', 'La sección de libros desarrollado para este sistema está conformada por:', NULL, NULL, '11', 'active', NULL, '1', '1', NULL, '2022-03-01 13:53:06', '2022-03-01 13:53:06');



INSERT INTO `works_history_content` (`id`, `title`, `image`, `description`, `work_history_id`, `created_at`, `updated_at`, `status`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `num_order`) VALUES (NULL, 'Biblioteca de libros para leerlo de manera digital', 'holugin-hpd/book/books.png', NULL, '1', '2022-03-01 14:09:46', '2022-03-01 14:09:46', 'active', NULL, '1', '1', NULL, '1000'), (NULL, 'Libro visto desde un visor ', 'holugin-hpd/book/book.png', NULL, '1', '2022-03-01 14:09:46', '2022-03-01 14:09:46', 'active', NULL, '1', '1', NULL, '2000'), (NULL, 'Recursos digitales situados en el libro y su sección por página', 'holugin-hpd/book/book-resource.png', NULL, '1', '2022-03-01 14:09:46', '2022-03-01 14:09:46', 'active', NULL, '1', '1', NULL, '3000'), (NULL, 'Lista de recursos digitales del libros dentro de un panel', 'holugin-hpd/book/resources.png', NULL, '1', '2022-03-01 14:09:46', '2022-03-01 14:09:46', 'active', NULL, '1', '1', NULL, '4000');
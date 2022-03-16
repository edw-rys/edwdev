
ALTER TABLE `works_history_content` ADD `num_order` INT(5) NOT NULL DEFAULT '1000' ;

ALTER TABLE `works_history` ADD `num_order` INT(5) NOT NULL DEFAULT '1000' ;


INSERT INTO `works_history` (`id`, `title`, `image`, `description`, `system_name`, `external_link`, `work_id`, `status`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES 
(NULL, 'Sección de libros', 'holugin-hpd/book/gif-content.gif', 'La sección de libros desarrollado para este sistema está conformada por:', NULL, NULL, '11', 'active', NULL, '1', '1', NULL, '2022-03-01 13:53:06', '2022-03-01 13:53:06');



INSERT INTO `works_history_content` (`id`, `title`, `image`, `description`, `work_history_id`, `created_at`, `updated_at`, `status`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `num_order`) VALUES (NULL, 'Biblioteca de libros para leerlo de manera digital', 'holugin-hpd/book/books.png', NULL, '1', '2022-03-01 14:09:46', '2022-03-01 14:09:46', 'active', NULL, '1', '1', NULL, '1000'), (NULL, 'Libro visto desde un visor ', 'holugin-hpd/book/book.png', NULL, '1', '2022-03-01 14:09:46', '2022-03-01 14:09:46', 'active', NULL, '1', '1', NULL, '2000'), (NULL, 'Recursos digitales situados en el libro y su sección por página', 'holugin-hpd/book/book-resource.png', NULL, '1', '2022-03-01 14:09:46', '2022-03-01 14:09:46', 'active', NULL, '1', '1', NULL, '3000'), (NULL, 'Lista de recursos digitales del libros dentro de un panel', 'holugin-hpd/book/resources.png', NULL, '1', '2022-03-01 14:09:46', '2022-03-01 14:09:46', 'active', NULL, '1', '1', NULL, '4000');


ALTER TABLE `work` CHANGE `description` `description` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;


INSERT INTO `work` (`id`, `name`, `image`, `description`, `external_link`, `type_id`, `created_at`, `updated_at`, `status`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `thumbnail`, `system_name`) VALUES (NULL, 'Sistema de recaudación con facturación electrónica', 'sfd_systemrec.png', ' <p>\r\n        Sistema de recaudación con las siguientes caraterísticas:\r\n    </p>\r\n    <ul>\r\n        <li>Clientes</li>\r\n        <li>Medidores y abonados</li>\r\n        <li>Planillas mensuales</li>\r\n        <li>Facturación electrónica</li>\r\n        <li>Pagos</li>\r\n        <li>Api para recaudación</li>\r\n        <li>Generación de multas por reconección</li>\r\n        <li>Repotes diarios</li>\r\n        <li>Cartera vencida</li>\r\n        <li>Auditor</li>\r\n    </ul>', '/work/recaudacion-system', '1', '2022-03-15 16:55:56', '2022-03-15 16:55:56', 'active', NULL, '1', '1', NULL, 'sfd_systemrec.png', 'recaudacion-system');

INSERT INTO `works_history` (`id`, `title`, `image`, `description`, `system_name`, `external_link`, `work_id`, `status`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `num_order`) VALUES (NULL, 'Módulos principales del sistema', NULL, NULL, NULL, 'https://www.youtube.com/embed/LaZeeRTuk-c', '12', 'active', NULL, '1', '1', NULL, '2022-03-15 17:16:22', '2022-03-15 17:16:22', '1000');

INSERT INTO `works_history_content` (`id`, `title`, `image`, `description`, `work_history_id`, `created_at`, `updated_at`, `status`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `num_order`) VALUES (NULL, 'Clientes', 'recaudacion-sys/clients.png', NULL, '2', '2022-03-15 17:21:04', '2022-03-15 17:21:04', 'active', NULL, '1', '1', NULL, '1000');

INSERT INTO `works_history_content` (`id`, `title`, `image`, `description`, `work_history_id`, `created_at`, `updated_at`, `status`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `num_order`) VALUES (NULL, 'Facturas electrónicas', 'recaudacion-sys/invoices.png', NULL, '2', '2022-03-15 17:21:04', '2022-03-15 17:21:04', 'active', NULL, '1', '1', NULL, '2000');
INSERT INTO `works_history_content` (`id`, `title`, `image`, `description`, `work_history_id`, `created_at`, `updated_at`, `status`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `num_order`) VALUES (NULL, 'Control de pagos', 'recaudacion-sys/payments.png', NULL, '2', '2022-03-15 17:21:04', '2022-03-15 17:21:04', 'active', NULL, '1', '1', NULL, '2000');
INSERT INTO `works_history_content` (`id`, `title`, `image`, `description`, `work_history_id`, `created_at`, `updated_at`, `status`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `num_order`) VALUES (NULL, 'Cartera vencida', 'recaudacion-sys/past_due.png', NULL, '2', '2022-03-15 17:21:04', '2022-03-15 17:21:04', 'active', NULL, '1', '1', NULL, '2000');
INSERT INTO `works_history_content` (`id`, `title`, `image`, `description`, `work_history_id`, `created_at`, `updated_at`, `status`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `num_order`) VALUES (NULL, 'Reporte diario', 'recaudacion-sys/daily.png', NULL, '2', '2022-03-15 17:21:04', '2022-03-15 17:21:04', 'active', NULL, '1', '1', NULL, '2000');



INSERT INTO `work` (`id`, `name`, `image`, `description`, `external_link`, `type_id`, `created_at`, `updated_at`, `status`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `thumbnail`, `system_name`) VALUES (NULL, 'IntelC, sitio Weh', 'intelc.png', 'IntelC, sitio web de empresa de internet de Palora', 'https://intelc.net.ec/', '2', '2022-03-15 19:41:33', '2022-03-15 19:41:33', 'active', NULL, '1', '1', NULL, 'intelc.png', '');
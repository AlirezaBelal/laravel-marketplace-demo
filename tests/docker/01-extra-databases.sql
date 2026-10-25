-- Disposable category schemas required by historical marketplace migrations.
-- This file runs only in the isolated MySQL acceptance container.
CREATE DATABASE IF NOT EXISTS `digikala_category` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE DATABASE IF NOT EXISTS `digikala_electronic` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE DATABASE IF NOT EXISTS `digikala_vehicle` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE DATABASE IF NOT EXISTS `digikala_apparel` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE DATABASE IF NOT EXISTS `digikala_child` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

GRANT ALL ON `digikala_category`.* TO 'marketplace_acceptance'@'%';
GRANT ALL ON `digikala_electronic`.* TO 'marketplace_acceptance'@'%';
GRANT ALL ON `digikala_vehicle`.* TO 'marketplace_acceptance'@'%';
GRANT ALL ON `digikala_apparel`.* TO 'marketplace_acceptance'@'%';
GRANT ALL ON `digikala_child`.* TO 'marketplace_acceptance'@'%';

USE awesome;

DROP TABLE IF EXISTS awesome_classes;

CREATE TABLE awesome_classes(

id			int unsigned NOT NULL auto_increment,
class_name		varchar(200) NOT NULL,
class_location		varchar(200) NOT NULL,
class_time		decimal(4,2) NOT NULL,
class_day		varchar(50) NOT NULL,

PRIMARY KEY (id)

);
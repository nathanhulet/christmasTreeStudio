CREATE DATABASE ChristmasStudio;
USE ChristmasStudio;

DROP TABLE IF EXISTS Design;

CREATE TABLE Design (
  Design_id INT(11) NOT NULL AUTO_INCREMENT,
  Design_Title CHAR(50),
  Pine INT,
  Ornaments INT,
  Lights INT,
  Stand INT,
  Skirt INT,
  Garland INT,
  Snow BOOLEAN,
  PRIMARY KEY (Design_id)
);

insert into Design values
(1, 'My First Tree', 2, 2, 3, 2, 0, 1, false),
(2, 'I love this studio', 3, 2, 1, 1, 0, 2, true);

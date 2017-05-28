CREATE SCHEMA IF NOT EXISTS `Questions` DEFAULT CHARACTER SET utf8 ;
USE `Questions` ;

DROP TABLE IF EXISTS `Question_choice` ;
DROP TABLE IF EXISTS `Question` ;



CREATE TABLE Question (
    question_id  int NOT NULL,
    question  Longtext NOT NULL,
    PRIMARY KEY (question_id)
);



CREATE TABLE Question_choice (
    choice_id   int NOT NULL,
    question_id  int NOT NULL,
	choice varchar(255),
    is_right_choice  int,
    PRIMARY KEY (choice_id,question_id),
	FOREIGN KEY (question_id) REFERENCES Question(question_id)


);

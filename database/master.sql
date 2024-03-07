CREATE TABLE projects (
    `name`          VARCHAR(255) PRIMARY KEY,
    `illustration`  BLOB,
    `description`   VARCHAR(255) DEFAULT ""
);

INSERT INTO projects VALUES 
    ("test1", NULL, "ceci est un test"),
    ("test2", NULL, "ceci est un test"),
    ("test3", NULL, "ceci est un test"),
    ("test4", NULL, "ceci est un test"),
    ("test5", NULL, "ceci est un test"),
    ("test6", NULL, "ceci est un test"),
    ("test7", NULL, "ceci est un test"),
    ("test8", NULL, "ceci est un test"),
    ("test9", NULL, "ceci est un test"),
    ("test10", NULL, "ceci est un test"),
    ("test11", NULL, "ceci est un test"),
    ("test12", NULL, "ceci est un test"),
    ("test13", NULL, "ceci est un test");

CREATE TABLE social_media (
    `id`    INT             AUTO_INCREMENT PRIMARY KEY,
    `name`  VARCHAR(255)    NOT NULL,
    `icon`  BLOB            ,
    `url`   VARCHAR(255)    NOT NULL
);

INSERT INTO social_media VALUES 
    (DEFAULT, "test1", NULL, "http://exemple.fr"),
    (DEFAULT, "test2", NULL, "http://exemple.fr"),
    (DEFAULT, "test3", NULL, "http://exemple.fr");

CREATE TABLE academic_achievements (
    `academic_name`     VARCHAR(255)    NOT NULL,
    `location`          VARCHAR(255)    NOT NULL,
    `diploma_name`      VARCHAR(255)    NOT NULL,
    `academic_year`     VARCHAR(255)    NOT NULL,
    `description`       VARCHAR(255)    DEFAULT "",
    `illustration`      BLOB            NOT NULL
);

CREATE TABLE professional_experiences (
    `company_name`  VARCHAR(255)    NOT NULL,
    `location`      VARCHAR(255)    NOT NULL,
    `job_role`      VARCHAR(255)    NOT NULL,
    `duration`      VARCHAR(255)    NOT NULL,
    `description`   VARCHAR(255)    DEFAULT "",
    `illustration`  BLOB            NOT NULL
);

CREATE TABLE aboutme (
    `first_name`    VARCHAR(255)    NOT NULL,
    `last_name`     VARCHAR(255)    NOT NULL,
    `icon`          BLOB,
    `email`         VARCHAR(255)    NOT NULL,
    `phone_number`  VARCHAR(255)    NOT NULL,
    `description`   VARCHAR(255)    DEFAULT "",

    PRIMARY KEY(`first_name`, `last_name`)
);

INSERT INTO aboutme VALUES ('Naulan', 'CHRZASZCZ', NULL, 'contact@naulan-chrzaszcz.fr', '+33xxxxxxxxxx', 'Je suis une description');


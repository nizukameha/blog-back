DROP DATABASE blog;
CREATE DATABASE blog;
USE blog;
CREATE TABLE article (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    text VARCHAR(1000) NOT NULL,
    author VARCHAR(30) NOT NULL,
    view INT NOT NULL,
    publication_date DATE NOT NULL,
    image VARCHAR(500) NOT NULL
);

INSERT INTO article (title, text, author, view, publication_date, image) VALUES ("À partir de quel âge peut-on commencer le skate ?", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique id atque tenetur facilis exercitationem repellat quasi, minus distinctio tempore maiores voluptate quaerat esse nostrum delectus ducimus quisquam amet neque earum.", "lexa", "540", "2022-11-08", "https://file1.telestar.fr/var/telestar/storage/images/2/7/4/274676/1659490-1/Decouvrez-Wyatt-le-bebe-de-2-ans-pro-du-skateboard.png?alias=original");
INSERT INTO article (title, text, author, view, publication_date, image) VALUES ("Ça c'est du ollie !", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique id atque tenetur facilis exercitationem repellat quasi, minus distinctio tempore maiores voluptate quaerat esse nostrum delectus ducimus quisquam amet neque earum.", "lexa", "746", "2022-12-06", "https://media.sudouest.fr/4233793/1200x-1/thumbnail-img-7165.jpg");
INSERT INTO article (title, text, author, view, publication_date, image) VALUES ("Skate, meilleur série de jeux-vidéos ?", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique id atque tenetur facilis exercitationem repellat quasi, minus distinctio tempore maiores voluptate quaerat esse nostrum delectus ducimus quisquam amet neque earum.", "lexa", "122", "2023-01-18", "https://store-images.s-microsoft.com/image/apps.57264.68005754082254855.39795a60-73cf-4461-87d9-7f112c30c43c.a9fe1ef9-f8df-4ac1-89c1-cbd3a5f1b852?q=90&w=480&h=270");
INSERT INTO article (title, text, author, view, publication_date, image) VALUES ("Aurelien Giraud remporte la street league", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique id atque tenetur facilis exercitationem repellat quasi, minus distinctio tempore maiores voluptate quaerat esse nostrum delectus ducimus quisquam amet neque earum.", "lexa", "1090", "2023-01-01", "https://www.lequipe.fr/_medias/img-photo-jpg/aurelien-giraud-est-champion-du-monde-g-poissonnier-ffrs/1500000001745125/3:438,1450:1402-828-552-75/7ee5c.jpg");
INSERT INTO article (title, text, author, view, publication_date, image) VALUES ("La meilleure part de l'année !?", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique id atque tenetur facilis exercitationem repellat quasi, minus distinctio tempore maiores voluptate quaerat esse nostrum delectus ducimus quisquam amet neque earum.", "lexa", "440", "2022-10-14", "https://image.winudf.com/v2/image/Y29tLmZpc2hleWUuc2thdGVyY2FtZXJhX3NjcmVlbl8wXzE1MTM4MTE0OTJfMDc4/screen-0.jpg?fakeurl=1&type=.webp");
INSERT INTO article (title, text, author, view, publication_date, image) VALUES ("Le bowl", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique id atque tenetur facilis exercitationem repellat quasi, minus distinctio tempore maiores voluptate quaerat esse nostrum delectus ducimus quisquam amet neque earum.", "lexa", "44", "2023-02-20", "https://www.rollerenligne.com/wp-content/uploads/skatepark-pau-2020-vue-bowl.jpg");

CREATE TABLE comment (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    text VARCHAR(1000) NOT NULL,
    publication_date DATE NOT NULL,
    id_article INT NOT NULL,
    FOREIGN KEY (id_article) REFERENCES article(id) ON DELETE CASCADE
);

INSERT INTO comment (name, text, publication_date, id_article) VALUES 
("lexa", "Super cet article", "2023-01-02", "1"),
("bazou", "génial", "2023-02-20", "1"),
("grinder", "Il est vraiment trop fort ce mec !", "2023-01-02", "4"),
("kindr", "Bravo, on est fier de toi :))", "2023-01-02", "4"),
("sktrBoy", "Y'a Session qui est pas mal aussi dans son genre", "2023-01-02", "3");

CREATE TABLE category (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL
);

INSERT INTO category (name) VALUES ("actualité"), ("jeux-vidéos"), ("compétition"), ("astuce"), ("évenement");

CREATE TABLE article_category (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_article INT NOT NULL,
    FOREIGN KEY (id_article) REFERENCES article(id) ON DELETE CASCADE,
    id_category INT NOT NULL,
    FOREIGN KEY (id_category) REFERENCES category(id) ON DELETE CASCADE
);

INSERT INTO article_category (id_article, id_category) VALUES ("1", "1"), ("1","2");

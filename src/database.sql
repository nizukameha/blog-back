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

INSERT INTO article (title, text, author, view, publication_date, image) VALUES ("Le premier article", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique id atque tenetur facilis exercitationem repellat quasi, minus distinctio tempore maiores voluptate quaerat esse nostrum delectus ducimus quisquam amet neque earum.", "lexa", "0", "2023-01-01", "https://www.slate.fr/sites/default/files/styles/1200x680/public/6_19.jpg");
INSERT INTO article (title, text, author, view, publication_date, image) VALUES ("Le deuxieme article", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique id atque tenetur facilis exercitationem repellat quasi, minus distinctio tempore maiores voluptate quaerat esse nostrum delectus ducimus quisquam amet neque earum.", "lexa", "0", "2023-01-01", "https://www.slate.fr/sites/default/files/styles/1200x680/public/6_19.jpg");
INSERT INTO article (title, text, author, view, publication_date, image) VALUES ("Le troisieme article", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique id atque tenetur facilis exercitationem repellat quasi, minus distinctio tempore maiores voluptate quaerat esse nostrum delectus ducimus quisquam amet neque earum.", "lexa", "0", "2023-01-01", "https://www.slate.fr/sites/default/files/styles/1200x680/public/6_19.jpg");
INSERT INTO article (title, text, author, view, publication_date, image) VALUES ("Le quatrieme article", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique id atque tenetur facilis exercitationem repellat quasi, minus distinctio tempore maiores voluptate quaerat esse nostrum delectus ducimus quisquam amet neque earum.", "lexa", "0", "2023-01-01", "https://www.slate.fr/sites/default/files/styles/1200x680/public/6_19.jpg");
INSERT INTO article (title, text, author, view, publication_date, image) VALUES ("Le cinquieme article", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique id atque tenetur facilis exercitationem repellat quasi, minus distinctio tempore maiores voluptate quaerat esse nostrum delectus ducimus quisquam amet neque earum.", "lexa", "0", "2023-01-01", "https://www.slate.fr/sites/default/files/styles/1200x680/public/6_19.jpg");
INSERT INTO article (title, text, author, view, publication_date, image) VALUES ("Le sixieme article", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique id atque tenetur facilis exercitationem repellat quasi, minus distinctio tempore maiores voluptate quaerat esse nostrum delectus ducimus quisquam amet neque earum.", "lexa", "0", "2023-01-01", "https://www.slate.fr/sites/default/files/styles/1200x680/public/6_19.jpg");
INSERT INTO article (title, text, author, view, publication_date, image) VALUES ("Le septieme article", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique id atque tenetur facilis exercitationem repellat quasi, minus distinctio tempore maiores voluptate quaerat esse nostrum delectus ducimus quisquam amet neque earum.", "lexa", "0", "2023-01-01", "https://www.slate.fr/sites/default/files/styles/1200x680/public/6_19.jpg");
INSERT INTO article (title, text, author, view, publication_date, image) VALUES ("Le huitieme article", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique id atque tenetur facilis exercitationem repellat quasi, minus distinctio tempore maiores voluptate quaerat esse nostrum delectus ducimus quisquam amet neque earum.", "lexa", "0", "2023-01-01", "https://www.slate.fr/sites/default/files/styles/1200x680/public/6_19.jpg");
INSERT INTO article (title, text, author, view, publication_date, image) VALUES ("Le neuvieme article", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique id atque tenetur facilis exercitationem repellat quasi, minus distinctio tempore maiores voluptate quaerat esse nostrum delectus ducimus quisquam amet neque earum.", "lexa", "0", "2023-01-01", "https://www.slate.fr/sites/default/files/styles/1200x680/public/6_19.jpg");

CREATE TABLE comment (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    text VARCHAR(1000) NOT NULL,
    publication_date DATE NOT NULL,
    id_article INT NOT NULL,
    FOREIGN KEY (id_article) REFERENCES article(id) ON DELETE CASCADE
);

INSERT INTO comment (name, text, publication_date, id_article) VALUES ("lexa", "Super cet article", "2023-01-02", "1");

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

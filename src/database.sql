CREATE DATABASE blog;
USE blog;
CREATE TABLE article (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    category VARCHAR(30) NOT NULL,
    text VARCHAR(1000) NOT NULL,
    author VARCHAR(30) NOT NULL,
    view INT NOT NULL,
    publication_date DATE NOT NULL,
    image VARCHAR(500) NOT NULL
);

INSERT INTO article (title, category, text, author, view, publication_date, image) VALUES ("Le premier article", "skate", "lorem ipsum", "lexa", "0", "2023-01-01", "https://www.slate.fr/sites/default/files/styles/1200x680/public/6_19.jpg");

CREATE TABLE comment (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    text VARCHAR(1000) NOT NULL,
    publication_date DATE NOT NULL,
    id_article INT NOT NULL,
    FOREIGN KEY (id_article) REFERENCES article(id) ON DELETE CASCADE
);

INSERT INTO comment (name, text, publication_date, id_article) VALUES ("lexa", "Super cet article", "2023-01-02", "1");
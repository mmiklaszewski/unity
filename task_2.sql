
-- tabela autoróœ
CREATE TABLE author (
                        id SERIAL PRIMARY KEY,
                        name VARCHAR(255) NOT NULL,
                        surname VARCHAR(255) NOT NULL
);

-- tabela książek
CREATE TABLE book (
                      id SERIAL PRIMARY KEY,
                      author_id INTEGER REFERENCES author(id),
                      title VARCHAR(255) NOT NULL,
                      year_of_publication INTEGER,
                      ISBN VARCHAR(13) NOT NULL
);

-- tabela recenzji
CREATE TABLE review (
                        id SERIAL PRIMARY KEY,
                        book_id INTEGER REFERENCES book(id),
                        rating INTEGER CHECK (rating >= 1 AND rating <= 10) NOT NULL,
                        comment TEXT NOT NULL
);

-- przykładowe dane autorów
INSERT INTO author (id, name, surname)
VALUES
    (1, 'Jan', 'Kowalski'),
    (2, 'Stefan', 'Nowak'),
    (3, 'Juliusz', 'Rogatek'),
    (4, 'August', 'Nowak');

-- przykładowe dane książek
INSERT INTO book (id, author_id, title, year_of_publication, ISBN)
VALUES
    (1, 1, 'Kowalczykowie', 2012, 'ISBN-1'),
    (2, 1, 'Kowale', 2020, 'ISBN-2'),
    (3, 2, 'Stefan i przyjaciele', 2018, 'ISBN-3'),
    (4, 3, 'Zasady Rogatka', 2021, 'ISBN-4'),
    (5, 3, 'Bezpieczeństwo', 2023, 'ISBN-5');

-- przykładowe dane recenzji
INSERT INTO review (id, book_id, rating, comment)
VALUES
    (1, 1, 5, 'test comment for 1'),
    (2, 1, 8, 'test comment for 2'),
    (3, 2, 1, 'test comment for 3'),
    (4, 2, 1, 'test comment for 4'),
    (5, 3, 5, 'test comment for 5'),
    (6, 3, 5, 'test comment for 6'),
    (7, 4, 10, 'test comment for 7'),
    (8, 4, 4, 'test comment for 8'),
    (9, 5, 10, 'test comment for 9');

-- pobranie autorów wraz z ilością ksiązek posortowane od największej ilosci
SELECT
    a.name AS AUTHOR_NAME,
    a.surname AS AUTHOR_SURNAME,
    COUNT(b.id) AS BOOKS_COUNT
FROM author a
         LEFT JOIN book b ON b.author_id = a.id
GROUP BY a.name, a.surname
ORDER BY BOOKS_COUNT DESC;

-- stworzenie widoku zawierającego 5 autorów z najwyższą średnią na podstawie recenzji
CREATE VIEW top_authors AS
SELECT
    a.id AS author_id,
    a.name AS author_name,
    a.surname AS author_surname,
    AVG(r.rating) AS rating_average
FROM
    author a
        JOIN book b ON a.id = b.author_id
        LEFT JOIN review r ON b.id = r.book_id
GROUP BY
    a.id, a.name, a.surname
ORDER BY
    rating_average DESC
    LIMIT 5;
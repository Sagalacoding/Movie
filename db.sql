CREATE TABLE movies (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    genre VARCHAR(100) NOT NULL,
    description VARCHAR(255) NOT NULL,
    cover VARCHAR(255) NOT NULL
);

INSERT INTO movies VALUES
(DEFAULT, 'The Witcher: Nightmare of the Wolf', 'Dark Fantasy', 'The Witcher: Nightmare of the Wolf is a 2021 animated film based on the Witcher series.', 'tw.jpg'),
(DEFAULT, 'Jumbo', 'Animation', 'Don, a chubby boy bullied as "Jumbo", encounters Meri, a spirit seeking help to reunite with her troubled familys spirits. Their journey unfolds.', 'jumbo.jpg'),
(DEFAULT, 'Cek Toko Sebelah', 'Comedy', 'Cek Toko Sebelah is a 2016 Indonesian comedy film directed by Ernest Prakasa','cektokosebelah.jpg'),
(DEFAULT, 'The Witcher: Sirens of the Deep', 'Dark Fantasy', 'Hired to probe seaside village attacks, mutant monster hunter Geralt unravels an age-old conflict between humans and sea people that threatens war between kingdoms. Aided by allies, he must solve the mystery before hostilities escalate', 'twsod.jpg');  

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
)
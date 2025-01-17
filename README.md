# WCB3
## Gasha game
## Shibi character design

## Database config
Pour la base de données, nous allons utiliser postgres. Nous allons créer une base de données nommée WBC3_DB, sur cette DB il faudra créer 2 tables : 
La table character qui va contenir les personnages à invoquer 
```sql
CREATE TABLE character (
    id SERIAL PRIMARY KEY,
    img TEXT,
    nom VARCHAR(100) NOT NULL,
    age INT,
    lore TEXT,
    atk INT,
    vie INT,
    competence TEXT,
    sexe CHAR(1) CHECK (sexe IN ('M', 'F', 'O')),
    race VARCHAR(50)
);
```
C'est le coeur même du gasha! il faut donc y entrer les données de tout les persos avec cette requête :

````sql
INSERT INTO character (img, nom, age, lore, atk, vie, competence, sexe, race)
VALUES
    ('https://image.cdn2.seaart.me/2025-01-10/cu00mcde878c73et6sqg-2/6ffc99333d087551aaf2fb42ca0e44fb_high.webp', 'test_chr_1', 25, 'Un guerrier légendaire.', 50, 100, 'Attaque rapide', 'M', 'Humain'),
    ('https://image.cdn2.seaart.me/2025-01-09/cu00jt5e878c73esp260-1/2eb5e5f23d580b2776f98e25ebfd7d1b_high.webp', 'test_chr_2', 30, 'Un mage mystérieux.', 40, 80, 'Boule de feu', 'F', 'Elfe'),
    ('https://image.cdn2.seaart.me/2025-01-10/cu00o7te878c7385cp70-2/3fc5c789f9ffc2bc227c3c633b020ec6_high.webp', 'test_chr_3', 22, 'Un voleur agile.', 45, 90, 'Coup de poignard', 'M', 'Hobbit'),
    ('https://image.cdn2.seaart.me/2025-01-10/cu00l8le878c73fr9q8g-2/466801f27d70307c5a58642991617553_high.webp', 'test_chr_4', 28, 'Un archer hors pair.', 48, 85, 'Tir précis', 'F', 'Elfe'),
    ('https://image.cdn2.seaart.me/2025-01-09/cu00pj5e878c739rmao0-2/5a571fae697a8a61a468f64a2cb8eabb_high.webp', 'test_chr_5', 35, 'Un chevalier noble.', 55, 120, 'Charge puissante', 'M', 'Humain'),
    ('https://image.cdn2.seaart.me/2025-01-09/cu00r65e878c73fsg1m0-1/ee454049aea01da3211e5ffa3b1cc607_high.webp', 'test_chr_6', 29, 'Une sorcière redoutable.', 38, 70, 'Malédiction', 'F', 'Tieffelin'),
    ('https://image.cdn2.seaart.me/2025-01-09/cu022h5e878c73f4k8h0-2/52cfdf4ae51e232c08b6a4f95d17fbf3_high.webp', 'test_chr_7', 26, 'Un assassin silencieux.', 52, 95, 'Coup mortel', 'F', 'Elfe'),
    ('https://image.cdn2.seaart.me/2025-01-09/cu03llle878c738cs4h0-1/2a0166b4989a59f5a6133270c15dd360_high.webp', 'test_chr_8', 31, 'Un druide mystique.', 42, 88, 'Soin naturel', 'F', 'Nain'),
    ('https://image.cdn2.seaart.me/2025-01-10/cu03mjde878c73cu194g-1/48d3f2ac2a6f8e640db9fce4b87386c7_high.webp', 'test_chr_9', 27, 'Un barbare sauvage.', 60, 110, 'Rage', 'M', 'Orc'),
    ('https://image.cdn2.seaart.me/2025-01-10/cu03phle878c73fdjaag-1/f37b0359e9bacc631330204acad0122a_high.webp', 'test_chr_10', 33, 'Un alchimiste ingénieux.', 35, 75, 'Potion explosive', 'F', 'Humain'),
    ('https://image.cdn2.seaart.me/2025-01-09/cu03qote878c73fdpfm0-1/b9ad836d8b000a4fab022e230c917b0c_high.webp', 'test_chr_11', 24, 'Un barde charmant.', 30, 80, 'Chant envoûtant', 'M', 'Elfe'),
    ('https://image.cdn2.seaart.me/2025-01-10/cu03rfte878c73cur7v0-2/0a79433e9bed615bf5052a7f7d358585_high.webp', 'test_chr_12', 29, 'Une prêtresse dévouée.', 37, 90, 'Aura de protection', 'F', 'Humaine'),
    ('https://image.cdn2.seaart.me/2025-01-09/cu03tate878c73acbnkg-1/2be381e54ea831c780a41cc2c5a0d811_high.webp', 'test_chr_13', 32, 'Un gladiateur redouté.', 53, 100, 'Frappe brutale', 'M', 'Orc'),
    ('https://image.cdn2.seaart.me/2025-01-10/cu03ucle878c73ach3p0-2/8bf2f52961c6124b5a79096e1b6a004a_high.webp', 'test_chr_14', 21, 'Une espionne rusée.', 45, 85, 'Disparition', 'F', 'Tieffelin'),
    ('https://image.cdn2.seaart.me/2025-01-10/cu040fle878c73cvmih0-2/ec483a88605220969dcbb684eb394c32_high.webp', 'test_chr_15', 34, 'Un chasseur expérimenté.', 50, 92, 'Piège sauvage', 'M', 'Elfe'),
    ('https://image.cdn2.seaart.me/2025-01-10/cu0418te878c73ad0dig-2/753a4ee0b5b76e6ef72fa0358661f693_high.webp', 'test_chr_16', 28, 'Une invocatrice puissante.', 40, 78, 'Invocation de familiers', 'F', 'Humaine'),
    ('https://image.cdn2.seaart.me/2025-01-10/cu0430te878c738f7mng-2/be74f15e6f79244de2d097324b988b99_high.webp', 'test_chr_17', 25, 'Un très jeune moine pacifique.', 48, 96, 'Coup du dragon', 'M', 'Nain'),
    ('https://image.cdn2.seaart.me/2025-01-09/cu043qle878c73ff9krg-2/0b616637f9b6394086abe54a510d30ff_high.webp', 'test_chr_18', 30, 'Une guerrière féroce.', 55, 105, 'Hurlement de guerre', 'F', 'Humaine'),
    ('https://image.cdn2.seaart.me/2025-01-09/cu044o5e878c738n45o0/910ed34309154f692122f9c4e95988a2_high.webp', 'test_chr_19', 29, 'Un technomancien curieux.', 41, 82, 'Éclair électrique', 'M', 'Humain'),
    ('https://image.cdn2.seaart.me/2025-01-09/cu0470te878c73adud3g-1/5f6c67cc4cd28a4e17a4b2502b6e8b58_high.webp', 'test_chr_20', 33, 'Une pirate intrépide.', 46, 89, 'Sabre acéré', 'F', 'Elfe');
````
Et la table users qui va contenir nos utilisateurs:

```sql
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    pseudo VARCHAR(50) NOT NULL,
    mail VARCHAR(255) NOT NULL UNIQUE,
    mdp VARCHAR(255) NOT NULL
);
```
N'oubliez pas de modifier le .env afin de mettre les bons mots de passe pour votre base de données ! 

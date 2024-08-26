CREATE DATABASE vente ENCODING = 'UTF8';
CREATE USER vente WITH PASSWORD 'vente';
ALTER DATABASE vente OWNER TO vente;

CREATE TABLE article (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    prix DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE commentaire (
    id SERIAL PRIMARY KEY,
    idArticle INT NOT NULL,
    idUser INT NOT NULL,
    texte TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (idArticle) REFERENCES article(id),
    FOREIGN KEY (idUser) REFERENCES users(id)
);


INSERT INTO article (nom, description, prix) VALUES
('Chaussures de sport', 'Chaussures de sport confortables et légères pour la course à pied.', 59.99),
('T-shirt en coton', 'T-shirt en coton 100% bio avec un design moderne.', 19.99),
('Montre en acier', 'Montre-bracelet élégante en acier inoxydable pour hommes.', 149.99),
('Sac à dos en cuir', 'Sac à dos en cuir véritable, idéal pour les voyages et le travail.', 99.99),
('Casquette ajustable', 'Casquette ajustable avec logo brodé pour un look sportif.', 14.99),
('Lunettes de soleil', 'Lunettes de soleil polarisées avec protection UV.', 29.99),
('Jean slim fit', 'Jean slim fit stretch pour un confort et un style optimal.', 49.99),
('Chemise à manches longues', 'Chemise à manches longues en lin, idéale pour un look décontracté.', 39.99),
('Boucles d oreilles en argent', 'Boucles d oreilles en argent sterling avec zircons étincelants.', 25.50),
('Parfum floral', 'Eau de parfum avec des notes florales douces et séduisantes.', 65.00);


-- Afficher les sessions de formation à venir qui ne se chevauchent pas avec une session donnée :

SELECT *
FROM session
WHERE
    Date_debut > now() Date_fin < [Date de début de la session donnée]
    OR Date_debut > [Date de fin de la session donnée];

--    SELECT * FROM session WHERE Date_debut > now() AND (2023-04-17 > 2023-06-17 OR 2023-06-17 < 2023-04-17);

-- Afficher les sessions de formation à venir avec des places encore disponibles :

SELECT *
FROM session
WHERE Places_max > (
        SELECT COUNT()
        FROM inscription
        WHERE
            inscription.Id_session = Identifiant
    )
    AND Etat = 'en cours dinscription';

-- Afficher le nombre d'inscrits par session de formation :

SELECT
    Id_session,
    COUNT() AS Nombre_d_inscrits
FROM inscription
    JOIN session ON inscription.Id_session = session.Id_session
GROUP BY session.Id_session;

-- Afficher l'historique des sessions de formation d'un apprenant donné :

SELECT Id_session.*
FROM inscription
    JOIN session ON inscription.Id_session = session.Id_session
WHERE
    inscription.Id_apprenant_ = [Identifiant de l 'apprenant donné];

-- Afficher la liste des sessions qui sont affectées à un formateur donné, triées par date de début :
SELECT
    *
FROM
    session
WHERE
    Id_Formateur = 1
ORDER BY
    Date_debut;




    -- here
    



--  done
-- Afficher l' historique des sessions de formation d 'un formateur donné :
SELECT
    session.*
FROM
    session
WHERE
    Id_Formateur = 1;

-- Afficher les formateurs qui sont disponibles entre 2 dates :
SELECT
    *
FROM
    Formateur
WHERE
    Id_Formateur NOT IN (
        SELECT
            DISTINCT Id_Formateur
        FROM
            session
        WHERE
            Date_fin > [Date de début donnée]
            AND Date_debut < [Date de fin donnée]
    );
--     SELECT
--     *
-- FROM
--     Formateur
-- WHERE
--     Id_Formateur NOT IN (
--         SELECT
--             DISTINCT Id_Formateur
--         FROM
--             session
--         WHERE
--             Date_fin > 2023-04-17
--             AND Date_debut <2023-06-17
--     );





   -- Afficher l' historique des sessions de formation d 'un apprenant donné :

SELECT COUNT(3) FROM inscription WHERE Id_apprenant_ = 1;



-- Afficher toutes les sessions d une formation donnée :
SELECT
    *
FROM
    session
WHERE
    Id_Formateur = 1;








-- Afficher le nombre total des sessions par catégorie de formation :
SELECT
    formation_.categorie,
    COUNT() AS Nombre_de_sessions
FROM
    session
    JOIN formation_ ON session.Id_formation_ = formation_.Id_formation_
GROUP BY
    formation_.categorie;

-- Afficher le nombre total des inscrits par catégorie de formation :
SELECT
    formation_.categorie,
    COUNT() AS Nombre_d_inscrits
FROM
    inscription
    JOIN session ON inscription.Id_session = session.Id_session
    JOIN formation_ ON session.Id_formation_ = formation_.Id_formation_
GROUP BY
    formation_.categorie;


    -- Afficher la liste des apprenants d' une session donnée d 'un formateur donné :
SELECT
    Id_apprenant_.*
FROM
    inscription
    JOIN apprenant_ ON inscription.Id_apprenant_ = apprenant_.Id_apprenant_
WHERE
    inscription.Id_session = [Identifiant de la session donnée]
    AND session.Id_Formateur = [Identifiant du formateur donné];
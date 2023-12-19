CREATE OR REPLACE
VIEW `vw_penempatan_gabungan_summary` AS
    SELECT 
        `tp`.`kode_program` AS `Program`,
        SUM((CASE
            WHEN (`ts`.`tahun` < (YEAR(CURDATE()) - 4)) THEN 1
            ELSE 0
        END)) AS `-1`,
        SUM((CASE
            WHEN (`ts`.`tahun` = (YEAR(CURDATE()) - 4)) THEN 1
            ELSE 0
        END)) AS `4`,
        SUM((CASE
            WHEN (`ts`.`tahun` = (YEAR(CURDATE()) - 3)) THEN 1
            ELSE 0
        END)) AS `3`,
        SUM((CASE
            WHEN (`ts`.`tahun` = (YEAR(CURDATE()) - 2)) THEN 1
            ELSE 0
        END)) AS `2`,
        SUM((CASE
            WHEN (`ts`.`tahun` = (YEAR(CURDATE()) - 1)) THEN 1
            ELSE 0
        END)) AS `1`,
        SUM((CASE
            WHEN (`ts`.`tahun` = YEAR(CURDATE())) THEN 1
            ELSE 0
        END)) AS `0`,
        SUM((CASE
            WHEN (`ts`.`tahun` <= (YEAR(CURDATE()) - 4)) THEN 1
            ELSE 0
        END)) AS `total`
    FROM
        ((`t_peserta` `tp`
        LEFT JOIN `t_datadiri` `td` ON ((`tp`.`id_datadiri` = `td`.`id_datadiri`)))
        LEFT JOIN `t_seleksi` `ts` ON ((`tp`.`id_seleksi` = `ts`.`id_seleksi`)))
    WHERE
        ((`tp`.`penempatan` <> '')
            AND (`tp`.`pstat` = 1)
            AND ((`ts`.`nama` LIKE '%NON GELAR%')
            OR (`ts`.`nama` LIKE '%NONGELAR%')
            OR ((NOT ((`ts`.`nama` LIKE '%NON GELAR%')))
            AND (NOT ((`ts`.`nama` LIKE '%NONGELAR%')))
            AND (`ts`.`nama` LIKE '%GELAR%'))))
    GROUP BY `tp`.`kode_program`
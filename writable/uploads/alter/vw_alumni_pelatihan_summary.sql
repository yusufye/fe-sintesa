CREATE OR REPLACE
VIEW `vw_alumni_pelatihan_summary` AS
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
        (((`t_peserta` `tp`
        LEFT JOIN `t_datadiri` `td` ON ((`tp`.`id_datadiri` = `td`.`id_datadiri`)))
        LEFT JOIN `t_seleksi` `ts` ON ((`tp`.`id_seleksi` = `ts`.`id_seleksi`)))
        LEFT JOIN `t_alumni` `ta` ON ((`tp`.`id_peserta` = `ta`.`id_peserta`)))
    WHERE
        ((`ta`.`tgl_lulus` <> '')
            AND ((`ts`.`nama` LIKE '%NON GELAR%')
            OR (`ts`.`nama` LIKE '%NONGELAR%')))
    GROUP BY `tp`.`kode_program`
-- group by program, hanya menampilkan 5 tahun terakhir dan yang dibawah 5 tahun digabung jadi 1 kolom
CREATE OR REPLACE VIEW `vw_alumni_pendidikan_summary` AS
SELECT 
        `tp`.`kode_program` AS `Program`,
    SUM((CASE
        WHEN (`ts`.`tahun` < YEAR(CURDATE()) - 4) THEN 1
        ELSE 0
    END)) AS `-1`,
    SUM((CASE
        WHEN (`ts`.`tahun` = YEAR(CURDATE()) - 4) THEN 1
        ELSE 0
    END)) AS `4`,
    SUM((CASE
        WHEN (`ts`.`tahun` = YEAR(CURDATE()) - 3) THEN 1
        ELSE 0
    END)) AS `3`,
    SUM((CASE
        WHEN (`ts`.`tahun` = YEAR(CURDATE()) - 2) THEN 1
        ELSE 0
    END)) AS `2`,
    SUM((CASE
        WHEN (`ts`.`tahun` = YEAR(CURDATE()) - 1) THEN 1
        ELSE 0
    END)) AS `1`,
    SUM((CASE
        WHEN (`ts`.`tahun` = YEAR(CURDATE()) ) THEN 1
        ELSE 0
    END)) AS `0`,
    SUM((CASE
        WHEN (`ts`.`tahun` <= YEAR(CURDATE()) - 4) THEN 1
        ELSE 0
    END)) AS `total`
    FROM
        ((`t_peserta` `tp`
        LEFT JOIN `t_datadiri` `td` ON ((`tp`.`id_datadiri` = `td`.`id_datadiri`)))
        LEFT JOIN `t_seleksi` `ts` ON ((`tp`.`id_seleksi` = `ts`.`id_seleksi`)))
    WHERE
        ((`ts`.`nama` LIKE 'DIKLAT GELAR%')
            AND (`tp`.`delstat` = 'a'))
    GROUP BY `tp`.`kode_program`
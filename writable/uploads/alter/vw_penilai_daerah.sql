CREATE OR REPLACE
VIEW `vw_penilai_daerah` AS
    SELECT 
        `u`.`name` AS `name`,
        `u`.`gender` AS `gender`,
        `u`.`golongan` AS `golongan`,
        `k`.`kementrian_name` AS `kementrian_name`,
        `u`.`unit_kerja` AS `unit_kerja`,
        `j`.`jabatan` AS `jabatan`,
        `ep`.`periode` AS `periode`,
        `p`.`provinsi` AS `provinsi`,
        `u`.`email` AS `email`,
        `u`.`kemcategory` AS `kemcategory`,
        CONVERT(`d`.`pt` USING UTF8MB4) AS `universitas`,
        COUNT(`u`.`id`) AS `Jumlah`
    FROM
        (((((`user` `u`
        LEFT JOIN `edupak_periodes` `ep` ON ((`u`.`id` = `ep`.`iduser`)))
        LEFT JOIN `jabatans` `j` ON ((`u`.`jabatan` = `j`.`tingkat_jabatan`)))
        LEFT JOIN `kementrians` `k` ON ((`u`.`id_kementrian` = `k`.`id`)))
        LEFT JOIN `provinsis` `p` ON ((`p`.`id` = `ep`.`idprov`)))
        LEFT JOIN `t_datadiri` `d` ON ((CONVERT( `d`.`nip` USING UTF8MB4) = CONVERT( `u`.`nip` USING UTF8MB4))))
    WHERE
        ((`u`.`level` = 'pp')
            AND (`u`.`approved` = 1)
            AND (`u`.`status` = 1)
            AND ((`u`.`kemcategory` = 2)
            OR (`u`.`kemcategory` = 3)))
    GROUP BY `u`.`id` , `ep`.`periode`
    ORDER BY `ep`.`periode` DESC
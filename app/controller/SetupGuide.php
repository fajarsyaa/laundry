<?php

    function index(){

        $cekTable = query()->table('guide')->get();

        if (!$cekTable) {

            query()->raw("CREATE TABLE guide (id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, judul VARCHAR(100) NOT NULL, kategori VARCHAR(100) NOT NULL, url_thumbnail VARCHAR(255) NOT NULL, box_class VARCHAR(20) NULL, deskripsi LONGTEXT NOT NULL)");

        }

        view('setup/guide/data');

    }

    function store($request)
    {

        // check($cek);

        $insert = query()->insert("guide", [

                        $request->judul,
                        $request->kategori,
                        $request->url_thumbnail,
                        $request->box_class,
                        $request->deskripsi

                   ]);

        if ($insert) {

            alertSetup("Berhasil","Guide added!");
            back();

        }else{

            check($insert);

        }
    }

    function edit($request, $id)
    {
        $data = query()->table("guide")->where("id", $id)->single();

        view("setup/guide/detail", compact('data'));
    }
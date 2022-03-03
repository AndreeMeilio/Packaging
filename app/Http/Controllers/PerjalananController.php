<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerjalananController extends Controller
{
    public function index(Request $request)
    {
        try{
            $data_perjalanan = collect(json_decode(Storage::get('data_perjalanan.txt'), true));
            $data_perjalanan = $data_perjalanan->where("nik", $request->session()->get("nik"));
            

        } catch(FileNotFoundException $e){
            echo $e;
            die();
        }

        return view("perjalanan.perjalanan", ["data_perjalanan" => $data_perjalanan]);
    }

    public function store(Request $request)
    {
        $perjalanan = $request->except("_token");
        $perjalanan["nik"] = $request->session()->get("nik");

        try{

            if ($data_perjalanan = json_decode(Storage::get("data_perjalanan.txt"), true)){
                array_push($data_perjalanan, $perjalanan);

                Storage::put('data_perjalanan.txt', json_encode($data_perjalanan));

                return redirect()->back()->with("success", "Data Perjalanan Berhasil Ditambahkan");
            } else {
                Storage::put('data_perjalanan.txt', json_encode(array($perjalanan)));

                return redirect()->back()->with("success", "Data Perjalanan Berhasil Ditambahkan");
            }

        } catch(FileNotFoundException $e){
            return redirect()->back()->with("error", "Nama File Tidak Ditemukan");
        }
    }
}

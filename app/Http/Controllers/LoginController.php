<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $data_login = $request->only(['nik', 'nama_lengkap', 'login_as']);

        try {
            $data_pengguna = json_decode(Storage::get('config.txt'), true);

            if ($data_login["login_as"] === "Saya Pengguna Baru"){
                if ($data_pengguna === null) {
                    //Jika data pada file config.txt baru pertama kali diisi atau masih kosong
                    $data_pengguna_baru = array(
                        array(
                            "nik" => $data_login["nik"],
                            "nama_lengkap" => strtoupper($data_login["nama_lengkap"])
                        )
                    );
    
                    Storage::put('config.txt', json_encode($data_pengguna_baru));

                    $request->session()->put("nik", $data_login['nik']);
                    $request->session()->put("nama_lengkap", $data_login['nama_lengkap']);
    
                    return redirect(route("index"));
                } else {
                    //Jika data pada file config.txt sudah ada isinya

                    //Check apakah nik sudah ada dalam data
                    $data_for_check = collect($data_pengguna);
                    $data_for_check = $data_for_check->where("nik", $data_login["nik"]);
                    if (count($data_for_check) !== null){
                        return redirect()->back()->with("error", "Nik sudah ada yang pakai");
                    }

                    // Menggabungkan data pengguna pada file dengan data login sebagai pengguna baru 
                    // kemudian mengupdate data ke dalam file kembali
                    $data_pengguna_baru = array_push($data_pengguna, array(
                        "nik" => $data_login["nik"],
                        "nama_lengkap" => strtoupper($data_login["nama_lengkap"])
                    ));
                    Storage::put('config.txt', json_encode($data_pengguna));
    
                    //set session
                    $request->session()->put("nik", $data_login['nik']);
                    $request->session()->put("nama_lengkap", $data_login['nama_lengkap']);

                    return redirect(route("index"));
                }
            } else if ($data_login["login_as"] === "Masuk") {
                $data_pengguna = collect($data_pengguna);

                //Mencari data berdasarkan nik dan nama lengkap
                $search_data = $data_pengguna->where("nik", $data_login["nik"])->where("nama_lengkap", strtoupper($data_login["nama_lengkap"]))->first();
                
                //cek apakah data ada atau tidak
                if (count($search_data) == 0){
                    return redirect()->back()->with("error", "Credentials Does Not Match With Our Data");
                } else {
                    $request->session()->put("nik", $search_data['nik']);
                    $request->session()->put("nama_lengkap", $search_data['nama_lengkap']);

                    return redirect(route("index"));
                }
            }
        } catch (FileNotFoundException $e) {
            return redirect()->back()->with("error", "Nama File Tidak Ditemukan");
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['nik', 'nama_lengkap']);
        $request->session()->flush();

        return redirect(route("login_view"));
    }
}

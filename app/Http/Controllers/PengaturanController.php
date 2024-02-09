<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotifikasiRequest;
use Illuminate\Http\Request;
use App\Models\Allownotifikasi;
use App\Models\User;

class PengaturanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function allownotif()
    {
        $notif = Allownotifikasi::where('email_user', auth()->user()->email)->first();
        return view('pengaturan.notifikasi', compact('notif'));
    }

    public function allownotifpost(NotifikasiRequest $request)
    {

        if ($request->wanotif == 1) {

            $user      = User::where('email', auth()->user()->email)->first();
            $user->update('nowa', $request->nowa);

            if (auth()->user()->nowa) {
                $notif = [
                    "wanotif" => $request->wanotif,
                    "emailnotif" => $request->emailnotif,

                ];
                $item       = Allownotifikasi::where('email_user', auth()->user()->email)->first();
                $item->update($notif);

                return back()->with('sukses', 'Perubahan berhasil di simpan');
            } else {

                return back()->with('gagal', 'Untuk mengaktifkan notifikasi Whatsapp pastikan anda telah memasukan No Whatsapp');
            }
        }

        $notif = [
            "wanotif" => $request->wanotif,
            "emailnotif" => $request->emailnotif,

        ];
        $item       = Allownotifikasi::where('email_user', auth()->user()->email)->first();
        $item->update($notif);

        return back()->with('sukses', 'Perubahan berhasil di simpan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // if ($request->wanotif == "1") {

        //     $itemuser = [
        //         "nowa" => $request->nowa
        //     ];
        //     $user      = User::findOrfail(auth()->user()->email);
        //     $user->update($itemuser);

        //     if (auth()->user()->nowa) {
        //         $notif = [
        //             "wanotif" => $request->wanotif,
        //             "emailnotif" => $request->emailnotif,

        //         ];
        //         $item       = Allownotifikasi::where('email_user', auth()->user()->email)->first();
        //         $item->update($notif);

        //         return redirect()->route('allownotif')->with('sukses', 'Perubahan berhasil di simpan');
        //     } else {

        //         return redirect()->route('allownotif')->with('gagal', 'Untuk mengaktifkan notifikasi Whatsapp pastikan anda telah memasukan No Whatsapp');
        //     }
        // }

        $notif = [
            "wanotif" => $request->wanotif,
            "emailnotif" => $request->emailnotif,

        ];
        $item       = Allownotifikasi::where('email_user', auth()->user()->email)->first();
        $item->update($notif);

        return redirect()->route('allownotif')->with('sukses', 'Perubahan berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

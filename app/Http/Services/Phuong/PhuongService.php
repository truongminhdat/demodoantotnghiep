<?php
namespace App\Http\Services\Phuong;
use App\Models\Phuong;
use Illuminate\Support\Facades\Session;


class QuanService
{
    public function create($request)
    {
        try {
            return Phuong::create([
                'TenPhuong' => (string)$request->input('TenPhuong'),
                'quan_id'=>(integer) $request->input('quan_id'),
                Session::flash('success', 'Them thanh cong'),
            ]);
        } catch (\Exception $err) {
            Session::flash('error', 'Them khong thanh cong');
            return false;

        }
        return true;

    }
}

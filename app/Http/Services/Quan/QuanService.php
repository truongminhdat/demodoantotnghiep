<?php
namespace App\Http\Services\Quan;
use App\Models\Quan;
use Illuminate\Support\Facades\Session;


class QuanService{
  public function create($request){
      try {
          return Quan::create([
              'Tenquan'=> (string) $request->input('Tenquan'),
              Session::flash('success','Thêm quận thành công'),
          ]);
      }catch (\Exception $err){
          Session::flash('error','Thêm không thành công');
          return false;

      }
      return true;

  }
  public function update($request,$quan):bool{
      try {
          $quan->Tenquan = (string) $request->input('Tenquan');
          $quan->save();
          Session::flash('success','Cap nhat thanh cong');

      }catch (\Exception $err){
          Session::flash('error','Cap nhat khong thanh cong');
          return false;

      }
      return true;

  }
  public function delete($request){
      $quan = Quan::where('id', $request->input('id'))->first();
      if ($quan) {
          $quan->delete();
          return true;
      }

      return false;
  }

}

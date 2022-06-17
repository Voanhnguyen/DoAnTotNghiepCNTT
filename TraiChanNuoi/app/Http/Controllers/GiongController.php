<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon;
use File;
class GiongController extends Controller
{
    //
    public function Index(){
        $query = DB::table('giong')
                        ->orderBy('ID', 'desc')
                        ->paginate(10);
        
        return view('giong.index')->with([
                                            'query'=> $query
                                        ]);
    }

    public function Delete($ID){

        $giong = DB::table('giong')->where('ID', $ID)->first();
        File::delete(public_path('/client/img/' . $giong->Anh));
        DB::table('giong')
            ->where("ID", $ID)
            ->delete();

         
        return response()->json([
         'success' => 'Record deleted successfully!'
     ]);
    }



    public function frmAdd(Request $request){
        $Ten = $request->get("Ten");
        $Gia = $request->get("Gia");
        $Anh = "";
        if ($request->hasFile('Anh')){
            $img_hinhanh = $request->file("Anh");
            // Thư mục upload
            $uploadPath = public_path('/client/img/'). $img_hinhanh->getClientOriginalName(); // Thư mục upload

            if (File::exists($uploadPath)) {
                // Thư mục upload
                $uploadPath = public_path('/client/img/'); // Thư mục upload

                // Bắt đầu chuyển file vào thư mục
                $img_hinhanh->move($uploadPath, $img_hinhanh->getClientOriginalName());
                $Anh = $img_hinhanh->getClientOriginalName();
            }else{
                // Bắt đầu chuyển file vào thư mục
                $img_hinhanh->move(public_path('/client/img/'), $img_hinhanh->getClientOriginalName());

                $Anh = $img_hinhanh->getClientOriginalName();
            }

        }
        DB::insert('insert into giong 
            (Ten,  Gia, Anh) 
            values (?, ?, ?)', 
            [$Ten,  $Gia, $Anh]);

        Session::flash('message', 'Thêm giống thành công.');
        return redirect('/giong/danh-sach.html');
    }

   

    public function frmEdit(Request $request){

        $ID = $request->get("ID");
        $Ten = $request->get("Ten");
        $Gia = $request->get("Gia");

        if ($request->hasFile('Anh')){
            $img_hinhanh = $request->file("Anh");

            // Thư mục upload
            $uploadPath = public_path('/client/img/'); // Thư mục upload

            // Bắt đầu chuyển file vào thư mục
            $img_hinhanh->move($uploadPath, $img_hinhanh->getClientOriginalName());

            $hinhanh = $img_hinhanh->getClientOriginalName();

            $img = DB::table('giong')->where('ID', $ID)->first();
            if($img->Anh != $hinhanh){//Nếu có sửa file ảnh, thì tiến hành xóa ảnh cũ và thêm ảnh mới
                File::delete(public_path('/client/img/' . $img->Anh));
                // $img_hinhanh->move($uploadPath, $hinhanh->getClientOriginalName());
                DB::update('update giong set Anh = ? where ID = ?', [$hinhanh, $ID]);
            }
        }


        DB::table('giong')
            ->where("ID", $ID)
            ->update([
                'Ten' => $Ten,
                'Gia' => $Gia
            ]);


        Session::flash('message', 'Cập nhật giống thành công.');
        return redirect('/giong/danh-sach.html');
    }

    public function GetByID($ID){
        $query = DB::table('giong')->where('ID', $ID)->first();

        return response()->json([
            'query' => $query
        ]);
    }
}

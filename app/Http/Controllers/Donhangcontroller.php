<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\book;
use App\khachhang;
use App\hoadon;
use App\chitiethd;

class Donhangcontroller extends Controller
{
	public function getDanhsach()
	{


		$hoadon=hoadon::all();
		$khachhang=khachhang::all();
		$chitiethd=chitiethd::all();
		$book=book::all();
		// return response()->json($hoadon->khachhang());
		return view( 'admin.donhang.danhsach',compact('hoadon','khachhang','chitiethd','book'));

	}
    
    /*public function getThem()
	{
		
		return view( 'admin.slideqc.them');
		
	}

	public function postThem(Request $request)
	{
		

		$slideqc = new slideqc;
		if($request->has('link'))
			$slideqc->link=$request->link;

		if($request->hasFile('Hinh'))
		{
			$file=$request->file('Hinh');
			$duoi=$file->getClientOriginalExtension();
			if ($duoi !='jpg' &&  $duoi !='png' && $duoi !='jpeg') 

			{
				return redirect('admin/slideqc/them')->with('loi','bạn chỉ được chọn file có đuôi jpg,png,jpeg');
			}

			$name=$file->getClientOriginalName();
			$Hinh=str_random(4)."_".$name;
			while (file_exists("source/image/slide/".$Hinh)) {
				$Hinh=str_random(4)."_".$name;
				# code...
			}
			$file->move("source/image/slide",$Hinh);
			$slideqc->image=$Hinh;
		}
		else
		{
			return redirect('admin/slideqc/them')->with('loi','chưa thêm hình ảnh');

		}
		$slideqc->save();
		return redirect('admin/slideqc/them')->with('thongbao','thêm thành công');
	} */



	public function getSua($id)
	{
			$chitiethd=chitiethd::find($id);
		$hoadon=hoadon::find($id);
		return view ('admin.donhang.sua',['hoadon'=>$hoadon,'chitiethd'=>$chitiethd]);
	}



	public function postSua(Request $request,$id)
	{
		
	
	}



	public function getXoa($id)
	{
		$chitiethd=chitiethd::find($id);
		
		$chitiethd->delete();
		
		return redirect()->back()->with('thongbao','Đã xóa thành công');
	}
}

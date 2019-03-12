<?php
namespace App\Http\Controllers;
header("Content-type:text/html;charset=utf-8");
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Upload;   //模型
use Illuminate\Support\Facades\Input;
use App\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class dataController extends Controller
{
//    public function import(Excel $excel, Request $request)
//    {
//
//        $data=$request->all();
//     //   $result = $excel->load('storage\2017星空学生创新中心正式员工通讯录合并.xlsx', function($reader) {
//            $result = $excel->load('storage\app\uploads'.iconv('UTF-8','gbk','test').'.xlsx', function($reader) {
//
//       })->getSheet()->toArray();   //获取到excel表格的数据  为一个二维数组
//
//        dd($result);
//
//        foreach ($result as $key => $value)
//        {
//
//            $data['department'] = $value['0'];
//            $data['name'] = $value['1'];
//            $data['phone'] = $value['2'];
//            $data['short_number'] = $value['3'];
//
//            DB::table('info')->insert($data);
//
//        }
//    }





    //文件上传

    public function upload(Request $request,Excel $excel)
    {
        if($request->isMethod('POST'))
        {
            //var_dump($_FILES);
            $file = $request->file('source'); //从表单处获取上传文件
            //文件是否上传成功
            if($file->isValid())
            {
                //原文件名
                $originalName =   $file->getClientOriginalName();
                //扩展名
                $ext = $file-> getClientOriginalExtension();  //上传文件的后缀
                //MimeType
                $type = $file ->getClientMimeType(); //媒体类型
                //临时绝对路径
                $realPath = $file ->getRealPath();
                $filename = uniqid() . '.' . $ext;
                Storage::disk('uploads')->put($filename, file_get_contents($realPath)); //把上传的文件保存在磁盘
                // return view('');

                $result = $excel->load('storage\app\uploads/'.$filename, function($reader) {

                })->getSheet()->toArray();   //获取到excel表格的数据  为一个二维数组

            //dd($result); //能打印出上传的文件

                foreach ($result as $value)  //从数组中取出值
                {
                    $info = new Upload();
                   // $info-> id = $value['0'];
                    $info-> department = $value['0'];
                    $info-> name = $value['1'];
                    $info-> phone = $value['2'];
                    $info-> short_number = $value['3'] ;

                   $res =  $info -> save();

//                    $data['department'] = $value['0'];
//                    $data['name'] = $value['1'];
//                    $data['phone'] = $value['2'];
//                    $data['short_number'] = $value['3'];
                  // print_r($value);  //输出数组
                }
                if($res)
                {
                    return redirect('/show')->with('success','成功上传！');

                }

            }

        }
        return view('file\fileUpload');
}



    public function show(Request $request)
    {
        
        $data = $request->all();
        $info = Upload::paginate(13); //分页

        return view('info',['info'=> $info]);
    }

    public function create()
    {
       
            return view('file.create');
    
    }




    public function save(Request $request)
    {
              $data = $request->input('Upload');  //获取从表单<input>输进的数据
           //var_dump($data);

            $info = new Upload();

            $info->department = $data['department'];
            $info->name = $data['name'];
            $info->phone = $data['phone'];
            $info->short_number = $data['short_number'];

            if($info->save())
            {
                return redirect('show')->with('success','添加成功！');
            }
            else
            {
                return redirect()->back();
            }
     
      
    }

    // 数据更新 
    public function update(Request $request, $id)
    {
             $info = Upload::find($id);   //通过id查找表单的编号
            if($request->isMethod('POST'))
            {
                $data = $request->input('Upload');  //从数据库查找的字段
                $info->department = $data['department'];
                $info->name = $data['name'];
                $info->phone = $data['phone'];
                $info->short_number = $data['short_number'];

                if($info->save())
                {
                    return redirect('show')->with('success','修改'.$id.'成功');
                }

            }


            return view('file.update', ['info'=>$info]);
     }
      
       
    

    //删除
    public function delete(Request $request, $id)
    {
          $info = Upload::find($id);
            if($info->delete())
            {
                return redirect('show')->with('success','删除'.$id.'成功');
            }
            else
            {
                return redirect('show')->with('error','删除'.$id.'失败');
            }
    }
       


}

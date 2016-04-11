<?php
namespace App\Application\Web\Investment\Http\Controllers\Company;

use App\Application\Web\Investment\Http\Controllers\BaseController;
use App\Domains\Company\Logo;
use Illuminate\Http\Request;

class LogoController extends BaseController
{
    protected $logo;
    protected $path = 'logos';

    public function __construct(Logo $logo)
    {
        $this->logo = $logo;
    }

    protected function validator(array $data)
    {
        return \Validator::make($data, [
            'file'   => 'required',
            'file.*' => 'mimes:png|max:200',
        ]);
    }

    protected function store(array $data)
    {
       return $this->logo->create($data);
    }

    public function create($id)
    {
        return view('investment::companies.logos.create',compact('id'));
    }

    public function upload($id,Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()],500);
        }
        else
        {
            $file     = $request->file('file');
            $file     = $file[0];

            if ($file->isValid())
            {
                $fileName = $file->getFilename().'.'.$file->getClientOriginalExtension();
                $file->move($this->path,$fileName);
                $this->store(['file_name' => $fileName,'src' =>$this->path, 'company_id' => $id]);
            }
            else
            {
                return response()->json([],500);
            }
        }
    }

    public function download($id)
    {
        $logo = $this->logo->find($id);
        return response()->download($logo->src.'/'.$logo->file_name, $logo->file_name);
    }

    public function edit($id)
    {
    }

    public function update($id)
    {
    }

    public function destroy($id)
    {
       $this->receipt->find($id)->forceDelete();
    }
}



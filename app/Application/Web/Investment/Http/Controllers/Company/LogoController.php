<?php
namespace App\Application\Web\Investment\Http\Controllers\Company;

use App\Application\Web\Investment\Http\Controllers\BaseController;
use App\Domains\Company\Logo;
use Illuminate\Http\Request;
use Image;

class LogoController extends BaseController
{
    protected $logo;
    protected $path = 'logos';
    protected $size = [150,150];

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
        $logo = $this->logo->whereCompanyId($id)->first();
        return view('investment::companies.logos.create',compact('id','logo'));
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

                $img = Image::make($file->getRealPath());

                $img->resize($this->size[0], $this->size[1], function ($constraint) {
                    $constraint->aspectRatio();
                })->save($this->path.'/'.$fileName);

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
        try
        {
            $file  = $this->logo->find($id);
            \File::delete(public_path($file->src.'/'.$file->file_name));
            $file->forceDelete();
            return back()->with('status','Excluido');
        }
        catch (\Exception $e)
        {
            return back()->with('error','Error');
        }
    }
}



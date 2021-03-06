<?php
namespace App\Application\Web\Investment\Http\Controllers\Cpr;

use App\Application\Web\Investment\Http\Controllers\BaseController;
use App\Domains\Cpr\Receipt;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;

class ReceiptController extends BaseController
{
    use DispatchesJobs;

    protected $receipt;
    protected $path     = 'receipt';

    public function __construct(Receipt $receipt)
    {
        $this->receipt = $receipt;
    }

    protected function validator(array $data)
    {
        return \Validator::make($data, [
            'file'   => 'required',
            'file.*' => 'mimes:pdf|max:1000',
        ]);
    }

    protected function store(array $data)
    {
       return $this->receipt->create($data);
    }

    public function create($id)
    {
        $receipt = $this->receipt->whereCprId($id)->first();
        return view('investment::cprs.receipts.create',compact('id','receipt'));
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
                $receipt = $this->store(['file_name' => $fileName,'src' =>$this->path, 'cpr_id' => $id]);

                if($receipt->Cpr->type ==  'p')
                {
                    $receipt->Cpr()->update(['status' => 'c' ,'date_payment' => \Carbon\Carbon::now()]);
                }
            }
            else
            {
                return response()->json([],500);
            }
        }
    }

    public function download($id)
    {
        $receipt = $this->receipt->find($id);
        return response()->download($receipt->src.'/'.$receipt->file_name, $receipt->file_name);
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
           $file  = $this->receipt->find($id);
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



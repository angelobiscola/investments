<?php
namespace App\Application\Web\Investment\Http\Controllers\Cpr;

use App\Application\Web\Investment\Http\Controllers\BaseController;
use App\Domains\Cpr\Receipt;
use Illuminate\Http\Request;

class ReceiptController extends BaseController
{
    protected $receipt;
    protected $path = 'receipt';

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
        return view('investment::cprs.receipts.create',compact('id'));
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
                $this->store(['file_name' => $fileName,'src' =>$this->path, 'cpr_id' => $id]);
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
        dd('edit');
    }

    public function update($id)
    {
        dd('update');
    }


    public function destroy($id)
    {
       $this->receipt->find($id)->forceDelete();
    }
}



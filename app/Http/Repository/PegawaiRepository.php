<?php

namespace App\Http\Repository;
use App\PegawaiModel;
use App\Http\Interfaces\PegawaiInterfaces;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Cache;
use Helper; 
class PegawaiRepository implements PegawaiInterfaces
{
    protected $model;

    public function __construct(PegawaiModel $post)
    {
        $this->model = $post;
    }

    public function all()
    {
        return $this->model->orderby('id','DESC')->paginate(10);
    }
    
    public function create(array $data)
    {  
        Helper::test();      
    }
    public function update(array $data, $id)
    {

        try {
            $this->model->where('id', $id)
            ->update($data);
            return back()->with('success','Update Successfull!');
        } catch (Throwable $e) {
            report($e);
            return false;
        }
        
    }

    public function delete($id)
    {
        if($this->model->find($id) != null){
            if($this->model->destroy($id)){
            return redirect('product')->with('success','Delete Successfull');
           }else{
            return redirect('product')->with('danger','Eror Delete');
           }
            
        }
        
    }
    
    public function find($id)
    {
            $post = $this->model->find($id);
            return $post;        
        
    }
}
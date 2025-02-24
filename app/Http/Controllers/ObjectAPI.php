<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;		
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;

class ObjectAPI extends Controller
{
    private $apiUrl = 'https://656ca88ee1e03bfd572e9c16.mockapi.io/products';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response= Http::withOptions([
            'verify' => 'c:\php\cacert-2024-12-31.pem', // Thay đường dẫn bằng đường dẫn chính xác đến tệp cacert.pem
        ])->get($this->apiUrl);
        return $response->json();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $response = Http::withOptions([
            'verify' => 'c:\php\cacert-2024-12-31.pem', // Thay đường dẫn bằng đường dẫn chính xác đến tệp cacert.pem
        ])->post($this->apiUrl, $request->validated());
        if($response->successful()){
            return response()->json(['success'=>'Sản phẩm đã được tạo']);
        }
        return response()->json(['error'=>'Lỗi khi tạo sản phẩm']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $response = Http::withOptions([
            'verify' => 'c:\php\cacert-2024-12-31.pem', // Thay đường dẫn bằng đường dẫn chính xác đến tệp cacert.pem
        ])->get($this->apiUrl."/".$id);
        if($response->successful()){
            return $response->json();
        }
        return response()->json(['error'=>"Không tìm thấy sản phẩm"]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $response = Http::withOptions([
            'verify' => 'c:\php\cacert-2024-12-31.pem', // Thay đường dẫn bằng đường dẫn chính xác đến tệp cacert.pem
        ])->get($this->apiUrl."/".$id);
        if($response->successful()){
            return $response->json();
        }
        return response()->json(['error'=>"Không tìm thấy sản phẩm".$id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductRequest $request, string $id)
    {
        $response = Http::withOptions([
            'verify' => 'c:\php\cacert-2024-12-31.pem', // Thay đường dẫn bằng đường dẫn chính xác đến tệp cacert.pem
        ])->put($this->apiUrl."/".$id, $request->validated());
        if($response->successful()){
            return  response()->json(['success'=>'Sản phẩm đã được sửa']);;
        }
        return response()->json(['error'=>'Lỗi khi sửa sản phẩm']);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::withOptions([
            'verify' => 'c:\php\cacert-2024-12-31.pem', // Thay đường dẫn bằng đường dẫn chính xác đến tệp cacert.pem
        ])->delete($this->apiUrl."/".$id);
        
        if($response->successful()){
            return  response()->json(['success'=>'Sản phẩm đã được xóa']);;
        }
        return response()->json(['error'=>'Lỗi khi xóa sản phẩm '.$id]);
    }
}

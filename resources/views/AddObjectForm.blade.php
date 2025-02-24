@extends('layouts.app') 

@section('content') 
<div class="container mt-5"> 
    <h2>Thêm sản phẩm</h2> 
    <form action="/api/store" method="POST"> 
        @csrf 
        @if(isset($id))
        <input id="it" value="{{ $id }}" hiden></div>
        @endif
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" id="name" name="name" placeholder="Tên sản phẩm" required class="form-control"> 
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea id="description" name="description" placeholder="Mô tả" class="form-control"></textarea> 
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giá</label>
            <input type="number" id="price" name="price" placeholder="Giá" required class="form-control"> 
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Số lượng</label>
            <input type="number" id="quantity" name="quantity" placeholder="Số lượng" required class="form-control"> 
        </div>
        <button type="submit" class="btn btn-success">Lưu</button> 
    </form> 
    
</div> 
<script>

</script>
@endsection
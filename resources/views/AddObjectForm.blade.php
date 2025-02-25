@extends('layouts.app') 

@section('content') 
<div class="container mt-5"> 
    <h2>Thêm sản phẩm</h2> 
    <form> 
        @csrf 
        @if(isset($id))
        <input id="id" value="{{ $id }}" hidden>
        @else
        <input id="id" hidden>
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
        <button type="button" class="btn btn-success" id="button">Lưu</button> 
    </form> 
</div> 

<script>
    async function fetchForm(path, body) {
        try {
            const response = await fetch(path, {
                method: 'POST', 
                headers: {
                    'Content-Type': 'application/json', 
                },
                body: JSON.stringify(body) 
            });

            if (!response.ok) {
                throw new Error('Có lỗi xảy ra khi gọi API');
            }

            const data = await response.json();
            return data; 
        } catch (error) {
            console.error('Có lỗi xảy ra:', error);
        }
    }
    if(document.getElementById('id').value){
        let numid=document.getElementById('id').value;
        (async () => {
            let path = '/api/edit/'+numid;
            let data = await fetchForm(path);
            console.log(numid);
            console.log(data);
            document.getElementById('name').value=data.name;
            document.getElementById('description').value=data.description;
            document.getElementById('price').value=data.price;
            document.getElementById('quantity').value=data.quantity;
        })();
    }
    var button = document.getElementById('button');
    button.addEventListener('click', async function () {
        const id = document.getElementById('id') ? document.getElementById('id').value : null;
        let path = id ? `/api/update/${id}` : '/api/store'; 

        const form = document.querySelector('form');
        const formData = new FormData(form);
        let body = {};
        formData.forEach((value, key) => {
            body[key] = value; // Chuyển formData thành object để gửi qua API
        });

        
        let response = await fetchForm(path, body);
        
        if (response && response.success) {
            alert(id ? 'Sản phẩm đã được sửa' : 'Sản phẩm đã được tạo');
        } else {
            alert(id ? `Lỗi khi sửa sản phẩm: ${response.error}` : `Lỗi khi tạo sản phẩm: ${response.error}`);
        }
        window.location.href = "/";

    });
</script>
@endsection

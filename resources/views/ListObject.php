<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Danh sách sản phẩm</h2>
        <a href="AddProductal" class="btn btn-success mb-3">Thêm sản phẩm</a>
    
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>CreatedAt</th>
                    <th>Avatar</th>
                </tr>
            </thead>
            <tbody id="body">
            </tbody>
        </table>
    </div>
</body>
<script>
    async function fetchData(path,body={}) {
        try {
            const response = await fetch(path, {
                method: 'POST', // Sử dụng POST để gọi API
                headers: {
                    'Content-Type': 'application/json', // Đảm bảo gửi dữ liệu ở dạng JSON
                },
                body: JSON.stringify(body) // Thêm dữ liệu nếu cần (nếu không cần gửi, để trống hoặc thêm thông tin cần thiết)
            });

            if (!response.ok) {
                throw new Error('Có lỗi xảy ra khi gọi API');
            }

            const data = await response.json();
            return data;
            console.log(data); 
        } catch (error) {
            console.error('Có lỗi xảy ra:', error);
        }
    }
    (async () => {
            let data = await fetchData('/api/index');
            let a = document.getElementById('body')
            a.innerHTML = "";
            for(let object of data){
                a.innerHTML +=
                `
                    <tr>
                        <td> ${object.id}</td>
                        <td>${object.name}</td>
                        <td>${object.createdAt}</td>
                        <td> 
                            <div style="width:20px;height:20px">
                                <img src="${object.avatar}" alt="" style="with:100%;height:100%">
                            </div>
                        </td>
                        <td>
                            <a href="/UpdateProduct/ ${object.id}" class="btn btn-warning btn-sm">Sửa</a>
                            <form  style="display:inline;">
                                <button type="button" class="btn btn-danger btn-sm delete" data-id=" ${object.id}" >Xóa</button>
                            </form>
                        </td>
                    </tr>
                `
            }
            let deleteButtons = document.querySelectorAll('.delete');
            deleteButtons.forEach(button => {
                button.addEventListener('click', async  function () {
                    let productId = this.getAttribute('data-id');
                    if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')) {
                        console.log(productId)
                        let path = "/api/delete/" + productId;
                        let comfi = await fetchData(path);
                        if (comfi && comfi.success) {
                            alert('Sản phẩm đã được xóa');
                        } else {
                            alert('Lỗi khi xóa sản phẩm'+comfi.error);
                        }
                        window.location.href = "/";
                    }
                });
            });

    })();
</script>
</html>

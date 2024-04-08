<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lý học sinh</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <header>
        Quản lý học sinh
        <hr>
    </header>
    <a href="{{route('postAddStudent')}}" class="btn btn-primary">Thêm mới</a>
    <div class="d-flex">
        <div>
            Hiển thị
            <button>10</button> dòng mỗi trang
        </div>
        <div>
            Tìm kiếm: <input type="text" name='search'>
        </div>
    </div>
    <table class="table table-bordered border-dark">
        <thead>
            <th width='10%'>STT</th>
            <th width='15%'>Tên học sinh</th>
            <th width='15%'>Số điện thoại</th>
            <th width='15%'>Sửa</th>
            <th width='10%'>Xóa</th>
        </thead>
        @foreach ($students as $index => $student)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->phone }}</td>
                <td><a href="{{route('getDetailStudent',['id'=>$student->id])}}"  style="text-decoration:none">Sửa</a></td>
                <td><a href="{{route('deleteStudent',['id'=>$student->id])}}" style="text-decoration:none">Xóa</a></td>
            </tr>

        @endforeach
    </table>

    @if(empty($msg))
    <div class="alert alert-success">{{ session('msg') }}</div>
    @endif
</body>


</html>

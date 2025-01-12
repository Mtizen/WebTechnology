<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<title>Thêm Vấn Đề</title>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Thêm Vấn Đề Mới</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('home.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="computer_id" class="form-label">Mã máy tính</label>
                        <select class="form-select" id="computer_id" name="computer_id" required>
                            @foreach($computers as $computer)
                                <option value="{{ $computer->id }}">{{ $computer->id }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="reported_by" class="form-label">Người báo cáo sự cố</label>
                        <input type="text" class="form-control" id="reported_by" name="reported_by" placeholder="Nhập tên người báo cáo" required>
                    </div>
                    <div class="mb-3">
                        <label for="reported_date" class="form-label">Thời gian báo cáo</label>
                        <input type="datetime-local" class="form-control" id="reported_date" name="reported_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả sự cố</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Nhập mô tả sự cố" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="urgency" class="form-label">Mức độ sự cố</label>
                        <select class="form-select" id="urgency" name="urgency" required>
                            <option value="Low">Thấp</option>
                            <option value="Medium">Trung bình</option>
                            <option value="High">Cao</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Trạng thái hiện tại</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="Open">Mở</option>
                            <option value="In Progress">Đang xử lý</option>
                            <option value="Resolved">Đã giải quyết</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-2">Thêm</button>
                        <a href="{{ route('home.index') }}" class="btn btn-secondary">Hủy</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

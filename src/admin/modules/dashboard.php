<div class="container mt-4">
    <div class="row">
        <!-- Card for Products -->
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-4 shadow-lg rounded-lg" style="transition: transform 0.3s ease;">
                <div class="card-body">
                    <h5 class="card-title">Sản phẩm</h5>
                    <p class="card-text">Quản lý sản phẩm và thông tin sản phẩm.</p>
                    <a href="index.php?action=quanlysanpham&query=them" class="btn btn-light">Xem thêm</a>
                </div>
            </div>
        </div>

        <!-- Card for Orders -->
        <div class="col-md-4">
            <div class="card text-white bg-success mb-4 shadow-lg rounded-lg" style="transition: transform 0.3s ease;">
                <div class="card-body">
                    <h5 class="card-title">Đơn hàng</h5>
                    <p class="card-text">Theo dõi và quản lý đơn hàng.</p>
                    <a href="index.php?action=quanlydonhang&query=them" class="btn btn-light">Xem thêm</a>
                </div>
            </div>
        </div>

        <!-- Card for Posts -->
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-4 shadow-lg rounded-lg" style="transition: transform 0.3s ease;">
                <div class="card-body">
                    <h5 class="card-title">Bài viết</h5>
                    <p class="card-text">Quản lý bài viết và tin tức.</p>
                    <a href="index.php?action=quanlybaiviet&query=them" class="btn btn-light">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS for hover effect -->
<style>
    .card:hover {
        transform: scale(1.05);
        cursor: pointer;
    }

    .btn-light {
        background-color: #f8f9fa;
        color: #212529;
    }

    .card-title {
        font-size: 1.5rem;
        font-weight: bold;
    }

    .card-text {
        font-size: 1.1rem;
    }
</style>

<div class="content">
            <?php 
                if(isset($_GET['action']) && $_GET['query'])
                {
                    $tam = $_GET['action'];
                    $query = $_GET['query'];
                }
                else
                {
                    $tam = '';
                    $query = '';
                }
                if($tam == 'quanlydanhmucsanpham' && $query=='them')
                {
                    include("../modules/quanlydanhmucsanpham/them.php");
                    include("../modules/quanlydanhmucsanpham/lietke.php");

                }elseif($tam == 'quanlydanhmucsanpham' && $query=='sua'){
                    include("../modules/quanlydanhmucsanpham/sua.php");

                }elseif($tam == 'quanlysanpham' && $query=='them'){
                    include("../modules/quanlysanpham/them.php");
                    include("../modules/quanlysanpham/lietke.php");

                }elseif($tam == 'quanlysanpham' && $query=='sua'){
                    include("../modules/quanlysanpham/sua.php");
                }elseif($tam == 'quanlydonhang' && $query=='duyet'){
                    include("../modules/quanlydonhang/donhang.php");
                }elseif($tam == 'quanlydonhang' && $query=='timkiem'){
                    include("../modules/quanlydonhang/donhang.php");

                }elseif($tam == 'quanlybaiviet' && $query=='them'){
                    include("../modules/quanlybaiviet/them.php");
                    include("../modules/quanlybaiviet/lietke.php");

                }elseif($tam == 'quanlybaiviet' && $query=='sua'){
                    include("../modules/quanlybaiviet/sua.php");
                }else{
                    include("../modules/dashboard.php");
                }
            ?>           
</div>
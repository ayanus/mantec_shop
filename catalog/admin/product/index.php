<?php
// อันเก่า
// $sql = "SELECT * ,p.id,p.name,tp.title AS type FROM sp_product p LEFT JOIN tb_type_product tp ON p.type = tp.id";
// โค้ดใหม่
$sql = "SELECT * ,p.id,p.name,tp.title AS type FROM sp_product p LEFT JOIN tb_type_product tp ON p.type = tp.title";
$query = mysqli_query($connection, $sql);
?>
<div class="row justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">จัดการข้อมูลสินค้า</h1>
    </div>
    <div class="col-auto">

    </div>
</div>
<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-12">
        <div class="app-card app-card-settings shadow-sm p-4">

            <div class="app-card-body">
                <a href="?page=<?= $_GET['page'] ?>&function=add" class="btn btn-info text-white mb-3 float-end">เพิ่มข้อมูลสินค้า</a>
                <table class="table table-hover" id="tableall">
                    <thead class="text-center">
                        <tr>
                            <th scope="col" class="text-center">ลำดับ</th>
                            <th scope="col" class="text-center">รูปภาพ</th>
                            <th scope="col" class="text-center">ชื่อสินค้า</th>
                            <th scope="col" class="text-center">ประเภทสินค้า</th>
                            <th scope="col" class="text-center">ราคา</th>
                            <th scope="col" class="text-center">เมนู</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        $i = 1;
                        foreach ($query as $data):
                        ?>
                            <tr>
                                <td class="align-middle text-center"><?= $i++ ?></td>
                                <td class="align-middle">
                                    <img src="upload/product/<?= $data['img'] ?>"class="rounded" width="75" height="75">
                                </td>
                                <td class="align-middle"><?= $data['name'] ?></td>
                                <td class="align-middle"><?= $data['type'] ?></td>
                                <td class="align-middle text-center"><?= number_format($data['price']) ?></td>
                               
                                <td class="align-middle">
                                    <a href="?page=<?= $_GET['page'] ?>&function=update&id=<?= $data['id'] ?>"
                                        class="btn btn-sm btn-warning">แก้ไข</a>
                                    <a href="?page=<?= $_GET['page'] ?>&function=delete&id=<?= $data['id'] ?>"
                                        onclick="return confirm('คุณต้องการลบ ชื่อสินค้า : <?= $data['name'] ?> หรือไม่')"
                                        class="btn btn-sm btn-danger">ลบ</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div><!--//app-card-body-->

        </div><!--//app-card-->
    </div>
</div><!--//row-->
<script type="text/javascript">
    let table = new DataTable('#tableall', {
        language: {
            "decimal": "",
            "emptyTable": "ไม่มีข้อมูลในตาราง",
            "info": "แสดง _START_ - _END_ จาก _TOTAL_ รายการ",
            "infoEmpty": "แสดง 0 - 0 จาก 0 รายการ",
            "infoFiltered": "(filtered from _MAX_ total entries)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "แสดง _MENU_ รายการ",
            "loadingRecords": "Loading...",
            "processing": "Processing...",
            "search": "ค้นหา:",
            "zeroRecords": "No matching records found",
            "paginate": {
                "first": "แรกสุด",
                "last": "ท้ายสุด",
                "next": "ถัดไป",
                "previous": "ก่อนหน้า"
            },
            "aria": {
                "orderable": "Order by this column",
                "orderableReverse": "Reverse order this column"
            }
        }
    });
</script>
<?php mysqli_close($connection); ?>
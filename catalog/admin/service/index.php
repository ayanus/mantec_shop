<?php
$sql = "SELECT * FROM service;";
$query = mysqli_query($connection, $sql);
?>
<div class="row justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">จัดการการบริการ</h1>
    </div>
    <div class="col-auto">

    </div>
</div>
<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-12">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <a href="?page=<?= $_GET['page'] ?>&function=add" class="btn btn-info text-white mb-3 float-end">เพิ่มข้อมูลการบริการ</a>
                <table class="table table-hover" id="tableall">
                    <thead class="text-center">
                        <tr>
                            <th scope="col" class="text-center">ลำดับ</th>
                            <th scope="col" class="text-center">รูปภาพ</th>
                            <th scope="col" class="text-center">การบริการ</th>
                            <th scope="col" class="text-center">รายละเอียดงาน</th>
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
                                    <img src="upload/service/<?= $data['img'] ?>"class="rounded" width="75" height="75">
                                </td>
                                <td class="align-middle w-25" name="service_name"><?= $data['service_name'] ?></td>
                                <td class="align-middle text-start" name="detail"><?= $data['detail'] ?></td>
                            
                                <td class="align-middle w-25">
                                    <a href="?page=<?= $_GET['page'] ?>&function=update&service_id=<?= $data['service_id'] ?>"
                                        class="btn btn-sm btn-warning">แก้ไข</a>
                                    <a href="?page=<?= $_GET['page'] ?>&function=delete&service_id=<?= $data['service_id'] ?>"
                                        onclick="return confirm('คุณต้องการลบ ชื่อสินค้า : <?= $data['service_name'] ?> หรือไม่')"
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
<?php
$sql = "SELECT * FROM mantec_user";
$query = mysqli_query($connection, $sql);
?>
<div class="row justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">ตารางข้อมูลผู้ดูแลระบบ</h1>
    </div>
    <div class="col-auto">

    </div>
</div>
<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-12">
        <div class="app-card app-card-settings shadow-sm p-4">

            <div class="app-card-body">
                <a href="?page=<?= $_GET['page'] ?>&function=add" class="btn btn-info text-white mb-3 float-end">เพิ่มข้อมูลผู้ดูแลระบบ</a>
                <table class="table table-hover" id="tableall">
                    <thead class="text-center">
                        <tr>
                            <th scope="col" class="text-center">รูปภาพ</th>
                            <th scope="col" class="text-center">ชื่อผู้ใช้</th>
                            <th scope="col" class="text-center">ชื่อ - นามสกุล</th>
                            <th scope="col" class="text-center">อีเมล</th>
                            <th scope="col" class="text-center">เบอร์ติดต่อ</th>
                            <th scope="col" class="text-center">สถานะ</th>
                            <th scope="col" class="text-center">เมนู</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php foreach ($query as $data): ?>
                            <tr>
                                <td class="align-middle">
                                    <img src="upload/admin/<?= $data['image'] ?>" class="rounded" width="75" height="75">
                                </td>
                                <td class="align-middle"><?= $data['username'] ?></td>
                                <td class="align-middle"><?= $data['firstname'] . ' ' . $data['lastname'] ?></td>
                                <td class="align-middle"><?= $data['email'] ?></td>
                                <td class="align-middle"><?= $data['ph_number'] ?></td>
                                <td class="align-middle"><?= $data['userlevel'] ?></td>
                                <!-- <td class="align-middle">
                                    <php $data['status'] == 0 ? -->
                                        <!-- '<span class="text-success">เปิดใช้งาน</span>' 
                                        : '<span class="text-danger">ปิดใช้งาน' > -->
                                </td> 
                                <td class="align-middle">
                                    <a href="?page=<?= $_GET['page'] ?>&function=update&id=<?= $data['id'] ?>"
                                        class="btn btn-sm btn-warning">แก้ไข</a>
                                    <a href="?page=<?= $_GET['page'] ?>&function=delete&id=<?= $data['id'] ?>"
                                        onclick="return confirm('คุณต้องการลบชื่อผู้ใช้ : <?= $data['username'] ?> หรือไม่')"
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
$(function () {
    $('.js-basic-example').DataTable({
        responsive: true,
        "language": {
            "lengthMenu": "Hiển thị _MENU_ Số lượng tin hiển thị",
            "zeroRecords": "Không có kết quả nào",
            "info": "Hiển thị tin _PAGE_ của _PAGES_",
            "infoEmpty": "Không có kết quả nào",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "sSearch":        "Tìm Kiếm: "
        }
    });

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});
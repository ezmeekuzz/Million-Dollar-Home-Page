$(document).ready(function () {
    $('#transactions').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "/admin/home/getData",
            "type": "POST"
        },
        "columns": [
            { "data": "name" },
            { "data": "email" },
            { "data": "phone" },
            { "data": "city" },
            { "data": "state" },
            { "data": "country" },
            { "data": "numberOfPixelBoxes" },
            { "data": "totalamount" },
            {
                "data": "imageLocation",
                "render": function (data, type, row) {
                    var imageUrl = base_url + data;
                    return `<img src="${imageUrl}" alt="Image" style="max-width: 100px; max-height: 100px;">`;
                }
            },
            { "data": "dateUploaded" },
            {
                "data": null,
                "render": function (data, type, row) {
                    return `
                    <a href="javascript:void(0);" class="approve-btn" data-id="${row.image_coordinate_id}" style="color: green;">
                        <i class="ti ti-thumb-up" style="font-size: 18px;"></i>
                    </a>
                    <a href="javascript:void(0);" class="reject-btn" data-id="${row.image_coordinate_id}" style="color: orange;">
                        <i class="ti ti-thumb-down" style="font-size: 18px;"></i>
                    </a>
                    <a href="javascript:void(0);" class="delete-btn" data-id="${row.image_coordinate_id}" style="color: red;">
                        <i class="ti ti-trash" style="font-size: 18px;"></i>
                    </a>`;
                }
            }
        ],
        "createdRow": function (row, data, dataIndex) {
            $(row).attr('data-id', data.image_coordinate_id);
        },
        "initComplete": function (settings, json) {
            $(this).trigger('dt-init-complete');
        }
    });
    $('#transactions').on('dt-init-complete', function () {
        $(this).show();
    });
    $(document).on('click', '.delete-btn', function () {
        const id = $(this).data('id');
        const row = $(this).closest('tr');
        const table = $('#transactions').DataTable();

        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: true,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '/admin/home/delete/' + id,
                    method: 'DELETE',
                    success: function (response) {
                        if (response.status === 'success') {
                            table.row(row).remove().draw(false);
                        }
                    }
                });
            }
        });
    });
});


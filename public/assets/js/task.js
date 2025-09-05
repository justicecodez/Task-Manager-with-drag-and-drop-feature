$(function () {
    $("#table").DataTable({
        "ordering": false,
        "paging": false, // You might want to disable this too, as it can interfere.
        "info": false,
        "searching": false
    });
    $("#tablecontents").sortable({
        items: "tr",
        cursor: 'move',
        opacity: 0.6,
        update: function () {
            sendOrderToServer();
        }
    });
    function sendOrderToServer() {
        var order = [];
        var token = $('meta[name="csrf-token"]').attr('content');
        $('tr.row1').each(function (index, element) {
            order.push({
                id: $(this).attr('data-id'),
                position: index + 1
            });
        }); 
        $.ajax({
            type: "POST",
            dataType: "json",
            url: dragndrop,
            data: {
                order: order,
                _token: token
            },
            success: function (response) {
                if (response.status) {
                    $('#dragResult').text(response.message);
                    $('#dragResult').fadeIn().delay(3000).fadeOut();
                    location.reload();
                } else {
                    console.log(response)
                }
            }
        });
    }
});
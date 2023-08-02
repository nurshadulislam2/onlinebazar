<script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="{{ asset('assets/backend/js/scripts.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
    crossorigin="anonymous"></script>
<script src="{{ asset('assets/backend/js/datatables-simple-demo.js') }}"></script>

<script>
    $("document").ready(function() {
        $('select[name="category_id"]').on('change', function() {
            var catId = $(this).val();
            if (catId) {
                $.ajax({
                    url: '/subcategory/' + catId,
                    type: 'GET',
                    dataType: "json",
                    success: function(data) {
                        $('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="subcategory_id"]').append(
                                '<option value="' + key + '">' + value +
                                '</option>')
                        })
                    }
                })
            }
        });
    });
</script>
